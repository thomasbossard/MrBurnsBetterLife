@extends('layouts.app_fileupload')

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

    <div class="container" style="margin-bottom: 10px;">
        <a href="/manage" class="btn btn-link"><i class="fa fa-reply"></i>&nbsp;&nbsp;Zurück zu Verwalten</a>
    </div>

    <div class="container">
            <h3>Neue Rechnung erfassen</h3>
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
        
</div>



    <div class="container">
            <h3>Rechnung löschen</h3>
            <hr class="style13">
    </div>

<form action="/deleteinvoice" method="post">
                {{ csrf_field() }}
                
                
            <div class="container" style="margin-bottom: 10px;">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Vorname</th>
                                <th>Name</th>
                                <th>Rechnung</th>
                                <th>Auswählen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                            <tr>
                                <td>{{$invoice->name}}</td>
                                <td>{{$invoice->givenname}}</td>
                                  <td><a href="/downloadinvoice/{{$invoice->id}}">{{$invoice->description}}</a></td>
                                <td><input type="checkbox" name="id[]" value="{{$invoice->id}}"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>      
            </div>
                               
            <div class="container" style="margin-bottom: 25px;">
                <button class="btn btn-primary" type="submit">Rechnung(en) löschen</button>
            </div>

    </form>


    
    <div class="container">
        <h3>Aktuelle unverrechnete Heiz und Nebenkosten bearbeiten</h3>
        <hr class="style13">
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
                        <th>Unverrechnete Heiz- und Nebenkosten</th>
                        <th>Unverrechnete Heiz- und Nebenkosten definieren</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}} </td>
                        <td>{{$user->givenname}}</td>
                        <td>{{$user->currentadditionalcosts}}</td>
                        <td>
                            <input type="number" class="form-control" placeholder="" name="{{$user->id}}" value="{{$user->currentadditionalcosts}}">                                                       
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
    


@endif

@endsection



