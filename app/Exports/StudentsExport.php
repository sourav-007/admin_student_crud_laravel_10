<?php

namespace App\Exports;

use App\Models\StudentDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        //dd(StudentDetail::with('address', 'qualifications')->get());
        // echo "<pre>";
        // print_r(StudentDetail::with(['address', 'qualifications'])->get()->toArray());
        // die;

        return collect(StudentDetail::with(['address', 'qualifications'])->get()->toArray())->map(function ($student) {

            $qualifications = collect($student['qualifications'] ?? []);

            $studentData = [
                'Full Name' => $student['firstname'] . ' ' . $student['middlename'] . ' ' . $student['lastname'],
                'Email' => $student['email'],
                'Mobile No' => $student['mobile_no'],
                'Current Address' => isset($student['address']) 
                    ? $student['address']['current_house_no'] . ', ' . $student['address']['current_street'] . ', ' . $student['address']['current_district'] . ', ' . $student['address']['current_state'] . ' - ' . $student['address']['current_pincode']
                    : 'Not Provided',
                'Permanent Address' => isset($student['address']) 
                    ? $student['address']['permanent_house_no'] . ', ' . $student['address']['permanent_street'] . ', ' . $student['address']['permanent_district'] . ', ' . $student['address']['permanent_state'] . ' - ' . $student['address']['permanent_pincode']
                    : 'Not Provided',
                'Aadhaar No' => $student['aadhaar_no'],
                'Gender' => $student['gender'],
                'DOB' => $student['dob'],
                'Age' => $student['age'],
                'Nationality' => $student['nationality'],
                'Country' => $student['address']['country'] ?? 'N/A',
            ];

            $highSchool = '';
            $intermediate = '';
            $graduation = '';
            $postGraduation = '';

            if ($qualifications->isNotEmpty()) {
                foreach ($qualifications as $qualification) {
                    switch ($qualification['qualification_type']) {
                        case 'High School':
                            $highSchool = $qualification['institution_name'] . ' (' . $qualification['passing_year'] . ', ' . $qualification['percentage'] . '%)';
                            break;
                        case 'Intermediate':
                            $intermediate = $qualification['institution_name'] . ' (' . $qualification['passing_year'] . ', ' . $qualification['percentage'] . '%)';
                            break;
                        case 'Graduation':
                            $graduation = $qualification['institution_name'] . ' (' . $qualification['passing_year'] . ', ' . $qualification['percentage'] . '%)';
                            break;
                        case 'Post Graduation':
                            $postGraduation = $qualification['institution_name'] . ' (' . $qualification['passing_year'] . ', ' . $qualification['percentage'] . '%)';
                            break;
                    }
                }
            }

            $studentData['High School'] = $highSchool;
            $studentData['Intermediate'] = $intermediate;
            $studentData['Graduation'] = $graduation;
            $studentData['Post Graduation'] = $postGraduation;

            return $studentData;
        });
    }

    public function headings(): array
    {
        return [
            'Full Name',
            'Email',
            'Mobile No',
            'Current Address',
            'Permanent Address',
            'Aadhaar No',
            'Gender',
            'DOB',
            'Age',
            'Nationality',
            'Country',
            'High School', 
            'Intermediate', 
            'Graduation',  
            'Post Graduation',
        ];
    }
}
