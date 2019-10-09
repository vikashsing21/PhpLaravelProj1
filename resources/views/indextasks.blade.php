@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Tasks</h1>    
  <table class="table table-striped" border="1">
    <thead>
        <tr>
          
            {{-- <td colspan="2">ID</td> --}}
        
          <td colspan=6>Name</td>
          <td colspan=4>Description</td>
          <td colspan="4">User ID</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <div>
        <a style="margin: 19px;" href="{{ route('tasks.create')}}" class="btn btn-primary">New Task</a>
        </div>  
    <tbody>
        @foreach($tasks as $tasks)
        <tr>
            
            {{-- <td colspan=2>{{$contact->id}}</td> --}}
            
            <td colspan=4>{{$tasks->name}}</td>
            <td colspan =6>{{$tasks->description}}</td>
            <td colspan="4">{{$tasks->contact->u_name}}</td>
            {{-- <td colspan="4">{{$tasks->user_id}}</td> --}}
            <td>
                <a href="{{ route('tasks.edit',$tasks->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('tasks.destroy', $tasks->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
 
<div>
</div>
<div class="col-sm-12">

    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div>
    @endif
  </div>
 
@endsection