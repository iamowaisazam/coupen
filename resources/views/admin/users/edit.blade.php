@extends('admin.layout')

<?php 
$permissions = [
    'store_management',
    'coupons_management',
    'blogs_management',
    'site_management',
    'user_rights_management'
];

?>
@section('css')
    
<style>

    .error{
        color:red;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-headers">
                Edit YOUR USER AND GIVE PERMISSION FOR THE DASHBOARD
            </header>
           
        </section>

    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Edit User And Assign The Permission
            </header>
            <div class="card-body">
                <form method="post" action="{{URL::to('admin/users/update/'.Crypt::encryptString($user->id))}}" >
                    @csrf
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" value="{{$user->name}}" name="name" class="form-control" 
                        placeholder="User Name">
                        @if($errors->has('name'))
                         <p class="error" >{{ $errors->first('name') }}</p>
                        @endif 
                    </div>
                    
                    <div class="form-group">
                      <label>Email Address</label>
                      <input type="email" value="{{$user->email}}" name="email" class="form-control" placeholder="Email Address"> 
                      @if($errors->has('email'))
                      <p class="error" >{{ $errors->first('email') }}</p>
                     @endif 
                   </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" value="" class="form-control" placeholder="Password">
                        <small  class="form-text text-dark">Please never share your email & password with anyone else.</small>

                        @if($errors->has('password'))
                          <p class="error" >{{ $errors->first('password') }}</p>
                         @endif 
                    </div>
                   
                    <div class="form-group row ">
                        <div class="col-md-12">
                            <label for="exampleInputPassword1">RIGHT AND PERMISSION : </label>
                        </div>
                        <?php 
                        
                        ?>
                        @foreach ($permissions as $key => $item)
                            <div class="col-md-4">
                                <div class="form-check ml-3">
                                    <input 
                                    @if(in_array($item,explode(',',$user->permissions)))
                                    checked
                                    @endif type="checkbox" value="{{$item}}" class="form-check-input4" id="permissions{{$key}}" name="permissions[{{$key}}]">
                                    <label class="form-check-labe4" for="permissions{{$key}}">
                                        {{ ucwords(str_ireplace("_", " ",$item))}}
                                    </label>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-md-12 text-center pt-5">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                  </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@section('js')
    
@endsection