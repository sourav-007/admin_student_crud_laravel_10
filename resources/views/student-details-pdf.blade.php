<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .card {
            border-radius: 15px;
        }

        .card-header {
            font-weight: bold;
            background: #0d6efd;
            color: #ffffff;
            text-align: center;
        }

        h5.text-primary {
            font-weight: bold;
        }

        .table th {
            /* background-color: #f8f9fa; */
        }

        .d-flex .btn {
            min-width: 150px;
        }

        .btn-rounded {
            border-radius: 25px;
        }
    </style>
</head>
<body>

    <div class="container mt-5 mb-5 rounded-3">
        <div class="card rounded-3">
            <div class="card-header">
                <h4 class="mb-0">Student Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-md-6 mb-3">
                        <h5 class="text-primary mb-2">Personal Information</h5>
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
                                <td>{{ $student->aadhaar_no }}</td>
                            </tr>
                            <tr>
                                <th>Nationality</th>
                                <td>{{ $student->nationality }}</td>
                            </tr>
                        </table>
                    </div>
    
                    <div class="col-md-6 mb-3">
                        <h5 class="text-primary mb-2">Address Information</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>Country</th>
                                <td>{{ $student->address ? $student->address->country : 'Not Provided' }}</td>
                            </tr>
                            <tr>
                                <th>Current Address</th>
                                <td>
                                    @if ($student->address)
                                        {{ $student->address->current_house_no }},
                                        {{ $student->address->current_street }},
                                        {{ $student->address->current_district }},
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
                                    {{ optional($student->address)->permanent_district }},
                                    {{ optional($student->address)->permanent_state }} -
                                    {{ optional($student->address)->permanent_pincode }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
    
                <div class="row mt-4">
                    <div class="col-12">
                        <h5 class="text-primary mb-2">Qualification Details</h5>
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
    
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>



{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5 mb-5 rounded-3">
    <div class="card">
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
                            <td>{{ $student->aadhaar_no }}</td>
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
                            <td>{{ optional($student->address)->country ?? 'Not Provided' }}</td>
                        </tr>
                        <tr>
                            <th>Current Address</th>
                            <td>
                                @if ($student->address)
                                    {{ $student->address->current_house_no }}, 
                                    {{ $student->address->current_street }}, 
                                    {{ $student->address->current_district }},
                                    {{ $student->address->current_state }} - 
                                    {{ $student->address->current_pincode }}
                                @else
                                    Not Provided
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Permanent Address</th>
                            <td>
                                {{ optional($student->address)->permanent_house_no }},
                                {{ optional($student->address)->permanent_street }},
                                {{ optional($student->address)->permanent_district }},
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
        </div>
    </div>
</div>

</body>
</html> --}}
