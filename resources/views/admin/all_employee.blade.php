@extends('layouts.appadmin')
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">All Employee</h3>
      <a href="{{ URL::to('add_employee') }}" class="float-sm-right btn btn-primary">All Employee</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>SL.</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Designation</th>
          <th>Address</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
    <?php $i=0; ?>
    @foreach($data as $val)
    <?php $i++; ?>
        <tr>
          <td>{{ $i }}</td>
          <td>{{ $val->name }}</td>
          <td>{{ $val->phone }}</td>
          <td>{{ $val->email }}</td>
          <td>{{ $val->designation }}</td>
          <td>{{ $val->address }}</td>
          <td>
            <img src="{{ $val->image }}" style="height: 44px; width: 44px;">
          </td>
          <td>
            <a href="{{ URL::to('edit_employee/'.$val->id) }}" style="padding: 4px;">
              <i class="fas fa-edit"></i>
            </a>

            <a onclick="return confirm('Are your sure to delete this???')" href="{{ URL::to('delete_employee/'.$val->id) }}" style="padding: 4px;">
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