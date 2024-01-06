@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Inovice All</h4>

                                     

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('invoice.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> Add Inovice </i></a> <br>  <br>               

                    <h4 class="card-title">Inovice All Data </h4>
                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Invoice No </th>
                            <th>Customer Name</th> 
                            <th>Date </th>
                            <th>Cashier</th>  
                            <th>Amount</th>
                            <th>Action</th>
                        </thead>


                        <tbody>
                        	 
                        	@foreach($allData as $key => $item)
            <tr>
                <td><h5>#{{ $item->invoice_no }}</h5>  </td>
                <td><h5>{{ $item['payment']['customer']['name'] }} </h5> </td> 
                <td><h5>{{ $item->created_at }}</h5>  </td> 
                 
                  
                 <td> <h5>{{ $item->description }}</h5>  </td> 

                <td> <h5> ₱ {{ $item['payment']['total_amount'] }}</h5> </td>
                <td>
     <a href="{{ route('print.invoice',$item->id) }}" class="btn btn-danger sm" title="Print Invoice" >  <i class="fa fa-print"></i> </a>
                </td>
            </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                     
                        
                    </div> <!-- container-fluid -->
                </div>
 

@endsection