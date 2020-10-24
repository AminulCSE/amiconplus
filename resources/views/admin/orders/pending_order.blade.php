@extends('layouts.appadmin')
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Pending Order</h3>
      <a href="{{ URL::to('all_order') }}" class="float-sm-right btn btn-primary">All Order</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>SL.</th>
          <th>Customer Name</th>
          <th>Customer Phone</th>
          <th>Order Details</th>
          <th>Quantity</th>
          <th>Unit Price</th>
          <th>Discount</th>
          <th>Paid</th>
          <th>Delivary Date</th>
          <th>Order Status</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
    <?php $i=0; ?>
    @foreach($all_pending_order as $val)
    <?php $i++; ?>
        <tr>
          <td>{{ $i }}</td>
          <td>{{ $val->customer_name }}</td>
          <td>{{ $val->customer_phone }}</td>
          <td>{{ $val->order_description }}</td>
          <td>{{ $val->quantity }}</td>
          <td>{{ $val->unit_price }}</td>
          <td>{{ $val->discount }}</td>
          <td>{{ $val->paid }}</td>
          <td>{{ $val->dalivary_date }}</td>
          <td>
            @if($val->order_status=='0')
            <span class="badge bg-danger">Pending</span>
            @else
            <span class="badge bg-success">Delivered</span>
            @endif
          </td>
          <td>
            <a href="{{ URL::to('edit_order/'.$val->id) }}" style="padding: 4px;">
              <i class="fas fa-edit"></i>
            </a>

            <a onclick="return confirm('Are your sure to delete this???')" href="{{ URL::to('delete_order/'.$val->id) }}" style="padding: 4px;">
              <i class="fas fa-trash"></i>
            </a>
          </td>
        </tr>
    @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection