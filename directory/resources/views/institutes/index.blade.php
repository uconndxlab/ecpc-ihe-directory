@extends('layouts.app')

@section('title', 'ECPC Institutes Directory')

@section('content')

<h1>ECPC Institutes Directory</h1>

<ul>
    @foreach ($institutes as $institute)
        <li>
            <a href="#">{{ $institute->ihe_name }}</a>
        </li>
    @endforeach

</ul>

@endsection