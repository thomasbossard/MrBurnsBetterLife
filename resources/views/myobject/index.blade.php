@extends('layouts.app')
@section('content')
          
   <div style="text-align:center">
   <div class="article-list">
        <div class="container" style="padding-bottom: 25px;">
            <div class="intro"></div>
            <div class="row articles">
                <div class="col-sm-6 col-md-4 item"><a href="invoices"><img class="img-fluid" src="assets/img/invoice.svg" style="width: 200px;height: 200px;"></a>
                    <h4 class="name"><br><a href="invoices" class="action" style="color:black">Rechnungen<br><br></h4>
                </div>
                <div class="col-sm-6 col-md-4 item"><a href="files"><img class="img-fluid" src="assets/img/documents.svg" style="width: 200px;height: 200px;"></a>
                    <h4 class="name"><br><a href="files" class="action" style="color:black">Dokumente</a><br><br></h4>                    
                </div>
                <div class="col-sm-6 col-md-4 item"><a href="chat/5"><img class="img-fluid" src="assets/img/chat.svg" style="width: 200px;height: 200px;"></a>
                    <h4 class="name"><br><a href="chat" class="action" style="color:black">Nachrichten Hauswart</a><br><br></h4>
                </div>
                <div class="col-sm-6 col-md-4 item"><a href="chat/4"><img class="img-fluid" src="assets/img/chat.svg" style="width: 200px;height: 200px;"></a>
                    <h4 class="name"><br><a href="chat" class="action" style="color:black">Nachrichten Verwaltung</a><br><br></h4>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="container" style="padding-bottom: 10px;">
        <h4>Mein Objekt</h4>
    </div>
    
    <div class="container" style="margin-bottom: 25px;">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        @foreach ($rentableobject as $rentableobject)
                        <th>{{$rentableobject->name}}</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>                        
                        <td>Adresse:</td>
                        <td>{{$rentableobject->street}} {{$rentableobject->housenumber}}, {{$rentableobject->zipcode}} {{$rentableobject->city}}</td>
                        
                    </tr>
                        <tr>                        
                        <td>Mietkosten:</td>
                        <td>{{$rentableobject->costpermonth}} Franken pro Monat </td>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach ($manager as $manager)
                        <td>Manager:</td>
                        <td>{{$manager->name}} {{$manager->givenname}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach ($groundkeeper as $groundkeeper)
                        <td>Hauswart:</td>
                        <td>{{$groundkeeper->name}} {{$groundkeeper->givenname}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Offenene Heiz und Nebenkosten 2018:</td>
                        <td>{{$openamount}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div class="container" style="padding-bottom: 10px;">
        <h4>Push Nachrichten</h4>
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

