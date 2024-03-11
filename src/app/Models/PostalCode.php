<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostalCode extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];


    public static function getAddressByPostalCode($input_postal_code){
        $result = PostalCode::where('postal_code', $input_postal_code)->get();
        return $result;
    }
}
