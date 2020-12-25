@extends('main')


@section('stylesheets')
    <link rel="stylesheet" href="{{URL::asset('css/parsley.css')}}">
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
            <h1>Create a new blog</h1>
        <div>

        <div class="col-md-12">
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" >
            @csrf
                <div class="form-group">
                    <label for="ttile">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" class="form-control"></textarea>
                <div>

                <div class="form-group form-check form-check-inline">
                @foreach($categories as $category)
                <input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input">
                <label class="btn-margin-right form-check-label">{{ $category->name }}</label>
                @endforeach
                </div>

                <div class="form-group">
                <label for="featured_image">Featured Image</label>
                <input type="file" name="featured_image" class="form-control">
                </div>



                <button class="btn btn-primary" type="submit">Create a new blog</button>
            </form>
        </div>
    </div>

@endsection