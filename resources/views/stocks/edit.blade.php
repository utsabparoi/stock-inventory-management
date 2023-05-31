@extends('layouts.master')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Product Update</li>
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
              <h5 class="card-title">Edit Product</h5><br>

              <!-- form start -->
              <form role="form" action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Category <span class="text-danger">*</span></label>
                        <select class="form-control @error('category_id') has-error @enderror" name="category_id" id="category_id" >
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}"
                                        @if($category->id == $product->category_id) selected @endif>{{$product->category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{$product->name}}">
                    </div>
                    <div class="form-group">
                        <label>SKU <span class="text-danger">*</span></label>
                        <input type="text" name="sku" class="form-control" value="{{$product->sku}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Previous Image</label>
                        <img src="{{ asset($product->image) }}" alt="{{$product->title}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Image</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Cost Price($) <span class="text-danger">*</span></label>
                        <input type="text" name="cost_price" class="form-control" value="{{$product->cost_price}}">
                    </div>
                    <div class="form-group">
                        <label>Retail Price($) <span class="text-danger">*</span></label>
                        <input type="text" name="retail_price" class="form-control" value="{{$product->retail_price}}">
                    </div>
                    <div class="form-group">
                        <label>Description <span class="text-danger">*</span></label>
                        <input type="text" name="description" class="form-control" value="{{$product->description}}">
                    </div>
                    <div class="form-group">
                        <label>Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control" >
                            <option value="1" @if($product->status == 1) selected @endif>Active</option>
                            <option value="0" @if($product->status == 0) selected @endif>Inactive</option>
                        </select>
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
