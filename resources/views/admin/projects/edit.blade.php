@extends('layouts.admin')

@section("title")
Modifica {{$project->name}}
@endsection

@section('content')

<div class="container mb-5">
    <h4 class="mt-5 text-center">
        Modifica
    </h4>
    <h2 class="mb-4 text-center">
        {{$project->name}}
    </h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route("admin.projects.index") }}">Progetti</a></li>
        <li class="breadcrumb-item active">Modifica {{$project->name}}</li>
    </ol>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <form class="container form-crud" method="POST" action="{{ route("admin.projects.update", $project->slug) }}" enctype="multipart/form-data">
                @method("PUT")
                @csrf
                {{-- Errors Section --}}
                @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    @error('repo_name')
                        <p>*{{ $message }}</p>
                    @enderror

                    @error('name')
                        <p>*{{ $message }}</p>
                    @enderror

                    @error('repo_link')
                        <p>*{{ $message }}</p>
                    @enderror

                    @error('image')
                        <p>*{{ $message }}</p>
                    @enderror

                    @error('created_on')
                        <p>*{{ $message }}</p>
                    @enderror

                    @error('description')
                        <p>*{{ $message }}</p>
                    @enderror
                </div>
                @endif
                <!-- NAME -->
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input id="repo_name" type="text" class="form-control @error('repo_name') is-invalid @enderror" name="repo_name" value="{{ $project->repo_name }}" required autofocus>
                            <label for="repo_name">Nome della Repository</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $project->name }}" required autofocus>
                            <label for="name">Nome del progetto</label>
                        </div>
                    </div>
                </div>
                <!-- LINK REPO -->
                <div class="form-floating mb-3">
                    <input id="repo_link" type="url" class="form-control @error('repo_link') is-invalid @enderror" name="repo_link" value="{{ $project->repo_link }}" required autofocus>
                    <label for="repo_link">Link della Repo su Git Hub</label>
                </div>
                <!-- IMAGE & DATA -->
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" autofocus>
                            <label for="image">Anteprima Immagine</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input id="created_on" type="date" class="form-control @error('created_on') is-invalid @enderror" name="created_on" value="{{ $project->created_on }}" required autofocus>
                            <label for="created_on">Realizzato il</label>
                        </div>
                    </div>
                </div>
                <!-- TECHNOLOGY & FRONT-END/BACK-END -->
                <div class="row my-3">
                    <div class="form-floating col-12 col-md-6">
                        <select class="form-select" name="technology_id" id="technology_id" aria-label="Realizzato con">
                        <option value="">Seleziona tecnologia principale</option>
                        @foreach ($technologies as $technology)

                    <option value="{{ $technology->id }}"
                        {{ $technology->id == $project->technology->id ? 'selected' : '' }}>
                        {{ $technology->name }}
                    </option>

                        @endforeach
                        </select>
                        <label for="floatingSelect">Realizzato con</label>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-evenly align-items-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="fe_be_oriented" id="fe_be_oriented_fe" value="1" {{$project->fe_be_oriented ? "checked" : ""}}>
                            <label class="form-check-label" for="fe_be_oriented_fe">
                                Front-end
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="fe_be_oriented" value="0" id="fe_be_oriented_be" {{$project->fe_be_oriented ? "" : "checked"}}>
                            <label class="form-check-label" for="fe_be_oriented_be">
                                Back-end
                            </label>
                        </div>
                    </div>
                </div>
                <!-- DESCRIPTION -->
                <div class="form-floating mb-3">
                    <textarea id="description" class="form-control h-100 @error('description') is-invalid @enderror" name="description" rows="4" cols="3" autofocus>{{ $project->description }}</textarea>
                    <label for="description">Descrizione</label>
                </div>
                <!-- SAVE and RESET -->
                <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                    <button class="btn btn-secondary me-2" type="reset">Reset</button>
                    <button class="btn btn-primary ms-2" type="submit">Modifica</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
