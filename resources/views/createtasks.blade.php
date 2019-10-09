@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a Task</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('tasks.store') }}">
          @csrf
          {{-- <div class="form-group">    
            <label for="id">ID :</label>
            <input type="number" class="form-control" name="id"/>
        </div> --}}
          <div class="form-group">    
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="description">Description :</label>
              <input type="text" class="form-control" name="description"/>
          </div>

          {{-- <div class="form-group">
              <label for="user_id">User Id</label>
              <input type="text" class="form-control" name="user_id"/>
          </div> --}}
          <div class="form-group">
            <label for="user_id">User Id</label>
            <select name='user_id' id="contact">
                <option value="" selected disabled>Select</option>
                @foreach ($contacts as $key=>$contact)
                <option value="{{$key}}">{{$contact}}</option>
                @endforeach
            </select>
        </div>
                           
        {{-- {{ Form::select('user_id', $tasks, null, $options) }} --}}
          
        <button type="submit" class="btn btn-outline-success">Add Task</button>
          
    </form>
  </div>
</div>
</div>
@endsection