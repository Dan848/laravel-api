@extends('layouts.admin')
@section("title")
Tecnologie
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-center">Tecnologie</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Tecnologie</li>
    </ol>
    <div class="card text-bg-dark mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fa-solid fa-lightbulb me-1"></i>Tecnologie</div>
            <a class="btn btn-primary fw-medium d-flex align-items-center" href="{{ route("admin.technologies.create") }}"><i class="fa-regular fa-plus me-1 text-secondary fs-5 vertical-center fw-bolder"></i>Aggiungi</a>

        </div>
        <div class="card-body">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th class="d-none d-sm-table-cell" scope="col">Logo</th>
                        <th class="d-none d-lg-table-cell" scope="col">N° Progetti</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                    <tr class="align-middle">
                        {{-- Name --}}
                        <th scope="row"><a class="h5 text-decoration-none" href="{{ route("admin.technologies.show", $technology) }}">{{$technology->name}}</a></th>
                        {{-- Image --}}
                        <td class="d-none d-sm-table-cell"><a href="{{ route("admin.technologies.show", $technology) }}" class="d-block logo img-preview"><img class="img-fluid" src="{{$technology->image}}" alt="{{$technology->name}}"></a></td>
                        {{-- Num of Projects --}}
                        <td class="d-none d-lg-table-cell">{{ $technology->project->count() }}</td>
                        {{-- Action Button --}}
                        <td>
                            <div class="d-flex gap-2 flex-wrap justify-content-center text-center align-items-center">

                                    <a class="btn btn-light" href="{{ route("admin.technologies.show", $technology->slug) }}"><i class="fa-solid fa-eye"></i></a>

                                    <a class="btn btn-secondary" href="{{ route("admin.technologies.edit", $technology->slug) }}"><i class="fa-solid fa-pencil"></i></a>
                                    <form class="m-0 p-0 d-inline-block" action="{{ route("admin.technologies.destroy", $technology->slug) }}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                        <button class="btn btn-danger delete-button" data-item-title="{{$technology->name}}" type="submit"><i class="fa-solid fa-eraser"></i></button>
                                    </form>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{$technology->links("vendor.pagination.bootstrap-5")}} --}}
        </div>
    </div>
</div>
@include("partials.delete-modal")
@endsection
