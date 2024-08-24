@extends('admin.layouts.app')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                            <li class="breadcrumb-item active">Users</li>
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
                    <a href="#" class="btn btn-primary">Create</a>
                </div>
                <div class="mt-3 table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Verified</th>
                                <th>Admin</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>john.doe@example.com</td>
                                <td>
                                    <span class="badge badge-success">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-success">
                                        <i class="fas fa-user-shield"></i>
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.user-edit', 3) }}" class="btn btn-warning btn-sm btn-edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>jane.smith@example.com</td>
                                <td>
                                    <span class="badge bg-danger">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-danger">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Michael Johnson</td>
                                <td>michael.johnson@example.com</td>
                                <td>
                                    <span class="badge bg-success">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-danger">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Emily Davis</td>
                                <td>emily.davis@example.com</td>
                                <td>
                                    <span class="badge bg-danger">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-danger">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Chris Brown</td>
                                <td>chris.brown@example.com</td>
                                <td>
                                    <span class="badge bg-success">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-danger">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this item?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

    </div>
@endsection
