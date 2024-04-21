@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <h5 class="mb-4">Dashboard</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ \App\Models\Form::count() }}</h5>
                    <p class="card-text">Forms</p>
                </div>
            </div>
        </div>
    </div>
@endsection
