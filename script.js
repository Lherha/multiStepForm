document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('multiStepForm');
    const steps = form.getElementsByClassName('step');
    const nextButtons = form.getElementsByClassName('next-step');
    const prevButtons = form.getElementsByClassName('prev-step');
    let currentStep = 0;

    showStep(currentStep);

    // Handle next step button click
    Array.from(nextButtons).forEach(function (button) {
        button.addEventListener('click', function () {
            if (validateStep(currentStep)) {
                currentStep++;
                showStep(currentStep);
            }
        });
    });

    // Handle previous step button click
    Array.from(prevButtons).forEach(function (button) {
        button.addEventListener('click', function () {
            currentStep--;
            showStep(currentStep);
        });
    });

    // Function to show the current step
    function showStep(stepIndex) {
        Array.from(steps).forEach(function (step, index) {
            if (index === stepIndex) {
                step.style.display = 'block';
            } else {
                step.style.display = 'none';
            }
        });
    }

    // Function to validate the current step
    function validateStep(stepIndex) {
        const step = steps[stepIndex];
        const inputs = step.getElementsByTagName('input');
        const select = step.getElementsByTagName('select')[0];
        let isValid = true;

        Array.from(inputs).forEach(function (input) {
            const errorMsg = document.getElementById('error-' + input.name);
            if (input.hasAttribute('required') && input.value.trim() === '') {
                errorMsg.innerText = 'This field is required.';
                isValid = false;
            } else {
                errorMsg.innerText = '';
            }
        });

        if (select && select.hasAttribute('required') && select.value === '') {
            const errorMsg = document.getElementById('error-' + select.name);
            errorMsg.innerText = 'Please select an option.';
            isValid = false;
        }

        return isValid;
    }
});
