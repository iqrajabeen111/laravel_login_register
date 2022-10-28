@extends('layout.master')
@section('content')
<div class="container mt-4">
  <div class="row mb-4">
    <a class="btn btn-success" href="{{url('todo/create')}}">Add Tasks</a>
  </div>
  <div class="row justify-content-md-center">
    <!-- <div class="row"> -->
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Completed</th>
        </tr>
      </thead>
      <tbody>
        @foreach($TodoItem as $list)
        <tr>
          <td>{{ $list->id }}</td>
          <td>{{ $list->title }}</td>
          <td>{{ $list->description }}</td>
          <td>{{ $list->completed }}</td>
        
        </tr>
        @endforeach
        @stop
      </tbody>
    </table>
  </div>
</div>