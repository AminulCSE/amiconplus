@extends('layouts.appadmin')
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Monthly Attendacne Report</h3>
      <a href="{{ URL::to('all_attendance_employee') }}" class="float-sm-right btn btn-primary">All Attendacne</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>SL.</th>
          <th>Name</th>
          <th>Designation</th>
          <th>Month</th>
          <th>Attendance Date</th>
          <th>Overtime</th>
          <th>Attendance</th>
          <th>Image</th>
        </tr>
        </thead>
        <tbody>
    <?php $i=0; ?>
    @foreach($data as $val)
    <?php $i++; ?>
        <tr>
          <td>{{ $i }}</td>
          <td>{{ $val->name }}</td>
          <td>{{ $val->designation }}</td>
          <td>{{ $val->att_month }}</td>
          <td class="text-primary">{{ $val->att_date }}</td>
          <td>{{ $val->overtime }}</td>

          <td @if($val->attendance=='Present') class='text-success' @else class='text-danger '  @endif>  {{ $val->attendance }}</td>

          <td>
            <img src="{{ $val->image }}" style="height: 44px; width: 44px;">
          </td>
        </tr>
    @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection