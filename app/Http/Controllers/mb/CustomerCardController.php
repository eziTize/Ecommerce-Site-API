<?php

namespace App\Http\Controllers\mb;
use App\Http\Controllers\Controller;

use JWTAuth;
use stdClass;
use App\User;
use Validator;
use Carbon\Carbon;
use App\CustomerCard;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use App\Http\Resources\CustomerCard as CardResource;
use Illuminate\Contracts\Encryption\DecryptException;

class CustomerCardController extends Controller
{
    /* Card List API */
    public function index()
    {

        $u = JWTAuth::parseToken()->authenticate();
        $user = User::where('id',$u->id)->first();
        $cards = CustomerCard::where('user_id', $user->id)->get();

        return response()->json([
            'status' => true,
            'message' => 'Card List',
            'data' => CardResource::collection($cards),
        ], Response::HTTP_OK);
    }
    
    /* Card Store API */
    public function store(Request $request)
    {
        $u = JWTAuth::parseToken()->authenticate();
        $user = User::where('id',$u->id)->first();

        $card = new CustomerCard;
        $card->card_name = $request->input('card_name');
        $card->fill([
            'holder' => Crypt::encryptString($request->holder),
            'validity' => Crypt::encryptString($request->validity),
            'c_number' => Crypt::encryptString($request->c_number),
        ]);
        $card->c_type = $request->input('c_type');
        $card->user_id = $user->id;
        $card->save();

        return response()->json([
            'status' => true,
            'message' => 'Card Added',
            'data' => $card
        ], Response::HTTP_OK); 
    }

    /* Edit Card API */
    public function edit($card_id)
    {
        $card = CustomerCard::findOrFail($card_id);
        $data = [

            'id' => $card->id,
            'user_id' => $card->user_id,
            'card_name' => $card->card_name,
            'holder' => Crypt::decryptString($card->holder),
            'c_number' => Crypt::decryptString($card->c_number),
            'c_type' => $card->c_type,
            'validity' => Crypt::decryptString($card->validity),
           //'vld_month' => $card->vld_month,
        ];
        return response()->json([
            'status' => true,
            'message' => 'Edit Card',
            'data' => $data,
        ], Response::HTTP_OK);
    }

    /* Update Card API */
    public function update(Request $request, $card_id)
    {
        $u = JWTAuth::parseToken()->authenticate();
        $user = User::where('id',$u->id)->first();

        $card = CustomerCard::findOrFail($card_id);
            
        if($card->user_id == $user->id){
            $card->card_name = $request->input('card_name');
            $card->fill([
            'holder' => Crypt::encryptString($request->holder),
            'validity' => Crypt::encryptString($request->validity),
            'c_number' => Crypt::encryptString($request->c_number),
            ]);
            $card->c_type = $request->input('c_type');
            $card->user_id = $user->id;
            $card->save();

                return response()->json([
                'status' => true,
                'message' => 'Card Updated',
                'data' => $card
            ], Response::HTTP_OK);
        }

            return response()->json([
                'status' => true,
                'message' => 'Unauthorized',
                'data' => new stdClass()
            ], Response::HTTP_OK);
        
    }

    /* Update Card API */
    public function destroy($card_id)
    {
        $u = JWTAuth::parseToken()->authenticate();
        $user = User::where('id',$u->id)->first();
        $card = CustomerCard::findOrFail($card_id);
        if($card->user_id == $user->id){
            $card->delete();
            return response()->json([
                'status' => true,
                'message' => 'Card Deleted',
                'data' => $card
            ], Response::HTTP_OK);
        }

            return response()->json([
                'status' => true,
                'message' => 'Unauthorized',
                'data' => new stdClass()
            ], Response::HTTP_OK);
    }

}