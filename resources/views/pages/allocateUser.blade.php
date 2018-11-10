@extends('layouts.app')
@section('content')

@if(session('message'))
	<div class='alert alert-success'>
		{{ session('message') }}
	</div>
@endif  

<html>
<body>

   

<select name="userlist" form="allocateform">
    @foreach ($unallocatedusers as $user)
    <option value="{{$user->id}}">{{$user->name}} {{$user->givenname}}</option>
    @endforeach
</select>
<select name="objectlist" form="allocateform">
    @foreach ($unallocatedobjects as $object)
    <option value="{{$object->id}}">{{$object->name}}</option>
    @endforeach
</select>
    <br><br>
<form action="/allocateuser" id="allocateform" method="post">
    {{ csrf_field() }}
    <input type="submit" value="Zuweisung übernehmen">
</form>

</body>
</html>


@endsection