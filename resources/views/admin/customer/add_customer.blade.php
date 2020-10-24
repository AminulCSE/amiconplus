@extends('layouts.appadmin')
@section('content')
        <div class="row">
          <!-- Left col -->
          <div class="col-md-1"></div>
          <div class="col-md-9">
            <!-- general form elements -->
            <div class="card card-default col-xs-1 center-block">
              <div class="card-header">
                <h3 class="card-title">Add Customer</h3>
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
              <form action="{{ URL::to('store_customer') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputCustomer_name">Customer Name</label>
                    <input type="type" class="form-control" name="customer_name" id="exampleInputCustomer_name" placeholder="Customer Name Ex: Peal, Aminul....">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPhone">Customer Phone</label>
                    <input type="type" class="form-control" name="customer_phone" id="exampleInputPhone" placeholder="Phone Ex: +8801.......">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputCustomerEmail">Customer Email</label>
                    <input type="email" class="form-control" name="customer_email" id="exampleInputCustomerEmail" placeholder="Customer Email Ex: example@gmail.com">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputCustomerAddress">Customer Address</label>
                    <input type="type" class="form-control" name="customer_address" id="exampleInputCustomerAddress" placeholder="Customer Address Ex: address/example">
                  </div>


                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Insert Customer</button>
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
