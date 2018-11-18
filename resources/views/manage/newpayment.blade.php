@extends('layouts.app')
@section('content')

@if(session('message'))
	<div class='alert alert-success'>
		{{ session('message') }}
	</div>
@endif 

@if(!$users->isEmpty())
    Neuen Zahlungseingang erfassen
    <br>
    
    
    Benutzer: <select name="user_id" form="newpayment">
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}} {{$user->givenname}}</option>
        @endforeach
    </select>
    <br>
    Betrag: <input type="number" name="amount" form="newpayment">
    <br>
    <form action="/newpayment" id="newpayment" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="submit" value="Neuen Zahlungseingang erfassen">
    </form>
@endif

@endsection