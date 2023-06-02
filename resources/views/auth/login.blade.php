<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bakugan - Login</title>
</head>

<body>
    <form method="POST" action="{{ url('login-auth') }}">
        <h1>Login</h1>
        @csrf
        @if ($errors->any())
            <div>
                @error('error_msg')
                    <h3>{{ $message }}</h3>
                @enderror
            </div>
        @endif
        <main>
            <input type="email" class="input-box" placeholder="Correo" name="email" id="email" value="{{ old('email') }}" required>
            <input type="password" class="input-box" placeholder="Contraseña" placeholder="" name="password" id="password" required>
            <button type="submit">Login</button>
        </main>
    </form>
</body>

</html>
