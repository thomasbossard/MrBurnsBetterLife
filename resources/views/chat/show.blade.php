
@extends('layouts.app_chat')

@section('content')

    <audio id="ChatAudio">
        <source src="{{ asset('sounds/chat.mp3') }}">
    </audio>
    <meta name="friendId" content="{{ $friend->id }}">
    <div class="container">
        <div class="column is-8 is-offset-2">
            <div class="panel">
                <div class="panel-heading">
                  Sie schreiben mit:  {{ $friend->name }} {{ $friend->givenname }}
                  
                   <?php
                            $user = Auth::user();
                            if ($user->usertype_id == 2): ?> 
                    <div class="contain is-pulled-right">
                        <a href="{{ url('/myobject') }}" class="is-link"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </div>
                  <?php else: ?>
                  <div class="contain is-pulled-right">
                        <a href="{{ url('/chat') }}" class="is-link"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </div>
                   <?php endif; ?>
                  
                    <chat v-bind:chats="chats" v-bind:userid="{{ Auth::user()->id }}" v-bind:friendid="{{ $friend->id }}"></chat>
                </div>
            </div>
        </div>
    </div>
@endsection