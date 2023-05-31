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
            <li class="breadcrumb-item active">Infromation Update</li>
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
        <div class="col-lg-6">
          <div class="card card-primary card-outline">
            <div class="card-body">
              <h5 class="card-title">Edit Category</h5><br>

              <!-- form start -->
              <form role="form" action="{{ route('about_us.update', $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input name="title" type="text" class="form-control" placeholder="Enter Title" value="{{$data->title}}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Previous Image</label>
                    <img src="{{ asset($data->image) }}" alt="{{$data->title}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input name="image" type="file" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input name="description" type="text" class="form-control" placeholder="Enter Description" value="{{$data->description}}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Update</button>
                </div>
              </form>
            </div>
          </div><!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->

@endsection
