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
                        <p class="text-white">{{ $set->tin }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        @php
            $payment = App\Models\Payment::where('invoice_id',$invoice->id)->first();
        @endphp   
        
        <div class="body-section">
        
    @php
    $payment = App\Models\Payment::where('invoice_id',$invoice->id)->first();
    @endphp                    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                            <a href="{{ route('invoice.pending.list') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fa fa-list"> Pending Invoice List </i></a> <br>  <br>               
                            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Invoice No.:{{ $invoice->invoice_no }}</h2>
                    <h2 class="heading">Cashier :{{ $invoice->description  }} </h2>
                    <h2 class="heading">Order Date: {{ $invoice->created_at  }} </h2>
                </div>
                <div class="col-6">
                    <h2 class="heading">Full Name: {{ $payment['customer']['name'] }} </h2>
                    <h2 class="heading">Phone Number:  {{ $payment['customer']['mobile_no']  }}</h2>
                    <h2 class="heading"> {{ $payment['customer']['email']  }} </h2>
                </div>
            </div>
      

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                 
                                    <h4 class="mb-sm-0">   <br/> Invoice Approve</h4>

                                     

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                                    <!-- <table class="table table-dark" width="100%">
                                        <tbody>
                                            <tr>
                                                <td><p> Customer Info </p></td>
                                                <td><p> Name: <strong> {{ $payment['customer']['name']  }} </strong> </p></td>
                                                <td><p> Mobile: <strong> {{ $payment['customer']['mobile_no']  }} </strong> </p></td>
                                                <td><p> Email: <strong> {{ $payment['customer']['email']  }} </strong> </p></td>                
                                            </tr>

                                            <tr>
                                            <td></td>
                                            <td colspan="3"><p> Cashier : <strong> {{ $invoice->description  }} </strong> </p></td>
                                            </tr>
                                        </tbody>
                                        
                                    </table>     -->


                                    <form method="post" action="{{ route('approval.store',$invoice->id) }}">
                                    @csrf         
                                        <table border="1" class="table table-gray" width="100%">
                                            <thead>
                                                <tr>
                                                    
                                                    <th class="text-center" style="color:black"><h5 class="mb-sm-0">Generic Name</h5> </th>
                                                    <th class="text-center" style="background-color: green; color:black;"><h5 class="mb-sm-0">Current Stock</h5></th>
                                                    <th class="text-center"><h5 class="mb-sm-0">Quantity</h5> </th>
                                                    <th class="text-center"><h5 class="mb-sm-0">SRP Price</h5> </th>
                                                    <th class="text-center"><h5 class="mb-sm-0">Expiration</h5> </th>
                                                    <th class="text-center"><h5 class="mb-sm-0">Total Price</h5> </th>
                                                </tr>
                                                
                                            </thead>
                                            <tbody>
                                                @php
                                                $total_sum = '0';
                                                @endphp
                                                @foreach($invoice['invoice_details'] as $key => $details)
                                                <tr>
                                                    
                                                  
                                                    <input type="hidden" name="product_id[]" value="{{ $details->product_id }}">
                                                    <input type="hidden" name="selling_qty[{{$details->id}}]" value="{{ $details->selling_qty }}">

                                            
                                                    <td class="text-center"><h5>{{ $details['product']['name'] }}</h5> </td>
                                                    <td class="text-center" style="background-color: #de556f"><h5>{{ $details['product']['quantity'] }}</h5> </td>
                                                    <td class="text-center"><h5>{{ $details->selling_qty }}</h5> </td>
                                                    <td class="text-center"><h5>{{ $details->srp_price }}</h5></td>
                                                    <td class="text-center"><h5>{{ $details->expiration }}</h5></td>
                                                    <td class="text-center"><h5>{{ $details->selling_price }}</h5></td>
                                                    
                                                </tr>
                                                @php
                                                $total_sum += $details->selling_price;
                                                @endphp
                                                @endforeach
                                                <tr>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                    <td class="text-center" colspan="1"><h5>Vat%</h5></td>
                                                    <td class="text-center"> 
                                                   <h5>₱ {{ $payment->Vat }} </h5> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                    <td class="text-center" colspan="1"><h5>Sub Total</h5>  </td>
                                                    <td class="text-center"><h5>₱ {{ $total_sum }}</h5>  </td>
                                                </tr>
                                                <tr>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                    <td class="text-center" colspan="1"><h5>Discount</h5>  </td>
                                                    <td class="text-center" ><h5>₱ {{ $payment->discount_amount }} </h5> </td>
                                                </tr>


                                                <tr>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                    <td class="text-center" colspan="1"><h5>Grand Amount</h5>  </td>
                                                    <td class="text-center" ><h5>₱ {{ $payment->total_amount }}</h5> </td>
                                                </tr>

                                                <tr>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                    <td class="text-center" colspan="1"><h5>Paid Amount</h5>  </td>
                                                    <td class="text-center" ><h5>₱ {{ $payment->cash }}</h5> </td>
                                                </tr>

                                                <tr>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                    <td class="text-center" colspan="1"><h5>Change Amount</h5>  </td>
                                                    <td class="text-center" ><h5>₱ - {{ $payment->change }}</h5> </td>
                                                </tr>
                                            </tbody>
                                            
                                        </table>
                                
                                        <button type="submit" class="btn btn-info">Invoice Approve </button>

                                 
                    
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                        <h3 class="heading">Payment Status: {{ $payment->paid_status }}</h3>
                        </form> 

                    </div> <!-- container-fluid -->
                </div>
                </div>

@endsection