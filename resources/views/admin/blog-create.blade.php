@extends('admin.layouts.app')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Blogs</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                            <li class="breadcrumb-item active">
                                <a href="{{ route('admin.blogs') }}">Blogs</a>
                            </li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content mt-lg-1">
            <div class="container-fluid">
                <div>
                    <a href="{{ route('admin.blogs') }}" class="btn btn-primary">Back</a>
                </div>
                <form action="#" method="POST" class="px-4 py-5 mt-3 border rounded">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="name" class="form-control" value="John Doe" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-select">
                            <option selected>Open this select menu</option>
                            <option value="1">Backend</option>
                            <option value="2">Fullstack</option>
                            <option value="3">Frontend</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_publised" id="is_published">
                            <label class="form-check-label" for="is_publised">
                                Published
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Create</button>
                </form>
            </div>
    </div>
    <script>
        ClassicEditor.create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
