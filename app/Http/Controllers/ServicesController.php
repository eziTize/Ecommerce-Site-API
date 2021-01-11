<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\ServicesMenu;
use App\Services;
use JWTAuth;
use App\Http\Helpers\Helper;
use Validator;
use Image;
use Hash;
use stdClass;
use Carbon\Carbon;
use DB;

class ServicesController extends Controller
{
    public $service_take = 10;

    public function services_menu(Request $request){
        $services_main_menu = ServicesMenu::where('parent_id','0')->get();

        foreach($services_main_menu as $skey=>$service_main_menu){
            if(count($service_main_menu->sub)){
                $services_main_menu[$skey]->child = ServicesController::get_services_menu_child($service_main_menu->sub,$request->language);
            }

            $lang_arr = json_decode($service_main_menu->lang_value,true);
            $services_main_menu[$skey]->lang_value = $lang_arr[$request->language];
        }

        return response()->json([
            'status' => true,
            'message' => 'Services menu list',
            'data' => $services_main_menu
        ], Response::HTTP_OK);
    }

    public function get_services_menu_child($children,$language_id){
        foreach($children as $ckey=>$child){
            if(count($child->sub)){
                $children[$ckey]->child = ServicesController::get_services_menu_child($child->sub,$language_id);
            }
            
            $lang_arr = json_decode($children[$ckey]->lang_value,true);
            $children[$ckey]->lang_value = $lang_arr[$language_id];
        }

        return $children;
    }

    public function all_services(Request $request){
        if(!empty($request->search)){
            $services = DB::table('ig_services as S')->leftJoin('ig_services_menu as M', 'M.id', '=', 'S.menu_id')->select('S.*','M.lang_value','M.slug')->where('M.lang_value','like','%'.$request->search.'%')->skip($request->start_pos)->take($this->service_take)->get();
            $all_counts = DB::table('ig_services as S')->leftJoin('ig_services_menu as M', 'M.id', '=', 'S.menu_id')->select('M.lang_value')->where('M.lang_value','like','%'.$request->search.'%')->count();
        }else{
            $services = DB::table('ig_services as S')->leftJoin('ig_services_menu as M', 'M.id', '=', 'S.menu_id')->select('S.*','M.lang_value','M.slug')->skip($request->start_pos)->take($this->service_take)->get();
            $all_counts = DB::table('ig_services as S')->leftJoin('ig_services_menu as M', 'M.id', '=', 'S.menu_id')->count();
        }

        foreach($services as $skey=>$service){
            $lang_arr = json_decode($service->lang_value,true);
            $services[$skey]->lang_value = $lang_arr[$request->language];

            $service_model = Services::find($service->id);
            $services[$skey]->image = $service_model->image;
        }

        $start_pos = ($request->start_pos+$this->service_take);

        return response()->json([
            'status' => true,
            'message' => 'All services list',
            'data' => (count($services)>0) ? $services : new stdClass(),
            'start_pos' => $start_pos,
            'is_load_more' => ($start_pos <= $all_counts) ? true : false
        ], Response::HTTP_OK);
    }

