@extends('admin.auth.layout.master')

@section('content')
    <div>
        <a href="{{ route('admin.programming.index') }}" class="btn btn-primary">All Languages</a>
    </div>
    <hr />
    <form action="{{ route('admin.programming.update', $data->slug) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" value={{ $data->name }} class="form-control">
        </div>
        <input type="submit" value="Create" class="btn btn-dark">
    </form>
@endsection
