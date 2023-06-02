@extends('layout')
@section('main-content')

<div class="user-collection-container">
    <div class="collection-info-container">
        <h1>Collection of {{ $user->username }}</h1>
        <select name="select-serie" id="select-serie">
            @foreach ($series as $serie)
                <option value="{{ $serie->id }}">  {{ $serie->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="bakugan-container" id="bakugan-container">
        @foreach ($series as $serie)
            @foreach ($bakugans as $bakugan)
                @if($serie->id == $bakugan->serie->id)
                    <div class="bakugan-card">
                        <a class="delete-btn" href="{{ url('remove-bakugan/'.$bakugan->bakugan->id) }}">X</a>
                        <img class="bakugan-img" src="{{ asset('img/baku.png') }}" alt="bakugan-pic">
                        <div class="attributes-container">
                            @foreach($bakugan->attributes as $attribute)
                                    <img class="attribute-img" src="{{ asset('img/bakugan_attributes___pyrus_by_elizabethbrettley_de2aklz-fullview.png') }}" alt="">
                            @endforeach
                        </div>
                        <p class="bakugan-name">{{ $bakugan->bakugan->name }}</p>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
    <ul class="pagination">
        {{ $bakugansPaginate->links() }}
    </ul>
</div>

@endsection