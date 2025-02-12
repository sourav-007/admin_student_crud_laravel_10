<x-app-layout>
    <x-slot name="header">
        <h2 class="fs-5 lh-sm fw-semibold text-dark">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container px-4 mt-5 mb-3">
            <div class="bg-white overflow-hidden shadow p-4 rounded">
                <h3 class="fs-5 fw-bold mb-3">Student Details</h3>
                <table class="table table-bordered w-100">
                    <thead class="table-light text-center">
                        <tr>
                            <th class="px-4 py-3 text-left text-muted small">Full Name</th>
                            <th class="px-4 py-3 text-left text-muted small">Email</th>
                            <th class="px-4 py-3 text-left text-muted small">Mobile No</th>
                            <th class="px-4 py-3 text-left text-muted small">Address</th>
                            <th class="px-4 py-3 text-left text-muted small">View</th>
                            <th class="px-4 py-3 text-left text-muted small">Print</th>
                            <th class="px-4 py-3 text-left text-muted small">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr class="bg-white border-bottom">
                                <td class="px-4 py-3 text-center small text-dark">
                                    {{ $student->firstname }} {{ $student->middlename }} {{ $student->lastname }}
                                </td>
                                <td class="px-4 py-3 text-center small text-muted">
                                    {{ $student->email }}
                                </td>
                                <td class="px-4 py-3 text-center small text-muted">
                                    {{ $student->mobile_no }}
                                </td>
                                <td class="px-4 py-3 text-center small text-muted">
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
                                <td class="px-4 py-3 text-center small text-primary">
                                    {{-- <a href="{{ route('student.show', $student->aadhaar_no) }}">View</a> --}}
                                    <a href="{{ route('student.show', substr($student->aadhaar_no, -4)) }}">View</a>
                                </td>
                                <td class="px-4 py-3 text-center small text-primary">
                                    <a href="{{ route('student.generatePDF', $student->aadhaar_no) }}">Print</a>
                                </td>
                                <td class="px-4 py-3 text-center small text-danger">
                                    <form action="{{ route('student.destroy', $student->aadhaar_no) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('students.export.excel') }}" class="btn btn-success rounded">Download xlsx</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
