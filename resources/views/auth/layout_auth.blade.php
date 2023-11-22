<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SH Marketplace</title>

    <!--Bootstrap Css-->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/bootstrap/icons-1.7.2/font/bootstrap-icons.css">

    <!--Slick CSS-->
    <link rel="stylesheet" href="./assets/vendor/slick/slick.css">

    <!--Auth CSS-->
    <link rel="stylesheet" href="../assets/css/auth.css">
</head>

<body>

    @yield('auth')

    <!--Vendor-->
    
    <!--Jquery-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <!--Bootstrap-->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!--Auth Script-->
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            this.classList.toggle('bi-eye-slash-fill');
        });

    </script>
</body>

</html>
