@extends('main')


@section('stylesheets')
    <link rel="stylesheet" href="{{URL::asset('css/select2.min.css')}}">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
            tinymce.init({
                selector: 'textarea',
                plugins: 'link code',
                menubar: false
            })
    </script>

@endsection

@section('content')

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Edit | {{ $blog->title }}</h1>
        <div>

        <div class="col-md-12">
            <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
                <div class="form-group">
                    <label for="ttile">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
                </div>

                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" class="form-control">{{ $blog->body}}</textarea>
                <div>

                <div class="form-group form-check form-check-inline">
                {{ $blog->category->count() ? 'Current categories ' : '' }} &nbsp;
                @foreach($blog->category as $category)
                <input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input" checked>
                <label class="btn-margin-right form-check-label">{{ $category->name }}</label>
                @endforeach
                </div>

                <div class="form-group form-check form-check-inline">
                {{ $filtered->count() ? 'Unused categories ' : '' }} &nbsp;
                @foreach($filtered as $category)
                <input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input">
                <label class="btn-margin-right form-check-label">{{ $category->name }}</label>
                @endforeach
                </div>

                <div class="form-group">
                <label for="featured_image">Featured Image</label>
                <input type="file" name="featured_image" class="form-control">
                </div>

                <button class="btn btn-primary" type="submit">Update blog</button>
            </form>
        </div>
    </div>

@endsection