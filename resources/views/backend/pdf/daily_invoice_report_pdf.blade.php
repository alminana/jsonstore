@extends('admin.admin_master')
@section('admin')
<style>
        body{
            background-color: white; 
            margin: 0;
            padding: 0;
            margin-top:0;
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
                    <div class="brand-section">
            <div class="row">
            @foreach($setting as $set) 
                <div class="col-6 mt-3" >               
                        <h1 class="text-white">                     
                            <img src="{{ asset( $set->image ) }}" style="width:60px; height:50px">
                            {{ $set->companyname }}
                        </h1>                   
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">{{ $set->companyname }}</p>
                        <p class="text-white">{{ $set->address }}</p>
                        <p class="text-white">{{ $set->tel }}</p>
                        <p class="text-white ">{{ $set->tin }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

      

    <div class="row">
        <div class="col-12">
            <div>
                <br/>
                <div class="p-2">
                    <h3 class="font-size-16"><strong>Daily Invoice Report 
    <span class="btn btn-info"> {{ date('d-m-Y',strtotime($start_date)) }} </span> -
     <span class="btn btn-success"> {{ date('d-m-Y',strtotime($end_date)) }} </span>
                    </strong></h3>
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
    <table class="table">
        <thead>
        <tr>
            <td class="text-center" ><h5>Invoice No  </h5>
            </td>
            <td class="text-center"><h5>Date</h5>
            </td>
            <td class="text-center"><h5>User</h5>
            </td>
            <td class="text-center"><h5>Amount  </h5>
            </td>
            
            
        </tr>
        </thead>
        <tbody>
        <!-- foreach ($order->lineItems as $line) or some such thing here -->
        
      @php
        $total_sum = '0';
        @endphp
        @foreach($allData as $key => $item)
        <tr>
            <td class="text-center"><h5>#{{ $item->invoice_no }}</h5> </td>
            <td class="text-center"><h5>{{ date('d-m-Y',strtotime($item->date)) }}</h5> </td>
            <td class="text-center"><h5>{{ $item->description }}</h5> </td>
            <td class="text-center"><h5>{{ $item['payment']['total_amount'] }}</h5> </td>
            
            
        </tr>
         @php
        $total_sum += $item['payment']['total_amount'];
        @endphp
        @endforeach
            
           
           
            <tr>
                <td class="no-line"></td> 
                <td class="no-line"></td>
                <td class="no-line text-center">
                    <h5>Grand Amount</h5></td>
                <td class="text-center"><h5 class="m-0">${{ $total_sum}}</h5></td>
            </tr>
                            </tbody>
                        </table>
                    </div>

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