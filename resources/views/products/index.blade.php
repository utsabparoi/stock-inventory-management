@extends('layouts.master')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Products</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Product list</li>
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

              <a href="{{route('products.create')}}" class="btn btn-sm btn-primary">
                <i class="fa fa-plus"></i> Add Product
              </a><br><br>
              <h4 class="card-title">Product list</h4>
              <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>#SL</th>
                        <th>Name</th>
                        <th>Category</th>

                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @if($products)
                    @foreach($products as $key => $product)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $product->name ?? ''}}</td>
                            <td>{{ $product->category->name ?? ''}}</td>

                            <td class="text-center">
                                <a href="{{ route('products.show', $product->id)}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-eye"></i> Show
                                </a>
                                <a href="{{ route('products.edit', $product->id)}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i> Edit
                                </a>

                                <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="product-delete-{{$product->id}}">
                                    <i class="fa fa-trash"></i> Delete
                                </a>

                                <form id="product-delete-{{$product->id}}" action="{{ route('products.destroy', $product->id)}}" method="post">
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
