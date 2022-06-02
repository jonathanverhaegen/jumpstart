<div class="post__react">
    <div class="reaction__add">
        <input wire:model="newReaction" class="reaction__add__input" type="text" name="reaction" placeholder="Reactie..." wire:keydown.enter="addReaction('{{$post_id}}')">
        <label for="attachment"><img src="/img/back.png" alt=""></label>
        <input wire:model="attachment" class="reaction__add__files" accept=".png, .jpg, .jpeg" id="attachment" name="attachment" type="file">

        
    </div>
    <div class="reaction__attachment">
        <p class="name__attachment">{{$attachment}}</p>
    </div>
    

    <div class="reactions">
        @foreach($reactions as $react)
        <div class="reaction">
            <img class="reaction__img" src="/img/{{$react->user->avatar}}" alt="">
            <p class="reaction__text">{{$react->text}}</p>
            <img class="reaction__delete" src="/img/back.png" alt="delete" wire:click="delete('{{$react->id}}')">
        </div>
        @endforeach
    </div>
</div>