    public function services(Request $request,$slug){
        if(ServicesMenu::where('slug',$slug)->exists()){
            $srv = ServicesMenu::where('slug',$slug)->first();
            if(count($srv->sub)){
                $highest_level_srv = ServicesMenu::orderby('level','desc')->first();
                $highest_level = $highest_level_srv->level;
                $current_level = ($srv->level+1);

                $srv_lang_arr = json_decode($srv->lang_value,true);
                $menu_parent_id = $srv->parent_id;
                $selected_menu = $srv->id;

                for($i=$current_level;$i>=0;$i--){
                    if(ServicesMenu::where('id',$menu_parent_id)->exists()){
                        $parent_service = ServicesMenu::where('id',$menu_parent_id)->select('id','lang_value','slug')->first();
                        $menu_parent_id = $parent_service->parent_id;
                        $selected_menu = $parent_service->id;
                    }
                }

                $parent_id = [$srv->id];
                $service_ids = [];

                for($j=$current_level;$j<=$highest_level;$j++){
                    $child_services = ServicesMenu::wherein('parent_id',$parent_id)->select('id')->get();

                    $nparent_id = [];

                    foreach($child_services as $cskey=>$child_service){
                        if(!count($child_service->sub)){
                            $service_ids[] = $child_service->id;
                        }else{
                            $nparent_id[] = $child_service->id;
                        }
                    }

                    $parent_id = $nparent_id;
                }

                if(!empty($request->search)){
                    $services = DB::table('ig_services as P')->leftJoin('ig_services_menu as M', 'M.id', '=', 'P.menu_id')->select('P.*','M.lang_value','M.slug')->where('M.lang_value','like','%'.$request->search.'%')->wherein('P.menu_id',$service_ids)->get();
                }else{
                    $services = DB::table('ig_services as P')->leftJoin('ig_services_menu as M', 'M.id', '=', 'P.menu_id')->select('P.*','M.lang_value','M.slug')->wherein('P.menu_id',$service_ids)->get();
                }

                foreach($services as $skey=>$service){
                    $lang_arr = json_decode($service->lang_value,true);
                    $services[$skey]->lang_value = $lang_arr[$request->language];

                    $service_model = Services::find($service->id);
                    $services[$skey]->image = $service_model->image;
                }

                return response()->json([
                    'status' => true,
                    'message' => 'Services list',
                    'data' => (count($services)>0) ? $services : new stdClass(),
                    'breadcrumb' => $srv_lang_arr[$request->language],
                    'selected_menu' => $selected_menu
                ], Response::HTTP_OK);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Service not found',
                    'data' => new stdClass()
                ], Response::HTTP_OK);
            }
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Service not found',
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }
    }

    public function get_services_child($children){
        foreach($children as $ckey=>$child){
            if(count($child->sub)){
                $children[$ckey]->child = ServicesController::get_services_menu_child($child->sub,$language_id);
            }
            
            $lang_arr = json_decode($children[$ckey]->lang_value,true);
            $children[$ckey]->lang_value = $lang_arr[$language_id];
        }

        return $children;
    }

    public function service_details(Request $request,$slug){
        
    }


    /*public function services_menu(){
        $services_main_menu = Services::where('menu_type','main_menu')->get();

        foreach($services_main_menu as $skey=>$service_main_menu){
            if(count($service_main_menu->sub)){
                $services_main_menu[$skey]->child = ServicesController::get_services_child($service_main_menu->sub);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Services menu list',
            'data' => (count($services_main_menu)>0) ? $services_main_menu : new stdClass()
        ], Response::HTTP_OK);
    }

    public function get_services_child($children){
        foreach($children as $ckey=>$child){
            if(count($child->sub)){
                $children[$ckey]->child = ServicesController::get_services_child($child->sub);
            }
        }

        return $children;
    }

    public function service_details($slug){
        $service = Services::where('slug',$slug)->where('menu_type','last_menu')->first();
        $service_menu = [];
        $service_menu[] = $service->title;

        $parent = $service->parent_id;

        while($parent != 0){
            $parent_service = Services::find($parent);
            $service_menu[] = $parent_service->title;

            $parent = $parent_service->parent_id;
        }

        $service->menu = array_reverse($service_menu);

        if($service){
            return response()->json([
                'status' => true,
                'message' => 'Service details',
                'data' => $service
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Service Not Found',
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }
    }

    public function service_form_field($slug){
        $form_fields = [];

        $service = Services::where('slug',$slug)->where('menu_type','last_menu')->first();

        $services_form_field = ServicesFormField::where('services_id',$service->id)->get();
        foreach($services_form_field as $service_form_field){
            if($service_form_field->option_type == 'select_type'){
                $service_form_field->title = $service->title;
            }
            $options = [];
            if($service_form_field->has_options == 'Y'){
                $services_form_field_option = ServicesFormFieldOption::where('services_id',$service->id)->where('form_field_id',$service_form_field->id)->get();
                foreach($services_form_field_option as $service_form_field_option){
                    $options[] = [
                        'id' => $service_form_field_option->id,
                        'value' => $service_form_field_option->type,
                        'name' => $service_form_field_option->title
                    ];
                }
            }

            $form_fields[] = [
                'name' => $service_form_field->type,
                'title' => $service_form_field->title,
                'options' => $options
            ];
        }

        if($service){
            return response()->json([
                'status' => true,
                'message' => 'Service details',
                'data' => $form_fields
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Service Not Found',
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }
    }

    public function service_formula($slug,Request $request){
        $service = Services::where('slug',$slug)->where('menu_type','last_menu')->first();

        if($service){
            $total_price = 0;

            $service_id = $service->id;
            $service_parent_id = $service->parent_id;
            while($service_parent_id){
                $parent_service = Services::find($service_parent_id);
                $service_id = $parent_service->id;
                $service_parent_id = $parent_service->parent_id;
            }

            $parent_service = Services::find($service_id);
            $main_service = $parent_service->type;

            if($main_service == 'design_service'){
                if($request->service_input['design_type'] && $request->service_input['pack']){
                    $design_type_form_field = ServicesFormField::where('services_id',$service->id)->where('type','design_type')->first();
                    $pack_form_field = ServicesFormField::where('services_id',$service->id)->where('type','pack')->first();

                    $design_type_form_field_option = ServicesFormFieldOption::where('services_id',$design_type_form_field->services_id)->where('form_field_id',$design_type_form_field->id)->where('type',$request->service_input['design_type'])->first();
                    $pack_form_field_option = ServicesFormFieldOption::where('services_id',$pack_form_field->services_id)->where('form_field_id',$pack_form_field->id)->where('type',$request->service_input['pack'])->first();

                    $pack_form_field_option_type = $pack_form_field_option->type;
                    $total_price = $design_type_form_field_option->$pack_form_field_option_type;
                }
            }

            $total_price = round($total_price,2);

            if($total_price){
                return response()->json([
                    'status' => true,
                    'message' => 'Service formula',
                    'data' => $total_price
                ], Response::HTTP_OK);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Service formula',
                    'data' => new stdClass()
                ], Response::HTTP_OK);
            }
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Service formula',
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }
    }*/
}