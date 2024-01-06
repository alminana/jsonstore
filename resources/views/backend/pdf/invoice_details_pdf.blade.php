@extends('admin.admin_master')
@section('admin')

 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0"> Customer Payment Report </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                                            <li class="breadcrumb-item active">Customer Payment Report</li>
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
                                                    <div class="col-6 mt-4 text-center">
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
                    <h3 class="font-size-16"><strong>Customer Invoice</strong></h3>
                </div>
                <div class="">
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <td><strong>Customer Name </strong></td>
            <td class="text-center"><strong>Customer Mobile</strong></td>
            <td class="text-center"><strong>Address</strong>
            </td>
             
            
        </tr>
        </thead>
        <tbody>
        <!-- foreach ($order->lineItems as $line) or some such thing here -->
        <tr>
            <td> {{ $payment['customer']['name'] }}</td>
            <td class="text-center">{{ $payment['customer']['mobile_no']  }}</td>
            <td class="text-center">{{ $payment['customer']['email']  }}</td>
              
            
        </tr>
        
                            
                            </tbody>
                        </table>
                    </div>

                  
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
            <td><strong>Sl </strong></td>
            <td class="text-center"><h5>Generic</h5></td>
            <td class="text-center"><h5>Brand</h5>
            </td>
            <td class="text-center"><h5>Current Stock</h5>
            </td>
            <td class="text-center"><h5>Quantity</h5>
            </td>
            <td class="text-center"><h5>Srp Price </h5>
            </td>
            <td class="text-center"><h5>Total Price</h5>
            </td>
            
        </tr>
        </thead>
        <tbody>
        <!-- foreach ($order->lineItems as $line) or some such thing here -->
        
      @php
        $total_sum = '0';

   $invoice_details = App\Models\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();     
        @endphp
        @foreach($invoice_details as $key => $details)
        <tr>
           <td class="text-center">{{ $key+1 }}</td>
            <td class="text-center">{{ $details['category']['name'] }}</td>
            <td class="text-center">{{ $details['product']['name'] }}</td>
            <td class="text-center">{{ $details['product']['quantity'] }}</td>
            <td class="text-center">{{ $details->selling_qty }}</td>
            <td class="text-center">₱ {{ $details->srp_price }}</td>
            <td class="text-center">₱ {{ $details->selling_price }}</td>
            
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
                <td class="thick-line"></td>
                <td class="thick-line text-center">
                    <strong>Subtotal</strong></td>
                <td class="thick-line text-center">₱ {{ $total_sum }}</td>
            </tr>
            <tr>
         
                <td class="no-line"></td>
                 <td class="no-line"></td>
                  <td class="no-line"></td>
                   <td class="no-line"></td>
                <td class="no-line"></td>
                <td class="no-line text-center">
                    <strong>Discount Amount</strong></td>
                <td class="no-line text-center">₱ {{ $payment->discount_amount }}</td>
            </tr>
             <tr>
             
                <td class="no-line"></td>
                 <td class="no-line"></td>
                  <td class="no-line"></td>
                   <td class="no-line"></td>
                <td class="no-line"></td>
                <td class="no-line text-center">
                    <strong>Paid Amount</strong></td>
                <td class="no-line text-center">₱ {{ $payment->paid_amount }}</td>
            </tr>
            <tr>
           
                <td class="no-line"></td>
                 <td class="no-line"></td>
                  <td class="no-line"></td>
                   <td class="no-line"></td>
                <td class="no-line"></td>
                <td class="no-line text-center">
                    <strong>Grand Amount</strong></td>
                <td class="no-line text-center"><h4 class="m-0">₱ {{ $payment->total_amount }}</h4></td>
            </tr>



            <tr>
                <td colspan="7" style="text-align: center;font-weight: bold;">Paid Summary</td>
                
            </tr>

             <tr>
                <td colspan="4" style="text-align: center;font-weight: bold;">Date </td>
                <td colspan="3" style="text-align: center;font-weight: bold;">Amount</td>
                
            </tr>
@php
$payment_details = App\Models\PaymentDetail::where('invoice_id',$payment->invoice_id)->get();

@endphp

            @foreach($payment_details as $item)
             <tr>
                <td colspan="4" style="text-align: center;font-weight: bold;">{{ date('d-m-Y',strtotime($item->date)) }}</td>
                <td colspan="3" style="text-align: center;font-weight: bold;">{{ $item->current_paid_amount }}</td>
                
            </tr>
            @endforeach









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