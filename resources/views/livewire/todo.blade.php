
@foreach($todos as $todo)
<div class="dash__not__" wire:click="check('{{$todo->id}}')">
        <img class="not__check" src="/img/unchecked.png" alt="checkbox"></a>
        <p class="not__titel">{{$todo->title}}</p>
        <p class="not__mess">{{$todo->text}}</p>
</div>
@endforeach



