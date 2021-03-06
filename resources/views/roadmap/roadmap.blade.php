@extends('layouts/app')

@section('title', 'Roadmap')

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

            @if($roadmap->stop === 0)

                <a href="" data-stage="1" class="roadmap__stage roadmap__stage--1">
                    <p class="roadmap__stage__title roadmap__stage__title--left">Bedrijfsgegevens</p>
                    <p class="roadmap__stage__number">1</p>
                    <img src="{{asset('img/stengel.png')}}" alt="stengel" class="stengel__icon1">
                </a>

                <a @if($roadmap->stage > 1) href="" data-stage="2" @else style="opacity:0.4" @endif  class="roadmap__stage roadmap__stage--2">
                    <div class="roadmap__stage__number">2</div>
                    <div class="roadmap__stage__title roadmap__stage__title--right">Bank</div>
                    <img src="{{asset('img/stengel.png')}}" alt="stengel" class="stengel__icon2">
                </a>

                <a @if($roadmap->stage > 2) href="" data-stage="3" @else style="opacity:0.4" @endif  class="roadmap__stage roadmap__stage--3">
                    <div class="roadmap__stage__title roadmap__stage__title--left">Activiteiten</div>
                    <div class="roadmap__stage__number">3</div>
                    <img src="{{asset('img/stengel.png')}}" alt="stengel" class="stengel__icon3">
                </a>

                <a @if($roadmap->stage > 3) href="" data-stage="4" @else style="opacity:0.4" @endif  class="roadmap__stage roadmap__stage--4">
                    <div class="roadmap__stage__number">4</div>
                    <div class="roadmap__stage__title roadmap__stage__title--right">Sociale bijdragen</div>
                    <img src="{{asset('img/stengel.png')}}" alt="stengel" class="stengel__icon4">
                </a>

                <a @if($roadmap->stage > 4) href="" data-stage="5" @else style="opacity:0.4" @endif  class="roadmap__stage roadmap__stage--5">
                    <div class="roadmap__stage__title roadmap__stage__title--left">Sociaal<br> verzekeringsfonds</div>
                    <div class="roadmap__stage__number">5</div>
                    <img src="{{asset('img/stengel.png')}}" alt="stengel" class="stengel__icon5">
                </a>

                <a @if($roadmap->stage > 5) href="" data-stage="6" @else style="opacity:0.4" @endif  class="roadmap__stage roadmap__stage--6">
                    <div class="roadmap__stage__number">6</div>
                    <div class="roadmap__stage__title roadmap__stage__title--right">Btw-administratie</div>
                    <img src="{{asset('img/stengel.png')}}" alt="stengel" class="stengel__icon6">
                </a>

                <a @if($roadmap->stage > 6) href="" data-stage="7" @else style="opacity:0.4" @endif  class="roadmap__stage roadmap__stage--7">
                    <div class="roadmap__stage__title roadmap__stage__title--left">Ondernemingsnummer</div>
                    <div class="roadmap__stage__number">7</div>
                    <img src="{{asset('img/stengel.png')}}" alt="stengel" class="stengel__icon7">
                </a>

                <a @if($roadmap->stage > 7) href="" data-stage="8" @else style="opacity:0.4" @endif  class="roadmap__stage roadmap__stage--8">
                    <div class="roadmap__stage__title roadmap__stage__title--left">Student-zelfstandige</div>
                    <div class="roadmap__stage__number">8</div>
                    <img src="{{asset('img/stengel.png')}}" alt="stengel" class="stengel__icon8">
                </a>

                <a class="roadmap__next" href="">
                    <img class="nextBtn" src="{{asset('/img/knop3.png')}}" alt="">
                </a>

                <a class="roadmap__back" href="">
                    <img class="backBtn" src="{{asset('/img/knop3.png')}}" alt="">
                </a>
                @endif

                @if($roadmap->stop === 1)

                    <a href="" data-stage="1" class="roadmap__stage roadmap__stage--2-1">
                        <p class="roadmap__stage__title roadmap__stage__title--left">Wat wil je doen</p>
                        <p class="roadmap__stage__number">1</p>
                        <img src="{{asset('img/stengel.png')}}" alt="stengel" class="stengel__icon1 stengel__icon1__stop stengel__icon1__stop2">
                    </a>

                    <a @if($roadmap->stage > 1) href="" data-stage="2" @else style="opacity:0.4" @endif  class="roadmap__stage roadmap__stage--2-2">
                        <div class="roadmap__stage__number">2</div>
                        <div class="roadmap__stage__title roadmap__stage__title--right">Zet je onderneming stop</div>
                        <img src="{{asset('img/stengel.png')}}" alt="stengel" class="stengel__icon2 stengel__icon2__stop stengel__icon2__stop2">
                    </a>

                    <a @if($roadmap->stage > 2) href="" data-stage="3" @else style="opacity:0.4" @endif  class="roadmap__stage roadmap__stage--2-3">
                        <div class="roadmap__stage__title roadmap__stage__title--left">Stopzetten van je btw-nummer</div>
                        <div class="roadmap__stage__number">3</div>
                        <img src="{{asset('img/stengel.png')}}" alt="stengel" class="stengel__icon3 stengel__icon3__stop stengel__icon3__stop2">
                    </a>

                    <a @if($roadmap->stage > 3) href="" data-stage="4" @else style="opacity:0.4" @endif  class="roadmap__stage roadmap__stage--2-4">
                        <div class="roadmap__stage__number">4</div>
                        <div class="roadmap__stage__title roadmap__stage__title--right">Zet je statuut als zelfstandige stop</div>
                        <img src="{{asset('img/stengel.png')}}" alt="stengel" class="stengel__icon4 stengel__icon4__stop stengel__icon4__stop2">
                    </a>

                    <a @if($roadmap->stage > 4) href="" data-stage="5" @else style="opacity:0.4" @endif  class="roadmap__stage roadmap__stage--2-5">
                        <div class="roadmap__stage__title roadmap__stage__title--left">Licht je bank in</div>
                        <div class="roadmap__stage__number">5</div>
                        <img src="{{asset('img/stengel.png')}}" alt="stengel" class="stengel__icon5 stengel__icon5__stop stengel__icon5__stop2">
                    </a>

                @endif

            </div>
        </div>

        @if($roadmap->stop === 1)
            <div class="stage__container stage__container--1">
                <div class="stage__header">
                    <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}" alt="back"></a>
                    <div class="stage__header__stap">Stap 1</div>
                    <div class="stage__header__extra"></div>
                </div>
                <div class="stage">
                    <p class="stage__title">Wat wil je doen met je onderneming</p>
                    <p class="stage__text">Vertel ons hieronder wat je met je onderneming wilt doen</p>
                </div>
                    
                @if($roadmap->stage === 1 && $roadmap->check === 0 && $roadmap->extra === 0)
                    <form class="form--stage form__stop__radio" action="/statuut/stop/stap1" method="post">
                    @csrf
                        <div class="form--stage__field__radio">
                            <input type="radio" name="waarom" value="stop"><label for="bevestig">Ik wil stoppen met mijn onderneming</label>
                        </div>
                        <div class="form--stage__field__radio">
                            <input type="radio" name="waarom" value="hoofdberoep"><label for="bevestig">Ik wil van mijn onerneming mijn hoofdberoep maken</label>  
                        </div>
                        <div class="form--stage__field__radio">
                            <input type="radio" name="waarom" value="bijberoep"><label for="bevestig">Ik wil van mijn onderneming mijn bijberoep maken</label>
                        </div>

                        <div class="form__btn">
                            <button class="stage__form__check__btn" type="submit">Checken</button>
                        </div>

                        

                    </form>
                @endif

                @if($roadmap->stage === 1 && $roadmap->extra === 1)
                    <p>Hieronder vind je een link</p>
                @endif

                @if($roadmap->stage === 1 && $roadmap->extra === 2)
                    <p>Hieronder vind je een link</p>
                @endif

                @if($roadmap->stage === 1 && $roadmap->check === 1)
                    <form class="stage__check" action="/check/stage/stop" method="post">
                    @csrf
                        <div class="stage__check__btn">
                            <button type="submit" class="stageCheckBtn">Ik wil deze stap afronden</button>
                            <input type="hidden" name="stage" value="1">
                        </div>
                    </form>
                @endif
            </div>

            <div class="stage__container stage__container--2">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}" alt="back"></a>
                <div class="stage__header__stap">Stap 2</div>
                <div class="stage__header__extra"></div>
            </div>
            <div class="stage">
                <p class="stage__title">Zet je onderneming stop in de Kruispuntbank van Ondernemingen</p>
                <p class="stage__text">Het stopzetten van je onderneming is eigenlijk bijna even eenvoudig als het starten van je onderneming: bij de start schrijf je in, bij de stop schrijf je je uit. Alle gegevens die bij het begin van je zelfstandige avontuur in de KBO werden genoteerd, zet je nu stop: activiteiten, vestigingen en bankrekeningnummer. Dit kan je gewoon laten doen door het ondernemingsloket van het sociaal verzekeringsfonds waarbij je bent ingeschreven.</p>
            </div>
            @if($roadmap->stage === 2)
            <form class="stage__check" action="/check/stage/stop" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Ik wil deze stap afronden</button>
                    <input type="hidden" name="stage" value="2">
                </div>
            </form>
            @endif
        </div>

        <div class="stage__container stage__container--3">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}" alt="back"></a>
                <div class="stage__header__stap">Stap 3</div>
                <div class="stage__header__extra"></div>
            </div>
            <div class="stage">
                <p class="stage__title">Stopzetten van je btw-nummer</p>
                <p class="stage__text">Ook de btw-administratie moet weten dat je onderneming de activiteiten stopzet, zelfs als je gebruik maakt van de vrijstellingsregeling. Dat dient te gebeuren binnen de maand na stopzetting in de KBO, anders krijg je een boete. Na deze stopzetting dien je nog ????n keer de btw-aangifte in, net als een allerlaatste klantenlisting.</p>
                <p class="stage__text">Dit kan je heel eenvoudig doen door online het formulier 604C in te vullen op deze link: </br> <a href="https://eservices.minfin.fgov.be/VAT001/" target="_blank">https://eservices.minfin.fgov.be/VAT001/</a></p>
            </div>

            @if($roadmap->stage === 3)
            <form class="stage__check" action="/check/stage/stop" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Ik wil deze stap afronden</button>
                    <input type="hidden" name="stage" value="3">
                </div>
            </form>
            @endif
        </div>

        <div class="stage__container stage__container--4">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}" alt="back"></a>
                <div class="stage__header__stap">Stap 4</div>
                <div class="stage__header__extra"></div>
            </div>
            <div class="stage">
                <p class="stage__title">Zet je statuut als zelfstandige stop</p>
                <p class="stage__text">Stop je als zelfstandige? Dan stopt ook je aansluiting als zelfstandige bij je sociaal verzekeringsfonds. Ook hiervoor kan je eenvoudig contact opnemen met je sociaal verzekeringsfonds. Zij zullen je vragen enkele documenten in te vullen, en zullen op die manier jouw stopzetting in orde brengen</p>
            </div>

            @if($roadmap->stage === 4)
            <form class="stage__check" action="/check/stage/stop" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Ik wil deze stap afronden</button>
                    <input type="hidden" name="stage" value="4">
                </div>
            </form>
            @endif
        </div>

        <div class="stage__container stage__container--5">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}" alt="back"></a>
                <div class="stage__header__stap">Stap 5</div>
                <div class="stage__header__extra"></div>
            </div>
            <div class="stage">
                <p class="stage__title">Licht je bank in</p>
                <p class="stage__text">Als je stopzetting als zelfstandige volledig in orde is gebracht, is de laatste stap ook je bank hiervan op de hoogte te brengen. Er zijn hier twee opties, ofwel behoud je de bankrekening en vraag je aan de bank om je rekening terug om te zetten naar een rekening voor persoonlijk gebruik, ofwel schrijf je alles wat nog op die rekening staat over naar een persoonlijke rekening en vraag je de bank om deze rekening af te sluiten. Voor meer informatie daarvoor, neem je best contact op met je bank.</p>
            </div>
            @if($roadmap->stage === 5)
            <form class="stage__check" action="/check/stage/stop" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Ik wil deze stap afronden</button>
                    <input type="hidden" name="stage" value="5">
                </div>
            </form>
            @endif
        </div>


        @endif

        @if($roadmap->stop === 0)
        <div class="stage__container stage__container--1">
            <div class="stage__header">
                    <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}" alt="back"></a>
                    <div class="stage__header__stap">Stap 1</div>
                    <div class="stage__header__extra"></div>
                </div>
            <div class="stage">
                <p class="stage__title">Bedrijfsgegevens</p>
                <p class="stage__text">Vul hieronder de gegevens in die je zal gebruiken voor je toekomstig bedrijf. Wij slagen ze voor jou op in onze database!</p>
            </div>
            @if($roadmap->stage === 1 && $roadmap->check === 0)
            <form class="form--stage" action="/add/company" method="post">
                @csrf
                    <div class="form--stage__field">
                        <p class="form--stage__field__title">Algemene bedrijfsgegevens</p>
                        <input type="text" class="form--stage__field__input" name="naam" placeholder="Naam van je toekomstige onderneming">
                        <input type="text" class="form--stage__field__input" name="emailadres" placeholder="E-mailadres van je onderneming">
                        <input type="number" class="form--stage__field__input" name="telefoon" placeholder="Telefoonnummer van je onderneming">
                        <p class="form--stage__field__title">Adresgegevens</p>
                        <input type="text" class="form--stage__field__input" name="straat" placeholder="Straatnaam">
                        <input type="number" class="form--stage__field__input" name="nummer" placeholder="Huisnummer">
                        <input type="text" class="form--stage__field__input" name="plaats" placeholder="Plaats">
                        <input type="number" class="form--stage__field__input" name="postcode" placeholder="Postcode">
                        <button type="submit" class="form--stage__field__btn">Verzenden</button>
                    </div>
            </form>
            @endif
            @if($roadmap->stage === 1 && $roadmap->check === 1)
            <form class="stage__check" action="/check/stage" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Ik wil deze stap afronden</button>
                    <input type="hidden" name="stage" value="1">
                </div>
            </form>
            @endif
        </div>

        <div class="stage__container stage__container--2">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}" alt="back"></a>
                <div class="stage__header__stap">Stap 2</div>
                <div class="stage__header__extra"></div>
            </div>
            <div class="stage">
                <p class="stage__title">Open een bankrekening voor jouw professionele activiteit</p>
                <p class="stage__text">Proficiat! Je hebt een businessidee bedacht en bent helemaal klaar om de stap richting student- zelfstandige te zetten. Om te beginnen heb je een professionele bankrekening nodig die je zal gebruiken als student-zelfstandige. Dit is nodig om je priv??transacties mooi gescheiden te houden van je transacties als zelfstandige, dit maakt je boekhouding veel eenvoudiger en zorgt ervoor dat de fiscus niet zomaar kan meekijken in je priv??rekening.</p>
                <p class="stage__text">Deze rekening kan een normale zichtrekening zijn die omgezet wordt naar een professionele rekening vanaf het moment dat je een ondernemingsnummer hebt. Informeer bij je bank naar de verschillende opties en voordelen van de verschillende soorten professionele rekeningen.</p>
                <p class="stage__text"><strong>Let op:</strong> Je zal op dit moment nog geen ondernemingsnummer kunnen toevoegen aan je nieuwe rekening, dit kan pas wanneer je registratie in de Kruispuntbank van Ondernemingen voltooid is. Je hebt nu eenmaal ????rst een bankrekening nodig, voor je een ondernemingsnummer kan aanvragen</p>
                <p class="stage__text"><strong>Tip:</strong> Nog geen uitgewerkt businessplan? Surf naar het startersplatform van VLAIO en werk je businessidee van A tot Z uit! <a target="_blank" href="https://startersgids.vlaio.be/nl">https://startersgids.vlaio.be/nl</a></p>
            </div>
            @if($roadmap->stage === 2 && $roadmap->check === 0)
            <div class="stage__btns">
                <a class="stagebtn stage1btn" href="">ING</a>
                <a class="stagebtn stage1btn" href="">ARGENTA</a>
                <a class="stagebtn stage1btn" href="">KBC</a>
                <a class="stagebtn stage1btn" href="">BELFIUS</a>
                <a class="stagebtn stage1btn" href="">BNP Paribas Fortis</a>
                <a class="stagebtn stage1btn" href="">AXA</a>
                <a class="stagebtn stage1btn" href="">Crelan</a>
            </div>
            @endif
            <form class="stage__form__check" action="/check/iban" method="post">
            @csrf
                <input class="stage__form__check__input" type="text" name="iban" placeholder="IBAN">
                <button class="stage__form__check__btn" type="submit">Checken</button>
                <input class="stage__form__check__extra" type="hidden" name="bank">
            </form>
            @if($roadmap->stage === 2 && $roadmap->check === 1)
            <form class="stage__check" action="/check/stage" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Ik wil deze stap afronden</button>
                    <input type="hidden" name="stage" value="2">
                </div>
            </form>
            @endif
        </div>


        <div class="stage__container stage__container--3">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}"" alt="back"></a>
                <div class="stage__header__stap">Stap 3</div>
                <div class="stage__header__extra"></div>
            </div>
            <div class="stage">
                <p class="stage__title">Bepaal welke activiteiten je zal uitvoeren</p>
                <p class="stage__text">Voor je kan starten als student-zelfstandige, is het belangrijk om te weten welke activiteiten je zal buitvoeren. Elke activiteit heeft een NACE-code, die codes heb je nodig om je registratie als zelfstandige correct uit te voeren. Klik alle activiteiten die je wenst uit te voeren aan in de onderstaande lijst.</p>
            </div>

            <div class="stage2__form"> 
                @if(empty($briefjes[0]))
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
                                    <div class="activity">
                                        <p class="activity__text">{{$ac->code}}-{{$ac->name}}</p>
                                        <img class="activity__icon" src="/img/unchecked.png" alt="uitklappen">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    @endif
                    
                    <div class="briefje">
                        <p class="briefje__title">Mijn aangeduide activiteiten</p>
                        <p class="briefje__text">Houd dit lijstje bij de hand wanneer je je gaat aansluiten bij een sociaal verzekeringsfonds</p>
                        @if(!empty($briefjes[0]))
                        
                        @foreach($briefjes as $b)
                            <div class="activity__container--visible">
                                <div class="activity">
                                <p class="activity__text">{{$b->activity->code}}-{{$b->activity->name}}</p>
                                <img class="activity__icon" src="img/checked.png" alt="">
                                </div>
                            </div>
                        @endforeach
                        
                        @endif
                    </div>
                    <form class="briefjeAdd" action="/add/briefje" method="post">
                    @csrf
                        @if(empty($briefjes[0]))
                        <button>Briefje opslaan</button>
                        @endif
                    </form>
                    
                    <form class="briefjeAdd briefjeAdd--delete" action="/delete/briefje" method="post">
                    @csrf
                    @if(!empty($briefjes[0]))
                    @foreach($briefjes as $b)
                            <input type="hidden" value="{{$b->activity->code}}" name="code[]">
                        @endforeach
                        <button >Verwijder briefje</button>
                    @endif
                    </form>
                </div>

            @if($roadmap->stage === 3 && $roadmap->check === 1)
            <form class="stage__check" action="/check/stage" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Ik wil deze stap afronden</button>
                    <input type="hidden" name="stage" value="3">
                </div>
            </form>
            @endif
        </div>

        <div class="stage__container stage__container--4">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}"" alt="back"></a>
                <div class="stage__header__stap">Stap 4</div>
                <div class="stage__header__extra"></div>
            </div>
            <div class="stage">
                <p class="stage__title">Bepaal of je gebruik wil maken van de vrijstellingsregeling voor sociale
                                        bijdragen</p>
                <p class="stage__text">Iedere werknemer in dit land betaalt sociale bijdragen, ook zelfstandigen. Van deze sociale bijdragen worden onder andere de pensioenen, ziekte- en invaliditeitsuitkeringen en gezinsbijslag uitbetaald. Als student-zelfstandige krijg je de keuze om gebruik te maken van een vrijstellingsregeling voor deze sociale bijdragen. Dit kan enkel als je weet dat je netto niet meer dan 7.329,21 euro zal verdienen in het jaar 2022. Kies je niet voor de <strong>vrijstellingsregeling</strong> betaal je als starter een voorlopige minimumbijdrage van ongeveer 85 euro per kwartaal.</p>
                <p class="stage__text">Ligt je inkomen uiteindelijk onder de grens van 7.329,21 euro, krijg je de sociale bijdragen die je al betaald had teruggestort. Ligt je inkomen tussen 7.329,21 euro en 14.658,44 euro, dan betaal je een verminderde bijdrage die wordt berekend op het inkomen boven het grensbedrag. Bedraagt je inkomen 14.658,44 euro of meer, dan betaal je dezelfde bijdrage als in hoofdberoep! Ben je niet zeker of je over de grenswaarde van 7.329,21 euro zal zitten, is het veiliger om de minimumbijdrage van 85 euro per kwartaal te betalen en niet te kiezen voor de vrijstellingsregeling..</p>
                <p class="stage__text"><strong>Tip:</strong> Wil je meer weten over de sociale bijdragen die je moet betalen als student-zelfstandige? Lees er meer over op de website van VLAIO: <a target="_blank" href="https://www.vlaio.be/nl/begeleiding-advies/start/je-statuut-als-zelfstandige/statuut-van-student-zelfstandige">https://www.vlaio.be/nl/begeleiding-advies/start/je-statuut-als-zelfstandige/statuut-van-student-zelfstandige</a></p>
            </div>
            @if($roadmap->stage === 4 && $roadmap->check === 0)
            <form class="formStage3" action="/check/inputStage4" method="post">
            @csrf
                <div class="stage__btns">
                    <a class="stagebtn3" data-exemption="0" href="#" >Ik kies <span class="roadmap__span">niet</span> voor de vrijstellingsregeling</a>
                    <a class="stagebtn3" data-exemption="1" href="#" >Ik kies <span class="roadmap__span">wel</span> voor de vrijstellingsregeling</a>
                    <a class="stagebtn3" data-exemption="2" href="#" >Ik weet het nog niet, ik laat mij informeren door een sociaal verzekeringsfonds</a>
                </div>
                <input type="hidden" name="vrijstelling" class="exemption">
            </form>
            @endif
            @if($roadmap->stage === 4 && $roadmap->check === 1)
            <form class="stage__check" action="/check/stage" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Ik heb mijzelf aangesloten bij een sociaal verzekeringsfonds</button>
                    <input type="hidden" name="stage" value="4">
                </div>
            </form>
            @endif
        </div>

        <div class="stage__container stage__container--5">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}"" alt="back"></a>
                <div class="stage__header__stap">Stap 5</div>
                <div class="stage__header__extra"></div>
            </div>
            <div class="stage">
                <p class="stage__title">Sluit je aan bij een sociaal verzekeringsfonds en registreer je onderneming in de KBO</p>
                <p class="stage__text">Nu je een professionele rekening hebt, weet welke activiteiten je zal uitvoeren ??n beslist hebt op welke manier je graag wel of geen sociale bijdragen wilt betalen, kan je jezelf aansluiten bij een sociaal verzekeringsfonds. Het is wettelijk verplicht je aan te sluiten bij een sociaal verzekeringsfonds, zij doen eigenlijk niet veel meer dan voor jou berekenen hoeveel sociale bijdragen je moet betalen. Zij storten wat jij betaalt, rechtstreeks door naar de overheid</p>
                <p class="stage__text">Vaak is een sociaal verzekeringsfonds ook een ondernemingsloket, en die heb je dan weer nodig om je onderneming te kunnen registreren in de ???Kruispuntbank van Ondernemingen???, afgekort KBO. De KBO is een databank van de FOD Economie waarin alle basisgegevens van alle Belgische ondernemingen verzameld worden. Om aan de slag te kunnen als zelfstandige, moet jouw unieke ondernemingsnummer hierin opgenomen zijn.</p>
                <p class="stage__text">De voornaamste sociale verzekeringsfondsen waaruit je in Vlaanderen kan kiezen zijn:</p>
                <ul class="stage__list">
                    <li>Xerius</li>
                    <li>Liantis</li>
                    <li>Partena</li>
                    <li>Acerta</li>
                    <li>Securex</li>
                    <li>Avixi</li>
                    <li>Nationale Hulpkas</li>
                </ul>
                <p class="stage__text"><strong>Tip:</strong> Welk sociaal verzekeringsfonds is het beste voor jou?</p>
            </div>
            @if($roadmap->stage === 5 && $roadmap->check === 0)
            <form class="formStage4" action="/check/inputStage5" method="post">
            @csrf
                <p class="stage__text">Je sociaal verzekeringsfonds zal je ook vragen of zij je identificatie bij de btw-administratie voor jou in orde moeten maken. Ook dit is wettelijk verplicht, maar je kan er ook voor kiezen om dit zelf te doen, dat spaart je ongeveer 70 euro uit. Wil je zelf de identificatie bij de btw-administratie in orde brengen, begeleiden we je graag bij deze stap.</p>
                <div class="stage__btns">
                    <a class="stagebtn4" data-extra="1" href="#" >Ik laat mijn identificatie bij de btw-administratie uitvoeren door mijn gekozen sociaal verzekeringsfonds.</a>
                    <a class="stagebtn4" data-extra="2" href="#" >Ik wil graag zelf mijn identificatie bij de btw-administratie uitvoeren. Let op! Doe dit zo snel na je registratie in de KBO, je mag niet beginnen aan je zelfstandige activiteit voor dit gebeurd is.</a>
                    <input class="stage4Input" type="hidden" name="extra" value="">
                </div>
            </form>
            <form class="checkNumber4" action="/check/number" method="post">
            @csrf
            <p class="stage__text">Vul je ondernemingsnummer in om aan te tonen dat je jezelf hebt aangesloten bij een sociaal verzekeringsfonds, en je jezelf hebt laten registreren in de KBO. Als je besloten hebt om je identificatie bij de btw-administratie zelf te doen, leggen we je in de volgende stap uit hoe dit moet.</p>
                <div class="stage__form__number">
                    <input type="text" class="stage__form__number__input" name="ondernemingsnummer" placeholder="Ondernemingsnummer">
                    <button type="submit">Verstuur</button>
                </div>
            </form>
            @endif
            @if($roadmap->stage === 5 && $roadmap->check === 1)
            <form class="stage__check" action="/check/stage" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Ik heb mijzelf aangesloten bij een sociaal verzekeringsfonds</button>
                    <input type="hidden" name="stage" value="5">
                </div>
            </form>
            @endif
        </div>

        <div class="stage__container stage__container--6">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}"" alt="back"></a>
                <div class="stage__header__stap">Stap 6</div>
                <div class="stage__header__extra"></div>
            </div>
            <div class="stage">
                <p class="stage__title">Btw-administratie</p>
                <p class="stage__text">Ondernemingsnummer: Check! Btw-nummer: Niet check... Om te mogen factureren voor je zelfstandige activiteit, is het wettelijk verplicht je ook te ???identificeren??? bij de btw-administratie. Dit is niet zo heel moeilijk, je kan gewoon online een formulier invullen. Voor je dit doet willen we zeker zijn dat je weet wat je waar zal moeten invullen. Hieronder vind je voor elke stap een beetje extra uitleg. Het online formulier kan je hier invullen: <a href="https://eservices.minfin.fgov.be/VAT001/">https://eservices.minfin.fgov.be/VAT001/</a>  Kies voor het formulier E604: AANVRAAG TOT BTW-IDENTIFICATIE.</p>
            </div>
            
            @if(!empty($company))
            <div class="stage5">
                <div class="stage__field">
                        <p class="stage__field__title"><strong>Naam en ondernemingsnummer</strong></p>
                        <img class="stage__field__icon" src="/img/uitklappen.png" alt="uitklappen">
                </div>
                <div class="stage__info">
                    <p class="stage__info__title">Hieronder zie je de naam en het ondernemingsnummer dat je moet invullen in het formulier.</p>
                    <p class="stage__info__text">Naam: {{$company->name}}</p>
                    @if(!empty($company->company_number))
                    <p class="stage__info__text">Ondernemingsnummer: {{$company->company_number}}</p>
                    @else
                    <p class="stage__info__text">Geen ondernemingsnummer</p>
                    @endif
                </div>
            </div>

            
            <div class="stage5">
                <div class="stage__field">
                        <p class="stage__field__title"><strong>Adres(sen)</strong></p>
                        <img class="stage__field__icon" src="/img/uitklappen.png" alt="uitklappen">
                </div>
                <div class="stage__info">
                    <p class="stage__info__title">Hieronder zie je het adres waarop je administratieve hoofdzetel is gevestigd.</p>
                    <p class="stage__info__text">Straatnaam en huisnummer: {{$company->street}} {{$company->number}}</p>
                    <p class="stage__info__text">Plaats: {{$company->postal}} {{$company->city}}</p>
                </div>
            </div>

            
            <div class="stage5">
                <div class="stage__field">
                        <p class="stage__field__title"><strong>Activiteiten</strong></p>
                        <img class="stage__field__icon" src="/img/uitklappen.png" alt="uitklappen">
                </div>
                <div class="stage__info">
                    <div class="briefje">
                        <p class="briefje__title">Mijn aangeduide activiteiten</p>
                        <p class="briefje__text">Bij de activiteiten moet je kiezen voor ????n hoofdactiviteit, dat is de activiteit waarmee je het meeste geld zal verdienen en dus het grootste deel van je omzet zal uitmaken. Duid je hoofdactiviteit aan door naast in de kolom ???H??? het bolletje aan te klikken.</p>
                        <p class="briefje__text">Je kan in dit formulier maximaal 6 activiteiten toevoegen, heb je meer activiteiten laten toevoegen in de Kruispuntbank van Ondernemingen, kies dan voor de 6 activiteiten waarmee je verwacht het meeste omzet te realiseren. Je kan activiteiten toevoegen door de juiste NACEBE-codes in te vullen.</p>
                        <p class="briefje__text">Vul ook voor elke activiteit een startdatum in, deze datum maakt op zich niet veel uit, maar let wel op dat je pas vanaf die datum zal mogen factureren aan je klanten. De ???Stop???-kolom laat je leeg.</p>
                        @if(!empty($briefjes[0]))
                        
                        @foreach($briefjes as $b)
                            <div class="activity__container--visible">
                                <div class="activity">
                                <p class="activity__text">{{$b->activity->code}}-{{$b->activity->name}}</p>
                                <img class="activity__icon" src="img/checked.png" alt="">
                                </div>
                            </div>
                        @endforeach
                        
                        @endif
                    </div>
                </div>
            </div>

            <div class="stage5">
                <div class="stage__field">
                    <p class="stage__field__title"><strong>Regime</strong></p>
                    <img class="stage__field__icon" src="/img/uitklappen.png" alt="uitklappen">
                </div>
                <div class="stage__info">
                    <p class="stage__info__text">In deze stap moet je kiezen welk btw-regime je op jouw onderneming wil toepassen, er zijn een aantal opties, maar in de meeste gevallen zal je kiezen voor optie ???B???, ???Belastingplichtige onderworpen aan de vrijstellingsregeling van de belasting???.</p>
                    <p class="stage__info__text"><i>A. Belastingplichtige gehouden tot het indienen van periodieke btw-aangiften</i></p>
                    <p class="stage__info__text">Kies je voor deze optie dan ben je verplicht elke maand of elk kwartaal een btw-aangifte in te dienen. Dit is werk voor boekhouders, als je voor deze optie kiest ben je vrijwel altijd genoodzaakt een boekhouder aan te stellen. Als je deze optie kiest, ben je verplicht het correcte btw-percentage aan te rekenen aan de klant, en door te storten aan de btw-administratie. Je krijgt op die manier ook het recht om btw terug te vorderen op elke aankoop die je doet.</p>
                    <p class="stage__info__text"><i>B. Belastingplichtige onderworpen aan de vrijstellingsregeling van de belasting</i></p>
                    <p class="stage__info__text">Ondernemers met een jaaromzet lager dan 25.000,00 euro kunnen ervoor kiezen om vrijgesteld te worden van hun btw-plicht. Je bent dan wel btw-onderworpen en je hebt een btw-hoedanigheid, maar je hoeft geen (drie)maandelijkse aangifte in te dienen en je klanten geen btw aan te rekenen. Dit is veruit de eenvoudigste optie, je kan helaas geen btw terugvorderen op je aankopen.</p>
                    <p class="stage__info__text"><i>A. Belastingplichtige gehouden tot het indienen van periodieke btw-aangiften</i></p>
                    <p class="stage__info__text">Deze andere opties zijn uitzonderlijke situaties waar je als student-zelfstandige hoogstwaarschijnlijk niet mee te maken zult krijgen. Denk je toch dat ????n van deze btw-regimes op jou van toepassing zal zijn, lees er hier dan meer over: <a href="https://financien.belgium.be/nl/ondernemingen/btw/btw-plicht/btw-regime#q1" target="_blank">https://financien.belgium.be/nl/ondernemingen/btw/btw-plicht/btw-regime#q1</a></p>
                </div>
            </div>


            <div class="stage5">
                <div class="stage__field">
                        <p class="stage__field__title"><strong>Rekening</strong></p>
                        <img class="stage__field__icon" src="/img/uitklappen.png" alt="uitklappen">
                </div>
                <div class="stage__info">
                    <p class="stage__info__title">Hieronder zie je je rekeningnummer</p>
                    <p class="stage__info__text">{{$company->account_number}}</p>
                </div>
            </div>

            @if(Auth::user()->roadmap->stage === 6 && Auth::user()->roadmap->extra === 0)
            <div class="stage5">
            @else
            <div class="stage5Checked">
            @endif
                <div class="stage__field">
                        <p class="stage__field__title"><strong>Handtekening</strong></p>
                        <img class="stage__field__icon" src="/img/uitklappen.png" alt="uitklappen">
                </div>
                <div class="stage5__form">
                    <form class="form--stage" action="/check/stage6/handtekening" method="post">
                    @csrf
                        <p class="form--stage__title">Vul in deze stap van het formulier gewoon je naam en hoedanigheid in. Jouw hoedaning is de ???Oprichter van een geregistreerde entiteit-natuurlijk persoon???, dat moet je dus ook invullen in het formulier van de btw-administratie bij "Hoedanigheid".</p>
                        <div class="form--stage__field">
                            <input class="form--stage__field__input" type="text" name="naam" placeholder="Naam">
                            <input class="form--stage__field__input" type="text" name="hoedanigheid" placeholder="Hoedanigheid">
                            <button class="form--stage__field__btn" type="submit">Verstuur</button>
                        </div>
                    </form>
                </div>
            </div>

            @if($roadmap->stage === 6 && Auth::user()->roadmap->extra === 1)
            <div class="stage5">
            @else
            <div class="stage5Checked">
            @endif
                <div class="stage__field">
                        <p class="stage__field__title"><strong>Bevestigen</strong></p>
                        <img class="stage__field__icon" src="/img/uitklappen.png" alt="uitklappen">
                </div>
                <div class="stage5__form">
                    <form class="form--stage" action="/check/stage6/bevestig" method="post">
                    @csrf
                        <p class="form--stage__title">Bevestig hier je aanvraag tot btw-identificatie. Je krijgt een brief via de post die je zal vertellen wanneer je btw-identificatie in orde is. Vanaf dat moment mag je beginnen met factureren.</p>
                        <div class="form--stage__field">
                            
                        <div class="form--stage__field__radio"><input type="radio" name="bevestig" value="bevestig"><label for="bevestig">Ik bevestig dat ik mijn identificatie bij de btw-administratie in orde heb gebracht.</label></div>
                            <button class="form--stage__field__btn" type="submit">Verstuur</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif

            @if($roadmap->stage === 6 && $roadmap->check === 1)
            <form class="stage__check" action="/check/stage" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Ik wil deze stap afronden</button>
                    <input type="hidden" name="stage" value="6">
                </div>
            </form>
            @endif
        </div>

        
        <div class="stage__container stage__container--7">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}" alt="back"></a>
                <div class="stage__header__stap">Stap 7</div>
                <div class="stage__header__extra"></div>
            </div>
            <div class="stage">
                <p class="stage__title">Laat aan de bank weten wat je ondernemingsnummer is</p>
                <p class="stage__text">Oef, dit is gelukkig maar een kleine stap. Nu je geregistreerd bent in de Kruispuntbank van Ondernemingen, heb je een ondernemingsnummer gekregen. Geef bij dit door aan je bank zodat zij jouw pas geopende rekening kunnen omzetten naar een rekening voor professioneel gebruik.</p>
                @if(!empty($company->acount_number))
                <p class="stage__text">Ondernemingsnummer: {{$company->account_number}}</p>
                @endif
            </div>
            @if($roadmap->check === 0)
            <form class="formStage6" action="/check/inputStage7" method="post">
            @csrf
                <div class="stage__btns stage__btns--small">
                    <a class="stagebtn6"  href="#" >Ik bevestig dat ik mijn ondernemingsnummer aan mijn bank heb doorgegeven.</a>
                </div>
            </form>
            @endif
            @if($roadmap->check === 1)
            <form class="stage__check" action="/check/stage" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Ik wil deze stap afronden</button>
                    <input type="hidden" name="stage" value="7">
                </div>
            </form>
            @endif
        </div>

        <div class="stage__container stage__container--8">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}"" alt="back"></a>
                <div class="stage__header__stap">Stap 8</div>
                <div class="stage__header__extra"></div>
            </div>
            <div class="stage">
                <p class="stage__title"> Je bent klaar om te starten als zelfstandige!</p>
                <p class="stage__text">Zo! Je bent klaar om te starten als zelfstandige. We geven je graag nog mee dat je op Jumpstart ook te recht kan voor hulp en begeleiding van medestudenten die ook de stap hebben gezet naar student-zelfstandige worden, maar je kan ook professioneel advies inwinnen.</p>
                <p class="stage__text">Ook verwijzen we je graag door naar Dexxter, waarme je eenvoudig online je boekhouding kan bijhouden. Je kan uiteraard ook op zoek gaan naar een professionele boekhouder die deze administratieve last van je schouders neemt, let op dat een boekhouder gemiddeld 100,00 euro per maand kost.</p>
                <p class="stage__text">Doe je liever zelf je boekhouding? Download hier het Excel-template van SBB. Zij organiseren regelmatig workshops voor student-zelfstandigen zodat je helemaal op weg gezet kan worden met het voeren van je eigen boekhouding.</p>
                <p class="stage__text">Tenslotte geven we je graag nog een overzichtje van de maximumdrempels waar je als student-zelfstandige rekening mee moet houden. Let op: Al deze bedragen worden jaarlijks ge??ndexeerd en dus verhoogd.</p>
                <p class="stage__text"><strong>Sociale bijdragen</strong></p>
                <ul class="stage__list">
                    <li>Bij een netto belastbaar inkomen <strong>lager dan 7.329,22 euro</strong> betaal je geen sociale bedragen.</li>
                    <li><strong>Vanaf 7.329,22 euro tot 14.658,44 euro</strong> betaal je 20,5% op het inkomen boven het grensbedrag.</li>
                    <li>Ligt je inkomen <strong>hoger dan 14.658,44 euro</strong> dan betaal je dezelfde bijdragen als een zelfstandige in hoofdberoep.</li>
                </ul>
                <p class="stage__text"><strong>Fiscaal ten laste blijven en de personenbelasting</strong></p>
                <ul class="stage__list">
                    <li>Als je ouders samen belast worden dan mag je <strong>maximum 3.490,00 euro netto</strong> verdienen om fiscaal ten laste te blijven.</li>
                    <li>Als je ouders elk apart worden belast en jij fiscaal ten laste bent van ????n van je ouders of je enige ouder, dan mag je <strong>maximaal 5.040,00 euro netto</strong> verdienen om fiscaal ten laste te blijven.</li>
                    <li>Als je ouders elk apart worden belast en jij fiscaal ten laste bent van ????n van je ouders of je enige ouder, ??n je wordt fiscaal als gehandicapt beschouwd, mag je <strong>maximaal 6.400,00 euro netto </strong> verdienen om fiscaal ten laste te blijven.</li>
                </ul>
                <p class="stage__text">Fiscaal ten laste blijven wil niet meer zeggen dan je ouders die in jouw plaats belastingen blijven betalen. Ben je niet meer fiscaal ten laste, zul je zelf belastingen moeten betalen. Geen paniek, je bent vrijgesteld tot een bepaald bedrag, maar het is wel iets om rekening mee te houden.</p>
                <p class="stage__text">Als gevolg zullen je ouders namelijk ook hun belastingvoordeel op jou verliezen! Zij zullen dus iets meer belastingen moeten betalen omdat jij niet meer fiscaal ten laste bent van hen. Dit is ook wat gebeurt als jij fulltime gaat werken, dan begin je ook zelf belastingen te betalen.</p>
                <p class="stage__text">Hoeveel belastingen je moet betalen als je niet meer fiscaal ten laste bent, lees je hier: <a href="https://financien.belgium.be/nl/particulieren/belastingaangifte/tarieven-belastbaar-inkomen/tarieven#q1">https://financien.belgium.be/nl/particulieren/belastingaangifte/tarieven-belastbaar-inkomen/tarieven#q1</a></p>
                <p class="stage__text"><strong>Kinderbijslag</strong></p>
                <p class="stage__text">Voor de kinderbijslag moet je kijken naar de grenswaarde van de sociale bijdragen, weet je nog, die <strong>7.329,22 euro.</strong> Vanaf dat moment betaal je niet alleen sociale bijdragen op je inkomsten, maar kan het ook zijn dat je je kinderbijslag verliest.</p>
                <p class="stage__text">In Vlaanderen verlies je je kinderbijslag als je meer dan 240 uren per maand werkt, in Brussel en Walloni?? geldt een plafond van 240 uren per kwartaal. Zit je niet over dit aantal uren, hoef je je dus geen zorgen te maken over het verliezen van je kinderbijslag.</p>
                <p class="stage__text">Uiteraard moet je wel nog steeds voldoen aan de algemene voorwaarden om kinderbijslag te kunnen krijgen, lees hier meer over op de website van de Vlaamse Overheid <a href="https://www.vlaanderen.be/algemene-voorwaarden-en-procedure-voor-het-groeipakket">https://www.vlaanderen.be/algemene-voorwaarden-en-procedure-voor-het-groeipakket</a></p>
                <p class="stage__text"><strong>Wat is netto?</strong></p>
                <p class="stage__text">Als we spreken over ???netto???-inkomen als student-zelfstandige, betekent dat je omzet, <strong>min</strong> je beroepskosten. Dat wil zeggen alle kosten die je maakt om je professionele activiteit te kunnen uitvoeren, denk aan telefoonkosten, sociale bijdragen, verzekeringen, lidmaatschap van Unizo, je boekhouder, opstartkosten, ...</p>
                <p class="stage__text">Het is veel informatie, maar mocht je nog vragen hebben, twijfel dan niet om links in het menu op ???Contacten??? te klikken en iemand om advies te vragen. Succes!</p>
                </div>
        </div>

        @endif

    </div>

    </div>

@endsection