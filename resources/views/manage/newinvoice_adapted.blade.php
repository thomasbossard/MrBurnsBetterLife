@extends('layouts.app')
@section('content')

@if(session('message'))
	<div class='alert alert-success'>
		{{ session('message') }}
	</div>
@endif 

@if(!$users->isEmpty())

    <div class="container">
        <h3>Neuen Rechnung erfassen</h3>
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
                        <select name="user_id" form="newinvoice">
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}} {{$user->givenname}}</option>
                            @endforeach
                        </select>
                        </td>
                        
                        <td>
                        <select name="type_id" form="newinvoice">
                            @foreach ($invoicetypes as $invoicetype)
                                <option value="{{$invoicetype->id}}">{{$invoicetype->type}}</option>
                            @endforeach
                        </select>
                        </td>
                        
                        <td>
                            <input type="number" name="amount" form="newinvoice">
                        </td>
                            
                        <td>
                            <input type="text" name="description" form="newinvoice">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    


<div class="container" style="padding-bottom: 25px;">
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Datei hochladen</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Datei auswählen...</label>
  </div>
</div>
</div>


    <form action="/newinvoice" id="newinvoice" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="container"><button class="btn btn-primary" type="submit">Rechnung erfassen</button></div>
    </form>
@endif

@endsection