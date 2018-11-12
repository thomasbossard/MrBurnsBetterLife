@extends('layouts.app')
@section('content')

@if(session('message'))
	<div class='alert alert-success'>
		{{ session('message') }}
	</div>
@endif  

<html>
<body>
@if(!$users_and_objects->isEmpty())
        Bestehende Zuweisungen:
        <br>
        <form action="/removeallocation" method="post">
            {{ csrf_field() }}
            <TABLE border="1">
                <TR> 
                    <TD>
                        Objekt
                    </TD>
                    <TD>
                        Vorname
                    </TD>
                    <TD>
                        Name
                    </TD>
                    <TD>
                        Zuweisung aufheben
                    </TD>
                </TR>
                @foreach ($users_and_objects as $line)
                <TR> 
                    <TD>
                        {{$line->objectname}}
                    </TD>
                    <TD>
                        {{$line->name}} 
                    </TD>
                    <TD>
                        {{$line->givenname}}
                    </TD>
                    <TD>
                        <input type="radio" name="id" value="{{$line->id}}">
                    </TD>
                </TR>
                @endforeach
            </TABLE>
            <br>
            <input type="submit" value="Zuweisung aufheben">
        </form>

        <br>
        <br>
  @endif

@if(!$unallocatedusers->isEmpty())
    Neue Zuweisung vornehmen:

    <br>
    <select name="user_id" form="allocateform">
        @foreach ($unallocatedusers as $user)
            <option value="{{$user->id}}">{{$user->name}} {{$user->givenname}}</option>
        @endforeach
    </select>
    <select name="object_id" form="allocateform">
        @foreach ($unallocatedobjects as $object)
            <option value="{{$object->id}}">{{$object->name}}</option>
        @endforeach
    </select>
        <br><br>
    <form action="/allocateuser" id="allocateform" method="post">
        {{ csrf_field() }}
        <input type="submit" value="Zuweisung übernehmen">
    </form>
@endif

</body>
</html>


@endsection