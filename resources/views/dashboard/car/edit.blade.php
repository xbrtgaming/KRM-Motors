@extends('dashboard/template/index')
@section('title', 'Edit Car')
@section('content')


    <div class="container">
        <h4 class="modal-title font-weight-normal" id="exampleModalLabel">
            Edit Car</h4>

        <div class="card">
            <div class="card-body">
                <div class="modal-body">
                    <form action="{{ route('car_update', $cars->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="input-group input-group-outline my-3">
                                <label>Image &nbsp;</label>
                                <input type="file" name="image" value="{{ $cars->image }}">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Type</label>
                                <input type="text" class="form-control" name="type" value="{{ $cars->type }}">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" value="{{ $cars->price }}">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Year</label>
                                <input type="number" class="form-control" name="year" value="{{ $cars->year }}">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Range</label>
                                <input type="text" class="form-control" name="range" value="{{ $cars->range }}">
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label for="category">Category &nbsp;</label>
                                <select name="category">
                                    <option value="{{ $cars->category }}">
                                        {{ Str::upper($cars->category) }}</option>
                                </select>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label for="status">Status &nbsp;</label>
                                <select name="status">
                                    <option value="{{ $cars->status }}">
                                        {{ Str::upper($cars->status) }}</option>
                                    <option value="sold">SOLD</option>
                                    <option value="ready">READY</option>
                                    <option value="not_ready">NOT READY</option>
                                </select>
                            </div>
                            <div class="container">
                                <label for="specification">Specification</label>
                                <textarea id="editor" name="specification" rows="10" cols="50">{{ $cars->specification }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mt-3">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>


@endsection
