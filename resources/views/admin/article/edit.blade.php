@extends('admin.auth.layout.master')

@section('css')
    <!-- include summernote css/js -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('script')
    <!-- include libraries(jQuery, bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            //for summernote
            $('#description').summernote({
                tabsize: 2,
                height: 100
            });

            // Initialize Select2 for the 'tag' and 'programming' selects
            $('#tag').select2();
            $('#programming').select2();
        });
    </script>
@endsection

@section('content')
    <div>
        <a href="{{ route('admin.article.index') }}" class="btn btn-primary">All Articles</a>
    </div>
    <hr />
    <form action="{{ route('admin.article.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Choose tags</label>
            <select name="tag[]" id="tag" multiple>
                @foreach ($tag as $t)
                    <option value="{{ $t->id }}"
                        @foreach ($data->tag as $tag)
                        @if ($tag->id == $t->id)
                        selected
                        @endif @endforeach>
                        {{ $t->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Choose programming</label>
            <select name="programming[]" id="programming" multiple>
                @foreach ($programming as $p)
                    <option value="{{ $p->id }}"
                        @foreach ($data->programming as $programming)
                        @if ($programming->id == $p->id)
                        selected
                        @endif @endforeach>
                        >{{ $p->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="name" class="form-control" value="{{ $data->name }}">
        </div>
        <div class="form-group">
            <label for="">Image</label>
            <img src="{{ asset('/images/' . $data->image) }}" width="200px" class="img-thumbnail" />
            <input type="file" name="new_image" class="form-control-file mt-2">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" id="description">{!! $data->description !!}</textarea>
        </div>
        <input type="submit" value="Update" class="btn btn-dark">
    </form>
@endsection
