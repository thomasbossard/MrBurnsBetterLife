
@extends('layouts.app')

@section('content')
    
    @forelse ($friends as $friend)
    <div style="text-align:center">
    <div class="article-list">
        <div class="container">
            <div class="intro"></div>
            <div class="row articles">            
                <div class="col-sm-6 col-md-4 item"><a href="{{ route('chat.show', $friend->id) }}"><img class="img-fluid" src="assets/img/chat.svg" style="width: 200px;height: 200px;"></a>
                    <h4 class="name"><br><a href="{{ route('chat.show', $friend->id) }}" class="action" style="color:black">Chat mit {{ $friend->name }} {{ $friend->givenname }}</a><br><br></h4></div>           
            </div>
        </div>
    </div>
    </div>
    @empty
    
    
    <section>        
        <div class="text-center">
        <div class="container" style="margin-bottom: 20px;"><img class="img-fluid" src="assets/img/question.svg" style="width: 400px; height:400px;"></div>
        <h4 class="name"><br>Die Liste ist leer...</h4></div>
        </div>
        
    </section>

    @endforelse


@endsection