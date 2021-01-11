<?php

namespace App\Http\Controllers;

use JWTAuth;
use stdClass;
use App\User;
use Validator;
use App\Address;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AddressController extends Controller
{

    /* Address List API */
    public function index()
    {
        $u = JWTAuth::parseToken()->authenticate();
        $user = User::where('id',$u->id)->first();

        $address = Address::where('user_id', $user->id)->get();

        return response()->json([
            'status' => true,
            'message' => 'Address List',
            'data' => $address
        ], Response::HTTP_OK);
    }

    
    public function create()
    {
        
    }

    /* Address Store API */
    public function store(Request $request)
    {
        $u = JWTAuth::parseToken()->authenticate();
        $user = User::where('id',$u->id)->first();

        $address = new Address;
        $address->adr_name = $request->input('adr_name');
        $address->address = $request->input('address');
        $address->bld_apt = $request->input('bld_apt');
        $address->city = $request->input('city');
        $address->region = $request->input('region');
        $address->postal = $request->input('postal');
        $address->country = $request->input('country');
        $address->user_id = $user->id;
        $address->save();

        return response()->json([
            'status' => true,
            'message' => 'Address Created',
            'data' => $address
        ], Response::HTTP_OK); 
    }


    /* Edit Address API */
    public function edit($adr_id)
    {
        $address = Address::findOrFail($adr_id);
        return response()->json([
            'status' => true,
            'message' => 'Edit Address',
            'data' => $address
        ], Response::HTTP_OK);
    }

    /* Update Address API */
    public function update(Request $request, $adr_id)
    {
        $u = JWTAuth::parseToken()->authenticate();
        $user = User::where('id',$u->id)->first();

        $address = Address::findOrFail($adr_id);
            
        if($address->user_id == $user->id){
            $address->adr_name = $request->input('adr_name');
            $address->address = $request->input('address');
            $address->bld_apt = $request->input('bld_apt');
            $address->city = $request->input('city');
            $address->region = $request->input('region');
            $address->postal = $request->input('postal');
            $address->country = $request->input('country');
            $address->user_id = $user->id;
            $address->save();

                return response()->json([
                'status' => true,
                'message' => 'Address Updated',
                'data' => $address
            ], Response::HTTP_OK);
        }

            return response()->json([
                'status' => true,
                'message' => 'Unauthorized',
                'data' => new stdClass()
            ], Response::HTTP_OK);
        
    }

    /* Update Address API */
    public function destroy($adr_id)
    {
        $u = JWTAuth::parseToken()->authenticate();
        $user = User::where('id',$u->id)->first();
        $address = Address::findOrFail($adr_id);
        if($address->user_id == $user->id){
            $address->delete();
            return response()->json([
                'status' => true,
                'message' => 'Address Deleted',
                'data' => $address
            ], Response::HTTP_OK);
        }

            return response()->json([
                'status' => true,
                'message' => 'Unauthorized',
                'data' => new stdClass()
            ], Response::HTTP_OK);
    }
}
