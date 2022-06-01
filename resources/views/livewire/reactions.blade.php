<div class="post__react">
    <div class="reaction__add">
        <input wire:model="newReaction" class="reaction__add__input" type="text" name="reaction" placeholder="Reactie..." wire:keydown.enter="addReaction('{{$post_id}}')">
    </div>
    

    <div class="reactions">
        @foreach($reactions as $react)
        <div class="reaction">
            <img class="reaction__img" src="/img/{{$react->user->avatar}}" alt="">
            <p class="reaction__text">{{$react->text}}</p>
        </div>
        @endforeach
    </div>
</div>
