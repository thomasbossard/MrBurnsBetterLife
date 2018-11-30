@extends('layouts.app')
@section('content')
@if(session('message'))
	<div class='alert alert-success'>
		{{ session('message') }}
	</div>
@endif  
<body>
    
    <div class="container" style="margin-bottom: 10px;">
        <a href="/manage" class="btn btn-link"><i class="fa fa-reply"></i>&nbsp;&nbsp;Zurück zu Verwalten</a>
    </div>
    
    <div class="container">
        <h3>Nachrichten von Kontaktformular</h3>
        <hr class="style13">
    </div>

@if(!$allnewformcontents->isEmpty())         
    <form action="/processedform" method="post">
                {{ csrf_field() }}                

        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Vorname</th>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Betreff</th>
                            <th>Text</th>
                            <th>Auswählen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allnewformcontents as $formcontent)
                        <tr>
                            <td>{{$formcontent->firstname}}</td>
                            <td>{{$formcontent->givenname}}</td>
                            <td>{{$formcontent->email}}</td>
                            <td>{{$formcontent->subject}}</td>
                            <td>{{$formcontent->text}}</td>
                            <td><div class="checkbox"><input type="checkbox" name="id[]" value="{{$formcontent->id}}"></div></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>                

            <div class="container" style="padding-bottom: 50px;"><button class="btn btn-primary" type="submit">Nachricht verarbeiten</button></div>                  
    </form>
@endif
    
@if($allnewformcontents->isEmpty()) 
    <div class="container">
        Aktuell keine neuen Nachrichten...
    </div>
@endif
 

@if(!$allprocessedformcontents->isEmpty()) 
    
    <div class="container">
        <h3>Verarbeitete Nachrichten</h3>
        <hr class="style13">
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Vorname</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Betreff</th>
                        <th>Text</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allprocessedformcontents as $formcontent)
                    <tr>
                        <td>{{$formcontent->firstname}}</td>
                        <td>{{$formcontent->givenname}}</td>
                        <td>{{$formcontent->email}}</td>
                        <td>{{$formcontent->subject}}</td>
                        <td>{{$formcontent->text}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif

</body>           
@endsection