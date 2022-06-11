<div class="search__container">
    <div class="search">
        <div class="search__icon"><img class="search__icon__img" src="{{asset('img/search-icon.svg')}}" alt="icon"></div>
        <div class="search__input"><input type="text" placeholder="Zoeken..."></div>
        <a href="/profiel/{{Auth::id()}}"><img class="prof__pic__" src="/attachments/{{Auth::user()->avatar}}" alt="profile pic"></a>
    </div>
</div>