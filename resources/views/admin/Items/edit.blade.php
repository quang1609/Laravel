@extends('admin.main')
@section('content')
<form action="" method="POST"> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{$item->name}}">
                  </div>
                  <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Enter Quantity" value="{{$item->quantity}}">
                  </div>
                  <div class="form-group">
                        <label>User ID</label>
                        <select class="form-control" name="user_id">
                            @foreach($user as $ur)
                                <option value="{{$item->user_id}}" {{$ur->id == $item->user_id ? 'selected' : ''}}>{{ $ur->id }}</option>
                            @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                    <label>Category ID</label>
                    <select class="form-control" name="category_id">
                        @foreach($category as $ct)
                               <option value="{{$item->category_id}}" {{$ct->id == $item->category_id ? 'selected' : ''}}>{{ $ct->id }}</option>
                        @endforeach
                    </select>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Edit</button>
                </div>
                @csrf
</form>
@endsection
