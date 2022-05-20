<div class="briefje">
    <p class="briefje__title">Mijn aangeduiden activiteiten</p>
    <p class="briefje__text">Hou dit lijstje bij de hand wanneer je je gaat aansluiten bij een sociaal verzekeringsfonds</p>

    @foreach($activities as $ac)
        <div class="activity__container--visible">
            <div class="activity" wire:click="deleteActivity({{$ac->id}})">
                <p class="activity__text">{{$ac->activity->code}}-{{$ac->activity->name}}</p>
                <img class="activity__icon" src="img/checked.png" alt="">
            </div>
        </div>
    @endforeach
    
</div>
