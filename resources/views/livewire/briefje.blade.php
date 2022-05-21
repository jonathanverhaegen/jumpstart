@foreach($categories as $cat)
                        <div class="category__container">
                            
                            <div class="category">
                            <p class="category__text">{{$cat->name}}</p>
                            <img class="category__icon" src="/img/uitklappen.png" alt="uitklappen">
                            </div>

                            @foreach($cat->subcategories as $sub)
                            <div class="subcategory__container">
                                <div class="subcategory">
                                    <p class="subcategory__text">{{$sub->name}}</p>
                                    <img class="subcategory__icon" src="/img/uitklappen.png" alt="uitklappen">
                                </div>

                                @foreach($sub->activities as $ac)
                                <div class="activity__container">
                                    <div class="activity" wire:click="add({{$ac->id}})">
                                        <p class="activity__text">{{$ac->code}}-{{$ac->name}}</p>
                                        <img class="activity__icon" src="/img/unchecked.png" alt="uitklappen"> 
                                    </div>
                                </div>
                                @endforeach
                            </div>
@endforeach
</div>
@endforeach

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
