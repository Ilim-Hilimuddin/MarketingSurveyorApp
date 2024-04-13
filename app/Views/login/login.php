<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(-180deg, rgba(2, 0, 36, 1) 0%, rgba(75, 14, 154, 1) 35%, rgba(0, 212, 255, 1) 100%);
            font-family: 'Poppins', sans-serif;
        }

        form {
            border-radius: 5px;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            margin-top: 80px !important;
            width: 24% !important;
            background-color: white !important;
            padding: 15px 25px;
        }

        .btn-primary {
            width: 100%;
            border: none;
            border-radius: 50px;
            margin-top: 25px;
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(75, 14, 154, 1) 35%, rgba(0, 212, 255, 1) 100%);
            padding: 10px 0;
            /* Increased margin-top */
        }

        .form-control {
            color: rgba(0, 0, 0, .87);
            border-bottom-color: rgba(0, 0, 0, .42);
            box-shadow: none !important;
            border: none;
            border-bottom: 1px solid;
            border-radius: 4px 4px 0 0;
        }

        h4 {
            font-size: 2rem !important;
            font-weight: 700;
        }

        .form-label {
            font-weight: 800 !important;
        }

        @media only screen and (max-width: 600px) {
            form {
                width: 60% !important;
            }
        }
    </style>
    <title>E-Marketing Surveyor | Login</title>
</head>

<body>
    <div class="container-fluid">
        <form class="mx-auto" id="loginForm">
            <h4 class="text-center mt-3">Login</h4>
            <!-- Email Field -->
            <div class="mb-3 mt-3">
                <label for="EmailInput" class="form-label">Email</label>
                <input type="email" class="form-control" id="EmailInput" autofocus>
            </div>
            <!-- Password Field -->
            <div class="mb-3">
                <label for="PasswordInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="PasswordInput">
            </div>
            <!-- Remember Me Checkbox -->
            <!-- <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" value="remember-me" id="RememberMeCheckbox" onclick="saveEmail()">
                <label class="form-check-label" for="RememberMeCheckbox">Remember Me</label>
            </div> -->
            <!-- Submit Button -->
            <button type="button" class="btn btn-primary" onclick="submitLoginForm()">Login</button>
            <!-- Increased margin-top -->
            <!-- Copyright -->
            <p style="margin-top: 20px; text-align: center; color: grey;">&copy; 2024 - E-Marketing Surveyor</p>
        </form>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- <script>
        // Function to save email to localStorage when Remember Me is clicked
        function saveEmail() {
            var emailInput = document.getElementById("EmailInput");
            var rememberMeCheckbox = document.getElementById("RememberMeCheckbox");
            if (rememberMeCheckbox.checked) {
                localStorage.setItem("rememberedEmail", emailInput.value);
            } else {
                localStorage.removeItem("rememberedEmail");
            }
        }

        // Function to fill email field if remembered email is present in localStorage
        function fillRememberedEmail() {
            var rememberedEmail = localStorage.getItem("rememberedEmail");
            var emailInput = document.getElementById("EmailInput");

            if (rememberedEmail) {
                emailInput.value = rememberedEmail;
            }
        }

        // Call fillRememberedEmail() function when the page loads
        fillRememberedEmail();

        function submitLoginForm() {
            // Get email and password input values
            var email = document.getElementById("EmailInput").value;
            var password = document.getElementById("PasswordInput").value;

            // Simulate form submission for demonstration
            console.log("Email: " + email);
            console.log("Password: " + password);
            // You can replace the alert with actual form submission logic using AJAX or other methods
        }
    </script> -->
</body>

</html>