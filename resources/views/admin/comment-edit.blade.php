@extends('admin.layouts.app')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Comments</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                            <li class="breadcrumb-item active">
                                <a href="{{ route('admin.comments') }}">Comments</a>
                            </li>
                            <li class="breadcrumb-item active">Edit</li>
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
                    <a href="{{ route('admin.comments') }}" class="btn btn-primary">Back</a>
                </div>
                <form action="#" method="POST" class="px-4 py-5 mt-3 border rounded">
                    <div class="form-group">
                        <label for="comment_text">Comment</label>
                        <textarea id="comment_text" name="comment_text" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                </form>
            </div>
    </div>
@endsection
