<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAddressDetails extends Model
{
    use HasFactory;


    protected $primaryKey = 'id';

    protected $table = 'student_address_details';

    protected $fillable = [
        's_id', 'country', 
        'current_house_no', 'current_street', 'current_district', 'current_pincode', 'current_state', 
        'same_as_current', 
        'permanent_house_no', 'permanent_street', 'permanent_district', 'permanent_pincode', 'permanent_state', 
    ];

    public function student()
    {
        return $this->belongsTo(StudentDetail::class, 's_id', 'aadhaar_no');
    }

}
