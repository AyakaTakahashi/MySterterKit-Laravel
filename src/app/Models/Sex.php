<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    protected $fillable = [
		'id',
		'sex'
	];
	
	public static function getSex(){
		$result = Sex::get();
		return $result;
	}
}
