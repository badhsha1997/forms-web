@extends('admin.layouts.app')
@section('title', 'Forms')
@section('content')
    <div class="row">
        <div class="col-12">
            <h5 class="mb-4">Forms</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-success float-end" href="{{ route('admin.forms.create') }}">Create</a>
                </div>
                <div class="card-body">
                    @if(count($forms) > 0)
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Elements</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($forms as $form)
                                        <tr>
                                            <th scope="row">{{ $form->id }}</th>
                                            <td>{{ $form->title }}</td>
                                            <td>3</td>
                                            <td>{{ $form->created_at->toFormattedDateString() }}</td>
                                            <td>
                                                <div class="d-inline-flex">
                                                    <a class="me-2 btn btn-sm btn-primary" href="{{ route('admin.forms.edit', $form->id) }}">Edit</a>
                                                    <form method="POST" action="{{ route('admin.forms.destroy', $form->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ $forms->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-secondary text-center">No forms found.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
