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
                                        @if(!empty($ac->briefjes[0]))
                                            @foreach($ac->briefjes as $b)
                                                @if($b->user_id === Auth::id())
                                                    <img class="activity__icon" src="/img/checked.png" alt="uitklappen">
                                                @endif
                                            @endforeach
                                        @else
                                        <img class="activity__icon" src="/img/unchecked.png" alt="uitklappen"> 
                                        @endif

                                        
                                        
                                        
                                    </div>
                                </div>
                                @endforeach
                            </div>
@endforeach
</div>
@endforeach
