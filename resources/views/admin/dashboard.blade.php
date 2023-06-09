@extends('layouts.admin')

@section("title")
Dashboard
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Dashboard</a></li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Project
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Anteprima</th>
                        <th scope="col">Realizzato il</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{$project->name}}</th>
                        <td><div class="img-preview"><img class="img-fluid" src="{{$project->image}}" alt=""></div></td>
                        <td>{{$project->created_on}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route("admin.projects.show", $project->slug) }}"><i class="fa-solid fa-eye"></i></a>
                            <a class="btn btn-secondary" href="{{ route("admin.projects.edit", $project->slug) }}"><i class="fa-solid fa-pencil"></i></a>
                            <form class="d-inline" action="{{ route("admin.projects.destroy", $project->slug) }}" method="POST">
                                @method("DELETE")
                                @csrf
                                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-eraser"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
