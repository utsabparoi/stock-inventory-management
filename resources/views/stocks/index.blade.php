@extends('layouts.master')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Stocks</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Stocks list</li>
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

              <a href="{{route('stocks.create')}}" class="btn btn-sm btn-primary">
                <i class="fa fa-plus"></i> Add Product
              </a><br><br>
              <h4 class="card-title">Product list</h4>
              <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>#SL</th>
                        <th class="text-center">Category</th>
                        <th>Product</th>
                        <th>Recieved Quantity</th>
                        <th>Current Quantity</th>

                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @if($stocks)
                    @foreach($stocks as $key => $stock)
                        <tr>
                            <td>{{ ++$key }}</td>
                            
                            <td>{{ $stock->category->name ?? ''}}</td>
                            <td>{{ $stock->product->name ?? ''}}</td>
                            <td>{{ $stock->recieved_quantity ?? ''}}</td>
                            <td>{{ $stock->current_quantity ?? ''}}</td>

                            <td class="text-center">
                                <a href="{{ route('stocks.show', $stock->id)}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-eye"></i> Show
                                </a>
                                <a href="{{ route('stocks.edit', $stock->id)}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i> Edit
                                </a>

                                <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="stock-delete-{{$stock->id}}">
                                    <i class="fa fa-trash"></i> Delete
                                </a>

                                <form id="stock-delete-{{$stock->id}}" action="{{ route('stocks.destroy', $stock->id)}}" method="post">
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
