@extends('layouts.app')

@section('title', 'ECPC Institutes Directory')

@section('content')

<div class="row py-4">
    <div class="col-md-12 py-2">
        <h1>Institutes of Higher Education Early Childhood Programs</h1>
        <div class="alert alert-info mt-2">
            <p>
                This directory is a list of Institutes of Higher Education (IHE) that offer certificate and degree programs in early childhood, early childhood special education, and blended programs.
                The directory is organized by state and then by IHE. Each IHE is listed with the early childhood programs
                they offer. The directory is updated annually.
            </p>
    </div>
</div>

<!-- filter UI based on all the fields like state, IHE, program title, level of degree, format, category of credentialing, alternate route to certification -->
<div class="row">
    <div class="col-md-12">
        <form 
        hx-get="{{ route('institutes.index') }}"
        hx-trigger="change"
        hx-target="#stateAccordion"
        hx-swap="outerHTML"
        hx-select="#stateAccordion"
        action="{{ route('institutes.index') }}" method="get">
            <div class="d-flex justify-content-between">
                <div>
                    <div class="form-group mb-3">
                        <label for="state">State</label>
                        <select name="state" id="state" class="form-select">
                            <option value="">All States</option>
                            @foreach($states as $state)
                                <option value="{{ $state }}" {{ request('state') == $state ? 'selected' : '' }}>
                                    {{ $state }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <div class="form-group mb-3">
                        <label for="level_of_degree">Degree Level</label>
                        <select name="level_of_degree" id="level_of_degree" class="form-select">
                            <option value="">All Degree Levels</option>
                            @foreach($levelsOfDegree as $levelOfDegree)
                                <option value="{{ $levelOfDegree }}"
                                        {{ request('level_of_degree') == $levelOfDegree ? 'selected' : '' }}>
                                    {{ $levelOfDegree }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div>
                    <div class="form-group mb-3">
                        <label for="format">Format</label>
                        <select name="format" id="format" class="form-select">
                            <option value="">All Formats</option>
                            @foreach($formats as $format)
                                <option value="{{ $format }}" {{ request('format') == $format ? 'selected' : '' }}>
                                    {{ $format }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <div class="form-group mb-3">
                        <label for="category_of_credentialing">Category of Credentialing</label>
                        <select name="category_of_credentialing" id="category_of_credentialing" class="form-select">
                            <option value="">All Categories</option>
                            @foreach($categoriesOfCredentialing as $categoryOfCredentialing)
                                <option value="{{ $categoryOfCredentialing }}"
                                        {{ request('category_of_credentialing') == $categoryOfCredentialing ? 'selected' : '' }}>
                                    {{ $categoryOfCredentialing }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary mt-4">Filter</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="accordion" id="stateAccordion">
    @foreach($institutes as $state => $stateGroup)
        <div class="state row">
            <div class="col-md-12">
                <h2>
                    {{ $state }} <small>({{ count($stateGroup) }} programs)</small>
                </h2>
                <!-- number of programs in state -->

            </div>
        </div>

        @foreach($stateGroup as $ihe => $programs)
            <div class="ihe row my-3">
                <div class="col-md-12">
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="heading-{{ Str::slug($state) }}-{{ Str::slug($ihe) }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-{{ Str::slug($state) }}-{{ Str::slug($ihe) }}"
                                    aria-expanded="false" aria-controls="collapse-{{ Str::slug($state) }}-{{ Str::slug($ihe) }}">
                                {{ $ihe }} ({{ count($programs) }})
                            </button>
                        </h3>

                        <div id="collapse-{{ Str::slug($state) }}-{{ Str::slug($ihe) }}"
                             class="accordion-collapse collapse"
                             aria-labelledby="heading-{{ Str::slug($state) }}-{{ Str::slug($ihe) }}"
                             data-bs-parent="#stateAccordion">
                            <div class="accordion-body">
                                <div class="row">
                                    @foreach($programs as $program)
                                        <div class="program col-md-4">
                                            <div class="card mb-3">
                                                <div class="card-header">
                                                    <h5 class="card-title">{{ $program->program_title }}</h5>
                                                </div>
                                                <div class="card-body">
                                                    <span class="badge bg-primary">{{ $program->level_of_degree }}</span>
                                                    <span class="badge bg-secondary">{{ $program->format }}</span>
                                                    <span class="badge bg-success">{{ $program->category_of_credentialing }}</span>
                                                    @if($program->alternate_route_to_certification)
                                                        <span class="badge bg-danger">Offers Alternate Route to Cert</span>
                                                    @endif
                                                </div>
                                                <div class="card-footer">
                                                    <a class="d-block btn btn-primary text-white"
                                                       href="{{ $program->url_for_program }}" target="_blank">
                                                        Visit Website
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
</div>

@endsection
