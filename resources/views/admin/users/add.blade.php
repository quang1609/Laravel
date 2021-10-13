@extends('admin.main')
@section('content')
<form action="" method="POST"> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                  </div>
                 <div class="form-group">
                    <label for="">Password Confirm</label>
                    <input type="password" class="form-control" name="passwordCf" placeholder="Enter password confirm">
                  </div>
                  <div class="form-group">
                    <label for="">Role</label><br>
                    <label class="radio-inline">
                        <input type="radio" name="rdRole" value="1">Admin
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="rdRole" value="2" checked="">User
                    </label>
                    </label>
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                @csrf
</form>
@endsection
