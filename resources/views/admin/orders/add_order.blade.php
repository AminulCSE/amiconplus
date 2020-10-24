@extends('layouts.appadmin')
@section('content')
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-default col-xs-1 center-block">
              <div class="card-header">
                <h3 class="card-title">Add Order</h3>
                <a href="{{ URL::to('all_order') }}" class="float-sm-right btn btn-primary">All Orders</a>

                <a href="{{ URL::to('add_customer') }}" class="float-sm-right btn mr-2 btn-primary">Add Customer</a>
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

              <form action="{{ URL::to('store_order') }}" method="POST" class="form-row m-3" enctype="multipart/form-data">
                @csrf
                {{-- Left side --}}
                <div class="card-body col-md-6">

                  <input type="hidden" value="{{ date('d/F/Y') }}" name="order_date">
                  <input type="hidden" value="{{ date('F') }}" name="order_month">
                  <input type="hidden" value="{{ date('Y') }}" name="order_year">

                  <div class="form-group">
                    <label for="exampleInputCustomerName">Select Customer</label>
                    <select id="exampleInputCustomerName" name="customer_id"  class="form-control select2 select2-danger select2-hidden-accessible" data-dropdown-css-class="select2-danger" style="width: 100%;" data-select2-id="12" tabindex="-1" aria-hidden="true">
                        @foreach($customers as $customer_val)
                          <option value="{{ $customer_val->id }}">{{ $customer_val->customer_name }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputDescription">Order Description</label>
                    <textarea rows="6" class="form-control" name="order_description" id="exampleInputDescription" placeholder="Ex: 1. Wooden VIP BOX Crest....."></textarea>
                  </div>

                  <div class="form-group">
                    <label for="OrderQuantity">Quantity</label>
                    <input type="number" class="form-control" name="quantity" id="OrderQuantity" placeholder="Quantity Ex: 1,2...">
                  </div>
                </div>

                {{-- Right side --}}

                <div class="card-body col-md-6">
                  <div class="form-group">
                    <label for="orderUnitPrice">Unit Price</label>
                    <input onchange="summation()" type="number" class="form-control" name="unit_price" id="orderUnitPrice" placeholder="Unit Price Ex: 1,2...">
                  </div>

                  <div class="form-group">
                    <label for="orderDiscount">Discount</label>
                    <input onchange="summation()" type="number" class="form-control" name="discount" id="orderDiscount" placeholder="Discount Ex: 1,2...">
                  </div>

                  <div class="form-group">
                    <label for="orderPaid">Paid</label>
                    <input onchange="summation()" type="number" class="form-control" name="paid" id="orderPaid" placeholder="Paid Amount Ex: 1,2...">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputDalivary_date">Delivary Date</label>
                    <input type="date" class="form-control" name="dalivary_date" id="exampleInputDalivary_date">
                  </div>

                  <p style="font-size: 22px; "class="text-success" id="total_with_discount"></p>

                  <p style="font-size: 22px; "class="text-danger" id="due"></p>


                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Place Order</button>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>

<script>
function summation()
  {
      var OrderQuantity   = document.getElementById('OrderQuantity').value;
      var orderUnitPrice  = document.getElementById('orderUnitPrice').value;
      var orderDiscount   = document.getElementById('orderDiscount').value;
      var orderPaid       = document.getElementById('orderPaid').value;

      var total_with_discount = (OrderQuantity*1) * (orderUnitPrice*1) - (orderDiscount*1);

      var due = total_with_discount-orderPaid;

      document.getElementById('total_with_discount').innerHTML = "Total = Tk " +total_with_discount;


      document.getElementById('due').innerHTML = "Due Amount = Tk " +due;

  }
</script>



            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
@endsection
