@extends('layouts.app')
@section('content')
          
    <div class="container">
        <h3>Mein Objekt</h3>
        <hr class="style13">
    </div>
    
    <div class="container" style="margin-bottom: 25px;">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        
                        <th>Name</th>
                        <th>Adresse</th>
                        <th>Mietkosten</th>
                        <th>Verwaltung</th>
                        <th>Hauswart</th>
                        <th>Offene Heiz- und Nebenkosten 2018</th>                        
                    </tr>
                </thead>
                <tbody>                    
                    <tr>
                        @foreach ($rentableobject as $rentableobject)
                        <td>{{$rentableobject->name}}</td>
                        <td>{{$rentableobject->street}} {{$rentableobject->housenumber}}, {{$rentableobject->zipcode}} {{$rentableobject->city}}</td>                        
                        <td>{{$rentableobject->costpermonth}} .- pro Monat</td>
                        @endforeach         
                        
                        @foreach ($manager as $manager)
                        <td>{{$manager->name}} {{$manager->givenname}}</td>
                        @endforeach
                        
                        @foreach ($groundkeeper as $groundkeeper)
                        <td>{{$groundkeeper->name}} {{$groundkeeper->givenname}}</td>
                        @endforeach
                        
                        <td>{{$user->currentadditionalcosts}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <h3>Übersicht</h3>
        <hr class="style13">
    </div>

    <div style="text-align:center">
   <div class="team-boxed">
        <div class="container">
            <div class="intro"></div>
            <div class="row people">
                <div class="col-sm-6 col-md-4 item"><div class="box"><a href="invoices"><img class="img-fluid" src="assets/img/invoice.svg" style="width: 100px;height: 100px;"></a>
                    <h5 class="name"><a href="invoices" class="action" style="color:black">Rechnungen<br><br></h5></div>
                </div>
                <div class="col-sm-6 col-md-4 item"><div class="box"><a href="files"><img class="img-fluid" src="assets/img/documents.svg" style="width: 100px;height: 100px;"></a>
                    <h5 class="name"><a href="files" class="action" style="color:black">Dokumente</a><br><br></h5></div>                    
                </div>
                <div class="col-sm-6 col-md-4 item"><div class="box"><a href="chat/5"><img class="img-fluid" src="assets/img/chat.svg" style="width: 100px;height: 100px;"></a>
                    <h5 class="name"><a href="chat/5" class="action" style="color:black">Chat Nachrichten Verwaltung</a><br><br></h5></div>
                </div>
                <div class="col-sm-6 col-md-4 item"><div class="box"><a href="chat/4"><img class="img-fluid" src="assets/img/chat.svg" style="width: 100px;height: 100px;"></a>
                    <h5 class="name"><a href="chat/4" class="action" style="color:black">Chat Nachrichten Hauswart</a><br><br></h5></div>
                </div>
            </div>
        </div>
    </div>
    </div>  

    <div class="container" style="padding-bottom: 10px; padding-top: 25px;">
        <h3>Push Nachrichten</h3>
        <hr class="style13">
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Betreff</th>
                        <th>Nachricht</th>
                        <th>Datum</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pushmessage as $pushmessage)
                    <tr>                        
                        <td>{{$pushmessage->subject}}</td>
                        <td>{{$pushmessage->text}}</td>
                        <td>{{$pushmessage->date}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

