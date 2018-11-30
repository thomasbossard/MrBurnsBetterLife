@extends('layouts.app_chat')

@section('content')

    
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
    
                     <?php  $user = Auth::user();
                        if ($user->usertype_id == 2): ?>     
                        <div class="container" style="padding-top:10px"><a href="{{ url('/myobject') }}" class="btn btn-primary">Zurück zu Objekt...</a></div>
                        
                    <?php else: ?>  
                        <div class="container" style="padding-top:10px"><a href="{{ url('/chat') }}" class="btn btn-primary">Zurück zu Chatübersicht...</a></div>
                    <?php endif; ?>
    
@endsection
