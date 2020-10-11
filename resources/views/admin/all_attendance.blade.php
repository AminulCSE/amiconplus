@extends('layouts.appadmin')
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Attendance By Date</h3>
      <a href="{{ URL::to('add_attendacne_employee') }}" class="float-sm-right btn btn-primary">Take Attendance</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>SL.</th>
          <th>Edit Date</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
    <?php $i=0; ?>
    @foreach($all_att as $val)
    <?php $i++; ?>
        <tr>
          <td>{{ $i }}</td>
          <td>{{ $val->edit_date }}</td>


          <td>
            <input type="text" name="hourly_attendance" value="{{ $val->hourly_attendance }}">
          </td>

          <td>
            <a href="{{ URL::to('edit_attendance/'.$val->edit_date) }}" style="padding: 4px;">
              <i class="fas fa-edit"></i>
            </a>

            <a onclick="return confirm('Are your sure to delete this???')" href="{{ URL::to('delete_attendance/'.$val->edit_date) }}" style="padding: 4px;">
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