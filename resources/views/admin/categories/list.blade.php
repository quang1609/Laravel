@extends('admin.main')
@section('content')
    <table class="table">
        <thread>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
            </tr>
        </thread>
        <tbody>
            @foreach($categories as $ca)
                <tr>
                    <td>{{ $ca->id }}</td>
                    <td>{{ $ca->name }}</td>
                    <td>{{ $ca->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection