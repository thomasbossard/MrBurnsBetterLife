@extends('layouts.app')
@section('content')

@if(session('message'))
	<div class='alert alert-success'>
		{{ session('message') }}
	</div>
@endif  

<html>
@if(!$users_and_objects->isEmpty())
        
        <div class="container">
        <h3>Bestehende Zuweisungen</h3>
        </div>
        <form action="/removeallocation" method="post">
            {{ csrf_field() }}
            
            
            <div class="container">
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Objekt</th>
                        <th>Vorname</th>
                        <th>Name</th>
                        <th>Auswählen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users_and_objects as $line)
                    <tr>
                        <td>{{$line->objectname}}</td>
                        <td>{{$line->name}} </td>
                        <td>{{$line->givenname}}</td>
                        <td><input type="radio" name="id" value="{{$line->id}}"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            </div>
            
            <div class="container">
                <button class="btn btn-primary" type="submit">Zuweisung aufheben</button>
            </div>

        </form>

  @endif

@if(!$unallocatedusers->isEmpty())
    
    <div class="container" style="padding-top: 50px;">
        <h3>Neue Zuweisung vornehmen</h3>
    </div>


    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Objekt</th>
                    </tr>
                </thead>
                
                
                
                
                <tbody>
                    <tr>
                        <td>
                            <select name="user_id" form="allocateform">
                                @foreach ($unallocatedusers as $user)
                                    <option value="{{$user->id}}">{{$user->name}} {{$user->givenname}}</option>
                                @endforeach
                            </select>                                                        
                        </td>
                        <td>
                            <select name="object_id" form="allocateform">
                                @foreach ($unallocatedobjects as $object)
                                    <option value="{{$object->id}}">{{$object->name}}</option>
                                @endforeach
                            </select>   
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <form action="/allocateuser" id="allocateform" method="post">
        {{ csrf_field() }}
        <div class="container"><button class="btn btn-primary" type="submit">Zuweisung übernehmen</button></div>
    </form>
@endif

</html>


@endsection