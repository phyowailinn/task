@extends('layouts.app')

@section('content')

<section class="content-header">
  <h1>Users</h1>  
    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Users</li>
    </ol>
</section>
   
<div class="content">
  <div class="box box-primary">
    <div class="box-body">
      <table class="table table-responsive" id="bankTransfers-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @if(isset($users))
          @foreach($users as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created}}</td>
            <td>
              {!! Form::open(['route' => ['users.delete', 1], 'method' => 'delete']) !!}
              <div class='btn-group'>
                {!! Form::button('Delete',['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}                        
              </div>
              {!! Form::close() !!}
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

