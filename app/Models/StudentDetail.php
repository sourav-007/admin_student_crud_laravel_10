<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'aadhaar_no';
    public $incrementing = false;
    protected $keyType = 'string';   
    protected $table = 'student_details';

    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'email', 'mobile_no', 'alternate_mobile_no',
        'gender', 'caste', 'dob', 'age', 'aadhaar_no', 'nationality'
    ];

    public function qualifications()
    {
        return $this->hasMany(QualificationDetail::class, 's_id', 'aadhaar_no');
    }

    public function address()
    {
        return $this->hasOne(StudentAddressDetails::class, 's_id', 'aadhaar_no');
    }

}
