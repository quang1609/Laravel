@extends('admin.main')
@section('content')
<form action="" method="POST"> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="text" class="form-control" name="quantity" placeholder="Enter quantity">
                  </div>
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                @csrf
</form>
@endsection
