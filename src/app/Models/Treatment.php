<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\TreatmentDetail;
use App\Models\Customer;

class Treatment extends Model
{
    use HasFactory;

    public function treatmentDetails()
    {
        return $this->hasMany(TreatmentDetail::class,'treatment_id');
    }

    public function customer() {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

	public static function getCustomer($customer_id){
		$result = Customer::find($customer_id);
		return $result;
	}
}
