@extends('layouts.app')
@section('content')

@if(session('message'))
	<div class='alert alert-success'>
		{{ session('message') }}
	</div>
@endif 

@if(!$users->isEmpty())
    Neue Rechnung erfassen
    <br>
    
    
    Benutzer: <select name="user_id" form="newinvoice">
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}} {{$user->givenname}}</option>
        @endforeach
    </select>
    <br>
    
    
    Rechnungstyp: <select name="type_id" form="newinvoice">
        @foreach ($invoicetypes as $invoicetype)
            <option value="{{$invoicetype->id}}">{{$invoicetype->type}}</option>
        @endforeach
    </select>
    <br>
    
    
    Betrag: <input type="number" name="amount" form="newinvoice">
    <br>
    
    
    Beschreibung: <input type="text" name="description" form="newinvoice">
    <br>
    
    
    Datei: <input type="file" id="fileupload" name="fileupload" form="newinvoice">
        <br><br>
    
    
    <form action="/newinvoice" id="newinvoice" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="submit" value="Neue Rechnung erfassen">
    </form>
@endif

@endsection