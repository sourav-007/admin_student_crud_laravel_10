<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use App\Models\QualificationDetail;
use App\Models\StudentAddressDetails;
use App\Models\StudentDetail;
use App\Rules\NameValidation;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = StudentDetail::with(['address', 'qualifications'])->get(); 
        $query = DB::table('student_details')
            ->join('addresses', 'student_details.id', '=', 'addresses.student_id')
            ->join('qualifications', 'student_details.id', '=', 'qualifications.student_id')
            ->select('student_details.*', 'addresses.*', 'qualifications.*');

        dump($query->toSql());

        return view('dashboard', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-student');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => ['required', 'string', 'max:20', new NameValidation],
            'middlename' => ['nullable', 'string', 'max:20', new NameValidation],
            'lastname' => ['required', 'string', 'max:20', new NameValidation],
            'email' => [
                'required',
                'string',
                'email',
                'max:50',
                'unique:student_details,email',
                'email:rfc,dns',
                'regex:/^[\w\._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/'
            ],
            'mobile_no' => ['required', 'string', 'size:10', 'unique:student_details', 'regex:/^[6-9]\d{9}$/'],
            'alternate_mobile_no' => ['nullable', 'string', 'size:10', 'regex:/^[6-9]\d{9}$/'],
            'gender' => 'required|in:Male,Female,Other',
            'caste' => 'required|in:OBC-A,OBC-B,SC,ST,General',
            'dob' => 'required|date',
            'age' => 'nullable',
            'aadhaar_no' => ['required', 'string', 'size:12', 'regex:/^(?!.*(\d)\1{11})\d{12}$/'],
            'nationality' => 'required|string|max:50',

            'country' => 'required|string|max:20',
            'current_house_no' => 'required|string|max:6',
            'current_street' => 'required|string|max:50',
            'current_district' => 'required|string|max:50',
            'current_pincode' => 'required|digits:6',
            'current_state' => 'required|string|max:15',
            'same_as_current' => 'nullable|in:0,1',
            'permanent_house_no' => 'nullable|string|max:6',
            'permanent_street' => 'nullable|string|max:50',
            'permanent_district' => 'nullable|string|max:50',
            'permanent_pincode' => 'nullable|digits:6',
            'permanent_state' => 'nullable|string|max:15',

            'qualification_type' => 'required|array|min:1|max:5',
            'qualification_type.*' => 'required|in:High School,Intermediate,Graduation,Post Graduation',
            'institution_name' => 'required|array|min:1|max:5',
            'institution_name.*' => 'required|string|max:100',
            'board_university' => 'required|array|min:1|max:5',
            'board_university.*' => 'required|string|max:100',
            'passing_year' => 'required|array|min:1|max:5',
            'passing_year.*' => 'required|digits:4',
            'percentage' => 'nullable|array|min:1|max:5',
            'percentage.*' => 'nullable|numeric|min:0|max:100',
        ]);

        //dd($request->all());
       //dd($validatedData);
        
        // if(StudentDetail::create($request->all())){
        //     echo "hello";
        // }  else{
        //     echo "hii";
        // }

        try {
            

            $student = StudentDetail::create([
                'firstname' => $validatedData['firstname'],
                'middlename' => $validatedData['middlename'],
                'lastname' => $validatedData['lastname'],
                'email' => $validatedData['email'],
                'mobile_no' => $validatedData['mobile_no'],
                'alternate_mobile_no' => $validatedData['alternate_mobile_no'],
                'gender' => $validatedData['gender'],
                'caste' => $validatedData['caste'],
                'dob' => $validatedData['dob'],
                'age' => $validatedData['age'],
                'aadhaar_no' => $validatedData['aadhaar_no'],
                'nationality' => $validatedData['nationality'],
            ]);
            

            StudentAddressDetails::create([
                's_id' => $student->aadhaar_no,
                'country' => $validatedData['country'],
                'current_house_no' => $validatedData['current_house_no'],
                'current_street' => $validatedData['current_street'],
                'current_district' => $validatedData['current_district'],
                'current_pincode' => $validatedData['current_pincode'],
                'current_state' => $validatedData['current_state'],
                'same_as_current' => $validatedData['same_as_current'] ?? 0,
                'permanent_house_no' => $validatedData['permanent_house_no'],
                'permanent_street' => $validatedData['permanent_street'],
                'permanent_district' => $validatedData['permanent_district'],
                'permanent_pincode' => $validatedData['permanent_pincode'],
                'permanent_state' => $validatedData['permanent_state'],
            ]);

            foreach ($validatedData['qualification_type'] as $key => $qualificationType) {
                QualificationDetail::create([
                    's_id' => $student->aadhaar_no,
                    'qualification_type' => $qualificationType,
                    'institution_name' => $validatedData['institution_name'][$key],
                    'board_university' => $validatedData['board_university'][$key],
                    'passing_year' => $validatedData['passing_year'][$key],
                    'percentage' => $validatedData['percentage'][$key] ?? null, 
                ]);
            }          

            return redirect()->route('dashboard')->with('success', 'Student added successfully');
        } catch (\Exception $e) {
            

            return back()->with('error', 'Failed to add student. Please try again.')->withErrors($e->getMessage());
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = StudentDetail::with(['address', 'qualifications'])->findOrFail($id);
        return view('student-details', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $student = StudentDetail::findOrFail($id);
            
            if ($student->address) {
                $student->address->delete();
            }
    
            $student->qualifications()->delete();
    
            $student->delete();
    
            return redirect()->route('dashboard')->with('success', 'Student deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete student: ' . $e->getMessage());
        }
    }

    /**
     * To create pdf
     */
    public function generatePDF($id)
    {
        $student = StudentDetail::with(['address', 'qualifications'])->findOrFail($id);
        $view = view('student-details-pdf', compact('student'))->render();

        // $mpdf = new \Mpdf\Mpdf();
        // $mpdf->WriteHTML($view);
        // $mpdf->Output('student-details.pdf', 'I');
        try {
            $mpdf = new Mpdf();
            $mpdf->WriteHTML($view);    
            return $mpdf->Output('student-details-' . $student->aadhaar_no . '.pdf', 'D');
        } catch (\Mpdf\MpdfException $e) {            
            return back()->with('error', 'Failed to generate PDF');
        }
    }

    /**
     * To create xlsx
     */
    public function exportExcel()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }
}
