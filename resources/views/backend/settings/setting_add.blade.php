@extends('admin.admin_master')
@section('admin')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Add Settings </h4><br><br>
            
  

    <form method="post" action="{{ route('setting.store') }}" id="myForm" enctype="multipart/form-data" >
                @csrf

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Company Name </label>
                <div class="form-group col-sm-10">
                    <input name="companyname" class="form-control" type="text"    >
                </div>
            </div>
            <!-- end row -->


              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                <div class="form-group col-sm-10">
                    <input name="address" class="form-control" type="text"    >
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">TIN</label>
                <div class="form-group col-sm-10">
                    <input name="tin" class="form-control" type="text"    >
                </div>
            </div>
            

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">VAT</label>
                <div class="form-group col-sm-10">
                    <input name="vat" class="form-control" type="text"    >
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Owner</label>
                <div class="form-group col-sm-10">
                    <input name="owner" class="form-control" type="text"    >
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Telephone</label>
                <div class="form-group col-sm-10">
                    <input name="tel" class="form-control" type="text"    >
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                <div class="form-group col-sm-10">
                    <input name="email" class="form-control" type="email"    >
                </div>
            </div>


  <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">SSS</label>
                <div class="form-group col-sm-10">
                    <input name="sss" class="form-control" type="text"  >
                </div>
            </div>
            <!-- end row -->


            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Pagibig</label>
                <div class="form-group col-sm-10">
                    <input name="pagibig" class="form-control" type="text"  >
                </div>
            </div>

  <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Philhealth </label>
                <div class="form-group col-sm-10">
                    <input name="philhealth" class="form-control" type="text"  >
                </div>
            </div>
            <!-- end row -->

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Image </label>
                <div class="form-group col-sm-10">
       <input name="image" class="form-control" type="file"  id="image">
                </div>
            </div>
            <!-- end row -->

              <div class="row mb-3">
                 <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                <div class="col-sm-10">
                <img id="image" class="rounded avatar-lg" src="{{  url('upload/no_image.jpg') }}" alt="Card image cap">
                </div>
            </div>
            <!-- end row -->
 
 


        
<input type="submit" class="btn btn-info waves-effect waves-light" value="Add Customer">
            </form>
             
           
           
        </div>
    </div>
</div> <!-- end col -->
</div>
 


</div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                companyname: {
                    required : true,
                }, 
                address: {
                    required : true,
                },
                tin: {
                    required : true,
                },
                vat: {
                    required : true,
                },
                image: {
                    required : true,
                },
                owner: {
                    required : true,
                },
                tel: {
                    required : true,
                },
                email: {
                    required : true,
                },
                tel: {
                    required : true,
                },
                sss: {
                    required : true,
                },
                pagibig: {
                    required : true,
                },

                philhealth: {
                    required : true,
                },

            },
            messages :{
                companyname: {
                    required : 'Please Enter Your Company name',
                },
                address: {
                    required : 'Please Enter Your Aaddress',
                },
                tin: {
                    required : 'Please Enter Your Tin',
                },
                vat: {
                    required : 'Please Enter Your Vat',
                },
                image: {
                    required : 'Please Select one Image',
                },
                image: {
                    required : 'Please Select one Image',
                },
                owner: {
                    required : 'Please Select one Image',
                },
                tel: {
                    required : 'Please Select one Image',
                },
                email: {
                    required : 'Please Select one Image',
                },
                sss: {
                    required : 'Please Select one Image',
                },

                pagibig: {
                    required : 'Please Select one Image',
                },

                philhealth: {
                    required : 'Please Select one Image',
                },

            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>


<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>


 
@endsection 
