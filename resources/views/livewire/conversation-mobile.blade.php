<div class="chat__detail__mobile">

                <div class="chat__detail__heading">
                    @if($conversation->user_one === Auth::id())
                    <img src="/attachments/{{$conversation->usertwo->avatar}}" alt="avatar" class="chat__detail__heading__profile">
                    <h2 class="chat__detail__heading__name">{{$conversation->usertwo->name}}</h2>
                    <div class="chat__detail__icons">
                        <img src="/img/search-icon-chat.svg" alt="Search in chat" class="chat__detail__icons__search">
                        <img src="/img/options-icon-chat.svg" alt="Options" class="chat__detail__icons__settings">
                    </div>
                    @else
                    <img src="/attachments/{{$conversation->userone->avatar}}" alt="Thomas" class="chat__detail__heading__profile">
                    <h2 class="chat__detail__heading__name">{{$conversation->userone->name}}</h2>
                    <div class="chat__detail__icons">
                        <img src="/img/search-icon-chat.svg" alt="Search in chat" class="chat__detail__icons__search">
                        <img src="/img/options-icon-chat.svg" alt="Options" class="chat__detail__icons__settings">
                    </div>
                    @endif
                </div>

                <div class="chat__detail__messages">
                    @foreach($conversation->chats as $chat)
                        @if($chat->sender_id === Auth::id())
                        <span class="chat__message chat__message--to">
                            <p>{{$chat->text}}</p>
                            @if(!empty($chat->attachment))
                                @if(str_contains($chat->attachment->source, "png") || str_contains($chat->attachment->source, "jpg") || str_contains($chat->attachment->source, "jpeg"))
                                    <img class="chat__attach__img" src="/attachments/{{$chat->attachment->source}}" alt="">
                                @endif
                                @if(str_contains($chat->attachment->source, "pdf") || str_contains($chat->attachment->source, "ppt") || str_contains($chat->attachment->source, "doc") || str_contains($chat->attachment->source, "docx"))
                                    <a class="chat__attach__down" href="/attachments/{{$chat->attachment->source}}" download>{{$chat->attachment->name}}</a>
                                @endif
                            @endif
                        </span>
                        @else
                        <span class="chat__message chat__message--from">
                            <p>{{$chat->text}}</p>
                            @if(!empty($chat->attachment))
                                @if(str_contains($chat->attachment->source, "png") || str_contains($chat->attachment->source, "jpg") || str_contains($chat->attachment->source, "jpeg"))
                                    <img class="chat__attach__img" src="/attachments/{{$chat->attachment->source}}" alt="">
                                @endif
                                @if(str_contains($chat->attachment->source, "pdf") || str_contains($chat->attachment->source, "ppt") || str_contains($chat->attachment->source, "doc") || str_contains($chat->attachment->source, "docx"))
                                    <a class="chat__attach__down" href="/attachments/{{$chat->attachment->source}}" download>{{$chat->attachment->name}}</a>
                                @endif
                            @endif
                        </span>
                        @endif
                    @endforeach
                    
                </div>

                <div class="chat__detail__send-message">
                    <textarea wire:model="textChat" type="text" name="send-message" id="send-message" class="chat__detail__send-message__input" placeholder="Typ hier iets…"></textarea>
                    <label for="attachment"><img src="/img/camera.png" alt=""></label>
                    <input wire:model="attachment" class="reaction__add__files" accept=".png, .jpg, .jpeg, .ppt, .pdf, .doc, .docx" id="attachment" name="attachment" type="file">
                    <input wire:click="addChat('{{$conversation->id}}')" type="submit" value="Verzenden"/>
                </div>

            </div>
