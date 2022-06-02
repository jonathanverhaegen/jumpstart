<div class="header--mob">
    <div class="header--mob__img">
    

    </div>
</div>

@if(!empty(Auth::user()->roadmap))
<div class="header__links__mob">

        <a href="/dashboard" class="header__links__item__mob header__links__item__mob--other">
            <div class="header__links__mob__container">
                <img class="header__links__item__img__mob" src="{{asset('/img/business.png')}}" alt="">
                <p class="header__links__item__text__mob">Mijn business</p>
            </div>
        </a>
        
        <a href="/roadmap" class="header__links__item__mob">
            <div class="header__links__mob__container">
                <img class="header__links__item__img__mob" src="{{asset('/img/roadmap.png')}}" alt="">
                <p class="header__links__item__text__mob">Roadmap</p>
            </div>
        </a>
        

        <a href="/community" class="header__links__item__mob header__links__item__mob--other">
            <div class="header__links__mob__container">
                <img class="header__links__item__img__mob" src="{{asset('/img/comm.png')}}" alt="">
                <p class="header__links__item__text__mob">Community</p>
            </div>
        </a>

        <a href="/chat" class="header__links__item__mob">
            <div class="header__links__mob__container">
                <img class="header__links__item__img__mob" src="{{asset('/img/chat.png')}}" alt="">
                <p class="header__links__item__text__mob">Chat</p>
            </div>
        </a>

        <a href="/contacten" class="header__links__item__mob header__links__item__mob--other">
            <div class="header__links__mob__container">
                <img class="header__links__item__img__mob" src="{{asset('/img/contacten.png')}}" alt="">
                <p class="header__links__item__text__mob">Contacten</p>
            </div>
        </a>

        <a href="/instellingen-mobiel" class="header__links__item__mob">
            <div class="header__links__mob__container">
                <img class="header__links__item__img__mob" src="{{asset('/img/instellingen.png')}}" alt="">
                <p class="header__links__item__text__mob">Instellingen</p>
            </div>
        </a>

        <div class="header__logout__mob">
            <a class="btn btn--logout" href="/logout">Afmelden</a>
        </div>

</div>
@endif

@if(empty(Auth::user()->roadmap))
<div class="header__links__mob">

        <a href="/dashboard" class="header__links__item__mob header__links__item__mob--other">
            <div class="header__links__mob__container">
                <img class="header__links__item__img__mob" src="{{asset('/img/business.png')}}" alt="">
                <p class="header__links__item__text__mob">Mijn business</p>
            </div>
        </a>
        
        <a href="/community" class="header__links__item__mob">
            <div class="header__links__mob__container">
                <img class="header__links__item__img__mob" src="{{asset('/img/comm.png')}}" alt="">
                <p class="header__links__item__text__mob">Community</p>
            </div>
        </a>

        <a href="/chat" class="header__links__item__mob header__links__item__mob--other">
            <div class="header__links__mob__container">
                <img class="header__links__item__img__mob" src="{{asset('/img/chat.png')}}" alt="">
                <p class="header__links__item__text__mob">Chat</p>
            </div>
        </a>

        <a href="/contacten" class="header__links__item__mob ">
            <div class="header__links__mob__container">
                <img class="header__links__item__img__mob" src="{{asset('/img/contacten.png')}}" alt="">
                <p class="header__links__item__text__mob">Contacten</p>
            </div>
        </a>

        <a href="/instellingen-mobiel" class="header__links__item__mob header__links__item__mob--other">
            <div class="header__links__mob__container">
                <img class="header__links__item__img__mob" src="{{asset('/img/instellingen.png')}}" alt="">
                <p class="header__links__item__text__mob">Instellingen</p>
            </div>
        </a>

        <div class="header__logout__mob">
            <a class="btn btn--logout" href="/logout">Afmelden</a>
        </div>

</div>
@endif


<div class="header">
    <div class="header__img">
        <a href="/dashboard">
            <img src="{{asset('/img/logo1.png')}}" alt="">
        </a>
    </div>

    <div class="header__links">
        <a href="/dashboard" class="header__links__item">
            <img class="header__links__item__img" src="{{asset('/img/business.png')}}" alt="">
            <p class="header__links__item__text">Mijn business</p>
        </a>

        @if(!empty(Auth::user()->roadmap))
        <a href="/roadmap" class="header__links__item">
            <img class="header__links__item__img" src="{{asset('/img/roadmap.png')}}" alt="">
            <p class="header__links__item__text">Roadmap</p>
        </a>
        @endif

        <a href="/community" class="header__links__item">
            <img class="header__links__item__img" src="{{asset('/img/comm.png')}}" alt="">
            <p class="header__links__item__text">Community</p>
        </a>

        <a href="/chat" class="header__links__item">
            <img class="header__links__item__img" src="{{asset('/img/chat.png')}}" alt="">
            <p class="header__links__item__text">Chat</p>
        </a>

        <a href="/contacten" class="header__links__item">
            <img class="header__links__item__img" src="{{asset('/img/contacten.png')}}" alt="">
            <p class="header__links__item__text">Contacten</p>
        </a>

        <a href="/instellingen" class="header__links__item">
            <img class="header__links__item__img" src="{{asset('/img/instellingen.png')}}" alt="">
            <p class="header__links__item__text">Instellingen</p>
        </a>

        <div class="header__logout">
            <a class="btn btn--logout" href="/logout">Afmelden</a>
        </div>

    </div>
</div>