<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">

        <div class="d-flex justify-content-center">
                   
            <h2 class="mx-4 d-flex align-items-center" style="margin-top:30px;margin-bottom:30px">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-asterisk mx-2" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M169 57v430h78V57zM25 105v190h46V105zm158 23h18v320h-18zm128.725 7.69l-45.276 8.124l61.825 344.497l45.276-8.124zM89 153v270h62V153zm281.502 28.68l-27.594 11.773l5.494 12.877l27.594-11.773zm12.56 29.433l-27.597 11.772l5.494 12.877l27.593-11.772l-5.492-12.877zm12.555 29.434l-27.594 11.77l99.674 233.628l27.594-11.773zM25 313v30h46v-30zm190 7h18v128h-18zM25 361v126h46V361zm64 80v46h62v-46z"/>
                </svg>                        
                  ShelfWise
            </h2>
        </div>

        <h1 class="text-center mb-3">Login</h1>

        <!-- Login Form -->
        <form action="login" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Username</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Enter your username" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                @if ($errors->has('password'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>

        <div class="text-center mt-3">
            <a href="register">Don't have an account? Register</a>
        </div>


    </div>
</div>

<!-- Bootstrap JS and Popper (for Bootstrap components) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
