@extends('layouts.appadmin')
@section('content')
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-default col-xs-1 center-block">
              <div class="card-header">
                <h3 class="card-title">Edit Order</h3>
                <a href="{{ URL::to('all_order') }}" class="float-sm-right btn btn-primary">All Order</a>
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
              <form action="{{ URL::to('update_order/'.$data->id) }}" method="POST" enctype="multipart/form-data" class="form-row m-3">
                @csrf
                {{-- Left side --}}
                <div class="card-body col-md-6">
                  <div class="form-group">
                    <label for="exampleInputCustomerName">Select Customer</label>
                    <select id="exampleInputCustomerName" name="customer_id"  class="form-control select2 select2-danger select2-hidden-accessible" data-dropdown-css-class="select2-danger" style="width: 100%;" data-select2-id="12" tabindex="-1" aria-hidden="true">
                        @foreach($customerdata as $customer_val)
                          <option @if($customer_val->id == $data->customer_id) selected="" @endif value="{{ $customer_val->id }}">{{ $customer_val->customer_name }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputDescription">Order Description</label>
                    <textarea rows="6" class="form-control" name="order_description" id="exampleInputDescription">{{ $data->order_description }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="OrderQuantity">Quantity</label>
                    <input type="number" class="form-control" name="quantity" id="OrderQuantity" value="{{ $data->quantity }}">
                  </div>

                  <div class="form-group">
                    <label for="orderUnitPrice">Unit Price</label>
                    <input type="number" class="form-control" name="unit_price" id="orderUnitPrice" value="{{ $data->unit_price }}">
                  </div>
                </div>

                {{-- Right side --}}

                <div class="card-body col-md-6">
                  <div class="form-group">
                    <label for="orderDiscount">Discount</label>
                    <input type="number" class="form-control" name="discount" id="orderDiscount" value="{{ $data->discount }}">
                  </div>

                  <div class="form-group">
                    <label for="orderPaid">Paid</label>
                    <input type="number" class="form-control" name="paid" id="orderPaid" value="{{ $data->paid }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputDalivary_date">Delivary Date</label>
                    <input type="date" class="form-control" name="dalivary_date" id="exampleInputDalivary_date" value="{{ $data->dalivary_date }}">
                  </div>



                  <div class="form-group">
                    <label for="exampleInputDelivaryStatus">Order Status</label>
                    <select id="exampleInputDelivaryStatus" name="order_status"  class="form-control select2 select2-danger select2-hidden-accessible" data-dropdown-css-class="select2-danger" style="width: 100%;" data-select2-id="12" tabindex="-1" aria-hidden="true">
                          
                          <option class="text-danger" @if($data->order_status == '0') selected="" @endif value="0">Pending
                          </option>

                          <option class="text-success" @if($data->order_status == '1') selected="" @endif value="1">Completed
                          </option>
                          


                    </select>
                  </div>












                  <p style="font-size: 22px;"><strong class="text-success">Total: </strong> <span class="text-primary">{{ $total = ($data->unit_price*$data->quantity) }}</span> Tk
                  </p>

                  <p style="font-size: 22px;"><strong class="text-warning">Discount: </strong> <span class="text-primary"> -{{ $discount = $data->discount }}</span> Tk
                  </p>

                  <p style="font-size: 22px;"><strong class="text-success">Paid/ Advanced: </strong> <span class="text-primary"> -{{$data->paid }}</span> Tk
                  </p>

                  <hr style="background-color: red;">

                  <p style="font-size: 22px;"><strong class="text-danger">Due: </strong>
                    <span class="text-primary">{{ ($total-$data->paid)-$data->discount }}</span> Tk
                  </p>


                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Order</button>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
@endsection
