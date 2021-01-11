<?php

namespace App\Http\Helpers;

use App\Http\Helpers\Helper;
use Image;
use Schema;
use URL;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class Helper
{
	public static function single_file_upload($id, $file, $destination, $width, $height, $fileType=""){
    	if($fileType == ""){
            $fileType = $file->getClientOriginalExtension();
        }

        $file_name = $id.'.'.$fileType;
    	$destinationFilePath = $destination.'/'.$file_name;
    	Image::make($file)->resize($width, $height)->save($destinationFilePath);

    	return URL::asset($destinationFilePath);
    }

    public static function convert_date($dt,$t){
        $dt_new = null;

        if($dt){
            if($t == 0){ // Front to DB
                $dt_arr = explode('-',$dt);

                $dt_new = $dt_arr[2].'-'.$dt_arr[1].'-'.$dt_arr[0];
            }else{ // DB to Front
                $dt_arr = explode('-',$dt);

                $dt_new = $dt_arr[2].'-'.$dt_arr[1].'-'.$dt_arr[0];
            }
        }

        return $dt_new;
    }

    public static function generate_username($email){
        $email_arr = explode('@',$email);
        $username = $email_arr[0];

        if(User::where('username',$username)->exists()){
            $i = 0;

            do{
                $i++;
                $new_username = $username.$i;
            }while(User::where('username',$new_username)->exists());

            $username = $new_username;
        }

        return $username;
    }

    public static function generate_token(){
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $token = array();
        $alphaLength = strlen($alphabet) - 1;
        for($i = 0; $i < 50; $i++){
            $n = rand(0, $alphaLength);
            $token[] = $alphabet[$n];
        }
        return implode($token);
    }

    public static function reset_password_token($email){
        do{
            $token = Helper::generate_token();
        }while(User::where('reset_token',$token)->exists());

        $user = User::where('email',$email)->first();
        $user->reset_token = $token;
        $user->save();

        $data = [
            'subject' => 'Reset Password',
            'message' => 'To reset your password, please click <a href="'.URL::to('/reset-password/'.$token).'">here</a>'
        ];

        if(env('is_server') == true){
            Mail::to($user->email)->send(new SendMail($data));
        }
    }
}