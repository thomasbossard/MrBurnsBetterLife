@extends('layouts.app')
@section('content')

@if(session('message'))
	<div class='alert alert-success'>
		{{ session('message') }}
	</div>
@endif  

<html>
@if(!$users_and_objects->isEmpty())

        <div class="container" style="margin-bottom: 10px;">
            <a href="/manage" class="btn btn-link"><i class="fa fa-reply"></i>&nbsp;&nbsp;Zurück zu Verwalten</a>
        </div>

        <div class="container">
            <h3>Bestehende Zuweisungen</h3>
            <hr class="style13">
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
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input-radio" name="id" value="{{$line->id}}">
                            </div>                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            </div>
            
            <div class="container" style="padding-bottom: 50px;">
                <button class="btn btn-primary" type="submit">Zuweisung aufheben</button>
            </div>

        </form>

  @endif

@if(!$unallocatedusers->isEmpty())
    

    <div class="container">
            <h3>Neue Zuweisung vornehmen</h3>
            <hr class="style13">
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
                            <select class="browser-default custom-select" name="user_id" form="allocateform">
                                @foreach ($unallocatedusers as $user)
                                    <option value="{{$user->id}}">{{$user->name}} {{$user->givenname}}</option>
                                @endforeach
                            </select>                                                        
                        </td>
                        <td>
                            <select class="browser-default custom-select" name="object_id" form="allocateform">
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