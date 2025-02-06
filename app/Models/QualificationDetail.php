<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualificationDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'qualification_details';

    protected $fillable = [
        's_id', 'qualification_type', 
        'institution_name', 'board_university', 'passing_year', 
        'percentage', 'cgpa'
    ];

    public function student()
    {
        return $this->belongsTo(StudentDetail::class, 's_id', 'aadhaar_no');
    }

}
