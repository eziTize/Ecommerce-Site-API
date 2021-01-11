<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\User;
use JWTAuth;
use App\Http\Helpers\Helper;
use Validator;
use Image;
use Hash;
use stdClass;
use Carbon\Carbon;

class LoginController extends Controller
{
    public $destination = 'uploads/profile';
    public $flag_width = '480';
    public $flag_height = '400';

    public $loginAfterSignUp = false;

    public function register(Request $request){
    	$input = $request->all();
    	$rules = [
            'name' => 'required',
            'email' => 'required|email|unique:ig_users',
            'password' => 'required',
            'conf_password' => 'required|same:password',
            'mobile' => 'required|unique:ig_users',
            'gender' => 'required',
            'dob' => 'date'
    	];
    	$niceNames = [
            'name' => 'Name',
            'email' => 'Email ID',
            'password' => 'Password',
            'conf_password' => 'Confirm Password',
            'mobile' => 'Mobile No',
            'gender' => 'Gender',
            'dob' => 'Date of Birth'
    	];

    	$validator = Validator::make($input, $rules, [], $niceNames);

        if($validator->fails()){
            return response()->json([
            	'status' => false,
            	'message' => $validator->errors()->first(),
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }

    	$user = new User;
    	$user->name = $request->name;
        $user->email = $request->email;
    	$user->username = Helper::generate_username($request->email);
    	$user->password = bcrypt($request->password);
        $user->mobile = $request->mobile;
        $user->gender = $request->gender;
        $user->address = $request->address;
    	$user->dob = $request->dob;
    	$user->save();

        if($request->hasFile('profile_picture')){
            $file = $request->file('profile_picture');
            $image = Helper::single_file_upload($user->id, $file, $this->destination, $this->flag_width, $this->flag_height);
            $user->profile_picture = $image;
            $user->save();
        }

        $user_data = User::find($user->id);

        if($this->loginAfterSignUp){
            return $this->login($request);
        }

    	return response()->json([
    		'status' => true,
    		'message' => 'Successfully registered',
    		'data' => $user_data
    	], Response::HTTP_OK);
    }

    public function login(Request $request){
    	$jwt_token = null;

        $input = $request->only('email', 'password');
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];
        $niceNames = [
            'email' => 'Username / Email ID / Mobile No',
            'password' => 'Password'
        ];

        $validator = Validator::make($input, $rules, [], $niceNames);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }
        
        $input_email = [
            'email' => $input['email'],
            'password' => $input['password']
        ];
        $input_mobile = [
            'mobile' => $input['email'],
            'password' => $input['password']
        ];
        $input_username = [
            'username' => $input['email'],
            'password' => $input['password']
        ];

        if(User::where('email',$input_email['email'])->exists()){
        	$user = User::where('email',$input_email['email'])->first();
        	$input_new = $input_email;
        }elseif(User::where('mobile',$input_mobile['mobile'])->exists()){
        	$user = User::where('mobile',$input_mobile['mobile'])->first();
        	$input_new = $input_mobile;
        }elseif(User::where('username',$input_username['username'])->exists()){
        	$user = User::where('username',$input_username['username'])->first();
        	$input_new = $input_username;
        }else{
        	return response()->json([
                'status' => false,
                'message' => 'Invalid credential',
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }

        if($user->status == 1){
            return response()->json([
                'status' => false,
                'message' => 'Your Account is blocked',
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }

        if(!$jwt_token = JWTAuth::attempt($input_new)){
    		return response()->json([
    			'status' => false,
    			'message' => 'Invalid credential',
                'data' => new stdClass()
    		], Response::HTTP_OK);
    	}

    	return response()->json([
    		'status' => true,
    		'message' => 'Successfully logged in',
    		'data' => $user
    	], Response::HTTP_OK)->withHeaders([
            'token' => $jwt_token
        ]);
    }

    public function forget_pwd(Request $request){
        $input = $request->all();
        $rules = [
            'email' => 'required|email'
        ];
        $niceNames = [
            'email' => 'Email ID'
        ];

        $validator = Validator::make($input, $rules, [], $niceNames);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }

        if(!User::where('email',$request->email)->exists()){
            return response()->json([
                'status' => false,
                'message' => 'Email not found',
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }

        Helper::reset_password_token($request->email);

        return response()->json([
            'status' => true,
            'message' => 'Reset password link sent to your email address',
            'data' => new stdClass()
        ], Response::HTTP_OK);
    }

    public function reset_pwd($token){
        if(!User::where('reset_token',$token)->exists()){
            return response()->json([
                'status' => false,
                'message' => 'Token not exists',
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                'status' => true,
                'message' => 'Token exists',
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }
    }

    public function reset_pwd_post($token,Request $request){
        $input = $request->all();
        $rules = [
            'new_password' => 'required',
            'conf_password' => 'required|same:new_password'
        ];
        $niceNames = [
            'new_password' => 'New Password',
            'conf_password' => 'Confirm Password'
        ];

        $validator = Validator::make($input, $rules, [], $niceNames);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }

        if(!User::where('reset_token',$token)->exists()){
            return response()->json([
                'status' => false,
                'message' => 'Token not exists',
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }else{
            $user = User::where('reset_token',$token)->first();
            $user->password = bcrypt($request->new_password);
            $user->reset_token = null;
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Password reset successfully',
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }
    }
}