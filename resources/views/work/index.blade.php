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
                <div class="col-sm-6 col-md-4 item"><div class="box"><a href="/newpushmessage"><img class="img-fluid" src="assets/img/send.svg" style="width: 100px;height: 100px;"></a>
                    <h4 class="name"><a href="/newpushmessage" class="action" style="color:black">Pushnachrichten</a><br></h4></div>
                </div>
                <div class="col-sm-6 col-md-4 item"><div class="box"><a href="/chat"><img class="img-fluid" src="assets/img/chat.svg" style="width: 100px;height: 100px;"></a>
                    <h4 class="name"><a href="/chat" class="action" style="color:black">Chat Nachrichten</a><br></h4></div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection