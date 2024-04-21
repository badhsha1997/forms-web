@extends('web.layouts.app')
@section('title', 'Forms')
@section('content')
    <div class="row">
        <div class="col-12">
            <h5 class="mb-4">{{ $form->title }}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row">
                            @foreach($form->elements as $element)
                                @if($element->type == 'TEXT')
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label>{{ $element->label }}</label>
                                            <input class="form-control" type="text" placeholder="{{ $element->label }}">
                                        </div>
                                    </div>
                                @endif
                                @if($element->type == 'NUMBER')
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label>{{ $element->label }}</label>
                                            <input class="form-control" type="number" placeholder="{{ $element->label }}">
                                        </div>
                                    </div>
                                @endif
                                @if($element->type == 'SELECT')
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label>{{ $element->label }}</label>
                                            <select class="form-control">
                                                <option selected disabled>Choose</option>
                                                @foreach(explode(',', $element->options) as $option)
                                                    <option value="{{ $option }}">{{ $option }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary float-end" type="button">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
