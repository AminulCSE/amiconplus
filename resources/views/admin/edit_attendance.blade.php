@extends('layouts.appadmin')
@section('content')
  <div class="card">
    <!-- /.card-header -->

    <div class="card">
    <div class="card-header">
      <h3 class="card-title">Update Attendance</h3>
      <a href="{{ URL::to('all_attendance') }}" class="float-sm-right btn btn-primary">All Attendance</a>

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
      <form role="form" action="{{ URL::to('update_employee_attendance') }}" method="POST">
        @csrf
        <table class="table table-sm">
          <thead>
          <tr>
            <th>SL.</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>


      <h3 style="color: green; font-weight: bold;">Edit Date: {{ $date_update->edit_date }}</h3>
        

      <?php $i=0; ?>
      @foreach($db_edit as $val)
      <?php $i++; ?>
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $val->name }}</td>
            <input type="hidden" name="id[]" value="{{ $val->id }}">

            <td>{{ $val->designation }}</td>

            <td>
              <img src="{{ URL::to($val->image) }}" style="height: 44px; width: 44px;">
            </td>

            <input type="hidden" name="att_date" value="{{ date('d/m/y') }}">
            <input type="hidden" name="att_year" value="{{ date('Y') }}">
            <input type="hidden" name="att_month" value="{{ date('F') }}">

            <td>
              <label  for="{{ $val->id }}">Present</label>
                  <input  type="radio" name="attendance[{{$val->id}}]" @php if($val->attendance=='Present'){echo ('checked=""');} @endphp value="Present" id="{{ $val->id }}">
                  ||

              <label for="{{ $val->id+199000 }}">Absent</label>
                  <input  type="radio" name="attendance[{{$val->id}}]" @php if($val->attendance=='Absent'){echo ('checked=""');} @endphp value="Absent" id="{{$val->id+199000}}">
            </td>

          </tr>
      @endforeach
          </tbody>
        </table>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
@endsection