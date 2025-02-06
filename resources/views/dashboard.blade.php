{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-4">Student Details</h1>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="min-w-full table-auto w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Full Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mobile No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/4">Address</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">View</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Print</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 text-center text-sm font-medium text-gray-900">ST001</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">John Doe</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">john.doe@example.com</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">9876543210</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">123 Main St, Springfield, IL</td>
                            <td class="px-6 py-4 text-center text-sm text-blue-500 hover:underline cursor-pointer">View</td>
                            <td class="px-6 py-4 text-center text-sm text-blue-500 hover:underline cursor-pointer">Print</td>
                            <td class="px-6 py-4 text-center text-sm text-red-500 hover:underline cursor-pointer">Delete</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    
</x-app-layout> --}}


<x-app-layout>
    <x-slot name="header">
        <h2 class="fs-5 lh-sm fw-semibold text-dark">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container px-4 mt-5">
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
                                    <a href="{{ route('student.show', $student->aadhaar_no) }}">View</a>
                                </td>
                                <td class="px-4 py-3 text-center small text-primary">
                                    <a href="{{ route('student.generatePDF', $student->aadhaar_no) }}">Print</a>
                                </td>
                                <td class="px-4 py-3 text-center small text-danger">
                                    {{-- <a href="{{ route('student.destroy', $student->aadhaar_no) }}">Delete</a> --}}
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
