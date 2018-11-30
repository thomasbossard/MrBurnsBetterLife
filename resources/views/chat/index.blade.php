
@extends('layouts.app')

@section('content')


    <?php  $user = Auth::user();
    
                    if ($user->usertype_id == 1): ?>     
                        
                            <div class="container" style="margin-bottom: 10px;">
                                <a href="/manage" class="btn btn-link"><i class="fa fa-reply"></i>&nbsp;&nbsp;Zurück zu Verwalten</a>
                            </div>
                        
                    <?php elseif ($user->usertype_id == 3): ?>  
                        
                        <div class="container" style="margin-bottom: 10px;">
                                <a href="/work" class="btn btn-link"><i class="fa fa-reply"></i>&nbsp;&nbsp;Zurück zu Bearbeiten</a>
                        </div>

                    <?php endif; ?>




    <div class="container">
        <h3>Chat Nachrichten</h3>
        <hr class="style13">
    </div>
    
    
    <div style="text-align:center">
    <div class="article-list">
        <div class="container">
            <div class="intro"></div>
            <div class="row articles">
                @forelse ($friends as $friend)
                <div class="col-sm-6 col-md-4 item"><a href="{{ route('chat.show', $friend->id) }}"><img class="img-fluid" src="assets/img/chat.svg" style="width: 100px;height: 100px;"></a>
                <h5 class="name"><br><a href="{{ route('chat.show', $friend->id) }}" class="action" style="color:black">Chat mit {{ $friend->name }} {{ $friend->givenname }}</a><br><br></h5></div>           
                @empty
            </div>
        </div>
    </div>
    </div>
    
    
    
    <section>        
        <div class="text-center">
        <div class="container" style="margin-bottom: 20px;"><img class="img-fluid" src="assets/img/question.svg" style="width: 400px; height:400px;"></div>
        <h4 class="name"><br>Die Liste ist leer...</h4></div>
        </div>
        
    </section>

    @endforelse


@endsection