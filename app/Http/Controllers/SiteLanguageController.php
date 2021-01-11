<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\SiteLanguage;
use JWTAuth;
use App\Http\Helpers\Helper;
use Validator;
use Image;
use Hash;
use stdClass;
use Carbon\Carbon;

class SiteLanguageController extends Controller
{
    public function site_language_list(Request $request){
        $site_language_list = SiteLanguage::get();

        $language = [];
        foreach($site_language_list as $site_language){
            $lang_arr = json_decode($site_language->lang_value,true);
            $language[$site_language->lang_key] = $lang_arr[$request->language];
        }

        return response()->json([
            'status' => true,
            'message' => 'Site language list',
            'data' => $language
        ], Response::HTTP_OK);
    }
}