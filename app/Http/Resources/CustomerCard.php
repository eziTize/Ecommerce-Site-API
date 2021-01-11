<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Contracts\Encryption\DecryptException;

class CustomerCard extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [

                'id' => $this->id,
                'user_id' => $this->user_id,
                'card_name' => $this->card_name,
                'holder' => Crypt::decryptString($this->holder),
                'c_number' => substr (Crypt::decryptString($this->c_number), -4),
                'validity' => Crypt::decryptString($this->validity),
                'c_type' => $this->c_type,
                //'vld_month' => $this->vld_month,
        ];
    }
}
