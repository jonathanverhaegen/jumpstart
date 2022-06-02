<div class="post__react">
    <div class="reaction__add">
        <input wire:model="newReaction" class="reaction__add__input" type="text" name="reaction" placeholder="Reactie..." wire:keydown.enter="addReaction('{{$post_id}}')">
        <label for="attachment"><img src="/img/back.png" alt=""></label>
        <input wire:model="attachment" class="reaction__add__files" accept=".png, .jpg, .jpeg, .ppt, .pdf, .doc, .docx" id="attachment" name="attachment" type="file">

        
    </div>
    <div class="reaction__attachment">
        <p class="name__attachment">{{$attachment}}</p>
    </div>
    

    <div class="reactions">
        @foreach($reactions as $react)
        <div class="reaction">
            <div class="reaction__text">
                <img class="reaction__img" src="/img/{{$react->user->avatar}}" alt="">
                <p class="reaction__text">{{$react->text}}</p>
                <img class="reaction__delete" src="/img/back.png" alt="delete" wire:click="delete('{{$react->id}}')">
            </div>
            @if(!empty($react->attachment))
            @if(str_contains($react->attachment->source, "png") || str_contains($react->attachment->source, "jpg") || str_contains($react->attachment->source, "jpeg"))
            <div class="reaction__attach__img">
                <img src="/attachments/{{$react->attachment->source}}" alt="">
            </div>
            @endif
            @endif
            @if(!empty($react->attachment))
            @if(str_contains($react->attachment->source, "pdf") || str_contains($react->attachment->source, "ppt") || str_contains($react->attachment->source, "doc") || str_contains($react->attachment->source, "docx"))
            <div class="reaction__attach">
                <a href="/attachments/{{$react->attachment->source}}" download>{{$react->attachment->name}}</a>
            </div>
            @endif
            @endif
        </div>
        @endforeach
    </div>
</div>
