<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\ProductsMenu;
use App\Products;
use JWTAuth;
use App\Http\Helpers\Helper;
use Validator;
use Image;
use Hash;
use stdClass;
use Carbon\Carbon;
use DB;

class ProductsController extends Controller
{
    public $product_take = 10;

    public function products_menu(Request $request){
        $products_main_menu = ProductsMenu::where('parent_id','0')->get();

        foreach($products_main_menu as $pkey=>$product_main_menu){
            if(count($product_main_menu->sub)){
                $products_main_menu[$pkey]->child = ProductsController::get_products_menu_child($product_main_menu->sub,$request->language);
            }

            $lang_arr = json_decode($product_main_menu->lang_value,true);
            $products_main_menu[$pkey]->lang_value = $lang_arr[$request->language];
        }

        return response()->json([
            'status' => true,
            'message' => 'Products menu list',
            'data' => $products_main_menu
        ], Response::HTTP_OK);
    }

    public function get_products_menu_child($children,$language_id){
        foreach($children as $ckey=>$child){
            if(count($child->sub)){
                $children[$ckey]->child = ProductsController::get_products_menu_child($child->sub,$language_id);
            }
            
            $lang_arr = json_decode($children[$ckey]->lang_value,true);
            $children[$ckey]->lang_value = $lang_arr[$language_id];
        }

        return $children;
    }

    public function all_products(Request $request){
        if(!empty($request->search)){
            $products = DB::table('ig_products as P')->leftJoin('ig_products_menu as M', 'M.id', '=', 'P.menu_id')->select('P.*','M.lang_value','M.slug')->where('M.lang_value','like','%'.$request->search.'%')->skip($request->start_pos)->take($this->product_take)->get();
            $all_counts = DB::table('ig_products as P')->leftJoin('ig_products_menu as M', 'M.id', '=', 'P.menu_id')->select('M.lang_value')->where('M.lang_value','like','%'.$request->search.'%')->count();
        }else{
            $products = DB::table('ig_products as P')->leftJoin('ig_products_menu as M', 'M.id', '=', 'P.menu_id')->select('P.*','M.lang_value','M.slug')->skip($request->start_pos)->take($this->product_take)->get();
            $all_counts = DB::table('ig_products as P')->leftJoin('ig_products_menu as M', 'M.id', '=', 'P.menu_id')->count();
        }

        foreach($products as $pkey=>$product){
            $lang_arr = json_decode($product->lang_value,true);
            $products[$pkey]->lang_value = $lang_arr[$request->language];

            $product_model = Products::find($product->id);
            $products[$pkey]->image = $product_model->image;
        }

        $start_pos = ($request->start_pos+$this->product_take);

        return response()->json([
            'status' => true,
            'message' => 'All products list',
            'data' => (count($products)>0) ? $products : new stdClass(),
            'start_pos' => $start_pos,
            'is_load_more' => ($start_pos <= $all_counts) ? true : false
        ], Response::HTTP_OK);
    }

    public function products(Request $request,$slug){
        if(ProductsMenu::where('slug',$slug)->exists()){
            $pro = ProductsMenu::where('slug',$slug)->first();
            if(count($pro->sub)){
                $highest_level_pro = ProductsMenu::orderby('level','desc')->first();
                $highest_level = $highest_level_pro->level;
                $current_level = ($pro->level+1);

                $pro_lang_arr = json_decode($pro->lang_value,true);
                $menu_parent_id = $pro->parent_id;
                $selected_menu = $pro->id;

                for($i=$current_level;$i>=0;$i--){
                    if(ProductsMenu::where('id',$menu_parent_id)->exists()){
                        $parent_product = ProductsMenu::where('id',$menu_parent_id)->select('id','lang_value','slug')->first();
                        $menu_parent_id = $parent_product->parent_id;
                        $selected_menu = $parent_product->id;
                    }
                }

                $parent_id = [$pro->id];
                $product_ids = [];

                for($j=$current_level;$j<=$highest_level;$j++){
                    $child_products = ProductsMenu::wherein('parent_id',$parent_id)->select('id')->get();

                    $nparent_id = [];

                    foreach($child_products as $cpkey=>$child_product){
                        if(!count($child_product->sub)){
                            $product_ids[] = $child_product->id;
                        }else{
                            $nparent_id[] = $child_product->id;
                        }
                    }

                    $parent_id = $nparent_id;
                }

                if(!empty($request->search)){
                    $products = DB::table('ig_products as P')->leftJoin('ig_products_menu as M', 'M.id', '=', 'P.menu_id')->select('P.*','M.lang_value','M.slug')->where('M.lang_value','like','%'.$request->search.'%')->wherein('P.menu_id',$product_ids)->get();
                }else{
                    $products = DB::table('ig_products as P')->leftJoin('ig_products_menu as M', 'M.id', '=', 'P.menu_id')->select('P.*','M.lang_value','M.slug')->wherein('P.menu_id',$product_ids)->get();
                }

                foreach($products as $pkey=>$product){
                    $lang_arr = json_decode($product->lang_value,true);
                    $products[$pkey]->lang_value = $lang_arr[$request->language];

                    $product_model = Products::find($product->id);
                    $products[$pkey]->image = $product_model->image;
                }

                return response()->json([
                    'status' => true,
                    'message' => 'Products list',
                    'data' => (count($products)>0) ? $products : new stdClass(),
                    'breadcrumb' => $pro_lang_arr[$request->language],
                    'selected_menu' => $selected_menu
                ], Response::HTTP_OK);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found',
                    'data' => new stdClass()
                ], Response::HTTP_OK);
            }
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Product not found',
                'data' => new stdClass()
            ], Response::HTTP_OK);
        }
    }

    public function get_products_child($children){
        foreach($children as $ckey=>$child){
            if(count($child->sub)){
                $children[$ckey]->child = ProductsController::get_products_menu_child($child->sub,$language_id);
            }
            
            $lang_arr = json_decode($children[$ckey]->lang_value,true);
            $children[$ckey]->lang_value = $lang_arr[$language_id];
        }

        return $children;
    }
}