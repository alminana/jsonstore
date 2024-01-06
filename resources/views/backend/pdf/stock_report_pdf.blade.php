@extends('admin.admin_master')
@section('admin')
<style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
            margin-top:0%;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>

 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Stock Report</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                                            <li class="breadcrumb-item active">Stock Report</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="invoice-title">
                                                    
                                                    <h3>
                                                        @foreach($setting as $set)
                                                        {{-- <img src="{{ asset('backend/assets/images/{{ $set->image }}') }}" alt="logo" height="24"/> --}}
                                                        <img src="{{ asset( $set->image ) }}" style="width:60px; height:50px">                    
                                                        {{ $set->companyname }}
                                                        @endforeach
                                                    </h3>
                                                </div>
                                                <hr>
                                                 
                                                <div class="row">
                                                    <div class="col-6 margin-left-6">
                                                        @foreach($setting as $set)
                                                        <address>
                                                           <label for="">Company Name: <strong>{{ $set->companyname }}</strong></label> <br>
                                                           <label for="">Address: <strong>{{ $set->address }}</strong></label> <br>
                                                           <label for="">Email: <strong>{{ $set->email }}</strong></label> <br>
                                                           <label for="">Contact No.: <strong>{{ $set->tel }}</strong></label> <br>
                                                           <label for="">Tin No.: <strong>{{ $set->tin }}</strong></label> <br>
                                                        </address>
                                                        @endforeach
                                                    </div>
                                                    <div class="col-6 mt-4 text-end">
                                                        <address>
                                                           
                                                        </address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

      

    <div class="row">
        <div class="col-12">
            <div>
                <div class="p-2">
                    
                </div>
                
            </div>

        </div>
    </div> <!-- end row -->





   <div class="row">
        <div class="col-12">
            <div>
                <div class="p-2">
                     
                </div>
                <div class="">
<div class="table-responsive">
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

        <thead>
        <tr>
            <td><strong>Sl </strong></td>
            <td class="text-center"><h5>Supplier Name </h5></td>
            <td class="text-center"><h5>Unit  </h5>
            </td>
            <td class="text-center"><h5>Generic</h5>
            </td>
            <td class="text-center"><h5>Brand</h5>
            </td>
            <td class="text-center"><h5>In Qty  </h5>
            </td>
            <td class="text-center"><h5>Out Qty  </h5>
            </td>
            <td class="text-center"><h5>Stock  </h5>
            </td>
            
            
        </tr>
        </thead>
        <tbody>
        <!-- foreach ($order->lineItems as $line) or some such thing here -->
        
    
        @foreach($allData as $key => $item)

 @php
$buying_total = App\Models\Purchase::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('buying_qty');

$selling_total = App\Models\InvoiceDetail::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('selling_qty');
@endphp


        <tr>
         <td class="text-center"><h5> {{ $key+1}}</h5> </td> 
         <td class="text-center"><h5> {{ $item['supplier']['name'] }} </h5></td> 
         <td class="text-center"><h5>{{ $item['unit']['name'] }}</h5>  </td> 
         <td class="text-center"><h5>{{ $item['category']['name'] }} </h5> </td> 
         <td class="text-center"><h5>{{ $item->name }}</h5>  </td> 
          <td class="text-center"><h5>{{ $buying_total }}</h5>  </td> 
           <td class="text-center"><h5>{{ $selling_total }} </h5></td> 
         <td class="text-center"><h5> {{ $item->quantity }}</h5></td> 
            
            
        </tr>
        
        @endforeach 
           
           
                            </tbody>
                        </table>
                    </div>


        @php
        $date = new DateTime('now', new DateTimeZone('Asia/Dhaka')); 
        @endphp         
        <i>Printing Time : {{ $date->format('F j, Y, g:i a') }}</i>   

                    <div class="d-print-none">
                        <div class="float-end">
                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                            <a href="#" class="btn btn-primary waves-effect waves-light ms-2">Download</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> <!-- end row -->

 




</div>
</div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>


@endsection