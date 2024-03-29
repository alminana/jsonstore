@extends('admin.admin_master')
@section('admin')

 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Product Wise Stock Report</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                                            <li class="breadcrumb-item active">Product Wise Stock Report</li>
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
 


    <table class="table">
        <thead>
        <tr>
          
            <td class="text-center"><h5>Supplier Name </h5></td>
            <td class="text-center"><h5>Unit  </h5>
            </td>
            <td class="text-center"><h5>Category</h5>
            </td>
            <td class="text-center"><h5>Product Name</h5>
            </td>
            <td class="text-center"><h5>Stock  </h5>
            </td>
            
            
        </tr>
        </thead>
        <tbody>
        <!-- foreach ($order->lineItems as $line) or some such thing here -->
        
    
        
        <tr>
         
         <td class="text-center"><h5>{{ $product['supplier']['name'] }} </h5></td> 
         <td class="text-center"><h5>{{ $product['unit']['name'] }}</h5>  </td> 
         <td class="text-center"><h5>{{ $product['category']['name'] }}</h5>  </td> 
         <td class="text-center"><h5>{{ $product->name }} </h5> </td> 
         <td class="text-center"><h5>{{ $product->quantity }}</h5>  </td> 
            
            
        </tr>
       
           
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