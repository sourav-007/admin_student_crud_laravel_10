<x-app-layout>
    <x-slot name="header">
        <h2 class="fs-5 lh-sm fw-semibold text-dark">
            {{ __('Student Details') }}
        </h2>
    </x-slot>

    <div class="container mt-5 mb-5 rounded-3">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Student Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-md-6">
                        <h5 class="text-primary">Personal Information</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>Full Name</th>
                                <td>{{ $student->firstname }} {{ $student->middlename }} {{ $student->lastname }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $student->email }}</td>
                            </tr>
                            <tr>
                                <th>Mobile No</th>
                                <td>{{ $student->mobile_no }}</td>
                            </tr>
                            <tr>
                                <th>Alternate Mobile No</th>
                                <td>{{ $student->alternate_mobile_no ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ $student->gender }}</td>
                            </tr>
                            <tr>
                                <th>Caste</th>
                                <td>{{ $student->caste }}</td>
                            </tr>
                            <tr>
                                <th>DOB</th>
                                <td>{{ $student->dob }}</td>
                            </tr>
                            <tr>
                                <th>AGE</th>
                                <td>{{ $student->age }}</td>
                            </tr>
                            <tr>
                                <th>Aadhaar No</th>
                                {{-- <td>{{ $student->aadhaar_no }}</td> --}}
                                <td>{{ str_repeat('X', 4) . ' ' . str_repeat('X', 4) . ' ' . substr($student->aadhaar_no, -4) }}</td>
                            </tr>
                            <tr>
                                <th>Nationality</th>
                                <td>{{ $student->nationality }}</td>
                            </tr>
                        </table>
                    </div>
    
                    
                    <div class="col-md-6">
                        <h5 class="text-primary">Address Information</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>Country</th>
                                <td>
                                    @if ($student->address)
                                        {{ $student->address->country }}
                                    @else
                                        {{ __('Not Provided') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Current Address</th>
                                <td>
                                    @if ($student->address)
                                        {{ $student->address->current_house_no }}, 
                                        {{ $student->address->current_street }}, 
                                        {{ $student->address->current_city }},
                                        {{ $student->address->current_state }} - 
                                        {{ $student->address->current_pincode }}
                                    @else
                                        {{ __('Not Provided') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Permanent Address</th>
                                <td>
                                    {{ optional($student->address)->permanent_house_no }},
                                    {{ optional($student->address)->permanent_street }},
                                    {{ optional($student->address)->permanent_city }},
                                    {{ optional($student->address)->permanent_state }} - 
                                    {{ optional($student->address)->permanent_pincode }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
    
                
                <div class="row mt-4">
                    <div class="col-12">
                        <h5 class="text-primary">Qualification Details</h5>
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Qualification</th>
                                    <th>Institution Name</th>
                                    <th>Board/University</th>
                                    <th>Passing Year</th>
                                    <th>Percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student->qualifications as $qualification)
                                    <tr>
                                        <td>{{ $qualification->qualification_type }}</td>
                                        <td>{{ $qualification->institution_name }}</td>
                                        <td>{{ $qualification->board_university }}</td>
                                        <td>{{ $qualification->passing_year }}</td>
                                        <td>{{ $qualification->percentage ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
    
                
                <div class="d-flex justify-content-center gap-3 text-center mt-4">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary rounded">Back</a>
                    <a href="{{ route('student.edit', substr($student->aadhaar_no, -4)) }}" class="btn btn-primary rounded">Edit</a>
                    <a href="{{ route('student.generatePDF', $student->aadhaar_no) }}" class="btn btn-success rounded">Print</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>