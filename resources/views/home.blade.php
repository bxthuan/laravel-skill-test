@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Products Management</div>

                <div class="panel-body">

                    {!! Form::open(['url' => 'articles', 'id'=> 'frm-product']) !!}

                    <div class="form-group">
                        {!! Form::label('product_name', 'Product name') !!}
                        {!! Form::text('product_name', null, array('id' => 'product_name', 'class' => 'form-control', 'placeholder' => 'Product name')) !!}
                    </div>
                    <div class="form-group">
                        <label for="product_name"></label>
                        {!! Form::label('quantity_in_stock', 'Quantity in stock') !!}
                        {!! Form::input('number', 'quantity_in_stock', null, array('id' => 'quantity_in_stock', 'class' => 'form-control', 'placeholder' => 'Quantity in stock')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('price', 'Price') !!}
                        {!! Form::input('number', 'price', null, array('id' => 'price', 'class' => 'form-control', 'placeholder' => 'Price')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::input('button', 'btn-submit', 'Submit', array('id' => 'btn-submit', 'class' => 'btn btn-success pull-right')) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Date time</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>

</div>
@endsection
