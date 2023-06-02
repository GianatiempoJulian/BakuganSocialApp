<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bakugan - Register</title>
</head>

<body>
    <form method="POST" action="{{ url('register-auth') }}">
        <h1>Register</h1>
        @csrf
        @if ($errors->any())
            <div>
                @error('error_msg')
                    <h3>{{ $message }}</h3>
                @enderror
            </div>
        @endif
        <main>
            <input type="text" placeholder="Nombre" name="name" id="name" value="{{ old('name') }}" required>
            <input type="text" class="input-box" placeholder="Apellido" name="lastname" id="lastname" value="{{ old('lastname') }}" required>
            <input type="text" class="input-box" placeholder="Nombre de usuario" name="username" id="username" value="{{ old('username') }}" required>
            <input type="email" class="input-box" placeholder="Correo" name="email" id="email" value="{{ old('email') }}" required>
            <input type="password" class="input-box" placeholder="Contraseña" placeholder="" name="password" id="password" required>
            <button type="submit">Registrarse</button>
        </main>
    </form>
</body>

</html>
