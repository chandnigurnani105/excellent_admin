@extends('layouts.layout')

@section('content')
<h3>Show Target</h3>
<table class="table" border="1">
    <tr>
        <th>ID</th>
        <th>Status</th>
        <th>Due Date</th>
        <th>Role</th>
        @if (Auth::user()->hasRole('Admin'))
        <th>Assigned to</th>
        @endif
    </tr>

    @foreach ($data as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->status}}</td>
        <td>{{$item->due_date}}</td>
        <td>{{$item->role}} </td>
        @if (Auth::user()->hasRole('Admin'))
        <td>{{$item->name}}</td>
        @endif
    </tr>       
    @endforeach
    
</table>


@endsection