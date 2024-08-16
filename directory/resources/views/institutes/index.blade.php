@extends('layouts.app')

@section('title', 'ECPC Institutes Directory')

@section('content')

<div class="row">
    <div class="col-md-12"><h1>Institutes by State and IHE</h1>
    </div>
</div>

    @foreach($institutes as $state => $stateGroup)
        <div class="state row">
            <div class="col-md-12"><h2>{{ $state }}</h2></div>
        </div>
        @foreach($stateGroup as $ihe => $programs)
            <div class="ihe row my-3">
                <div class="col-md-12">
                    <h3>{{ $ihe }}</h3>
                </div>

                @foreach($programs as $program)
                    <div class="program col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">{{ $program->program_title }}</h5>
                            </div>
                            <div class="card-body">

                                <h6 class="card-subtitle mb-2 text-muted">{{ $program->level_of_degree }}</h6>
                                <div class="card-text">
                                    <p>{{ $program->format }}</p>
                                    <p><strong>Category of Credentialing:</strong> {{ $program->category_of_credentialing }}</p>
                                    <p><strong>Offers Alternate Route to Certificiation:</strong> {{ $program->alternate_route_to_certification ? 'Yes' : 'No' }}</p>
                                </div>

                            </div>
                            <div class="card-footer">
                                <strong>Program Website:</strong> <a href="{{ $program->program_url }}" target="_blank">Visit Website</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endforeach
</div>

@endsection