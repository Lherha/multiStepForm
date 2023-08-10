<!DOCTYPE html>
<html>
<head>
    <title>Multi-Step Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h1 class="text-center">Signup to our website</h1>
        <div class="form-wrapper">
        <h2 class="sub-title">Enter Your Info</h2>
            <form id="multiStepForm" method="post" action="process_form.php">
                <div class="step" data-step="1">
                    <!-- Step 1: First Name and Last Name -->
                    <div class="form-group">
                        <label>First Name</label><br>
                        <input type="text" name="first_name" required>
                        <span class="error-msg" id="error-first_name"></span>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label><br>
                        <input type="text" name="last_name" required>
                        <span class="error-msg" id="error-last_name"></span>
                    </div>
                    <button type="button" class="next-step">Next</button>
                </div>

                <div class="step" data-step="2">
                    <!-- Step 2: Gender and Email -->
                    <div class="form-group">
                        <label>Gender</label><br>
                        <select name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <span class="error-msg" id="error-gender"></span>
                    </div>
                    <div class="form-group">
                        <label>Email</label><br>
                        <input type="email" name="email" required>
                        <span class="error-msg" id="error-email"></span>
                    </div>
                    <button type="button" class="prev-step">Previous</button>
                    <button type="button" class="next-step">Next</button>
                </div>

                <div class="step" data-step="3">
                    <!-- Step 3: Password, Address, and Mobile Number -->
                    <div class="form-group">
                        <label>Password</label><br>
                        <input type="password" name="password" required>
                        <span class="error-msg" id="error-password"></span>
                    </div>
                    <div class="form-group">
                        <label>Address</label><br>
                        <input type="text" name="address" required>
                        <span class="error-msg" id="error-address"></span>
                    </div>
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="text" name="mobile_no" required>
                        <span class="error-msg" id="error-mobile_no"></span>
                    </div>
                    <button type="button" class="prev-step">Previous</button>
                    <button type="submit" class="submit">Submit</button>
                </div>
            </form>
            <br> or already have an account?
        <button onclick="window.location.href = 'login.php';">Login</button>                                        

        </div>
        <p style="padding-left: 10px; padding-top: 20px;">
        Go back to <a href="home.php">Homepage</a>
        </p>
    </div>

    <script>document.addEventListener('DOMContentLoaded', function () {
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
</script>
</body>
</html>
