@extends('layouts.admin')
@section("title")
Progetti
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-center">Progetti</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Progetti</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fa-solid fa-folder-open me-1"></i>Project</div>
            <a class="btn btn-primary fw-medium d-flex align-items-center" href="{{ route("admin.projects.create") }}"><i class="fa-regular fa-plus me-1 text-secondary fs-5 vertical-center fw-bolder"></i>Aggiungi</a>

        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th class="d-none d-sm-table-cell" scope="col">Anteprima</th>
                        <th class="d-none d-lg-table-cell" scope="col">Realizzato</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr class="align-middle">
                        <th class="h5" scope="row">{{$project->name}}</th>
                        <td class="d-none d-sm-table-cell"><div class="img-preview"><img class="img-fluid" src="{{$project->image}}" alt=""></div></td>
                        @php

                        @endphp
                        <td class="d-none d-lg-table-cell">{{ formatDate($project->created_on) }}</td>
                        <td>
                            <div class="d-flex gap-2 flex-wrap justify-content-center text-center align-items-center">

                                    <a class="btn btn-dark" href="{{ route("admin.projects.show", $project->slug) }}"><i class="fa-solid fa-eye"></i></a>

                                    <a class="btn btn-secondary" href="{{ route("admin.projects.edit", $project->slug) }}"><i class="fa-solid fa-pencil"></i></a>
                                    <form class="m-0 p-0 d-inline-block" action="{{ route("admin.projects.destroy", $project->slug) }}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                        <button class="btn btn-danger delete-button" data-item-title="{{$project->name}}" type="submit"><i class="fa-solid fa-eraser"></i></button>
                                    </form>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$projects->links("vendor.pagination.bootstrap-5")}}
        </div>
    </div>
</div>
@include("partials.delete-modal")
@endsection
