<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Blog;
use App\Testimonial;
use JWTAuth;
use App\Http\Helpers\Helper;
use Validator;
use Image;
use Hash;
use stdClass;
use Carbon\Carbon;

class FrontController extends Controller
{
    public $blog_take = 3;

    public function contact_us(Request $request){
        $input = $request->all();
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ];
        $niceNames = [
            'name' => 'Name',
            'email' => 'Email ID',
            'subject' => 'Subject',
            'message' => 'Message'
        ];

        $validator = Validator::make($input, $rules, [], $niceNames);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }

        $message = '';
        $message .= '<b>Name: </b>'.$request->name.'<br>';
        $message .= '<b>Email: </b>'.$request->email.'<br>';
        $message .= '<b>Subject: </b>'.$request->subject.'<br><br>';
        $message .= '<b>Message: </b><br>'.$request->message;

        $data_admin = [
            'from_address' => $request->email,
            'from_name' => $request->name,
            'subject' => ucwords($request->name).' contacts from imageno',
            'message' => $message
        ];

        $data_contact = [
            'subject' => 'Thank you for your contact',
            'message' => 'Thank you for your contact. We will get back ASAP.'
        ];

        if(env('is_server') == true){
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new SendMail($data_admin));
            Mail::to($request->email)->send(new SendMail($data_contact));
        }

        return response()->json([
            'status' => true,
            'message' => 'Your contact message sent successfully',
            'data' => new stdClass()
        ], Response::HTTP_OK);
    }

    public function blog(Request $request){
        if(!empty($request->search)){
            $blogs = Blog::where('status','Y')->where('is_deactivated','N')->where('title','like','%'.$request->search.'%')->where('published_at','<=',Carbon::now())->orderby('published_at','desc')->skip($request->start_pos)->take($this->blog_take)->get();
            $all_counts = Blog::where('status','Y')->where('is_deactivated','N')->where('title','like','%'.$request->search.'%')->where('published_at','<=',Carbon::now())->count();
        }else{
            $blogs = Blog::where('status','Y')->where('is_deactivated','N')->where('published_at','<=',Carbon::now())->orderby('published_at','desc')->skip($request->start_pos)->take($this->blog_take)->get();
            $all_counts = Blog::where('status','Y')->where('is_deactivated','N')->where('published_at','<=',Carbon::now())->count();
        }

        $start_pos = ($request->start_pos+$this->blog_take);

        return response()->json([
            'status' => true,
            'message' => 'Blogs list',
            'data' => (count($blogs)>0) ? $blogs : new stdClass(),
            'start_pos' => $start_pos,
            'is_load_more' => ($start_pos <= $all_counts) ? true : false
        ], Response::HTTP_OK);
    }

    public function latest_blog(){
        $latest_blogs = Blog::where('status','Y')->where('is_deactivated','N')->where('published_at','<=',Carbon::now())->orderby('published_at','desc')->limit(3)->get();

        return response()->json([
            'status' => true,
            'message' => 'Latest blogs list',
            'data' => (count($latest_blogs)>0) ? $latest_blogs : new stdClass()
        ], Response::HTTP_OK);
    }

    public function blog_details($slug){
        $blog = Blog::where('slug',$slug)->where('status','Y')->where('is_deactivated','N')->where('published_at','<=',Carbon::now())->first();

        if($blog){
            return response()->json([
                'status' => true,
                'message' => 'Blog Details',
                'data' => $blog
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Blog Not Found',
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }
    }

    public function testimonial(){
        $testimonials = Testimonial::where('status','Y')->where('is_deactivated','N')->orderby('id','desc')->get();

        return response()->json([
            'status' => true,
            'message' => 'Testimonials list',
            'data' => (count($testimonials)>0) ? $testimonials : new stdClass()
        ], Response::HTTP_OK);
    }

    public function formula(){
        $type = 'Road Signs';

        if($type == 'Gigantographies'){
            //input
            $width = 2;
            $height = 1;
            $is_digital_design = true;
            $is_laminated = true;
            
            $canvas_value = 10;
            $digital_design_value = 15;
            $lamination_value_per_square_meter = 8;

            $square_meters = ($width*$height);
            $total = ($square_meters*$canvas_value);
            if($is_digital_design == true){
                $total += $digital_design_value;
            }
            if($is_laminated == true){
                $total += ($square_meters*$lamination_value_per_square_meter);
            }
            $total = number_format(round($total,2),2);

            return response()->json([
                'status' => true,
                'message' => 'Gigantographies formula',
                'data' => $total
            ], Response::HTTP_OK);
        }elseif($type == 'Billboards'){
            //input
            $width = 4;
            $height = 8;
            $side = 'single';
            $is_perimeter_within_equator = true;
            
            if($side == 'single'){
                $canvas_value = 80;
            }elseif($side == 'double'){
                $canvas_value = 150;
            }
            $installation_value = 200;

            $square_meters = ($width*$height);
            $total = ($square_meters*$canvas_value);
            if($is_perimeter_within_equator == true){
                $total += $installation_value;
            }
            $total = number_format(round($total,2),2);

            return response()->json([
                'status' => true,
                'message' => 'Billboards formula',
                'data' => $total
            ], Response::HTTP_OK);
        }elseif($type == 'Simple Signs'){
            //input
            $width = 3;
            $height = 1.2;
            $side = 'single';
            $is_perimeter_within_esmeraldas_ecuador = true;
            
            if($side == 'single'){
                $rs_value = 45;
            }elseif($side == 'double'){
                $rs_value = 90;
            }
            $installation_value = 40;

            $square_meters = ($width*$height);
            $total = ($square_meters*$rs_value);
            if($is_perimeter_within_esmeraldas_ecuador == true){
                $total += $installation_value;
            }
            $total = number_format(round($total,2),2);

            return response()->json([
                'status' => true,
                'message' => 'Simple Signs formula',
                'data' => $total
            ], Response::HTTP_OK);
        }elseif($type == 'Luminous Totem Signs'){
            //input
            $width = 2.5;
            $height = 1.3;
            $is_perimeter_within_esmeraldas_ecuador = true;
            
            $rl_value = 105;
            $installation_value = 40;

            $square_meters = ($width*$height);
            $total = ($square_meters*$rl_value);
            if($is_perimeter_within_esmeraldas_ecuador == true){
                $total += $installation_value;
            }
            $total = number_format(round($total,2),2);

            return response()->json([
                'status' => true,
                'message' => 'Luminous Totem Signs formula',
                'data' => $total
            ], Response::HTTP_OK);
        }elseif($type == 'Luminous Signs'){
            //input
            $width = 1;
            $height = 1.5;
            $side = 'single';
            $is_perimeter_within_esmeraldas_ecuador = true;
            
            if($side == 'single'){
                $rl_value = 100;
            }elseif($side == 'double'){
                $rl_value = 130;
            }
            $installation_value = 40;

            $square_meters = ($width*$height);
            $total = ($square_meters*$rl_value);
            if($is_perimeter_within_esmeraldas_ecuador == true){
                $total += $installation_value;
            }
            $total = number_format(round($total,2),2);

            return response()->json([
                'status' => true,
                'message' => 'Luminous Signs formula',
                'data' => $total
            ], Response::HTTP_OK);
        }elseif($type == 'Labels Type A'){
            //input
            $width = 0.6;
            $height = 1;
            $side = 'single';
            
            if($side == 'single'){
                $r_value = 85;
            }elseif($side == 'double'){
                $r_value = 100;
            }

            $square_meters = ($width*$height);
            $total = ($square_meters*$r_value);
            $total = number_format(round($total,2),2);

            return response()->json([
                'status' => true,
                'message' => 'Labels Type A formula',
                'data' => $total
            ], Response::HTTP_OK);
        }elseif($type == 'Corporeal Letters'){
            //input
            $width = 1.2;
            $height = 0.5;
            $type = 'pvc';
            $is_light = true;
            $is_base = true;
            $base_type = 'rs';
            $base_width = 3;
            $base_height = 1.2;
            
            if($type == 'pvc'){
                $letter_value = 150;
            }elseif($type == 'acrylic'){
                $letter_value = 160;
            }elseif($type == 'tool'){
                $letter_value = 190;
            }
            $light_value = 120;
            if($base_type == 'rs'){
                $base_value = 45;
            }elseif($base_type == 'rl'){
                $base_value = 100;
            }

            $square_meters = ($width*$height);
            $total = ($square_meters*$letter_value);
            if($is_light == true){
                $total += ($square_meters*$light_value);
            }
            if($is_base == true){
                $base_square_meters = ($base_width*$base_height);
                $total += ($base_square_meters*$base_value);
            }
            $total = number_format(round($total,2),2);

            return response()->json([
                'status' => true,
                'message' => 'Corporeal Letters formula',
                'data' => $total
            ], Response::HTTP_OK);
        }elseif($type == 'Road Signs'){
            //input
            $width = 1.5;
            $height = 0.5;
            $is_base = true;
            $is_reflective = false;
            
            $signage_value = 80;
            $base_value = 30;
            $reflective_value = 120;

            $square_meters = ($width*$height);
            $total = ($square_meters*$signage_value);
            if($is_base == true){
                $total += $base_value;
            }
            if($is_reflective == true){
                $total += ($square_meters*$reflective_value);
            }
            $total = number_format(round($total,2),2);

            return response()->json([
                'status' => true,
                'message' => 'Road Signs formula',
                'data' => $total
            ], Response::HTTP_OK);
        }
    }
}