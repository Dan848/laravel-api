@extends('layouts.admin')

@section("title")
{{$project->name}}
@endsection

@section('content')
<div class="container mt-5 mb-3">

    <h1 class="mb-4 text-center">{{$project->name}}</h1>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route("admin.projects.index") }}">Progetti</a></li>
                <li class="breadcrumb-item active">{{$project->name}}</li>
            </ol>
            <div>
                @if($project->dev_languages->count() > 0)
                Linguaggi utilizzati:
                @foreach ($project->dev_languages as $languages)
                    <span class="badge rounded-pill text-bg-light">{{$languages->name}}</span>
                @endforeach
                @endif
            </div>
        </div>

        <div class="img-box logo">
            @isset($project->technology->image)
            <img class="img-fluid" src="{{ $project->technology->image }}" alt="{{ $project->technology->name }}">
            @endisset
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="img-show mb-4">
            <img class="img-fluid" src="{{$project->image}}" alt="{{$project->name}}">
        </div>
    </div>


        <p>{{$project->description}}</p>
    <div class="row mt-5">
        <div class="col">
            <p>Nome Repository: <span class="fw-medium">{{$project->repo_name}}</span></p>
            <p>Link Repository: <a href="{{$project->repo_link}}" class="fw-medium">{{$project->repo_link}}</a><p>
        </div>
        <div class="col text-end">
            <p class="fw-medium">{{$project->fe_be_oriented ? "Front-end" : "Back-end"}}</p>
            <p>Realizzato il: <span class="fw-medium">{{$project->created_on}}</span></p>
        </div>
    </div>
    <div class="d-flex justify-content-center gap-3">
        <a class="btn btn-secondary" href="{{ route("admin.projects.edit", $project->slug) }}"><i class="fa-solid fa-pencil"></i></a>
        <form action="{{ route("admin.projects.destroy", $project->slug) }}" method="POST">
            @method("DELETE")
            @csrf
            <button class="btn btn-danger delete-button" data-item-title="{{$project->name}}" type="submit"><i class="fa-solid fa-eraser"></i></button>
        </form>
    </div>
</div>
@include("partials.delete-modal")
@endsection
