@extends('layouts.appadmin')
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">All Customers</h3>
      <a href="{{ URL::to('add_customer') }}" class="float-sm-right btn btn-primary">Add Customer</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>SL.</th>
          <th>Customer Name</th>
          <th>Customer Phone</th>
          <th>Customer Email</th>
          <th>Customer Address</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
    <?php $i=0; ?>
    @foreach($data as $val)
    <?php $i++; ?>
        <tr>
          <td>{{ $i }}</td>
          <td>{{ $val->customer_name }}</td>
          <td>{{ $val->customer_phone }}</td>
          <td>{{ $val->customer_email }}</td>
          <td>{{ $val->customer_address }}</td>
          <td>
            <a href="{{ URL::to('edit_customer/'.$val->id) }}" style="padding: 4px;">
              <i class="fas fa-edit"></i>
            </a>

            <a onclick="return confirm('Are your sure to delete this???')" href="{{ URL::to('delete_customer/'.$val->id) }}" style="padding: 4px;">
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