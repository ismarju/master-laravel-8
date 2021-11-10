@extends('layouts.app')

@section('title',$post['title'])     {{-- prosljeđuje se ime kao varijabla --}}

@section('content')

@if ($post['is_new'])
<div>A new blogpost using "if"</div>

@elseif (!$post['is_new'])
<div>Ovo je stari post korištenjem "elseif"</div>
@endif

@unless ($post['is_new'])       {{-- Izvršit će se ukoliko je izraz u zagradi negativan --}}
<div>Post je star... koristimo "unless blade direktivu"</div>
@endunless

<h1> {{ $post['title'] }}</h1>
<p> {{ $post['content']}} </p>

@isset($post['has_comments'])   {{-- Ako je vrijednost postavljena, izvršit će se --}}
<div>Post ima komentare ... korištenjem "isset" blade direktive</div>

@endisset
@endsection
