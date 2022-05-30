
    @if($group->goverment === 1)
        @if(empty($usersgroups[0])) 
        <div class="edit__" wire:click="add('{{$group->id}}')">
        <div class="edit__blok__">
        @else
        <div class="edit__" wire:click="delete('{{$group->id}}')">
        <div class="edit__blok__">
        @endif
    @else
        @if(empty($usersgroups[0])) 
        <div class="edit" wire:click="add('{{$group->id}}')">
        <div class="edit__blok">
        @else
        <div class="edit" wire:click="delete('{{$group->id}}')">
        <div class="edit__blok">
        @endif
    @endif     
    
        @if(!empty($usersgroups[0])) 
        <img src="/img/checked.png" alt="unchecked" class="checked__icon1">
        @else
        <img src="/img/unchecked.png" alt="unchecked" class="unchecked__icon1">
        @endif
        <p class="edit__blok__title">{{$group->name}}</p>
    </div>
    </div>
    
        


