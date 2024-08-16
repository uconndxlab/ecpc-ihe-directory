@extends('layouts.app')

@section('title', 'ECPC Institutes Directory')

@section('content')

<div class="row">
    <h1>Institutes by State and IHE</h1>

    @foreach($institutes as $state => $stateGroup)
        <h2>{{ $state }}</h2>

        @foreach($stateGroup as $ihe => $programs)
            <h3>{{ $ihe }}</h3>

            <ul>
                @foreach($programs as $program)
                    <li>
                        <strong>{{ $program->program_title }}</strong> ({{ $program->level_of_degree }})<br>
                        Format: {{ $program->format }}<br>
                        Alternate Route: {{ $program->alternate_route_to_certification ? 'Yes' : 'No' }}<br>
                        Category: {{ $program->category_of_credentialing }}<br>
                        <a href="{{ $program->url_for_program }}" target="_blank">Program Link</a>
                    </li>
                @endforeach
            </ul>
        @endforeach
    @endforeach
</div>

@endsection