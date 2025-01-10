<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MOCA - Login</title>
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <style>
        :root {
            --primary-color: #1e1e2f;
            --secondary-color: #2a2a3c;
            --text-color: #ffffff;
            --error-color: #dc3545;
            --success-color: #28a745;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 0;
        }

        .login-container {
            width: 400px;
            padding: 2rem;
        }

        .login-logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-logo h1 {
            color: var(--text-color);
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .login-logo small {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1rem;
        }

        .card {
            background: rgba(30, 30, 47, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .login-card-body {
            padding: 2rem;
        }

        .login-box-msg {
            color: var(--text-color);
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .input-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            border: 2px solid #444;
            border-radius: 10px;
            background-color: #2a2a3c;
            color: var(--text-color);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--success-color);
            box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.1);
            outline: none;
        }

        .input-group-append {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }

        .btn-primary {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(135deg, var(--success-color), var(--error-color));
            border: none;
            border-radius: 10px;
            color: var(--text-color);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(79, 172, 254, 0.3);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            position: relative;
            animation: slideIn 0.3s ease-out;
        }

        .alert-success {
            background-color: rgba(40, 167, 69, 0.1);
            border: 1px solid var(--success-color);
            color: var(--success-color);
        }

        .alert-danger {
            background-color: rgba(220, 53, 69, 0.1);
            border: 1px solid var(--error-color);
            color: var(--error-color);
        }

        .close {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: inherit;
            cursor: pointer;
        }

        .mb-0 {
            margin-top: 1.5rem;
            text-align: center;
        }

        .mb-0 a {
            color: var(--success-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .mb-0 a:hover {
            color: var(--error-color);
        }

        .invalid-feedback {
            color: var(--error-color);
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @media (max-width: 480px) {
            .login-container {
                width: 90%;
                padding: 1rem;
            }

            .login-card-body {
                padding: 1.5rem;
            }

            .login-logo h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-container">
        <div class="login-logo">
            <h1>MOCA System</h1>
            <small>Version 1.0</small>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible">
                        {{ session('loginError') }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                <p class="login-box-msg">Sign in to start your session</p>

                <form action="#" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="username"
                            class="form-control @error('username') is-invalid @enderror" placeholder="Username"
                            autofocus>
                        <div class="input-group-append">
                            <span class="fas fa-user"></span>
                        </div>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                </form>

                <p class="mb-0">
                    <a href="{{ route('register') }}">Register new account</a>
                </p>
            </div>
        </div>
    </div>

    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
