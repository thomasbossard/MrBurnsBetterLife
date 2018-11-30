@extends('layouts.app')
@section('content')

<div class="container" style="padding-bottom: 25px;">
    <h3>Übersicht</h3>
    <hr class="style13">
</div>

    <div style="text-align:center">
    <div class="article-list">
        <div class="container">
            <div class="intro"></div>
            <div class="row articles">
                <div class="col-sm-6 col-md-4 item"><a href="allocateuser"><img class="img-fluid" src="assets/img/house.svg" style="width: 100px;height: 100px;"></a>
                    <h5 class="name"><br><a href="allocateuser" class="action" style="color:black">User und Objektzuweisung</a><br><br></h5></div>
                <div class="col-sm-6 col-md-4 item"><a href="getmessages"><img class="img-fluid" src="assets/img/messages.svg" style="width: 100px;height: 100px;"></a>
                    <h5 class="name"><br><a href="getmessages" class="action" style="color:black">Nachrichten Kontaktformular</a><br><br></h5></div>
                <div class="col-sm-6 col-md-4 item"><a href="newinvoice"><img class="img-fluid" src="assets/img/invoice.svg" style="width: 100px;height: 100px;"></a>
                    <h5 class="name"><br><a href="newinvoice" class="action" style="color:black">Neue Rechnung erfassen</a><br><br></h5></div>
                <div class="col-sm-6 col-md-4 item"><a href="newpayment"><img class="img-fluid" src="assets/img/receiving.svg" style="width: 100px;height: 100px;"></a>
                    <h5 class="name"><br><a href="newpayment" class="action" style="color:black">Neuen Zahlungseingang erfassen</a><br><br></h5></div>
                <div class="col-sm-6 col-md-4 item"><a href="newfile"><img class="img-fluid" src="assets/img/documents.svg" style="width: 100px;height: 100px;"></a>
                    <h5 class="name"><br><a href="newfile" class="action" style="color:black">Neues Dokument hinzufügen</a><br><br></h5></div>
                <div class="col-sm-6 col-md-4 item"><a href="newpushmessage"><img class="img-fluid" src="assets/img/send.svg" style="width: 100px;height: 100px;"></a>
                    <h5 class="name"><br><a href="newpushmessage" class="action" style="color:black">Neue Pushnachricht erstellen</a><br><br></h5></div>
                <div class="col-sm-6 col-md-4 item"><a href="chat"><img class="img-fluid" src="assets/img/chat.svg" style="width: 100px;height: 100px;"></a>
                    <h5 class="name"><br><a href="chat" class="action" style="color:black">Chat Nachrichten</a><br><br></h5></div>
            </div>
        </div>
    </div>
    </div>

@endsection