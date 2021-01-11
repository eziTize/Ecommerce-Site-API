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

class ProfileController extends Controller
{
    public $destination = 'uploads/profile';
    public $flag_width = '480';
    public $flag_height = '400';

    public function update_profile(Request $request){
        $u = JWTAuth::parseToken()->authenticate();
        $user = User::where('id',$u->id)->first();

        $input = $request->all();
        $rules = [
            'email' => 'email|unique:ig_users,email,'.$user->id,
            'username' => 'unique:ig_users,username,'.$user->id,
            'mobile' => 'unique:ig_users,mobile,'.$user->id,
            'dob' => 'date'
        ];
        $niceNames = [
            'email' => 'Email ID',
            'username' => 'User Name',
            'mobile' => 'Mobile No',
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

        if($user){
            $user->name = $request->name ?? $user->name;
            $user->gender = $request->gender ?? $user->gender;
            $user->email = $request->email ?? $user->email;
            $user->mobile = $request->mobile ?? $user->mobile;
            $user->username = $request->username ?? $user->username;
            $user->dob = $request->dob ? $request->dob : $user->dob;
            $user->address = $request->address ?? $user->address;
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Profile successfully updated',
                'data' => $user
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'User not found',
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }
    }

    public function update_profile_img(Request $request){
        $u = JWTAuth::parseToken()->authenticate();
        $user = User::where('id',$u->id)->first();

        if($user){
            if($request->hasFile('profile_img')){
                $file = $request->file('profile_img');
                $image = Helper::single_file_upload($user->id, $file, $this->destination, $this->flag_width, $this->flag_height);
                $user->profile_img = $image;
                $user->save();
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Profile image is required',
                    'data' => new stdClass()
                ], Response::HTTP_OK);
            }

            return response()->json([
                'status' => true,
                'message' => 'Profile image successfully updated',
                'data' => $user
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'User not found',
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }
    }

    public function change_password(Request $request){
        $u = JWTAuth::parseToken()->authenticate();
        $user = User::where('id',$u->id)->first();

        $input = $request->all();
        $rules = [
            'old_password' => 'required',
            'new_password' => 'required',
            'conf_password' => 'required'
        ];
        $niceNames = [
            'old_password' => 'Old Password',
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

        if($user){
            if(Hash::check($request->old_password, $user->password)){
                $user->password = bcrypt($request->new_password);
                $user->save();

                return response()->json([
                    'status' => true,
                    'message' => 'Password changed successfully',
                    'data' => $user
                ], Response::HTTP_OK);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Wrong old password',
                    'data' => new stdClass()
                ], Response::HTTP_OK);
            }
        }else{
            return response()->json([
                'status' => false,
                'message' => 'User not found',
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }
    }
}