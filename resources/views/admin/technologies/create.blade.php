@extends('layouts.admin')

@section("title")
Nuova Tecnologia
@endsection

@section('content')
<div class="container mb-5">
    <h2 class="mt-5 mb-4 text-center">
        Nuova Tecnologia
    </h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.technologies.index") }}">Tecnologie</a></li>
            <li class="breadcrumb-item active">Nuova Tecnologia</li>
        </ol>
</div>

    <div class="container mb-4">
        <div class="row">
            <div class="col">
                <form class="container form-crud" method="POST" action="{{ route("admin.technologies.store") }}" enctype="multipart/form-data">
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
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autofocus>
                        <label for="name">Nome</label>
                    </div>
                <!-- IMAGE -->
                    <div class="form-floating mb-3">
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" autofocus>
                        <label for="image">Logo</label>
                    </div>
                    <!-- SAVE & RESET -->
                    <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                        <button class="btn btn-secondary me-2" type="reset">Reset</button>
                        <button class="btn btn-primary ms-2" type="submit">Aggiungi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

