@extends('layouts.admin')

@section("title")
Modifica {{$technology->name}}
@endsection

@section('content')

<div class="container mb-5">
    <h4 class="mt-5 text-center">
        Modifica
    </h4>
    <h2 class="mb-4 text-center">
        {{$technology->name}}
    </h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route("admin.technologies.index") }}">Tecnologie</a></li>
        <li class="breadcrumb-item active">Modifica {{$technology->name}}</li>
    </ol>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <form class="container form-crud" method="POST" action="{{ route("admin.technologies.update", $technology->slug) }}" enctype="multipart/form-data">
                @method("PUT")
                @csrf
                {{-- Errors Section --}}
                @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    @error('name')
                        <p>*{{ $message }}</p>
                    @enderror

                    @error('image')
                        <p>*{{ $message }}</p>
                    @enderror
                </div>
                @endif
                <!-- NAME -->
                    <div class="form-floating mb-3">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $technology->name }}" required autofocus>
                        <label for="name">Nome</label>
                    </div>
                <!-- IMAGE -->
                    <div class="form-floating mb-3">
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" autofocus>
                        <label for="image">Logo</label>
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
