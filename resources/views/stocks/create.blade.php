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
                        <li class="breadcrumb-item active">Add Info</li>
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
                            <h5 class="card-title">Inventory Item</h5><br>
                            
                            <!-- form start -->
                            <form role="form" action="{{ route('stocks.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="widget-body">
                                    <div class="row">
                                        <br>
                                        <div class="col-sm-12">
                                            <div align="center" class="row"
                                                style="border: 1px solid #d0d0d0; margin-right: 2%; margin-left: 2%;">
                                                <div align="center" class="col-md-12">
                                                    <div class="form-group">
                                                        <table class="table" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th width="30%">Category</th>
                                                                    <th width="25%">Product</th>
                                                                    <th width="20%">Quantity</th>
                                                                    <th width="20%">Stock</th>
                                                                    <th width="5%"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="table_body_course">
                                                                <tr class="remove_table_tr_stock">
                                                                    <td>
                                                                        <select class="col-md-12" type="text"
                                                                            name="category_id[]" id="category">
                                                                            <option value="notSelect">-Select-</option>
                                                                            @foreach ($categories as $category)
                                                                                <option>{{ $category->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @if ($errors->has('category_id'))
                                                                            <span
                                                                                class="text-danger">{{ $errors->first('category_id') }}</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <select class="col-md-12" type="text"
                                                                            name="product_id[]" id="product">
                                                                            <option value="notSelect">-Select-</option>
                                                                            @foreach ($products as $product)
                                                                                <option>{{ $product->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @if ($errors->has('product_id'))
                                                                            <span
                                                                                class="text-danger">{{ $errors->first('product_id') }}</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control"
                                                                            name="recieved_quantity[]" id="">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" value="120"
                                                                            name="current_quantity[]" id="" readonly>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="removeEventCourse"
                                                                            style="background-color: white; border: none">
                                                                            <h4><i class="fa fa-minus-circle"
                                                                                    style="color: #ff3636;"></i></h4>
                                                                        </button>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>
                                                                        <button type="button" class="addEventCourse"
                                                                            style="background-color: white; border: none">
                                                                            <h4><i class="fa fa-plus-circle"
                                                                                    style="color: #00ff73;"></i></h4>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>
                                        Submit</button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('admin/css/custom-style.css') }}" />

    <script>
        $(document).ready(function() {
            var counter = 0;
            $(document).on("click", ".addEventCourse", function() {
                var whole_extra_item_add = `<tr class="remove_table_tr_stock">
                                                                                    <td>
                                                                                        <select class="col-xs-12 col-sm-12" name="category_id[]">
                                                                                            <option>-Select-</option>
                                                                                            @foreach ($categories as $category)
                    <option>{{ $category->name }}</option>
                                                                                            @endforeach
                    </select>
                </td>
                <td>
                                                                                        <select class="col-xs-12 col-sm-12" name="product_id[]">
                                                                                            <option>-Select-</option>
                                                                                            @foreach ($products as $product)
                    <option>{{ $product->name }}</option>
                                                                                            @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control" name="recieved_quantity[]" id="">
                </td>
                <td>
                    <input type="text" class="form-control" name="current_quantity[]" value="120" id="" readonly>
                </td>
                <td>
                    <button type="button" class="removeEventCourse" style="background-color: white; border: none"><h4><i class="fa fa-minus-circle" style="color: #ff3636;"></i></h4></button>
                </td>
            </tr>`;
                // console.log(whole_extra_item_add);
                $(".table_body_course").append(whole_extra_item_add);
                counter++;
            });

            $(document).on("click", ".removeEventCourse", function(event) {
                $(this).closest(".remove_table_tr_stock").remove();
                counter -= 1;
            });
        });
    </script>
@endsection
