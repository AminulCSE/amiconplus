@extends('layouts.appadmin')
@section('content')
        <div class="row">
          <!-- Left col -->
          <div class="col-md-1"></div>
          <div class="col-md-9">
            <!-- general form elements -->
            <div class="card card-default col-xs-1 center-block">
              <div class="card-header">
                <h3 class="card-title">Edit Customer</h3>
                <a href="{{ URL::to('all_customer') }}" class="float-sm-right btn btn-primary">All Customer</a>
              </div>
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ URL::to('update_customer/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputCustomerName">Customer Name</label>
                    <input type="type" class="form-control" name="customer_name" id="exampleInputCustomerName" value="{{ $data->customer_name }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputCustomerPhone">Customer Phone</label>
                    <input type="type" class="form-control" name="customer_phone" id="exampleInputCustomerPhone" value="{{ $data->customer_phone }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputCustomerEmail">Customer Email</label>
                    <input type="email" class="form-control" name="customer_email" id="exampleInputCustomerEmail" value="{{ $data->customer_email }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputCustomerAddress">Customer Address</label>
                    <input type="type" class="form-control" name="customer_address" id="exampleInputCustomerAddress" value="{{ $data->customer_address }}">
                  </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Customer</button>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-1"></div>
          <!-- /.col -->
        </div>
@endsection
