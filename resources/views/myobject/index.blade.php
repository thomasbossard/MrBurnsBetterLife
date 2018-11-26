@extends('layouts.app')
@section('content')
      
    <div class="container" style="margin-bottom: 50px;">
        <div class="table-responsive" style="width: 75%;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Mein Objekt</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($rentableobject as $rentableobject)
                        <td>Adresse:</td>
                        <td>{{$rentableobject->street}} {{$rentableobject->housenumber}}, {{$rentableobject->zipcode}} {{$rentableobject->city}}</td>
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
                </tbody>
            </table>
        </div>
    </div>
    
    <div style="text-align:center">
   <div class="article-list">
        <div class="container">
            <div class="intro"></div>
            <div class="row articles">
                <div class="col-sm-6 col-md-4 item"><a href="invoices"><img class="img-fluid" src="assets/img/invoice.svg"></a>
                    <h4 class="name"><br><a href="invoices" class="action" style="color:black">Rechnungen<br><br></h4>
                </div>
                <div class="col-sm-6 col-md-4 item"><a href="files"><img class="img-fluid" src="assets/img/documents.svg"></a>
                    <h4 class="name"><br><a href="files" class="action" style="color:black">Dokumente</a><br><br></h4>                    
                </div>
                <div class="col-sm-6 col-md-4 item"><a href="messages"><img class="img-fluid" src="assets/img/chat.svg"></a>
                    <h4 class="name"><br><a href="messages" class="action" style="color:black">Nachrichten Hauswart</a><br><br></h4>
                </div>
                <div class="col-sm-6 col-md-4 item"><a href="messages"><img class="img-fluid" src="assets/img/chat.svg"></a>
                    <h4 class="name"><br><a href="messages" class="action" style="color:black">Nachrichten Verwaltung</a><br><br></h4>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Push Nachrichten</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pushmessage as $pushmessage)
                    <tr>
                        <td>{{$pushmessage->date}}</td>
                        <td>{{$pushmessage->text}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

