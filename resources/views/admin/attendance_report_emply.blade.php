@extends('layouts.appadmin')
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Attendance Employee By Monthly</h3>
      <a href="{{ URL::to('all_employee') }}" class="float-sm-right btn btn-primary">All Employee</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>SL.</th>
          <th>Name</th>
          <th>Designation</th>
          <th>Absent Days</th>
          <th>Month</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
    <?php $i=0; ?>
    <?php $i++; ?>
        <tr>
          <td>{{ $i }}</td>
          <td>{{ $val->name }}</td>
          <td>{{ $val->designation }}</td>
          
              {{-- Absent status here --}}
          
          <td>
            @php $count=0; @endphp
          @foreach($att_status as $attst)
              @php $count++; @endphp
          @endforeach
          {{ $count }} Days
          </td>

          <td>{{ $val->att_month }}</td>

          <td>
            <img src="{{ asset($val->image) }}" style="height: 44px; width: 44px;">
          </td>
          <td>
            <a href="{{ URL::to('edit_employee/'.$val->id) }}" style="padding: 4px;">
              <i class="fas fa-edit"></i>
            </a>

            <a onclick="return confirm('Are your sure to delete this???')" href="{{ URL::to('delete_employee/'.$val->id) }}" style="padding: 4px;">
              <i class="fas fa-trash"></i>
            </a>

            <a href="{{ URL::to('attendance/'.$val->id) }}"style="padding: 4px;">
              <i class="fab fa-app-store-ios"></i>
            </a>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection