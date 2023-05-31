@extends('layouts.master')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">About Us</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Informations</li>
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

              <a href="{{route('about_us.create')}}" class="btn btn-sm btn-primary">
                <i class="fa fa-plus"></i> Add Infos
              </a><br><br>
              <h4 class="card-title">Information list</h4>
              <!-- <example-component></example-component> -->
              <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>#SL</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th width="45%">Description</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @if($data)
                    @foreach($data as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</th>
                            <td>{{ $item->title ?? ''}}</th>
                            <td>
                                <img src="{{ asset($item->image) }}" alt="not found" width="80px">
                            </td>
                            <td>{{ $item->description ?? ''}}</th>
                            <td class="text-center">
                                <a href="{{ route('about_us.edit', $item->id)}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i> Edit
                                </a>

                                <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="item-delete-{{$item->id}}">
                                    <i class="fa fa-trash"></i> Delete
                                </a>

                                <form id="item-delete-{{$item->id}}" action="{{ route('about_us.destroy', $item->id)}}" method="post">
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
