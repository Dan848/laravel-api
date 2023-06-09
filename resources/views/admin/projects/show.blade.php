@extends('layouts.admin')

@section("title")
Show
@endsection

@section('content')
<div class="container mt-5 mb-3">
    <div class="d-flex flex-column align-items-center">
        <h1 class="mb-4">{{$project->name}}</h1>
        <div class="img-show mb-4">
            <img class="img-fluid" src="{{$project->image}}" alt="{{$project->name}}">
        </div>
        <div>
            <p>{{$project->description}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p>Nome Repository: <span class="fw-medium">{{$project->repo_name}}</span></p>
            <p>Link Repository: <a href="{{$project->repo_link}}" class="fw-medium text-secondary">{{$project->repo_link}}</a><p>
        </div>
        <div class="col text-end">
            <p>Realizzato il: <span class="fw-medium">{{$project->created_on}}</span></p>
        </div>
    </div>
    <div class="d-flex justify-content-center gap-3">
        <a class="btn btn-secondary" href="{{ route("admin.projects.edit", $project->slug) }}"><i class="fa-solid fa-pencil"></i></a>
        <form action="{{ route("admin.projects.destroy", $project->slug) }}" method="POST">
            @method("DELETE")
            @csrf
            <button class="btn btn-danger" type="submit"><i class="fa-solid fa-eraser"></i></button>
        </form>
    </div>
</div>
@endsection
