<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="logstyling.css">

    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"
/>

</head>
<body>
    
    <div class="container">
        <div class="form-box">
            <h1 id="title">Sign up</h1>
            <form action="login-backend.php" method="post" >
                <div class="input-group">

                    <div class="input-field hideable" id="nameField">
                        <i class="ri-user-fill"></i>
                        <input type="text" placeholder="Name" name="name">
                    </div>

                    <div class="input-field hideable" id="surnameField">
                        <i class="ri-user-fill"></i>
                        <input type="text" placeholder="Surname" name="surname">
                    </div>

                    <div class="input-field">
                        <i class="ri-mail-fill"></i>
                        <input type="email" placeholder="Email" name="email">
                    </div>

                    <div class="input-field hideable" id="phoneField"> 
                        <i class="ri-user-fill"></i>
                        <input type="number" placeholder="Phone number" name="number">
                    </div>

                    <div class="input-field">
                        <i class="ri-lock-fill"></i>
                        <input type="password" placeholder="Password" name="password">
                    </div>

                    <div class="input-field hideable" id="confirm_password_Field">
                        <i class="ri-lock-fill"></i>
                        <input type="password" placeholder="Confirm Password" name="confirm_password">
                    </div>

                    <p>Lost password <a href="#">Click Here!</a></p>

                </div>
                <div class="btn-field">
                    <button type="submit" id="signupBtn" name="sign_up">Sign up</button>
                    <button type="submit"  id="signinBtn" name="sign_in">Sign in</button>
                </div>
            </form>
        </div>
    </div>

<script>
   
    document.getElementById('signinBtn').addEventListener('click', function() {
            const inputs = document.querySelectorAll('.hideable');
            inputs.forEach(input => {
                input.style.display = 'none';
            });
        });

    document.getElementById('signupBtn').addEventListener('click', function() {
        const inputs = document.querySelectorAll('.hideable');
        inputs.forEach(input => {
            input.style.display = '';
        });
    });

</script>

</body>
</html>