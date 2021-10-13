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
                    <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Enter Quantity">
                  </div>
                  <div class="form-group">
                        <label>User ID</label>
                        <select class="form-control" name="user_id">
                            @foreach($user as $ur)
                                <option>{{ $ur->id }}</option>
                            @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                    <label>Category ID</label>
                    <select class="form-control" name="category_id">
                        @foreach($category as $ct)
                                <option>{{ $ct->id }}</option>
                        @endforeach
                    </select>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                @csrf
</form>
@endsection
