@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a Task</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('tasks.update', $tasks->id) }}">
            @method('PATCH') 
            @csrf
            {{-- <div class="form-group">

                <label for="id">ID :</label>
                <input type="number" class="form-control" name="id" value={{ $contact->id }} />
            </div> --}}
            <div class="form-group">

                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $tasks->name }}" />
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" value="{{ $tasks->description }}" />
            </div>
            <div class="form-group">
                <label for="user_id">User Id</label>
                <select name='user_id' id="contact">
                    <option value="{{$tasks->contact->u_name}}" >Select</option>
                    @foreach ($contacts as $key=>$contact)
                    <option value="{{$key}}">{{$contact}}</option>
                    @endforeach
                </select>
            </div>
            {{-- <div class="form-group">
                <label for="user_id">User_id:</label>
                <input type="text" class="form-control" name="user_id" value="{{ $tasks->user_id}}" />
            </div> --}}

            








            

          
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection