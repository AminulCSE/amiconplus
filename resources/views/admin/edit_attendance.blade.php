@extends('layouts.appadmin')
@section('content')
  <div class="card">
    <!-- /.card-header -->

    <div class="card">
    <div class="card-header">
      <h3 class="card-title">Update Attendance</h3>
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
      <form role="form" action="{{ URL::to('update_attendance_employee') }}" method="POST">
        @csrf
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>SL.</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Attendance Date</th>
            <th>Attendance Year</th>
            <th onmouseover="allmongth()">Attendance Month</th>
            <th>Overtime</th>
            <th>Attendance</th>
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
              <input type="text" name="att_date[{{$val->id}}]" value="{{ $val->att_date }}">
            </td>

            <td>
              <input type="text" name="att_year[{{$val->id}}]" value="{{ $val->att_year }}">
            </td>
            <td>
              <select name="att_month[{{$val->id}}]">
                  <option @if( $val->att_month=='January') selected="" @endif value="January">January</option>
                  <option @if( $val->att_month=='February') selected="" @endif value="February">February</option>
                  <option @if( $val->att_month=='March') selected="" @endif value="March">March</option>
                  <option @if( $val->att_month=='April') selected="" @endif value="April">April</option>
                  <option @if( $val->att_month=='May') selected="" @endif value="May">May</option>
                  <option @if( $val->att_month=='June') selected="" @endif value="June">June</option>
                  <option @if( $val->att_month=='July') selected="" @endif value="July">July</option>
                  <option @if( $val->att_month=='August') selected="" @endif value="August">August</option>
                  <option @if( $val->att_month=='September') selected="" @endif value="September">September</option>
                  <option @if( $val->att_month=='October') selected="" @endif value="October">October</option>
                  <option @if( $val->att_month=='November') selected="" @endif value="November">November</option>
                  <option @if( $val->att_month=='December') selected="" @endif value="December">December</option>
              </select>
            </td>

            <td>
              <input type="text" name="overtime[{{$val->id}}]" value="{{ $val->overtime }}">
            </td>

            <td>

              
              {{-- Friday or not --}}
              
              <label  for="{{ $val->id }}">Present</label>
                  <input  type="radio" name="attendance[{{$val->id}}]" @php if($val->attendance=='Present'){echo ('checked=""');} @endphp value="Present" id="{{ $val->id }}">
                  ||

              <label for="{{ $val->id+199000 }}">Absent</label>
                  <input  type="radio" name="attendance[{{$val->id}}]" @php if($val->attendance=='Absent'){echo ('checked=""');} @endphp value="Absent" id="{{$val->id+199000}}">

              ||

              <label for="{{ $val->id+8589000 }}">Friday</label>
                  <input  type="radio" name="attendance[{{$val->id}}]" @php if($val->attendance=='Friday'){echo ('checked=""');} @endphp value="Friday" id="{{$val->id+8589000}}">
            </td>

          </tr>
      @endforeach
      @php



      @endphp
          </tbody>
        </table>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
      </form>
    </div>
    <!-- /.card-body -->
  </div>     
@endsection