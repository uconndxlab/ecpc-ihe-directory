@extends('layouts.app')

@section('title', 'ECPC Institutes Directory')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Institutes by State and IHE</h1>
    </div>
</div>

<!-- filter UI based on all the fields like state, IHE, program title, level of degree, format, category of credentialing, alternate route to certification -->
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('institutes.index') }}" method="get">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="state">State</label>
                        <select name="state" id="state" class="form-select">
                            <option value="">Select State</option>
                            @foreach($states as $state)
                                <option value="{{ $state }}" {{ request('state') == $state ? 'selected' : '' }}>
                                    {{ $state }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="level_of_degree">Level of Degree</label>
                        <select name="level_of_degree" id="level_of_degree" class="form-select">
                            <option value="">Select Level of Degree</option>
                            @foreach($levelsOfDegree as $levelOfDegree)
                                <option value="{{ $levelOfDegree }}"
                                        {{ request('level_of_degree') == $levelOfDegree ? 'selected' : '' }}>
                                    {{ $levelOfDegree }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="format">Format</label>
                        <select name="format" id="format" class="form-select">
                            <option value="">Select Format</option>
                            @foreach($formats as $format)
                                <option value="{{ $format }}" {{ request('format') == $format ? 'selected' : '' }}>
                                    {{ $format }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="category_of_credentialing">Category of Credentialing</label>
                        <select name="category_of_credentialing" id="category_of_credentialing" class="form-select">
                            <option value="">Select Category of Credentialing</option>
                            @foreach($categoriesOfCredentialing as $categoryOfCredentialing)
                                <option value="{{ $categoryOfCredentialing }}"
                                        {{ request('category_of_credentialing') == $categoryOfCredentialing ? 'selected' : '' }}>
                                    {{ $categoryOfCredentialing }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="alternate_route_to_certification">Alternate Route to Certification</label>
                        <select name="alternate_route_to_certification" id="alternate_route_to_certification"
                                class="form-select">
                            <option value="">Select Alternate Route to Certification</option>
                            <option value="1" {{ request('alternate_route_to_certification') == '1' ? 'selected' : '' }}>
                                Yes
                            </option>
                            <option value="0" {{ request('alternate_route_to_certification') == '0' ? 'selected' : '' }}>
                                No
                            </option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="sort_by">Sort By</label>
                        <select name="sort_by" id="sort_by" class="form-select">
                            <option value="state" {{ request('sort_by') == 'state' ? 'selected' : '' }}>State</option>
                            <option value="ihe" {{ request('sort_by') == 'ihe' ? 'selected' : '' }}>IHE</option>
                            <option value="program_title"
                                    {{ request('sort_by') == 'program_title' ? 'selected' : '' }}>Program Title
                            </option>
                            <option value="level_of_degree"
                                    {{ request('sort_by') == 'level_of_degree' ? 'selected' : '' }}>Level of Degree
                            </option>
                            <option value="format" {{ request('sort_by') == 'format' ? 'selected' : '' }}>Format</option>
                            <option value="category_of_credentialing"
                                    {{ request('sort_by') == 'category_of_credentialing' ? 'selected' : '' }}>
                                Category of Credentialing
                            </option>
                            <option value="alternate_route_to_certification"
                                    {{ request('sort_by') == 'alternate_route_to_certification' ? 'selected' : '' }}>
                                Alternate Route to Certification
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
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
                    {{ $state }} <small>({{ count($stateGroup) }})</small>
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
