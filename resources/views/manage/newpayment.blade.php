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

<h1>Nachrichten von Kontaktformular</h1>

@if(!$allunpaidinvoices->isEmpty())         
    <form action="/processinvoice" method="post">
                {{ csrf_field() }}
                <TABLE border="1">
                    <TR> 
                        <TD>
                            Name
                        </TD>
                        <TD>
                            Vorname
                        </TD>
                        <TD>
                            Betrag
                        </TD>
                        <TD>
                            Verarbeitet
                        </TD>
                    </TR>
                    @foreach ($allunpaidinvoices as $invoice)
                    <TR> 
                        <TD>
                            {{$invoice->givenname}}
                        </TD>
                        <TD>
                            {{$invoice->name}}
                        </TD>
                        <TD>
                            {{$invoice->amount}}
                        </TD>
                        <TD>
                            <input type="checkbox" name="id[]" value="{{$invoice->id}}">
                        </TD>
                    </TR>
                    @endforeach
                </TABLE>
                <br>
                <input type="submit" value="Verarbeiten">
    </form>
@endif

@endsection