@extends('layouts.appadmin')
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Attendance By Date</h3>
      <a href="{{ URL::to('add_attendacne_employee') }}" class="float-sm-right btn btn-primary">Take Attendance</a>

      <a href="{{ URL::to('all_attendance_employee') }}" data-toggle="modal" data-target="#modal-info" class="float-sm-right btn btn-primary mr-3">Spacific Month/Employee</a>

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
            <a href="{{ URL::to('edit_attendance_employee/'.$val->edit_date) }}" style="padding: 4px;">
              <i class="fas fa-edit"></i>
            </a>

            {{-- <a onclick="return confirm('Are your sure to delete this???')" href="{{ URL::to('delete_attendance/'.$val->edit_date) }}" style="padding: 4px;">
              <i class="fas fa-trash"></i>
            </a> --}}
          </td>
        </tr>
    @endforeach
    
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>









  {{-- Model here --}}
  <div class="modal fade" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">Select month and Employee</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <form action="{{ url('monthly_attendance_report_employee') }}" method="get">
                  <div class="col-12 col-sm-6" data-select2-id="39">
                    <div class="form-group">
                      <label>Emplyee Attendance Report</label>
                      
                      <select  name="att_month"  class="form-control select2 select2-danger select2-hidden-accessible" data-dropdown-css-class="select2-danger" style="width: 100%;" data-select2-id="12" tabindex="-1" aria-hidden="true">
                        {{-- <script>
                            var theMonths = ["January", "February", "March", "April", "May",
                                "June", "July", "August", "September", "October", "November", "December"];
                              for (i=0; i<12; i++) {

                                document.write('<option data-select2-id="45"'+'value="theMonths[i]">');
                                document.write(theMonths[i]);
                                document.write('</option>');
                              }
                          </script> --}}
                          <option value="January">January</option>
                          <option value="February">February</option>
                          <option value="March">March</option>
                          <option value="April">April</option>
                          <option value="May">May</option>
                          <option value="June">June</option>
                          <option value="July">July</option>
                          <option value="August">August</option>
                          <option value="September">September</option>
                          <option value="October">October</option>
                          <option value="November">November</option>
                          <option value="December">December</option>
                      </select>


                    </div>
                      <div class="form-group">
                      <select name="user_id" class="form-control select2 select2-danger select2-hidden-accessible" data-dropdown-css-class="select2-danger" style="width: 100%;" data-select2-id="12" tabindex="-1" aria-hidden="true">
                        @foreach($all_employees as $valemply)
                          <option data-select2-id="45" value="{{ $valemply->id }}">{{ $valemply->name }}
                            
                          </option>
                          
                        @endforeach
                      </select>
                    </div>

                    

                    <div>
                      <button type="submit" class="btn btn-primary"> Search</button>
                    </div>


                    <!-- /.form-group -->
                  </div>
              </form>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
@endsection