<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use App\Models\City;
use App\Models\Country;
use App\Models\QualificationDetail;
use App\Models\State;
use App\Models\StudentAddressDetails;
use App\Models\StudentDetail;
use App\Rules\AadhaarValidation;
use App\Rules\NameValidation;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = StudentDetail::with(['address', 'qualifications'])->get(); 
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
        $request->merge(['aadhaar_no' => preg_replace('/\s+/', '', $request->aadhaar_no)]);

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
            'aadhaar_no' => ['required', 'string', new AadhaarValidation],
            'nationality' => 'required',

            'country' => 'required',
            'current_house_no' => 'required|string|max:6',
            'current_street' => 'required|string|max:60',
            'current_city' => 'required',
            'current_pincode' => 'required|max:10',
            'current_state' => 'required',
            'same_as_current' => 'nullable|in:0,1',
            'permanent_house_no' => 'nullable|string|max:6',
            'permanent_street' => 'nullable|string|max:60',
            'permanent_city' => 'nullable',
            'permanent_pincode' => 'nullable|max:10',
            'permanent_state' => 'nullable',

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

        //    dd($validatedData);
        
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
                // 'aadhaar_no' => preg_replace('/\s+/', '', $validatedData['aadhaar_no']),
                'aadhaar_no' => $validatedData['aadhaar_no'],
                'nationality' => $validatedData['nationality'],
            ]);

            StudentAddressDetails::create([
                's_id' => $student->aadhaar_no,
                'country' => $validatedData['country'],
                'current_house_no' => $validatedData['current_house_no'],
                'current_street' => $validatedData['current_street'],
                'current_city' => $validatedData['current_city'],
                'current_pincode' => $validatedData['current_pincode'],
                'current_state' => $validatedData['current_state'],
                'same_as_current' => $validatedData['same_as_current'] ?? 0,
                'permanent_house_no' => $validatedData['permanent_house_no'],
                'permanent_street' => $validatedData['permanent_street'],
                'permanent_city' => $validatedData['permanent_city'],
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
            // dd($qd);

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
        
        // $student = StudentDetail::with(['address', 'qualifications'])->findOrFail($id);
        $student = StudentDetail::with(['address', 'qualifications'])
                ->whereRaw("RIGHT(aadhaar_no, 4) = ?", [$id])
                ->firstOrFail();
        return view('student-details', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $student = StudentDetail::with(['address', 'qualifications'])->where('aadhaar_no', $id)->firstOrFail();
        $student = StudentDetail::with(['address', 'qualifications'])->whereRaw("RIGHT(aadhaar_no, 4) = ?", [$id])->firstOrFail();

        $countries = Country::select('id', 'name', 'nationality')->orderBy('name')->get();

        $currentStates = State::where('country_id', $student->address->country ?? null)->get();
        $permanentStates = State::where('country_id', $student->address->country ?? null)->get();

        $currentCities = City::where('state_id', $student->address->current_state ?? null)->get();
        $permanentCities = City::where('state_id', $student->address->permanent_state ?? null)->get();
        

        return view('edit-student', compact('student', 'countries', 'currentStates', 'permanentStates', 'currentCities', 'permanentCities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
                Rule::unique('student_details', 'email')->ignore($id, 'aadhaar_no'),
                'email:rfc,dns',
                'regex:/^[\w\._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/'
            ],
            'mobile_no' => ['required', 'string', 'size:10',
                            Rule::unique('student_details', 'mobile_no')->ignore($id, 'aadhaar_no'),
                            'regex:/^[6-9]\d{9}$/'],
            'alternate_mobile_no' => ['nullable', 'string', 'size:10', 'regex:/^[6-9]\d{9}$/'],
            'gender' => 'required|in:Male,Female,Other',
            'caste' => 'required|in:OBC-A,OBC-B,SC,ST,General',
            'dob' => 'required|date',
            'age' => 'nullable',
            'aadhaar_no' => ['required', 'string', new AadhaarValidation],
            'nationality' => 'required',

            'country' => 'required',
            'current_house_no' => 'required|string|max:6',
            'current_street' => 'required|string|max:60',
            'current_city' => 'required',
            'current_pincode' => 'required|max:10',
            'current_state' => 'required',
            'same_as_current' => 'nullable|in:0,1',
            'permanent_house_no' => 'nullable|string|max:6',
            'permanent_street' => 'nullable|string|max:60',
            'permanent_city' => 'nullable',
            'permanent_pincode' => 'nullable|max:10',
            'permanent_state' => 'nullable',

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

        try {
            $student = StudentDetail::where("aadhaar_no", $id)->firstOrFail();
            $student->update([
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
            

            $student->address()->update([
                's_id' => $student->aadhaar_no,
                'country' => $validatedData['country'],
                'current_house_no' => $validatedData['current_house_no'],
                'current_street' => $validatedData['current_street'],
                'current_city' => $validatedData['current_city'],
                'current_pincode' => $validatedData['current_pincode'],
                'current_state' => $validatedData['current_state'],
                'same_as_current' => $validatedData['same_as_current'] ?? 0,
                'permanent_house_no' => $validatedData['permanent_house_no'],
                'permanent_street' => $validatedData['permanent_street'],
                'permanent_city' => $validatedData['permanent_city'],
                'permanent_pincode' => $validatedData['permanent_pincode'],
                'permanent_state' => $validatedData['permanent_state'],
            ]);

            foreach ($validatedData['qualification_type'] as $key => $qualificationType) {
                $qualification = QualificationDetail::where([
                    's_id' => $student->aadhaar_no,
                    'qualification_type' => $qualificationType
                ])->first();

                if($qualification){
                    $qualification->update([
                        'institution_name' => $validatedData['institution_name'][$key],
                        'board_university' => $validatedData['board_university'][$key],
                        'passing_year' => $validatedData['passing_year'][$key],
                        'percentage' => $validatedData['percentage'][$key] ?? null, 
                    ]);
                }else{
                    QualificationDetail::create([
                        's_id' => $student->aadhaar_no,
                        'qualification_type' => $qualificationType,
                        'institution_name' => $validatedData['institution_name'][$key],
                        'board_university' => $validatedData['board_university'][$key],
                        'passing_year' => $validatedData['passing_year'][$key],
                        'percentage' => $validatedData['percentage'][$key] ?? null, 
                    ]);
                }
            }          

            return redirect()->route('student.show')->with('success', 'Student updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update student. Please try again.')->withErrors($e->getMessage());
        }

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
        } catch (\Mpdf\MpdfException $e) {
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
