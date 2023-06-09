@extends('layouts.admin')

@section("title")
Show
@endsection

@section('content')
<div class="container mt-5 mb-3">

    <h1 class="mb-4n text-center">{{$project->name}}</h1>
    <ol class="breadcrumb mb-4" style="order: -1;">
        <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route("admin.projects.index") }}">Progetti</a></li>
        <li class="breadcrumb-item active">{{$project->name}}</li>
    </ol>
    <div class="img-show d-flex justify-content-center mb-4">
        <img class="img-fluid" src="{{$project->image}}" alt="{{$project->name}}">
    </div>
        <p>{{$project->description}}</p>
    <div class="row mt-5">
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
            <button class="btn btn-danger delete-button" data-item-title="{{$project->name}}" type="submit"><i class="fa-solid fa-eraser"></i></button>
        </form>
    </div>
</div>
@include("partials.delete-modal")
@endsection
