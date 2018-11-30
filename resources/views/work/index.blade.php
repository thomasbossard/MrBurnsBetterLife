@extends('layouts.app')
@section('content')

    <div class="container">
        <h3>Übersicht</h3>
        <hr class="style13">
    </div>

    <div style="text-align:center">
    <div class="article-list">
        <div class="container">
            <div class="intro"></div>
            <div class="row articles">
                <div class="col-sm-6 col-md-4 item"><a href="/newpushmessage"><img class="img-fluid" src="assets/img/send.svg" style="width: 200px;height: 200px;"></a>
                    <h4 class="name"><br><a href="/newpushmessage" class="action" style="color:black">Pushnachrichten</a><br><br></h4>
                </div>
                <div class="col-sm-6 col-md-4 item"><a href="/chat"><img class="img-fluid" src="assets/img/chat.svg" style="width: 200px;height: 200px;"></a>
                    <h4 class="name"><br><a href="/chat" class="action" style="color:black">Chat Nachrichten</a><br><br></h4>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection