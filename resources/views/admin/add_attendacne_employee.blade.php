@extends('layouts.appadmin')
@section('content')
  <div class="card">
    <!-- /.card-header -->

    <div class="card">
    <div class="card-header">
      <h3 class="card-title">Take Attendance</h3>
      <a href="{{ URL::to('all_attendance_employee') }}" class="float-sm-right btn btn-primary">All Attendance</a>
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
    <div class="card-body">
      <form role="form" action="{{ URL::to('store_attendance_employee') }}" method="POST">
        @csrf
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>SL.</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Image</th>
            {{-- <th>Hourly Att</th> --}}
            <th>Overtime</th>
            <th>Attendance</th>
          </tr>
          </thead>
          <tbody>


        <h3 style="color: green; font-weight: bold;">Today: <?php echo date('F/d/Y') ?>
        </h3>
        

      

      <?php $i=0; ?>
      @foreach($data as $val)
      <?php $i++; ?>
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $val->name }}</td>
            <input type="hidden" name="user_id[]" value="{{ $val->id }}">

            <td>{{ $val->designation }}</td>

            <td>
              <img src="{{ $val->image }}" style="height: 44px; width: 44px;">
            </td>

            {{-- <td>
              <label for="hourly_attendance">Hourly attendance: </label>
              <input id="hourly_attendance" type="text" name="hourly_attendance" placeholder="If Duty is Hourly.">
            </td> --}}

            <input type="hidden" name="att_date" value="{{ date('d/m/y') }}">
            <input type="hidden" name="att_year" value="{{ date('Y') }}">
            <input type="hidden" name="att_month" value="{{ date('F') }}">

            <td>
              <input type="text" name="overtime[{{$val->id}}]">
            </td>

            <td>
              <label  for="{{ $val->id }}">Present</label>

                  <input  type="radio" name="attendance[{{$val->id}}]" value="Present" required="" id="{{ $val->id }}">
                  || 
              <label for="{{ $val->id+199000 }}">Absent</label>

                  <input  type="radio" name="attendance[{{$val->id}}]" value="Absent" required="" id="{{$val->id+199000}}">
            </td>

          </tr>
      @endforeach
          </tbody>
        </table>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
    </div>
    <!-- /.card-body -->
  </div>

@endsection











        