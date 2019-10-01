@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Users</h1>    
  <table class="table table-striped" border="1">
    <thead>
        <tr>
          <!--
            <td>ID</td>
        -->
          <td colspan=6>Name</td>
          <td colspan=4>Email</td>
          <td colspan="4">Job Title</td>
          <td>City</td>
          <td>Country</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <div>
        <a style="margin: 19px;" href="{{ route('contacts.create')}}" class="btn btn-primary">New contact</a>
        </div>  
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <!--
            <td>{{$contact->id}}</td>
            -->
            <td colspan=4>{{$contact->first_name}} {{$contact->last_name}}</td>
            <td colspan =6>{{$contact->email}}</td>
            <td colspan="4">{{$contact->job_title}}</td>
            <td>{{$contact->city}}</td>
            <td>{{$contact->country}}</td>
            <td>
                <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('contacts.destroy', $contact->id)}}" method="post">
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