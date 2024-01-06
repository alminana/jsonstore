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
            <div class="brand-section">
            <div class="row">
            @foreach($setting as $set) 
                <div class="col-6">               
                        <h1 class="text-white mt-3" >                     
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
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                            <a href="javascript:window.print()"  class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fa fa-print"> Daily Purchase Report Print </i></a> <br>  <br>               
                    
                                <h4 class="card-title">
                                <h3 class="font-size-16"><strong>Daily Purchase Report 
                                    <span class="btn btn-info"> {{ date('d-m-Y',strtotime($start_date)) }} </span> -
                                    <span class="btn btn-success"> {{ date('d-m-Y',strtotime($end_date)) }} </span>
                                    </strong>
                                </h3>
                                </h4>
                                
                                <table  id="tbAdresse" class="table table-striped table-bordered">
                                {{-- <table id="tbAdresse" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> --}}
                                    
                       
                                    <thead>
                                    <tr>
                          
                                        <th class="text-center">Purchase No  </th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Supplier</th> 
                                        <th class="text-center">Generic Name</th> 
                                        <th class="text-center">Quantity</th> 
                                        <th class="text-center">Unit Price</th>  
                                        <th class="text-center">Expiration </th>
                                        <th class="text-center">Total Price </th>                                        
                                    </thead>


                                    <tbody>
                                        
                                    @php
                                        $total_sum = '0';
                                    @endphp
                                        @foreach($allData as $key => $item)
                                            <tr>
                                                <td>{{ $item->purchase_no }}</td> 
                                                <td>{{ date('d-m-Y',strtotime($item->date)) }}</td> 
                                                <td>{{ $item['supplier']['name'] }}</td> 
                                                <td>{{ $item['product']['name'] }}</td> 
                                                <td>{{ $item->buying_qty }} {{ $item['product']['unit']['name'] }}</td> 
                                                <td>{{ $item->unit_price }}</td> 
                                                <td>{{ $item->description }}</td> 
                                                <td>{{ $item->buying_price }}</td>   
                                            </tr>
                                            @php
                                                $total_sum += $item->buying_price;
                                            @endphp
                                        @endforeach
                                       
                                            <tr>
                                            <td ></td>
                                            <td ></td>
                                            <td ></td>
                                            <td ></td>
                                            <td ></td>
                                            <td ></td>
                                            <td class=" text-center">
                                                <strong>Subtotal</strong></td>
                                            <td class="thick-line ">{{ $total_sum}}</td>
                                        </tr>
                                    
                                    
                                    </tbody>
                                </table>
    
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
    
                
                    
                </div> <!-- container-fluid -->
        </div>
 

<script>

    $("input:checkbox").attr("checked",false).click(function(){
                var shcolumn="."+$(this).attr("name");
                $(shcolumn).toggle();
            });
    
    $(document).ready(function() {
        $('#tbAdresse ').DataTable( {
    
            dom: 'Bfrtip',
            buttons: [
                'print','excel','pdf','copy'
            ]
        } );
    } );
    
    $(document).ready(function() {
        
    
    
        // Setup - add a text input to each header cell
        $('#tbAdresse thead th').each(function() 
        
        {
            var title = $(this).text();
            $(this).html('<input type="text"   placeholder="Search ' + title + '" />');
            
        });
    
        // DataTable
        var table = $('#tbAdresse').DataTable();
        
        //Entires
    
    
        // Apply the search
        table.columns().every(function() {
            var that = this;
    
            $('input', this.header()).on('keypress change', function(e) {
                
            var keycode = e.which;
            //launch search action only when enter is pressed
            if (keycode == '13') {
                console.log('enter key pressed !')
                if (that.search() !== this.value) {
                that
                    .search(this.value)
                    .draw();
                }
            }
    
            });
        });
        });
    
        $(function() {                   
                 $("#start-date").datepicker({
                  dateFormat: "dd/mm/yy",
                   maxDate: 0,
                  onSelect: function (date) {
                      var dt2 = $('#end-date');
                      var startDate = $(this).datepicker('getDate');
                      var minDate = $(this).datepicker('getDate');
                      if (dt2.datepicker('getDate') == null){
                        dt2.datepicker('setDate', minDate);
                      }              
                      //dt2.datepicker('option', 'maxDate', '0');
                      dt2.datepicker('option', 'minDate', minDate);
                  }
                });
                $('#end-date').datepicker({
                    dateFormat: "dd/mm/yy",
                    maxDate: 0
                });           
             });
        
    
    
    </script>

    

@endsection