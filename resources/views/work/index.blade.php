@extends('layouts.app')
@section('content')

    <div style="text-align:center">
    <div class="article-list">
        <div class="container">
            <div class="intro"></div>
            <div class="row articles">
                <div class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" src="assets/img/send.svg"></a>
                    <h4 class="name"><br><a href="#" class="action" style="color:black">Pushnachrichten</a><br><br></h4>
                </div>
                <div class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" src="assets/img/chat.svg"></a>
                    <h4 class="name"><br><a href="#" class="action" style="color:black">Nachrichten</a><br><br></h4>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection