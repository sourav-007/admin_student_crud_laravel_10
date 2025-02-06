<x-app-layout>
    <x-slot name="header">
        <h2 class="fs-5 lh-sm fw-semibold text-dark">
            {{ __('Add Student') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="bg-white shadow p-4 rounded">
                <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h3 class="fs-5 fw-bold mb-3">Student Details</h3>
                    <div class="row g-3 mb-5">
                        <div class="col-md-4">
                            <x-label for="firstname" value="{{ __('First name') }}" />
                            <x-input class="rounded-3" id="firstname" type="text" name="firstname" :value="old('firstname')"  maxlength="20" autofocus autocomplete="frtstname"/>
                            @error('firstname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <x-label for="middlename" value="{{ __('Middle name') }}" />
                            <x-input class="rounded-3" id="middlename" type="text" name="middlename" :value="old('middlename')" maxlength="20" autocomplete="middlename"/>
                            @error('middlename')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <x-label for="lastname" value="{{ __('Last name') }}" />
                            <x-input class="rounded-3" id="lastname" type="text" name="lastname" :value="old('lastname')"  maxlength="20" autocomplete="lastname"/>
                            @error('lastname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input class="rounded-3" id="email" type="email" name="email" :value="old('email')"  maxlength="50" autocomplete="email"/>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <x-label for="mobile_no" value="{{ __('Mobile no') }}" class="form-label" />
                            <div class="input-group">
                                <span class="input-group-text rounded-start-3 shadow-sm">+91</span>
                                <x-input class="rounded-end-3" id="mobile_no" type="text" name="mobile_no" :value="old('mobile_no')" 
                                     maxlength="10" pattern="\d{10}" autocomplete="mobile_no"/>
                            </div>
                            @error('mobile_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <x-label for="alternate_mobile_no" value="{{ __('Alternate mobile no') }}" class="form-label" />
                            <div class="input-group">
                                <span class="input-group-text rounded-start-3 shadow-sm">+91</span>
                                <x-input class="rounded-end-3" id="alternate_mobile_no" type="text" name="alternate_mobile_no" :value="old('alternate_mobile_no')" 
                                    maxlength="10" pattern="\d{10}" autocomplete="alternate_mobile_no"/>
                            </div>
                            @error('alternate_mobile_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <x-label for="gender" value="{{ __('Gender') }}" class="form-label" />
                            <x-select name="gender" id="gender" >
                                <option selected>-- Select Gender --</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                            </x-select>
                            @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <x-label for="caste" value="{{ __('Caste') }}" class="form-label" />
                            <x-select name="caste" id="caste" >
                                <option selected>-- Select Caste --</option>
                                <option value="OBC-A" {{ old('caste') == 'OBC-A' ? 'selected' : '' }}>OBC-A</option>
                                <option value="OBC-B" {{ old('caste') == 'OBC-B' ? 'selected' : '' }}>OBC-B</option>
                                <option value="SC" {{ old('caste') == 'SC' ? 'selected' : '' }}>SC</option>
                                <option value="ST" {{ old('caste') == 'ST' ? 'selected' : '' }}>ST</option>
                                <option value="General" {{ old('caste') == 'General' ? 'selected' : '' }}>General</option>
                            </x-select>
                            @error('caste')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="dob" value="{{ __('D.O.B') }}" />
                            <x-input class="rounded-3" id="dob" type="date" name="dob" :value="old('dob')"  autocomplete="dob" onchange="calculateAge()"/>
                            @error('dob')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-1">
                            <x-label for="age" value="{{ __('Age') }}" />
                            <x-input class="rounded-3" id="age" type="number" name="age" :value="old('age')" min="0" max="100" autocomplete="age"/>
                            @error('age')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="aadhaar_no" value="{{ __('Aadhaar no.') }}" />
                            <x-input class="rounded-3" id="aadhaar_no" type="text" name="aadhaar_no" :value="old('aadhaar_no')"  maxlength="12" autocomplete="aadhaar_no"/>
                            @error('aadhaar_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="nationality" value="{{ __('Nationality') }}" class="form-label" />
                            <x-select name="nationality" id="nationality" >
                                <option selected>-- Select Nationality --</option>
                                <option value="Indian" {{ old('nationality') == 'Indian' ? 'selected' : '' }}>Indian</option>
                            </x-select>
                            @error('nationality')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="country" value="{{ __('Country') }}" class="form-label" />
                            <x-select name="country" id="country" >
                                <option selected>-- Select Country --</option>
                                <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                            </x-select>
                            @error('country')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="row g-3 mb-5">
                        <div class="col-md-2">
                            <x-label for="current_house_no" value="{{ __('Current house no.') }}" />
                            <x-input class="rounded-3" id="current_house_no" type="text" name="current_house_no" :value="old('current_house_no')"  autocomplete="current_house_no"/>
                            @error('current_house_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <x-label for="current_street" value="{{ __('Current street') }}" />
                            <x-input class="rounded-3" id="current_street" type="text" name="current_street" :value="old('current_street')"  autocomplete="current_street"/>
                            @error('current_street')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="current_state" value="{{ __('Current state') }}" class="form-label" />
                            <x-select name="current_state" id="current_state" >
                                <option selected>-- Select State --</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                            </x-select>
                            @error('current_state')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="current_district" value="{{ __('Current district') }}" class="form-label" />
                            <x-select name="current_district" id="current_district" >
                                <option selected>-- Select Dsitrict --</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                            </x-select>
                            @error('current_district')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="current_pincode" value="{{ __('Current pincode') }}" />
                            <x-input class="rounded-3" id="current_pincode" type="text" name="current_pincode" :value="old('current_pincode')"  autocomplete="current_pincode"/>
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
                            <x-input class="rounded-3" id="permanent_house_no" type="text" name="permanent_house_no" :value="old('permanent_house_no')"  autocomplete="permanent_house_no"/>
                            @error('permanent_house_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <x-label for="permanent_street" value="{{ __('Permanent street') }}" />
                            <x-input class="rounded-3" id="permanent_street" type="text" name="permanent_street" :value="old('permanent_street')"  autocomplete="permanent_street"/>
                            @error('permanent_street')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="permanent_state" value="{{ __('Permanent state') }}" class="form-label" />
                            <x-select name="permanent_state" id="permanent_state" >
                                <option selected>-- Select State --</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                            </x-select>
                            @error('permanent_state')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="permanent_district" value="{{ __('Permanent district') }}" class="form-label" />
                            <x-select name="permanent_district" id="permanent_district" >
                                <option selected>-- Select Dsitrict --</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                            </x-select>
                            @error('permanent_district')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <x-label for="permanent_pincode" value="{{ __('Permanent pincode') }}" />
                            <x-input class="rounded-3" id="permanent_pincode" type="text" name="permanent_pincode" :value="old('permanent_pincode')"  autocomplete="permanent_pincode"/>
                            @error('permanent_pincode')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    </div>

                    <x-section-border />
    
                    <h3 class="fs-5 fw-bold mt-4 mb-3">Qualification Details</h3>

                    <div id="qualification-container">
                        <div class="row g-3 qualification-group mb-4">
                            <div class="col-md-2">
                                <x-label for="qualification_type" value="{{ __('Qualification Type') }}" class="form-label" />
                                <x-select name="qualification_type[]" class="form-select qualification-type"  onchange="updateQualificationOptions()">
                                    <option value="">-- Select Degree --</option>
                                    <option value="High School">High School</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Graduation">Graduation</option>
                                    <option value="Post Graduation">Post Graduation</option>
                                </x-select>
                            </div>
                            <div class="col-md-3">
                                <x-label for="institution_name" value="{{ __('Institute name') }}" class="form-label" />
                                <x-input class="rounded-3" type="text" name="institution_name[]" value=""  autocomplete="institution_name"/>
                            </div>
                            <div class="col-md-3">
                                <x-label for="board_university" value="{{ __('Board/University') }}" class="form-label" />
                                <x-input class="rounded-3" type="text" name="board_university[]" value=""  autocomplete="board_university"/>
                            </div>
                            <div class="col-md-2">
                                <x-label for="passing_year" value="{{ __('Passing year') }}" class="form-label" />
                                <x-select name="passing_year[]" class="form-select" >
                                    <option value="">-- Select Year --</option>
                                    @php
                                        $currentYear = date('Y');
                                        $startYear = 2010;
                                    @endphp
                                    @for ($year = $currentYear; $year >= $startYear; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </x-select>
                            </div>
                            <div class="col-md-1">
                                <x-label for="percentage" value="{{ __('Percentage') }}" class="form-label" />
                                <x-input class="rounded-3" type="text" name="percentage[]" value="" min="0" max="100" oninput="validatePercentage(this)"  autocomplete="percentage"/>
                            </div>
                            <div class="col-md-1 text-end remove-btn" style="display: none;">
                                <button type="button" class="btn btn-danger btn-sm remove-qualification">
                                    <i class="fas fa-trash-alt"></i> Remove
                                </button>
                            </div>
                        </div>
                    </div>
                    

                    <button type="button" id="add-qualification" class="btn btn-success btn-sm">
                        Add Qualification
                    </button>
                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        function calculateAge() {
            var dob = document.getElementById("dob").value;
            if (dob) {
                var birthDate = new Date(dob);
                var today = new Date();
                var age = today.getFullYear() - birthDate.getFullYear();
                var m = today.getMonth() - birthDate.getMonth();

                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                document.getElementById("age").value = age;
            }
        }

        function copyAddress() {
            var isChecked = document.getElementById("same_as_current").checked;

            if (isChecked) {
                document.getElementById("permanent_house_no").value = document.getElementById("current_house_no").value;
                document.getElementById("permanent_street").value = document.getElementById("current_street").value;
                document.getElementById("permanent_state").value = document.getElementById("current_state").value;
                document.getElementById("permanent_district").value = document.getElementById("current_district").value;
                document.getElementById("permanent_pincode").value = document.getElementById("current_pincode").value;

                document.getElementById("permanent_house_no").readOnly = true;
                document.getElementById("permanent_street").readOnly = true;
                document.getElementById("permanent_state").readOnly = true;
                document.getElementById("permanent_district").readOnly = true;
                document.getElementById("permanent_pincode").readOnly = true;
            } else {
                document.getElementById("permanent_house_no").readOnly = false;
                document.getElementById("permanent_street").readOnly = false;
                document.getElementById("permanent_state").readOnly = false;
                document.getElementById("permanent_district").readOnly = false;
                document.getElementById("permanent_pincode").readOnly = false;

                document.getElementById("permanent_house_no").value = '';
                document.getElementById("permanent_street").value = '';
                document.getElementById("permanent_state").value = '';
                document.getElementById("permanent_district").value = '';
                document.getElementById("permanent_pincode").value = '';
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const qualificationContainer = document.getElementById('qualification-container');
            const addQualificationBtn = document.getElementById('add-qualification');
    
            function validatePercentage(input) {
                let value = parseFloat(input.value);
                if (value > 100) input.value = 100;
                if (value < 0) input.value = 0;
                input.value = value.toFixed(2);
            }
    
            function updateQualificationOptions() {
                const selectedValues = Array.from(document.querySelectorAll('.qualification-type')).map(select => select.value);
                const maxCounts = { "High School": 1, "Intermediate": 1, "Graduation": 1, "Post Graduation": 2 };
    
                document.querySelectorAll('.qualification-type').forEach(select => {
                    const currentValue = select.value;
                    select.innerHTML = '<option value="">Select Degree</option>';
                    Object.keys(maxCounts).forEach(degree => {
                        if ((selectedValues.filter(val => val === degree).length < maxCounts[degree]) || degree === currentValue) {
                            select.innerHTML += `<option value="${degree}" ${currentValue === degree ? 'selected' : ''}>${degree}</option>`;
                        }
                    });
                });
            }
    
            function attachRemoveQualificationEvent() {
                document.querySelectorAll('.remove-qualification').forEach(button => {
                    button.removeEventListener('click', removeQualification);
                    button.addEventListener('click', removeQualification);
                });
            }
    
            function removeQualification(event) {
                event.target.closest('.qualification-group').remove();
                updateRemoveButtonVisibility();
                updateQualificationOptions();
            }
    
            function updateRemoveButtonVisibility() {
                const qualificationGroups = document.querySelectorAll('.qualification-group');
                qualificationGroups.forEach((group, index) => {
                    const removeBtn = group.querySelector('.remove-btn');
                    removeBtn.style.display = index === 0 ? 'none' : 'block';
                });
            }
    
            addQualificationBtn.addEventListener('click', function () {
                const qualificationGroups = document.querySelectorAll('.qualification-group');
    
                if (qualificationGroups.length < 5) {
                    const newQualificationGroup = qualificationGroups[0].cloneNode(true);
    
                    newQualificationGroup.querySelectorAll('input, select').forEach(input => input.value = '');
                    qualificationContainer.appendChild(newQualificationGroup);
    
                    updateRemoveButtonVisibility();
                    attachRemoveQualificationEvent();
                    updateQualificationOptions();
                } else {
                    alert('You can add a maximum of 5 qualifications.');
                }
            });

            
            attachRemoveQualificationEvent();
            updateRemoveButtonVisibility();
            updateQualificationOptions();
        });
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
