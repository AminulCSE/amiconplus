@extends('layouts.appadmin')
@section('content')
        {{-- Top bar section --}}
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cart-arrow-down"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Today Sale</span>
                <span class="info-box-number">
                  @php $sum=0 @endphp

                  @foreach($today_sale as $todaysaleval)
                    @php
                    $todaysaleamount = ($todaysaleval->quantity)*($todaysaleval->price)-$todaysaleval->discount;
                    $sum += $todaysaleamount;
                    @endphp
                  @endforeach

                  {{ $sum }}

                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                
                <span class="info-box-text">Total Sale</span>
                @php $monthsale=0 @endphp
                <span class="info-box-number">

                  @foreach($total_sale as $totalsale)
                    @php
                    $total = ($totalsale->quantity)*($totalsale->price)-$totalsale->discount;
                    $monthsale += $total;
                    @endphp
                  @endforeach

                  {{ $monthsale }}
              </span>
                
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pending Orders</span>
                
                <span class="info-box-number">
                  {{ count($orderstatus) }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-cart-arrow-down"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">All Order</span>
                <span class="info-box-number">{{ count($allorder) }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->



        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Employee List</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
       <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>SL.</th>
          <th>Customer Name</th>
          <th>Order Details</th>
          <th>Total Price</th>
          <th>Delivary Date</th>
          <th>Order Status</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
    <?php $i=0; ?>
    @foreach($all_order as $val)
    <?php $i++; ?>
        <tr>
          <td>{{ $i }}</td>
          <td>{{ $val->customer_name }}</td>
          <td>{{ $val->name }}</td>
          <td>
            T: {{ $total_price = ($val->quantity)*($val->price)-$val->discount }}<br>
            <span class="text-primary">P: {{ $total_paid = $val->paid }}</span>
            <br>
            <span class="text-danger">D: {{ $due = $total_price-$val->paid }}</span>
          </td>
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
          </td>
        </tr>
    @endforeach
        </tbody>
      </table>
                  {{ $all_order->links() }}
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="{{ url('all_order') }}" class="btn btn-sm btn-secondary float-right">View All Employee</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            <h2>Pending orders</h2>
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Inventory</span>
                <span class="info-box-number">5,200</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Mentions</span>
                <span class="info-box-number">92,050</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Downloads</span>
                <span class="info-box-number">114,381</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="far fa-comment"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Direct Messages</span>
                <span class="info-box-number">163,921</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

            
            <!-- /.card -->

            <!-- PRODUCT LIST -->
        
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
@endsection
