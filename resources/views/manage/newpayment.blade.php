@extends('layouts.app')
@section('content')

@if(session('message'))
	<div class='alert alert-success'>
		{{ session('message') }}
	</div>
@endif 


@if(!$users->isEmpty())

    <div class="container">
        <h3>Neuen Zahlungseingang erfassen</h3>
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Mieter</th>
                        <th>Betrag</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select name="user_id" form="newpayment">
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}} {{$user->givenname}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" name="amount" form="newpayment"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <form action="/newpayment" id="newpayment" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="container"><button class="btn btn-primary" type="submit">Zahlung erfassen</button></div>
    </form>
@endif

<div class="container" style="padding-top: 50px;">
    <h3>Unbezahlte Rechnungen</h3>
</div>

@if(!$allunpaidinvoices->isEmpty())         
    <form action="/processinvoice" method="post">
                {{ csrf_field() }}
                
                
            <div class="container">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Vorname</th>
                                <th>Name</th>
                                <th>Betrag</th>
                                <th>Auswählen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allunpaidinvoices as $invoice)
                            <tr>
                                <td>{{$invoice->name}}</td>
                                <td>{{$invoice->givenname}}</td>
                                <td>{{$invoice->amount}}</td>
                                <td><input type="checkbox" name="id[]" value="{{$invoice->id}}"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>                
                               
            <div class="container"><button class="btn btn-primary" type="submit">Rechnung verarbeiten</button></div>

    </form>
@endif


@if($allunpaidinvoices->isEmpty())    
    <div class="container">
        Keine offenen Rechnungen.
    </div>
@endif

@endsection