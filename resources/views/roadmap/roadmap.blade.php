@extends('layouts/app')

@section('title', 'Homepage')

@section('content')



    <div class="container">

    <div class="header__container">
        <x-header />
    </div>

    <div class="body__container">
        <x-search />

        @if($errors->any())
        @component('components/notification')
        @slot('type') error @endslot
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endcomponent
        @endif

        @if($flash = session('error'))
        @component('components/notification')
        @slot('type') error @endslot
            <ul>
                <li>{{ $flash }}</li>
            </ul>
        @endcomponent
        @endif

        @if($flash = session('success'))
        @component('components/notification')
        @slot('type') success @endslot
            <ul>
                <li>{{ $flash }}</li>
            </ul>
        @endcomponent
        @endif

        @if($flash = session('message'))
        @component('components/notification')
        @slot('type') message @endslot
            <ul>
                <li>{{ $flash }}</li>
            </ul>
        @endcomponent
        @endif

        <div class="roadmap__container">
            <div class="roadmap">

                <a href="" data-stage="1" class="roadmap__stage roadmap__stage--1">
                    <p class="roadmap__stage__title roadmap__stage__title--left">Bank</p>
                    <p class="roadmap__stage__number">1</p>
                </a>

                <a @if($roadmap->stage > 1) href="" data-stage="2" @else style="opacity:0.4" @endif  class="roadmap__stage roadmap__stage--2">
                    <div class="roadmap__stage__number">2</div>
                    <div class="roadmap__stage__title roadmap__stage__title--right">Activiteiten</div>
                </a>

                <a @if($roadmap->stage > 2) href="" data-stage="3" @else style="opacity:0.4" @endif  class="roadmap__stage roadmap__stage--3">
                    <div class="roadmap__stage__title roadmap__stage__title--left">Sociale bijdragen</div>
                    <div class="roadmap__stage__number">3</div>
                </a>

                <a @if($roadmap->stage > 3) href="" data-stage="4" @else style="opacity:0.4" @endif  class="roadmap__stage roadmap__stage--4">
                    <div class="roadmap__stage__number">4</div>
                    <div class="roadmap__stage__title roadmap__stage__title--right">Sociaal- <br> verzekeringsfonds</div>
                </a>

                <a @if($roadmap->stage > 4) href="" data-stage="5" @else style="opacity:0.4" @endif  class="roadmap__stage roadmap__stage--5">
                    <div class="roadmap__stage__title roadmap__stage__title--left">Bank</div>
                    <div class="roadmap__stage__number">5</div>
                </a>

                <a @if($roadmap->stage > 5) href="" data-stage="6" @else style="opacity:0.4" @endif  class="roadmap__stage roadmap__stage--6">
                    <div class="roadmap__stage__number">6</div>
                    <div class="roadmap__stage__title roadmap__stage__title--right">Btw-administratie</div>
                </a>

                <a @if($roadmap->stage > 6) href="" data-stage="7" @else style="opacity:0.4" @endif  class="roadmap__stage roadmap__stage--7">
                    <div class="roadmap__stage__title roadmap__stage__title--left">Ondernemingsnummer</div>
                    <div class="roadmap__stage__number">7</div>
                </a>

                <a @if($roadmap->stage > 7) href="" data-stage="8" @else style="opacity:0.4" @endif  class="roadmap__stage roadmap__stage--8">
                    <div class="roadmap__stage__number">8</div>
                    <div class="roadmap__stage__title roadmap__stage__title--right">Student-zelfstandige</div>
                </a>

                <a class="roadmap__next" href="">
                    <img class="nextBtn" src="{{asset('/img/knop3.png')}}" alt="">
                </a>

            </div>
        </div>

        <div class="stage__container stage__container--1">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}" alt="back"></a>
                <div class="stage__header__stap">Stap 1</div>
                <div class="stage__header__extra"></div>
            </div>
            <div class="stage">
                <p class="stage__title">Open een bankrekening voor jouw professionele activitei</p>
                <p class="stage__text">Proficiat! Je hebt een businessidee bedacht en bent helemaal klaar om de stap richting student- zelfstandige te zetten. Om te beginnen heb je een professionele bankrekening nodig die je zal gebruiken als student-zelfstandige. Dit is nodig om je privétransacties mooi gescheiden te houden van je transacties als zelfstandige, dit maakt je boekhouding veel eenvoudiger en zorgt ervoor dat de fiscus niet zomaar kan meekijken in je privérekening.</p>
                <p class="stage__text">Deze rekening kan een normale zichtrekening zijn die omgezet wordt naar een professionele rekening vanaf het moment dat je een ondernemingsnummer hebt. Informeer bij je bank naar de verschillende opties en voordelen van de verschillende soorten professionele rekeningen.</p>
                <p class="stage__text"><strong>Let op:</strong> Je zal op dit moment nog geen ondernemingsnummer kunnen toevoegen aan je nieuwe rekening, dit kan pas wanneer je registratie in de Kruispuntbank van Ondernemingen voltooid is. Je hebt nu eenmaal éérst een bankrekening nodig, voor je een ondernemingsnummer kan aanvragen</p>
                <p class="stage__text"><strong>Tip:</strong> Nog geen uitgewerkt businessplan? Surf naar het startersplatform van VLAIO en werk je businessidee van A tot Z uit! https://startersgids.vlaio.be/nl</p>
            </div>
            @if($roadmap->check === 0)
            <div class="stage__btns">
                <a class="stagebtn stage1btn" href="">ING</a>
                <a class="stagebtn stage1btn" href="">ARGENTA</a>
                <a class="stagebtn stage1btn" href="">KBC</a>
                <a class="stagebtn stage1btn" href="">BELFIUS</a>
            </div>
            @endif
            <form class="stage__form__check" action="/check/iban" method="post">
            @csrf
                
                <input class="stage__form__check__input" type="text" name="iban" placeholder="IBAN">
                <button class="stage__form__check__btn" type="submit">Checken</button>
                <input class="stage__form__check__extra" type="hidden" name="bank">
                
            </form>
            <form class="stage__check" action="/check/stage1" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Stap afronden</button>
                    <input type="hidden" name="stage" value="1">
                </div>
            </form>
        </div>


        <div class="stage__container stage__container--2">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}"" alt="back"></a>
                <div class="stage__header__stap">Stap 2</div>
                <div class="stage__header__extra"></div>
            </div>
            <div class="stage">
                <p class="stage__title">Bepaal welke activiteiten je zal uitvoeren</p>
                <p class="stage__text">Voor je kan starten als student-zelfstandige, is het belangrijk om te weten welke activiteiten je zal
                                        uitvoeren. Elke activiteit heeft een NACE-code, die codes heb je nodig om je registratie als zelfstandige
                                        correct uit te voeren. Klik alle activiteiten die je wenst uit te voeren aan in de onderstaande lijst.
                                    </p>
            </div>

            @if($roadmap->check === 0)
            <div class="stage__btns">
                <form action="/check/link" method="post">
                @csrf
                    <input type="hidden" name="link" value="https://www.liantis.be/nacebel/nl">
                    <button class="stagebtn" type="submit">Liantis</button>
                </form>
            </div>
            @endif

        </div>

        <div class="stage__container stage__container--3">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}"" alt="back"></a>
                <div class="stage__header__stap">Stap 3</div>
                <div class="stage__header__extra"></div>
            </div>
            <div class="stage">
                <p class="stage__title">Bepaal of je gebruik wil maken van de vrijstellingsregeling voor sociale
                                        bijdragen</p>
                <p class="stage__text">Iedere werknemer in dit land betaalt sociale bijdragen, ook zelfstandigen. Van deze sociale bijdragen
