@extends('admin.admin_master')
@section('admin')


        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        

                                

                        </div>
                    </div>
                </div>
                
                <!-- end page title -->
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                            <a href="javascript:window.print()"  class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fa fa-print"> Stock Report Print </i></a> <br>  <br>               
                    
                                <h4 class="card-title">Stock Report </h4>
                                
                                <table  id="tbAdresse" class="table table-striped table-bordered">
                                {{-- <table id="tbAdresse" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> --}}
                                    
                       
                                    <thead>
                                    <tr>
                          
                                        <th>Supplier Name </th>
                                        <th>Unit</th>
                                        <th>Brand</th> 
                                        <th>Generic Name</th> 
                                        <th>In Qty</th> 
                                        <th>Out Qty </th>  
                                        <th>Stock </th>
                                        
                                    </thead>


                                    <tbody>
                                        
                                        @foreach($allData as $key => $item)
                                        @php
                                        $buying_total = App\Models\Purchase::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('buying_qty');

                                        $selling_total = App\Models\InvoiceDetail::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('selling_qty');
                                        @endphp

                                            <tr>
                            
                                                <td> {{ $item['supplier']['name'] }} </td> 
                                                <td> {{ $item['unit']['name'] }} </td> 
                                                <td> {{ $item['category']['name'] }} </td> 
                                                <td> {{ $item->name }} </td> 
                                                <td> <span class="btn btn-success"> {{ $buying_total  }}</span>  </td> 
                                                <td> <span class="btn btn-info"> {{ $selling_total  }}</span> </td> 

                                                <td> <span class="btn btn-danger">
                                                    @if(empty($item->quantity ))
                                                    Out of Stocks
                                                @else
                                                {{ $item->quantity }} Available
                                                @endif </span> </td> 
                                                
                                            
                                            </tr>
                                            @endforeach
                                    
                                    </tbody>
                                </table>
    
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
    
                
                    
                </div>
                 <!-- container-fluid -->
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