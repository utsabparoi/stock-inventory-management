@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Contact List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Contact list</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">

                            <h4 class="card-title">Contact list</h4>

                            <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Query/Message</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($allContact)
                                        @foreach ($allContact as $key => $item)
                                            <tr>
                                                <td>{{ ++$key }}</th>
                                                <td>{{ $item->name ?? '' }}</th>
                                                <td>{{ $item->address ?? '' }}</th>
                                                <td>{{ $item->email ?? '' }}</th>
                                                <td>{{ $item->message ?? '' }}</th>
                                                <td class="text-center">
                                                    <a href="javascript:;" class="btn btn-sm btn-danger sa-delete"
                                                        data-form-id="category-delete-{{ $item->id }}">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>

                                                    <form id="category-delete-{{ $item->id }}"
                                                        action="{{ route('delete_contact', $item->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    </th>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection
