@extends('admin.auth.layout.master')

@section('content')
    <div>
        <a href="{{ route('admin.article.create') }}" class="btn btn-primary">Create</a>
    </div>
    <hr />
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Slug</th>
                <th>Name</th>
                <th>Like Count</th>
                <th>View Count</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $d->slug }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->like_count }}</td>
                    <td>{{ $d->view_count }}</td>
                    <td>
                        <a href="{{ route('admin.article.edit', $d->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.article.destroy', $d->id) }}" class="d-inline" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#id{{ $d->id }}">
                            View
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
@section('script')
    @foreach ($data as $d)
        <!-- Modal -->
        <div class="modal fade" id="id{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $d->name }}</h5>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('/images/' . $d->image) }}" class="img-thumbnail" alt="" w-100>
                        <div class="mt-3">
                            <h3>{{ $d->name }}</h3>
                            <div>{!! $d->description !!}</div>
                        </div>
                        @foreach ($d->tag as $tag)
                            <span class="badge bg-dark text-white">{{ $tag->name }}</span>
                        @endforeach
                        @foreach ($d->programming as $p)
                            <span class="badge bg-secondary text-dark">{{ $p->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
