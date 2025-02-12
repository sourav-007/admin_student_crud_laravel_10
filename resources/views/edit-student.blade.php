<x-app-layout>
    <x-slot name="header">
        <h2 class="fs-5 lh-sm fw-semibold text-dark">
            {{ __('Edit Student') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="bg-white shadow p-4 rounded">
                <form action="{{ route('student.update', $student->aadhaar_no) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <h3 class="fs-5 fw-bold mb-3">Student Details</h3>
                    <div class="row g-3 mb-5">
                        <div class="col-md-4">
                            <x-label for="firstname" value="{{ __('First name') }}" />
                            <x-input class="rounded-3" id="firstname" type="text" name="firstname" :value="old('firstname', $student->firstname)"  maxlength="20" autofocus required autocomplete="frtstname"/>
                            <span class="text-danger error-message" id="firstname-error"></span>
                            @error('firstname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            
                        </div>
                        <div class="col-md-4">
                            <x-label for="middlename" value="{{ __('Middle name') }}" />
                            <x-input class="rounded-3" id="middlename" type="text" name="middlename" :value="old('middlename', $student->middlename)" maxlength="20" autocomplete="middlename"/>
                            <span class="text-danger error-message" id="middlename-error"></span>
                            @error('middlename')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <x-label for="lastname" value="{{ __('Last name') }}" />
                            <x-input class="rounded-3" id="lastname" type="text" name="lastname" :value="old('lastname', $student->lastname)"  maxlength="20" required autocomplete="lastname"/>
                            <span class="text-danger error-message" id="lastname-error"></span>
                            @error('lastname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input class="rounded-3" id="email" type="email" name="email" :value="old('email', $student->email)"  maxlength="50" required autocomplete="email"/>
                            <span class="text-danger error-message" id="email-error"></span>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <x-label for="mobile_no" value="{{ __('Mobile no') }}" class="form-label" />
                            <div class="input-group">
                                <span class="input-group-text rounded-start-3 shadow-sm">+91</span>
                                <x-input class="rounded-end-3" id="mobile_no" type="text" name="mobile_no" :value="old('mobile_no', $student->mobile_no)" 
                                     maxlength="10" pattern="\d{10}" required autocomplete="mobile_no"/>
                            </div>
                            <span class="text-danger error-message" id="mobile_no-error"></span>
                            @error('mobile_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <x-label for="alternate_mobile_no" value="{{ __('Alternate mobile no') }}" class="form-label" />
                            <div class="input-group">
                                <span class="input-group-text rounded-start-3 shadow-sm">+91</span>
                                <x-input class="rounded-end-3" id="alternate_mobile_no" type="text" name="alternate_mobile_no" :value="old('alternate_mobile_no', $student->alternate_mobile_no)" 
                                    maxlength="10" pattern="\d{10}" autocomplete="alternate_mobile_no"/>
                            </div>
                            @error('alternate_mobile_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <x-label for="gender" value="{{ __('Gender') }}" class="form-label" />
                            <x-select name="gender" id="gender" required>
                                <option value="" selected>-- Select Gender --</option>
                                <option value="Male" {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ old('gender', $student->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                            </x-select>
                            <span class="text-danger error-message" id="gender-error"></span>
                            @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <x-label for="caste" value="{{ __('Caste') }}" class="form-label" />
                            <x-select name="caste" id="caste" required>
                                <option value="" selected>-- Select Caste --</option>
                                <option value="OBC-A" {{ old('caste', $student->caste) == 'OBC-A' ? 'selected' : '' }}>OBC-A</option>
                                <option value="OBC-B" {{ old('caste', $student->caste) == 'OBC-B' ? 'selected' : '' }}>OBC-B</option>
                                <option value="SC" {{ old('caste', $student->caste) == 'SC' ? 'selected' : '' }}>SC</option>
                                <option value="ST" {{ old('caste', $student->caste) == 'ST' ? 'selected' : '' }}>ST</option>
                                <option value="General" {{ old('caste', $student->caste) == 'General' ? 'selected' : '' }}>General</option>
                            </x-select>
                            <span class="text-danger error-message" id="caste-error"></span>
                            @error('caste')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="dob" value="{{ __('D.O.B') }}" />
                            <x-input class="rounded-3" id="dob" type="date" name="dob" :value="old('dob', $student->dob)"  autocomplete="dob" required onchange="calculateAge()"/>
                            <span class="text-danger error-message" id="dob-error"></span>
                            @error('dob')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-1">
                            <x-label for="age" value="{{ __('Age') }}" />
                            <x-input class="rounded-3" id="age" type="number" name="age" :value="old('age', $student->age)" min="0" max="100" autocomplete="age"/>
                            @error('age')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="aadhaar_no" value="{{ __('Aadhaar no.') }}" />
                            <x-input class="rounded-3" id="aadhaar_no" type="text" name="aadhaar_no" value="{{ old('aadhaar_no', preg_replace('/(\d{4})(\d{4})(\d{4})/', '$1 $2 $3', $student->aadhaar_no)) }}" required autocomplete="aadhaar_no"/>
                            <span class="text-danger error-message" id="aadhaar_no-error"></span>
                            @error('aadhaar_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="country" value="{{ __('Country') }}" class="form-label" />
                            <x-select name="country" id="country" required>
                                <option value="" selected>-- Select Country --</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" data-nationality="{{ $country->nationality }}" 
                                        {{ $student->address->country == $country->id ? 'selected' : '' }}>
                                        {{ $country->name }}
                                    </option>
                                @endforeach
                            </x-select>
                            <span class="text-danger error-message" id="country-error"></span>
                            @error('country')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="nationality" value="{{ __('Nationality') }}" class="form-label" />
                            <x-input type="text" name="nationality" id="nationality"
                                value="{{ old('nationality', $countries->where('id', $student->address->country)->first()->nationality ?? '') }}" readonly />
                            <span class="text-danger error-message" id="nationality-error"></span>
                            @error('nationality')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="row g-3 mb-5">
                        <div class="col-md-2">
                            <x-label for="current_house_no" value="{{ __('Current house no.') }}" />
                            <x-input class="rounded-3" id="current_house_no" type="text" name="current_house_no" :value="old('current_house_no', old('country', $student->address->current_house_no))" required  autocomplete="current_house_no"/>
                            @error('current_house_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <x-label for="current_street" value="{{ __('Current street') }}" />
                            <x-input class="rounded-3" id="current_street" type="text" name="current_street" :value="old('current_street', $student->address->current_street)" required  autocomplete="current_street"/>
                            <span class="text-danger error-message" id="currentstreet-error"></span>
                            @error('current_street')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="current_state" value="{{ __('Current state') }}" class="form-label" />
                            <x-select name="current_state" id="current_state" required>
                                <option value="" selected>-- Select State --</option>
                                @foreach ($currentStates as $state)
                                    <option value="{{$state->id}}" {{$student->address->current_state == $state->id ? 'selected' : ''}}>
                                        {{$state->name}}
                                    </option>
                                @endforeach
                            </x-select>
                            <span class="text-danger error-message" id="currentstate-error"></span>
                            @error('current_state')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="current_city" value="{{ __('Current city') }}" class="form-label" />
                            <x-select name="current_city" id="current_city" required>
                                <option value="" selected>-- Select City --</option>
                                @foreach($currentCities as $city)
                                    <option value="{{ $city->id }}" {{ $student->address->current_city == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </x-select>
                            <span class="text-danger error-message" id="currentdistrict-error"></span>
                            @error('current_district')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="current_pincode" value="{{ __('Current pincode') }}" />
                            <x-input class="rounded-3" id="current_pincode" type="text" name="current_pincode" :value="old('current_pincode', $student->address->current_pincode)" required  autocomplete="current_pincode"/>
                            <span class="text-danger error-message" id="currentpincode-error"></span>
                            @error('current_pincode')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-check ms-2 mt-5 mb-4">
                            <input class="form-check-input" type="checkbox" name="same_as_current" value="1" id="same_as_current" onchange="copyAddress()">
                            <label class="form-check-label" for="same_as_current">
                              permanent address same as current address
                            </label>
                        </div>

                        <div class="col-md-2">
                            <x-label for="permanent_house_no" value="{{ __('Permanent house no.') }}" />
                            <x-input class="rounded-3" id="permanent_house_no" type="text" name="permanent_house_no" :value="old('permanent_house_no', $student->address->permanent_house_no)"  autocomplete="permanent_house_no"/>
                            @error('permanent_house_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <x-label for="permanent_street" value="{{ __('Permanent street') }}" />
                            <x-input class="rounded-3" id="permanent_street" type="text" name="permanent_street" :value="old('permanent_street', $student->address->permanent_street)"  autocomplete="permanent_street"/>
                            <span class="text-danger error-message" id="permanentstreet-error"></span>
                            @error('permanent_street')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="permanent_state" value="{{ __('Permanent state') }}" class="form-label" />
                            <x-select name="permanent_state" id="permanent_state" >
                                <option value="" selected>-- Select State --</option>
                                @foreach ($permanentStates as $state)
                                    <option value="{{$state->id}}" {{$student->address->permanent_state == $state->id ? 'selected' : ''}}>
                                        {{$state->name}}
                                    </option>
                                @endforeach
                            </x-select>
                            <span class="text-danger error-message" id="permanentstate-error"></span>
                            @error('permanent_state')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="permanent_city" value="{{ __('Permanent city') }}" class="form-label" />
                            <x-select name="permanent_city" id="permanent_city" >
                                <option value="" selected>-- Select City --</option>
                                @foreach($permanentCities as $city)
                                    <option value="{{ $city->id }}" {{ $student->address->permanent_city == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </x-select>
                            <span class="text-danger error-message" id="permanentdistrict-error"></span>
                            @error('permanent_district')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="permanent_pincode" value="{{ __('Permanent pincode') }}" />
                            <x-input class="rounded-3" id="permanent_pincode" type="text" name="permanent_pincode" :value="old('permanent_pincode', $student->address->permanent_pincode)"  autocomplete="permanent_pincode"/>
                            <span class="text-danger error-message" id="permanentpincode-error"></span>
                            @error('permanent_pincode')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    </div>

                    <x-section-border />
    
                    <h3 class="fs-5 fw-bold mt-4 mb-3">Qualification Details</h3>

                    <div id="qualification-container">
                        @foreach($student->qualifications as $index => $qualification)
                            <div class="row g-3 qualification-group mb-4">
                                <div class="col-md-2">
                                    <x-label for="qualification_type" value="{{ __('Qualification type') }}" class="form-label" />
                                    <x-select name="qualification_type[]" class="form-select qualification-type" required>
                                        <option value="" disabled>-- Select Degree --</option>
                                        <option value="High School" {{ $qualification->qualification_type == 'High School' ? 'selected' : '' }}>High School</option>
                                        <option value="Intermediate" {{ $qualification->qualification_type == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                        <option value="Graduation" {{ $qualification->qualification_type == 'Graduation' ? 'selected' : '' }}>Graduation</option>
                                        <option value="Post Graduation" {{ $qualification->qualification_type == 'Post Graduation' ? 'selected' : '' }}>Post Graduation</option>
                                    </x-select>
                                    <span class="text-danger error-message" id="qualificationtype-error"></span>
                                </div>
                                <div class="col-md-3">
                                    <x-label for="institution_name" value="{{ __('Institute name') }}" class="form-label" />
                                    <x-input class="rounded-3" type="text" name="institution_name[]" value="{{ $qualification->institution_name }}" required autocomplete="institution_name"/>
                                    <span class="text-danger error-message" id="institutename-error"></span>
                                </div>
                                <div class="col-md-3">
                                    <x-label for="board_university" value="{{ __('Board/University') }}" class="form-label" />
                                    <x-input class="rounded-3" type="text" name="board_university[]" value="{{ $qualification->board_university }}" required autocomplete="board_university"/>
                                    <span class="text-danger error-message" id="board-error"></span>
                                </div>
                                <div class="col-md-2">
                                    <x-label for="passing_year" value="{{ __('Passing year') }}" class="form-label" />
                                    <x-select name="passing_year[]" class="form-select" required>
                                        <option value="">-- Select Year --</option>
                                        @php
                                            $currentYear = date('Y');
                                            $startYear = 2010;
                                        @endphp
                                        @for ($year = $currentYear; $year >= $startYear; $year--)
                                            <option value="{{ $year }}" {{ $qualification->passing_year == $year ? 'selected' : '' }}>{{ $year }}</option>
                                        @endfor
                                    </x-select>
                                    <span class="text-danger error-message" id="passingyear-error"></span>
                                </div>
                                <div class="col-md-1">
                                    <x-label for="percentage" value="{{ __('Percentage') }}" class="form-label" />
                                    <x-input class="rounded-3" type="text" name="percentage[]" value="{{ $qualification->percentage }}" min="0" max="100" oninput="validatePercentage(this)" required autocomplete="percentage"/>
                                    <span class="text-danger error-message" id="percentage-error"></span>
                                </div>
                                <div class="col-md-1 text-center remove-btn" style="margin: auto;">
                                    <button type="button" class="btn btn-danger btn-sm remove-qualification" style="margin-top:2.6rem;">
                                        <i class="fas fa-trash-alt"></i> Remove
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                                        

                    <button type="button" id="add-qualification" class="btn btn-success btn-sm">
                        Add Qualification
                    </button>
                    <div class="d-flex justify-content-between mt-5">
                        <a href="{{ route('student.show', substr($student->aadhaar_no, -4)) }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('js/form_validation.js') }}"></script>
    <script src="{{ asset('js/age_calculation.js') }}"></script>
    <script src="{{ asset('js/copy_address.js') }}"></script>
    <script src="{{ asset('js/qualification.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>

        $(document).ready(function() {
            $.get("{{ route('countries') }}", function(data) {
                //console.log("API Response:", data);
                $('#country').append(data.map(country => 
                    `<option value="${country.id}" data-nationality="${country.nationality}">${country.name}</option>`
                ));
            });

            function loadStates(countryId, stateSelector, citySelector) {
                $(stateSelector).html('<option value="">-- Select State --</option>');
                $(citySelector).html('<option value="">-- Select City --</option>');

                if (countryId) {
                    $.get(`/states/${countryId}`, function(data) {
                        $(stateSelector).append(data.map(state => 
                            `<option value="${state.id}">${state.name}</option>`
                        ));
                    });
                }
            }

            function loadCities(stateId, citySelector) {
                $(citySelector).html('<option value="">-- Select City --</option>');

                if (stateId) {
                    $.get(`/cities/${stateId}`, function(data) {
                        $(citySelector).append(data.map(city => 
                            `<option value="${city.id}">${city.name}</option>`
                        ));
                    });
                }
            }

        // For Current Address
            $('#country').change(function() {
                let countryId = $(this).val();
                let nationality = $(this).find(":selected").data("nationality");
                $('#nationality').val(nationality);  
                loadStates(countryId, '#current_state', '#current_city');
                loadStates(countryId, '#permanent_state', '#permanent_city');
            });

            $('#current_state').change(function() {
                loadCities($(this).val(), '#current_city');
            });

            // For Permanent Address
            $('#permanent_state').change(function() {
                loadCities($(this).val(), '#permanent_city');
            });
        });

        
        let selectedCountry = $('#country').val();
        let selectedState = '{{ $current_state ?? "" }}';
        let selectedCity = '{{ $current_city ?? "" }}';

        if (selectedCountry) {
            loadStates(selectedCountry, '#current_state', '#current_city', selectedState);
        }
        if (selectedState) {
            loadCities(selectedState, '#current_city', selectedCity);
        }

    </script>

    <style>
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
            appearance: textfield;
        }
    </style>

</x-app-layout>
