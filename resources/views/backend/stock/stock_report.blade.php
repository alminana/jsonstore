@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Stock Report All</h4>

                                     

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('stock.report.pdf') }}" target="_blank" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fa fa-print"> Stock Report Print </i></a> <br>  <br>               

                    <h4 class="card-title">Stock Report </h4>
                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th><h5>Sl</h5></th>
                            <th><h5> Supplier Name</h5> </th>
                            <th><h5> Unit</h5></th>
                            <th><h5>Generic</h5> </th> 
                            <th><h5> Brand</h5></th> 
                            <th><h5> In Qty</h5></th> 
                            <th><h5> Out Qty</h5></th>  
                            <th><h5> Stock</h5> </th>
                            
                        </thead>


                        <tbody>
                        	 
                        	@foreach($allData as $key => $item)
@php
$buying_total = App\Models\Purchase::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('buying_qty');

$selling_total = App\Models\InvoiceDetail::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('selling_qty');
@endphp

    <tr>
        <td><h5>{{ $key+1}}</h5>  </td> 
        <td><h5>{{ $item['supplier']['name'] }} </h5> </td> 
        <td><h5> {{ $item['unit']['name'] }}</h5>  </td> 
        <td><h5>{{ $item['category']['name'] }} </h5> </td> 
        <td><h5>{{ $item->name }}</h5>  </td> 
        <td> <span class="btn btn-success"><h5> {{ $buying_total  }}</h5></span>  </td> 
        <td> <span class="btn btn-info"><h5>{{ $selling_total  }}</h5> </span> </td> 
        <td> <span class="btn btn-danger"><h5>{{ $item->quantity }}</h5> </span> </td> 
        
       
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