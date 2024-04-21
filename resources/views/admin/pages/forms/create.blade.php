@extends('admin.layouts.app')
@section('title', 'Forms')
@section('content')
    <div class="row">
        <div class="col-12">
            <h5 class="mb-4">Create Form</h5>
        </div>
    </div>
    <form method="POST" action="{{ route('admin.forms.store') }}">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input class="form-control" id="title" name="title" type="text" placeholder="Title" value="{{ old('title') }}">
                    @error('title')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div id="elements">
            <div data-repeater-list="elements">
                <div data-repeater-item>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group mb-3">
                                <label>Label</label>
                                <input class="form-control" name="label" type="text" placeholder="Label">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group mb-3">
                                <label>Type</label>
                                <select class="form-control" name="type">
                                    <option selected disabled>Choose</option>
                                    <option value="TEXT">Text</option>
                                    <option value="NUMBER">Number</option>
                                    <option value="SELECT">Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group mb-3">
                                <label>Options (Comma seperated)</label>
                                <input class="form-control" name="options" type="text" placeholder="Options">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group mb-3">
                                <a class="btn btn-danger mt-4" data-repeater-delete>-</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group mb-3">
                        <a class="btn btn-success" data-repeater-create>+</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button class="btn btn-primary float-end" type="submit">Save</button>
            </div>
        </div>
    </form>
@endsection
@push('js')
    <script>
        $(function() {
            $('#elements').repeater({
                initEmpty: false,
            });
        });
    </script>
@endpush
