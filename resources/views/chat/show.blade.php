@extends('layouts.app_chat')

@section('content')


                     <?php  $user = Auth::user();
                        if ($user->usertype_id == 2): ?>     
                        
                        <div class="container" style="margin-bottom: 10px;">
                            <a href="/myobject" class="btn btn-link"><i class="fa fa-reply"></i>&nbsp;&nbsp;Zurück zu Objekt</a>
                        </div>
                        
                    <?php else: ?>  
                        
                        <div class="container" style="margin-bottom: 10px;">
                            <a href="/chat" class="btn btn-link"><i class="fa fa-reply"></i>&nbsp;&nbsp;Zurück zu Chatübersicht</a>
                        </div>
                        
                    <?php endif; ?>



    

    

    
    <meta name="friendId" content="{{ $friend->id }}">    
      
    <div class="container">
        <h3>Chat mit {{ $friend->name }} {{ $friend->givenname }}</h3>
        <hr class="style13">
    </div>
        
    <div class="container">
        <div class="column is-8 is-offset-2">
            <div class="panel">
                <div class="panel-heading">                  
                    <chat v-bind:chats="chats" v-bind:userid="{{ Auth::user()->id }}" v-bind:friendid="{{ $friend->id }}"></chat>
                </div>
            </div>
        </div>
    </div>
    
@endsection
