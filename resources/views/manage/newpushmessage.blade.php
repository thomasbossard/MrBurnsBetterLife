@extends('layouts.app')
@section('content')

@if(session('message'))
	<div class='alert alert-success'>
		{{ session('message') }}
	</div>
@endif 

    <div class="container">
                <h3>Neue Pushmessage erfassen</h3>
                <hr class="style13">
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 30%">Wohnung</th>
                        <th style="width: 70%">Betreff</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select class="browser-default custom-select" name="rentableobject_id" form="newpushmessage">
                                @foreach ($rentableobject as $rentableobject)
                                    <option value="{{$rentableobject->id}}">{{$rentableobject->name}}</option>
                                @endforeach
                               
            
                            </select>
                        </td>
                        <td><input class="form-control" type="text" name="subject" form="newpushmessage" placeholder="Betreff"></td>

                    <tr>                        
                        <td colspan="2"><textarea class="form-control" type="text" name="text" form="newpushmessage" rows="4" placeholder="Pushachricht eingeben..."></textarea></td>
                    </tr>
                        
                        
                    </tr>                  
                </tbody>
            </table>
        </div>
    </div>

    <div class="container" style="padding-bottom: 50px;">
        <form action="/newpushmessage" id="newpushmessage" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <button class="btn btn-primary" type="submit">Neue Pushmessage erfassen</button>
        </form>
    </div>

    <div class="container">
                <h3>Alle Pushmessages</h3>
                <hr class="style13">
    </div>

@if(!$pushmessages->isEmpty())         
    <form action="/deletepushmessage" method="post">
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
                                <td><div class="checkbox"><input type="checkbox" name="id[]" value="{{$pushmessage->id}}"></div></td>
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