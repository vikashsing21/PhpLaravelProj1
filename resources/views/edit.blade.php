@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a User</h1>

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
        <form method="post" action="{{ route('contacts.update', $contact->id) }}">
            @method('PATCH') 
            @csrf
            {{-- <div class="form-group">

                <label for="id">ID :</label>
                <input type="number" class="form-control" name="id" value={{ $contact->id }} />
            </div> --}}
            <div class="form-group">

                <label for="u_name">User Name:</label>
                <input type="text" class="form-control" name="u_name" value="{{ $contact->u_name }}" />
            </div>

            {{-- <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value="{{ $contact->last_name }}" />
            </div> --}}

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value="{{ $contact->email }}" />
            </div>
            <div class="form-group">
                <label for="city">City:</label>

                {{-- @php --}}
               {{-- // dd($contact->city); --}}
                {{-- @endphp --}}
                <input type="text" class="form-control" name="city" value='{!! $contact['city'] !!}'  />
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" name="country" value="{{ $contact->country }}" />
            </div>
            <div class="form-group">
                <label for="job_title">Job Title:</label>
                <input type="text" class="form-control" name="job_title" value="{{$contact->job_title }}" />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection