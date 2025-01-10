<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MOCA - Register</title>
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

        .register-container {
            width: 500px;
            padding: 2rem;
        }

        .register-logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .register-logo h1 {
            color: var(--text-color);
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .register-logo small {
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

        .register-card-body {
            padding: 2rem;
        }

        .register-box-msg {
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

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-color);
            font-weight: 500;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1em;
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

        @media (max-width: 576px) {
            .register-container {
                width: 90%;
                padding: 1rem;
            }

            .register-card-body {
                padding: 1.5rem;
            }

            .register-logo h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="register-logo">
            <h1>MOCA System</h1>
            <small>Version 1.0</small>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="register-box-msg">Register a new account</p>

                <form action="{{ route('register.store') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Full name" name="name" value="{{ old('name') }}">
                        <div class="input-group-append">
                            <span class="fas fa-user"></span>
                        </div>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group">
                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                            placeholder="Username" name="username" value="{{ old('username') }}">
                        <div class="input-group-append">
                            <span class="fas fa-handshake"></span>
                        </div>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password" name="password">
                        <div class="input-group-append">
                            <span class="fas fa-lock"></span>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Retype password" name="password_confirmation">
                        <div class="input-group-append">
                            <span class="fas fa-lock"></span>
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="project">Project</label>
                        <select name="project" class="form-control @error('project') is-invalid @enderror">
                            <option value="">-- Select Project --</option>
                            @foreach (\App\Models\Project::all() as $project)
                                <option value="{{ $project->code }}"
                                    {{ old('project') == $project->code ? 'selected' : '' }}>
                                    {{ $project->code }}
                                </option>
                            @endforeach
                        </select>
                        @error('project')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="department_id">Department</label>
                        <select name="department_id" class="form-control @error('department_id') is-invalid @enderror">
                            <option value="">-- Select Department --</option>
                            @foreach (\App\Models\Department::orderBy('department_name', 'asc')->get() as $department)
                                <option value="{{ $department->id }}"
                                    {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                    {{ $department->department_name }}</option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>

                <p class="mb-0">
                    <a href="{{ route('login') }}">I already have an account</a>
                </p>
            </div>
        </div>
    </div>

    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
