@extends('layouts.app')
@section('content')

@if(session('message'))
	<div class='alert alert-success'>
		{{ session('message') }}
	</div>
@endif 



    <div class="container">
        <h3>Neue Pushmessage erfassen</h3>
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Wohnung</th>
                        <th>Betreff</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select class="browser-default custom-select" name="user_id" form="newpayment">
                                @foreach ($rentableobject as $rentableobject)
                                    <option value="{{$rentableobject->id}}">{{$rentableobject->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input class="form-control" type="text" name="message" form="newpayment"></td>
                        <td><input class="form-control" type="text" name="message" form="newpayment"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container" style="padding-top: 50px;">
    <h3>Alle Pushmessages</h3>
</div>

@if(!$pushmessages->isEmpty())         
    <form action="/storenewpushmessage" method="post">
                {{ csrf_field() }}
                
                
            <div class="container">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Wohnung</th>
                                <th>Betreff</th>
                                <th>Message</th>
                                <th>Datum</th>
                                <th>Auswählen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pushmessages as $pushmessage)
                            <tr>
                                <td>{{$pushmessage->name}}</td>
                                <td>{{$pushmessage->subject}}</td>
                                <td>{{$pushmessage->text}}</td>
                                <td>{{$pushmessage->date}}</td>
                                <td><input type="checkbox" name="id[]" value="{{$pushmessage->id}}"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>                
                               
            <div class="container" style="margin-bottom: 25px;"><button class="btn btn-primary" type="submit">Pushmessages löschen</button></div>

    </form>
@endif



@if($pushmessages->isEmpty())    
    <div class="container" style="margin-bottom: 25px;">
        Keine Pushmessages.
    </div>
@endif


<div class="container"><a href="/manage" class="btn btn-primary">Zurück zu Verwalten...</a></div>

@endsection