worden onder andere de pensioenen, ziekte- en invaliditeitsuitkeringen en gezinsbijslag uitbetaald. Als
student-zelfstandige krijg je de keuze om gebruik te maken van een vrijstellingsregeling voor deze
sociale bijdragen. Dit kan enkel als je weet dat je netto niet meer dan 7.329,21 euro zal verdienen in
het jaar 2022. Kies je niet voor de vrijstellingsregeling betaal je als starter een voorlopige
minimumbijdrage van ongeveer 85 euro per kwartaal.</p>
                <p class="stage__text">Ligt je inkomen uiteindelijk onder de grens van 7.329,21 euro, krijg je de sociale bijdragen die je al
betaald had teruggestort. Ligt je inkomen tussen 7.329,21 euro en 14.658,44 euro, dan betaal je een
verminderde bijdrage die wordt berekend op het inkomen boven het grensbedrag. Bedraagt je
inkomen 14.658,44 euro of meer, dan betaal je dezelfde bijdrage als in hoofdberoep! Ben je niet zeker
of je over de grenswaarde van 7.329,21 euro zal zitten, is het veiliger om de minimumbijdrage van 85
euro per kwartaal te betalen en niet te kiezen voor de vrijstellingsregeling..</p>
            </div>
            @if($roadmap->check === 0)
            <div class="stage__btns">
                
            </div>
            @endif
            <form class="stage__check" action="/check/stage1" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Stap afronden</button>
                    <input type="hidden" name="stage" value="1">
                </div>
            </form>
        </div>

        <div class="stage__container stage__container--4">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}"" alt="back"></a>
                <div class="stage__header__stap">Stap 4</div>
                <div class="stage__header__extra"></div>
            </div>
            @if($roadmap->check === 0)
            <div class="stage__btns">
                
            </div>
            @endif
            <form class="stage__check" action="/check/stage1" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Stap afronden</button>
                    <input type="hidden" name="stage" value="1">
                </div>
            </form>
        </div>

        <div class="stage__container stage__container--5">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}"" alt="back"></a>
                <div class="stage__header__stap">Stap 5</div>
                <div class="stage__header__extra"></div>
            </div>
            @if($roadmap->check === 0)
            <div class="stage__btns">
                
            </div>
            @endif
            <form class="stage__check" action="/check/stage1" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Stap afronden</button>
                    <input type="hidden" name="stage" value="1">
                </div>
            </form>
        </div>

        <div class="stage__container stage__container--6">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}"" alt="back"></a>
                <div class="stage__header__stap">Stap 6</div>
                <div class="stage__header__extra"></div>
            </div>
            @if($roadmap->check === 0)
            <div class="stage__btns">
                
            </div>
            @endif
            <form class="stage__check" action="/check/stage1" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Stap afronden</button>
                    <input type="hidden" name="stage" value="1">
                </div>
            </form>
        </div>

        <div class="stage__container stage__container--7">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}"" alt="back"></a>
                <div class="stage__header__stap">Stap 7</div>
                <div class="stage__header__extra"></div>
            </div>
            @if($roadmap->check === 0)
            <div class="stage__btns">
                
            </div>
            @endif
            <form class="stage__check" action="/check/stage1" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Stap afronden</button>
                    <input type="hidden" name="stage" value="1">
                </div>
            </form>
        </div>

        <div class="stage__container stage__container--8">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}" alt="back"></a>
                <div class="stage__header__stap">Stap 8</div>
                <div class="stage__header__extra"></div>
            </div>
            @if($roadmap->check === 0)
            <div class="stage__btns">
                
            </div>
            @endif
            <form class="stage__check" action="/check/stage1" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Stap afronden</button>
                    <input type="hidden" name="stage" value="1">
                </div>
            </form>
        </div>

    </div>

    </div>

@endsection