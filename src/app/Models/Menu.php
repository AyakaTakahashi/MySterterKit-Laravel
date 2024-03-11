<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TreatmentDetail;

class Menu extends Model
{
    protected $fillable = [
		'id',
		'menu',
		'charge'
	];

	public static function getMenu(){
		$result = Menu::get();
		return $result;
	}

	public function treatmentDetails()
    {
        return $this->belongsToMany(TreatmentDetail::class, 'menu_id')->withTimestamps();
    }
}
