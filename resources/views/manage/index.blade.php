@extends('layouts.app')
@section('content')

<div class="container">
    <h3>Übersicht</h3>
    <hr class="style13">
</div>

    <div style="text-align:center">
    <div class="team-boxed">
        <div class="container">
            <div class="intro"></div>
            <div class="row people">
                <div class="col-sm-6 col-md-4 item"><div class="box"><a href="allocateuser"><img class="img-fluid" src="assets/img/house.svg" style="width: 100px;height: 100px;"></a>
                    <h5 class="name"><a href="allocateuser" class="action" style="color:black">Zuweisungen</a><br><br></h5></div></div>
                <div class="col-sm-6 col-md-4 item"><div class="box"><a href="getmessages"><img class="img-fluid" src="assets/img/messages.svg" style="width: 100px;height: 100px;"></a>
                    <h5 class="name"><a href="getmessages" class="action" style="color:black">Kontaktformular</a><br><br></h5></div></div>
                <div class="col-sm-6 col-md-4 item"><div class="box"><a href="newinvoice"><img class="img-fluid" src="assets/img/invoice.svg" style="width: 100px;height: 100px;"></a>
                    <h5 class="name"><a href="newinvoice" class="action" style="color:black">Rechnungen</a><br><br></h5></div></div>
                <div class="col-sm-6 col-md-4 item"><div class="box"><a href="newpayment"><img class="img-fluid" src="assets/img/receiving.svg" style="width: 100px;height: 100px;"></a>
                    <h5 class="name"><a href="newpayment" class="action" style="color:black">Zahlungseingang</a><br><br></h5></div></div>
                <div class="col-sm-6 col-md-4 item"><div class="box"><a href="newfile"><img class="img-fluid" src="assets/img/documents.svg" style="width: 100px;height: 100px;"></a>
                    <h5 class="name"><a href="newfile" class="action" style="color:black">Dokumente</a><br><br></h5></div></div>
                <div class="col-sm-6 col-md-4 item"><div class="box"><a href="newpushmessage"><img class="img-fluid" src="assets/img/send.svg" style="width: 100px;height: 100px;"></a>
                    <h5 class="name"><a href="newpushmessage" class="action" style="color:black">Pushnachrichten</a><br><br></h5></div></div>
                <div class="col-sm-6 col-md-4 item"><div class="box"><a href="chat"><img class="img-fluid" src="assets/img/chat.svg" style="width: 100px;height: 100px;"></a>
                    <h5 class="name"><a href="chat" class="action" style="color:black">Chatnachrichten</a><br><br></h5></div></div>
            </div>
        </div>
    </div>
    </div>

@endsection