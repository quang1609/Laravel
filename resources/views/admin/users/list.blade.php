@extends('admin.main')
@section('content')
<form action="" method="get">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Enter Username:</label>
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
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
            </tr>
        </thread>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>
                        @if($user->role == 1)
                            <span>Admin</span>
                        @else
                            <span>Người dùng</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    {!! $users->links() !!}
    </div>
@endsection