
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
            select.innerHTML = '<option value="" selected>-- Select Degree --</option>';
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
    validatePercentage();
});