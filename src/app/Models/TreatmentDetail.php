<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Treatment;

class TreatmentDetail extends Model
{
    use HasFactory;
    protected $table = 'treatment_details';

    public function treatment() {
        return $this->belongsTo(Treatment::class,'treatment_id','id');
    }
}
