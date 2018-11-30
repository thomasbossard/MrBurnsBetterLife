@extends('layouts.app')

@section('js')

<script>
    const realFileBtn = document.getElementById("real-file");
    const customBtn = document.getElementById("custom-button");
    const customTxt = document.getElementById("custom-text");
    
    customBtn.addEventListener("click", function(){
        realFileBtn.click();
    });
    
    
    realFileBtn.addEventListener("change", function(){
       if (realFileBtn.value){
           customTxt.innerHTML = realFileBtn.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
       } else{
           customTxt.innerHTML = "Keine Datei ausgewählt.";
       }
    });
    
</script>

@endsection

@section('content')

@if(session('message'))
	<div class='alert alert-success'>
		{{ session('message') }}
	</div>
@endif 

@if(!$users->isEmpty())

    <div class="container">
            <h3>Neuen Rechnung erfassen</h3>
            <hr class="style13">
    </div>
    
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Mieter</th>
                        <th>Rechnungstyp</th>
                        <th>Betrag</th>
                        <th>Beschreibung</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        <select class="browser-default custom-select" name="user_id" form="newinvoice">
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}} {{$user->givenname}}</option>
                            @endforeach
                        </select>
                        </td>
                        
                        <td>
                        <select class="browser-default custom-select" name="type_id" form="newinvoice">
                            @foreach ($invoicetypes as $invoicetype)
                                <option value="{{$invoicetype->id}}">{{$invoicetype->type}}</option>
                            @endforeach
                        </select>
                        </td>
                        
                        <td>
                            <input class="form-control" type="number" name="amount" form="newinvoice">
                        </td>
                            
                        <td>
                            <input class="form-control" type="text" name="description" form="newinvoice">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



<div class="container" style="margin-bottom: 25px;">    
    <input type="file" id="real-file" hidden="hidden" form="newinvoice" name="fileupload">
    <button class="btn btn-primary" type="button" id="custom-button">Datei auswählen...</button>
    <span id="custom-text">Keine Datei ausgewählt.</span>
</div>



<div class="container" style="margin-bottom: 25px;">
    <form action="/newinvoice" id="newinvoice" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <button class="btn btn-primary" type="submit">Rechnung erfassen</button>
    </form>
    
    
<br>
    
    <div class="container">
        <h3>Aktuelle unverrechnete Heiz und Nebenkosten bearbeiten</h3>
    </div>
    
    
</div>

        <form action="/newadditionalcosts" method="post">
            {{ csrf_field() }}
            
            
            <div class="container">
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Vorname</th>
                        <th>Name</th>
                        <th>aktuelle unverrechnete Heiz- und Nebenkosten</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}} </td>
                        <td>{{$user->givenname}}</td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="number" class="form-control" name="{{$user->id}}" value="{{$user->currentadditionalcosts}}">
                            </div>                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            </div>
            
            <div class="container">
                <button class="btn btn-primary" type="submit">Speichern</button>
            </div>

        </form>

<br>
<br>

<div class="container"><a href="/manage" class="btn btn-primary">Zurück zu Verwalten...</a></div>

@endif

@endsection



