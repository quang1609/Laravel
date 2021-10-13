@extends('admin.main')
@section('content')
    <form action="" method="get">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Enter item name:</label>
                    <input type="text" name="keyword" class="form-control">
                    <button class="btn btn-sm btn-primary" type="submit">Tìm kiếm</button>
                </div>
            </div>
        </div>
    </form>
    <table class="table">
        <thread>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>User ID</th>
                <th>Category ID</th>
                <th>Xóa</th>
                <th>Sửa</th>
            </tr>
        </thread>
        <tbody>
            @foreach($item as $it)
                <tr>
                    <td>{{ $it->id }}</td>
                    <td>{{ $it->name }}</td>
                    <td>{{ $it->quantity }}</td>
                    <td>{{ $it->user_id }}</td>
                    <td>{{ $it->category_id }}</td>
                    <td><a class="btn btn-primary btn-sm" href="/admin/item/destroy/{{ $it->id }}"><i class="far fa-trash-alt"></i></a></td>
                    <td><a class="btn btn-primary btn-sm" href="/admin/item/edit/{{ $it->id }}"><i class="fas fa-edit"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-6 offset-3 d-flex justify-content-center">
            {{$item->onEachSide(5)->links()}}
        </div>
    </div>
@endsection