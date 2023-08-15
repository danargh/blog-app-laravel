@extends('layouts.main')

@section('container')
<h1>Halaman about</h1>
<h3>{{$name}}</h3>
<p>{{$email}}</p>
<img class="img-thumbnail" src="images/{{$image}}" alt="{{$name}}" width="200">
@endsection
