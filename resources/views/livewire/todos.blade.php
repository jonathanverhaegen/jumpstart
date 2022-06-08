<div class="dash__container__not">
<img class="not__pic" src="/img/tgl_btn.png" alt="toggle"></a>
<p class="dash__not"> Notificaties</p> 
    
@foreach($todos as $todo)
<div class="dash__not__"  wire:click="delete('{{$todo->id}}')" >
        <img class="not__check" src="/img/unchecked.png" alt="checkbox"></a>
        <p class="not__titel">{{$todo->title}}</p>
        <p class="not__mess">{{$todo->text}}</p>
</div>
@endforeach

</div>

