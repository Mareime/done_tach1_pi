<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    body {
      background: linear-gradient(135deg, silver, silver);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #fff;
      font-family: Arial, sans-serif;
    }

    .card {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .form-control {
      border-radius: 0.5rem;
    }

    .btn-primary {
      background-color: #6c63ff;
      border: none;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: silver;
    }

    .form-text {
      color: #ccc;
    }

    .text-center a {
      color: silver;
      text-decoration: none;
    }

    .text-center a:hover {
      text-decoration: underline;
    }
    
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card p-4">
          <h3 class="text-center mb-4">Connexion</h3>

          {{-- <!-- Success and Error Messages -->
          @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif --}}

          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <!-- Login Form -->
          <form action="{{ route('connexion') }}" method="POST">
            @csrf <!-- Protection against CSRF -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email address" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </form>

          <!-- Additional Links -->
          <div class="text-center mt-3" hidden>
              <a href="/password/reset">Forgot Password?</a>
              <br>
              <a href="/register">Create an Account</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
