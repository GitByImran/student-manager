<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/loginForm.css')}}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>

<body>
    <div class="login-card bg-white">
        <h4 class="text-center text-secondary mb-4">Login to Your Account</h4>
        <form action="process_login" method="POST">
            @csrf
            <div class="form-group position-relative">
                <label for="email"><i class="fa fa-envelope text-secondary mr-2"></i>Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group position-relative">
                <label for="password"><i class="fa fa-lock text-secondary mr-2"></i>Password</label>
                <input type="password" class="form-control pr-5" id="password" name="password" required>
                <i class="fa fa-eye text-secondary" id="togglePassword"></i>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        @if(Session::get('login_error'))

        <p id="loginErrorMessage">{{Session('login_error')}}</p>

        @endif
        <p class="mt-3 text-center">
            <a href="/forgot-password">Forgot your password?</a>
        </p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            if (type === 'password') {
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            } else {
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            }
        });
    </script>
</body>

</html>