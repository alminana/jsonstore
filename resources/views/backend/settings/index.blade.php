@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Settings</h4>

                                     

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('setting.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> Add Settings </i></a> <br>  <br>               

                    <h4 class="card-title">Setting Data </h4>
                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                  
                            <th>Company</th> 
                            <th>Address</th> 
                            <th>Tin</th> 
                            <th>Vat</th> 
                            <th>Image</th>
                    
                     
                       
                            <th width="6%">Action</th>
                            
                        </thead>


                        <tbody>
                        	 
                        	@foreach($setting as $key => $item)
                        <tr>
               
                            <td> {{ $item->companyname }} </td>  
                            <td> {{ $item->address }} </td>  
                            <td> {{ $item->tin }} </td>  
                            <td> {{ $item->vat }} </td>  
                            <td> <img src="{{ asset( $item->image ) }}" style="width:60px; height:50px"> </td> 
        
                \
                         

                            <td>
   <a href="{{ route('setting.edit',$item->id) }}"  class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

     <a href="{{ route('setting.delete',$item->id) }}"  class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

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