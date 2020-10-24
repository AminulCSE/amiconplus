@extends('layouts.appadmin')
@section('content')
        <div class="row">
          <!-- Left col -->
          <div class="col-md-1"></div>
          <div class="col-md-9">
            <!-- general form elements -->
            <div class="card card-default col-xs-1 center-block">
              <div class="card-header">
                <h3 class="card-title">Add Employee</h3>
                <a href="{{ URL::to('all_employee') }}" class="float-sm-right btn btn-primary">All Employee</a>
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
              <form action="{{ URL::to('store_employee') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="type" class="form-control" name="name" id="exampleInputName" placeholder="Name Ex: Peal, Aminul....">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPhone">Phone</label>
                    <input type="type" class="form-control" name="phone" id="exampleInputPhone" placeholder="Phone Ex: +8801.......">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail">Email</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail" placeholder="Email Ex: example@gmail.com">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputDesignation">Designation</label>
                    <input type="type" class="form-control" name="designation" id="exampleInputDesignation" placeholder="Designation Ex: Manager, Technisian, Worker">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputBasicSalary">Basic Salary</label>
                    <input type="type" class="form-control" name="basic_salary" id="exampleInputBasicSalary" placeholder="Basic Salary Ex: 12345">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputAddress">Address</label>
                    <input type="type" class="form-control" name="address" id="exampleInputAddress" placeholder="Address Ex: address/example">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Image input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="exampleInputImage">
                        <label class="custom-file-label" for="exampleInputImage">Choose Image</label>
                      </div>
                    </div>
                  </div>


                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Insert Employee</button>
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
