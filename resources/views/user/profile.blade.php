@extends('layout')
@section('main-content')

<div class="user-profile-container">
    <div class="user-information-container">
        <img src="{{ asset('img/p.png') }}" alt="user-profile-pic">
        <div class="user-text">
            <h1>{{ $user->username }}</h1>
            <h6>COUNTRY</h6>
            <a href="{{ url('user-edit') }}"><h6>Edit</h6></a>
        </div>
    </div>
    <div class="user-social-collection-container">
        <div class="social-media">
            <a href=""><img src="{{ asset('img/ig.png') }}" alt="instagram"></a>
            <a href=""><img src="{{ asset('img/fb.png') }}" alt="facebook"></a>
            <a href=""><img src="{{ asset('img/tw.png') }}" alt="twitter"></a>
        </div>
        <a class="collection-btn" href="{{ url('collection') }}">View collection</a>
    </div>
    <div class="user-extra-information-container">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam dicta corrupti reprehenderit, quidem quos vero corporis ipsam nemo asperiores repellat amet exercitationem rem reiciendis saepe deserunt sed ea voluptas facilis? Aut, quam enim corrupti eligendi eveniet ullam ipsam magni laborum suscipit minus obcaecati inventore tempora provident eaque labore laudantium officia.</p>
        <div class="favorites-container">
            <img src="{{ asset('img/baku.png') }}" alt="fav1">
            <img src="{{ asset('img/baku.png') }}" alt="fav2">
            <img src="{{ asset('img/baku.png') }}" alt="fav3">
            <img src="{{ asset('img/baku.png') }}" alt="fav4">
            <img src="{{ asset('img/baku.png') }}" alt="fav5">
            <img src="{{ asset('img/baku.png') }}" alt="fav6">
        </div>
    </div>
    
</div>

@endsection