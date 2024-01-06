@extends('admin.admin_master')
@section('admin')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <div class="page-content">
    <div class="container">
        <div class="row">
            <form class="form-horizontal mt-3" method="POST" action="{{ route('user.store') }}">
                @csrf
    
        <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control" id="name" type="text" name="name" required="" placeholder="Name">
            </div>
        </div>
    
        <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control" id="username" type="text" name="username" required="" placeholder="UserName">
            </div>
        </div>
    
         <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control" id="email" type="email" name="email" required="" placeholder="Email">
            </div>
        </div>
    
        <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control" id="password" type="password" name="password" required="" placeholder="Password">
            </div>
        </div>
    
    
         <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required="" placeholder="Password Confirmation">
            </div>
        </div>
    
        <div class="form-group mb-3 row">
            <div class="col-12">
                <div class="custom-control custom-checkbox">
                    
                </div>
            </div>
        </div>
    
        <div class="form-group mb-3 row">
            <div class="col-12">
                <select id="role" name="role" class="form-select select2" aria-label="Default select example">
                <option value="Pharmacy Assistant">Pharmacy Assistant</option>
                <option value="Nurse">Nurse</option>
                <option value="Doctor">Doctor</option>
                </select>            
            </div>
        </div>

        <div class="form-group mb-3 row">
            <div class="col-12">
                <select id="position" name="position" class="form-select select2" aria-label="Default select example">
                <option value="1">Admin</option>
                <option value="1">User</option>
                </select>            
            </div>
        </div>


     
        <div class="form-group text-center row mt-3 pt-1">
            <div class="col-12">
                <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Register</button>
            </div>
        </div>
    
        <div class="form-group mt-2 mb-0 row">
            <div class="col-12 mt-3 text-center">
                <a href="{{ route('login') }}" class="text-muted">Already have account?</a>
            </div>
        </div>
        </form>
               
        </div>
    </div>
 </div>
    
 
@endsection 
