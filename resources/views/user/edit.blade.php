@extends('layout')
@section('main-content')

<div class="user-edit-container">
    <form method="POST" action="{{ url('user-update') }}">
    @csrf
        <div class="img-container">
            <img src="{{ asset('img/p.png') }}" alt="user-profile-pic">
        </div>
        <div class="user-edit-information">
            <input type="text" class="input-box" placeholder="Nombre" name="name" id="name" value="{{ $user->name }}">
            <input type="text" class="input-box" placeholder="Apellido" name="lastname" id="lastname" value="{{ $user->lastname }}">
            <input type="text" class="input-box" placeholder="Nombre de usuario" name="username" id="username" value="{{ $user->username }}">
            <input type="text" class="input-box" placeholder="Link de Instagram" name="name" id="name" value="{{ $user->name }}">
            <input type="text" class="input-box" placeholder="Link de Facebook" name="lastname" id="lastname" value="{{ $user->lastname }}">
            <input type="text" class="input-box" placeholder="Link de Twitter" name="username" id="username" value="{{ $user->username }}">
            <input type="text" class="input-box" placeholder="Descripción" name="username" id="username" value="{{ $user->username }}">
            <h6>COUNTRY</h6>
        </div>
        <div class="user-edit-btn">
            <button type="submit">Guardar cambios</button>
        </div>
       
    </form>
</div>

@endsection