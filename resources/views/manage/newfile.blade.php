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
    </div>
    
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Mieter</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        <select class="browser-default custom-select" name="user_id" form="newfile">
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}} {{$user->givenname}}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="name" form="newfile">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



<div class="container" style="margin-bottom: 25px;">    
    <input type="file" id="real-file" hidden="hidden" form="newfile" name="fileupload">
    <button class="btn btn-primary" type="button" id="custom-button">Datei auswählen...</button>
    <span id="custom-text">Keine Datei ausgewählt.</span>
</div>



<div class="container" style="margin-bottom: 25px;">
    <form action="/newfile" id="newfile" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <button class="btn btn-primary" type="submit">Datei hochladen</button>
    </form>
</div>

<div class="container"><a href="/manage" class="btn btn-primary">Zurück zu Verwalten...</a></div>

@endif

@endsection



