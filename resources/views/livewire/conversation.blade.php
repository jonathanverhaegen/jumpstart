<div class="chat__detail">

                <div class="chat__detail__heading">
                    @if($conversation->user_one === Auth::id())
                    <img src="/img/{{$conversation->usertwo->avatar}}" alt="avatar" class="chat__detail__heading__profile">
                    <h2 class="chat__detail__heading__name">{{$conversation->usertwo->name}}</h2>
                    <div class="chat__detail__icons">
                        <img src="./img/search-icon-chat.svg" alt="Search in chat" class="chat__detail__icons__search">
                        <img src="./img/options-icon-chat.svg" alt="Options" class="chat__detail__icons__settings">
                    </div>
                    @else
                    <img src="./img/{{$conversation->userone->avatar}}" alt="Thomas" class="chat__detail__heading__profile">
                    <h2 class="chat__detail__heading__name">{{$conversation->userone->name}}</h2>
                    <div class="chat__detail__icons">
                        <img src="./img/search-icon-chat.svg" alt="Search in chat" class="chat__detail__icons__search">
                        <img src="./img/options-icon-chat.svg" alt="Options" class="chat__detail__icons__settings">
                    </div>
                    @endif
                </div>

                <div class="chat__detail__messages">
                    @foreach($conversation->chats as $chat)
                        @if($chat->sender_id === Auth::id())
                        <span class="chat__message chat__message--to">
                            {{$chat->text}}
                        </span>
                        @else
                        <span class="chat__message chat__message--from">
                            {{$chat->text}}
                        </span>
                        @endif
                    @endforeach
                    
                </div>

                <div class="chat__detail__send-message">
                    <input wire:model="textChat" type="text" name="send-message" id="send-message" class="chat__detail__send-message__input" placeholder="Typ hier iets…">
                    <input wire:click="addChat('{{$conversation->id}}')" type="submit" value="Verzenden"/>
                </div>

                

</div>
