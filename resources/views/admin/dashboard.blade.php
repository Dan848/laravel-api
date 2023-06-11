@extends('layouts.admin')

@section("title")
Dashboard
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="col-auto">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                Dashboard
            </div>
            <div class="card-body"><a href="{{ route("admin.projects.index") }}">Vedi tutti i Progetti</a></div>
            <div class="card-footer small text-muted">Updated</div>
        </div>
    </div>
</div>
@endsection
