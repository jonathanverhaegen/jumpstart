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
                <p class="stage__title">Open een bankrekening voor jouw professionele activiteit</p>
                <p class="stage__text">Proficiat! Je hebt een businessidee bedacht en bent helemaal klaar om de stap richting student- zelfstandige te zetten. Om te beginnen heb je een professionele bankrekening nodig die je zal gebruiken als student-zelfstandige. Dit is nodig om je privétransacties mooi gescheiden te houden van je transacties als zelfstandige, dit maakt je boekhouding veel eenvoudiger en zorgt ervoor dat de fiscus niet zomaar kan meekijken in je privérekening.</p>
                <p class="stage__text">Deze rekening kan een normale zichtrekening zijn die omgezet wordt naar een professionele rekening vanaf het moment dat je een ondernemingsnummer hebt. Informeer bij je bank naar de verschillende opties en voordelen van de verschillende soorten professionele rekeningen.</p>
                <p class="stage__text"><strong>Let op:</strong> Je zal op dit moment nog geen ondernemingsnummer kunnen toevoegen aan je nieuwe rekening, dit kan pas wanneer je registratie in de Kruispuntbank van Ondernemingen voltooid is. Je hebt nu eenmaal éérst een bankrekening nodig, voor je een ondernemingsnummer kan aanvragen</p>
                <p class="stage__text"><strong>Tip:</strong> Nog geen uitgewerkt businessplan? Surf naar het startersplatform van VLAIO en werk je businessidee van A tot Z uit! <a target="_blank" href="https://startersgids.vlaio.be/nl">https://startersgids.vlaio.be/nl</a></p>
            </div>
            @if($roadmap->check === 0)
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
            @if($roadmap->check === 1)
            <form class="stage__check" action="/check/stage" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Stap afronden</button>
                    <input type="hidden" name="stage" value="1">
                </div>
            </form>
            @endif
        </div>


        <div class="stage__container stage__container--2">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}"" alt="back"></a>
                <div class="stage__header__stap">Stap 2</div>
                <div class="stage__header__extra"></div>
            </div>
            <div class="stage">
                <p class="stage__title">Bepaal welke activiteiten je zal uitvoeren</p>
                <p class="stage__text">Voor je kan starten als student-zelfstandige, is het belangrijk om te weten welke activiteiten je zal buitvoeren. Elke activiteit heeft een NACE-code, die codes heb je nodig om je registratie als zelfstandige correct uit te voeren. Klik alle activiteiten die je wenst uit te voeren aan in de onderstaande lijst.</p>
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
            @if($roadmap->check === 1)
            <form class="stage__check" action="/check/stage" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Stap afronden</button>
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
                <p class="stage__title">Bepaal of je gebruik wil maken van de vrijstellingsregeling voor sociale
                                        bijdragen</p>
                <p class="stage__text">Iedere werknemer in dit land betaalt sociale bijdragen, ook zelfstandigen. Van deze sociale bijdragen worden onder andere de pensioenen, ziekte- en invaliditeitsuitkeringen en gezinsbijslag uitbetaald. Als student-zelfstandige krijg je de keuze om gebruik te maken van een vrijstellingsregeling voor deze sociale bijdragen. Dit kan enkel als je weet dat je netto niet meer dan 7.329,21 euro zal verdienen in het jaar 2022. Kies je niet voor de <strong>vrijstellingsregeling</strong> betaal je als starter een voorlopige minimumbijdrage van ongeveer 85 euro per kwartaal.</p>
                <p class="stage__text">Ligt je inkomen uiteindelijk onder de grens van 7.329,21 euro, krijg je de sociale bijdragen die je al betaald had teruggestort. Ligt je inkomen tussen 7.329,21 euro en 14.658,44 euro, dan betaal je een verminderde bijdrage die wordt berekend op het inkomen boven het grensbedrag. Bedraagt je inkomen 14.658,44 euro of meer, dan betaal je dezelfde bijdrage als in hoofdberoep! Ben je niet zeker of je over de grenswaarde van 7.329,21 euro zal zitten, is het veiliger om de minimumbijdrage van 85 euro per kwartaal te betalen en niet te kiezen voor de vrijstellingsregeling..</p>
                <p class="stage__text"><strong>Tip:</strong> Wil je meer weten over de sociale bijdragen die je moet betalen als student-zelfstandige? Lees er meer over op de website van VLAIO: <a target="_blank" href="https://www.vlaio.be/nl/begeleiding-advies/start/je-statuut-als-zelfstandige/statuut-van-student-zelfstandige">https://www.vlaio.be/nl/begeleiding-advies/start/je-statuut-als-zelfstandige/statuut-van-student-zelfstandige</a></p>
            </div>
            @if($roadmap->check === 0)
            <form class="formStage3" action="/check/inputStage3" method="post">
            @csrf
                <div class="stage__btns">
                    <a class="stagebtn stagebtn--large stagebtn3" href="#" >Ik kies <strong>niet</strong> voor de vrijstellingsregeling</a>
                    <a class="stagebtn stagebtn--large stagebtn3" href="#" >Ik kies <strong>wel</strong> voor de vrijstellingsregeling</a>
                    <a class="stagebtn stagebtn--large stagebtn3" href="#" >Ik weet het nog niet, ik laat mij informeren door een sociaal verzekeringsfonds</a>
                </div>
            </form>
            @endif
            @if($roadmap->check === 1)
            <form class="stage__check" action="/check/stage" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Stap afronden</button>
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
                <p class="stage__title">Sluit je aan bij een sociaal verzekeringsfonds en registreer je onderneming in de KBO</p>
                <p class="stage__text">Nu je een professionele rekening hebt, weet welke activiteiten je zal uitvoeren én beslist hebt op welke manier je graag wel of geen sociale bijdragen wilt betalen, kan je jezelf aansluiten bij een sociaal verzekeringsfonds. Het is wettelijk verplicht je aan te sluiten bij een sociaal verzekeringsfonds, zij doen eigenlijk niet veel meer dan voor jou berekenen hoeveel sociale bijdragen je moet betalen. Zij storten wat jij betaalt, rechtstreeks door naar de overheid</p>
                <p class="stage__text">Vaak is een sociaal verzekeringsfonds ook een ondernemingsloket, en die heb je dan weer nodig om je onderneming te kunnen registreren in de “Kruispuntbank van Ondernemingen”, afgekort KBO. De KBO is een databank van de FOD Economie waarin alle basisgegevens van alle Belgische ondernemingen verzameld worden. Om aan de slag te kunnen als zelfstandige, moet jouw unieke ondernemingsnummer hierin opgenomen zijn.</p>
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
                <p class="stage__text"><strong>Tip:</strong> Welk sociaal verzekeringsfonds is het beste voor jou? (blog)</p>
            </div>
            @if($roadmap->check === 0)
            <form class="formStage4" action="/check/inputStage4" method="post">
            @csrf
                <p class="stage__text">Je sociaal verzekeringsfonds zal je ook vragen of zij je identificatie bij de btw-administratie voor jou in orde moeten maken. Ook dit is wettelijk verplicht, maar je kan er ook voor kiezen om dit zelf te doen, dat spaart je ongeveer 70 euro uit. Wil je zelf de identificatie bij de btw-administratie in orde brengen, begeleiden we je graag bij deze stap.</p>
                <div class="stage__btns">
                    <a class="stagebtn4" data-extra="1" href="#" >Ik laat mijn identificatie bij de btw-administratie uitvoeren door mijn gekozen sociaal verzekeringsfonds.</a>
                    <a class="stagebtn4" data-extra="2" href="#" >Ik wil graag zelf mijn identificatie bij de btw-administratie uitvoeren. Let op! Doe dit zo snel na je registratie in de KBO, je mag niet beginnen aan je zelfstandige activiteit voor dit gebeurd is.</a>
                    <input class="stage4Input" type="hidden" name="extra" value="">
                </div>
            </form>
            <form action="/check/number" method="post">
            @csrf
                <p class="stage__text">Bijkomende vraag als de vorige is aangeklikt: “Vul je ondernemingsnummer in om aan te tonen dat je jezelf hebt aangesloten bij een sociaal verzekeringsfonds, en je jezelf hebt laten registreren in de KBO. Als je besloten hebt om je identificatie bij de btw-administratie zelf te doen, leggen we je in de volgende stap uit hoe dit moet.</p>
                <div class="stage__form__number">
                    <input type="text" class="" name="ondernemingsnummer">
                    <button type="submit">Verstuur</button>
                </div>
            </form>
            @endif
            
            <form class="stage__check" action="/check/stage" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Stap afronden</button>
                    <input type="hidden" name="stage" value="4">
                </div>
            </form>
        </div>





        
        <!-- stap 5 nog helemaal uitwerken -->
        <div class="stage__container stage__container--5">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}"" alt="back"></a>
                <div class="stage__header__stap">Stap 5</div>
                <div class="stage__header__extra"></div>
            </div>
            <div class="stage">
                <p class="stage__title">Btw-administratie</p>
                <p class="stage__text">Ondernemingsnummer: Check! Btw-nummer: Niet check... Om te mogen factureren voor je zelfstandige activiteit, is het wettelijk verplicht je ook te “identificeren” bij de btw-administratie. Dit is niet zo heel moeilijk, je kan gewoon online een formulier invullen. Voor je dit doet willen we zeker zijn dat je weet wat je waar zal moeten invullen. Hieronder vind je voor elke stap een beetje extra uitleg. Het online formulier kan je hier invullen: <a href="https://eservices.minfin.fgov.be/VAT001/">https://eservices.minfin.fgov.be/VAT001/</a>  Kies voor het formulier E604: AANVRAAG TOT BTW-IDENTIFICATIE.</p>
            </div>
            
            @if(Auth::user()->roadmap->extra === 0)
            <div class="stage5">
            @else
            <div class="stage5Checked">
            @endif
                <div class="stage__field">
                        <p class="stage__field__title"><strong>Start</strong></p>
                        <img class="stage__field__icon" src="/img/uitklappen.png" alt="uitklappen">
                </div>
                <div class="stage5__form">
                    <form class="form--stage" action="/check/stage5/start" method="post">
                    @csrf
                        <p class="form--stage__title">Vul hier je naam en ondernemingsnummer in zonder puntjes, 10 cijfers</p>
                        <div class="form--stage__field">
                            <input class="form--stage__field__input" type="text" name="naam" placeholder="Naam">
                            <input class="form--stage__field__input" type="text" name="ondernemingsnummer" placeholder="0123456789">
                            <button class="form--stage__field__btn" type="submit">Verstuur</button>
                        </div>
                    </form>
                </div>
            </div>

            @if(Auth::user()->roadmap->extra === 1)
            <div class="stage5">
            @else
            <div class="stage5Checked">
            @endif
                <div class="stage__field">
                        <p class="stage__field__title"><strong>Adres(sen)</strong></p>
                        <img class="stage__field__icon" src="/img/uitklappen.png" alt="uitklappen">
                </div>
                <div class="stage5__form">
                    <form class="form--stage" action="/check/stage5/adress" method="post">
                    @csrf
                        <p class="form--stage__title">Vul het correcte adres in van je administratieve hoofdzetel, dat is hetzelfde adres waarop je je onderneming hebt laten registreren in de KBO. Vul hier ook een correct e-mailadres en telefoonnummer in</p>
                        <div class="form--stage__field">
                            <input class="form--stage__field__input" type="text" name="straat" placeholder="Straat">
                            <input class="form--stage__field__input" type="number" name="nummer" placeholder="Nummer">
                            <input class="form--stage__field__input" type="number" name="postcode" placeholder="Postcode">
                            <input class="form--stage__field__input" type="text" name="plaats" placeholder="Plaats">
                            <input class="form--stage__field__input" type="text" name="email" placeholder="Email">
                            <input class="form--stage__field__input" type="number" name="telefoonnummer" placeholder="Telefoon">
                            <button class="form--stage__field__btn" type="submit">Verstuur</button>
                        </div>
                    </form>
                </div>
            </div>

            @if(Auth::user()->roadmap->extra === 2)
            <div class="stage5">
            @else
            <div class="stage5Checked">
            @endif
                <div class="stage__field">
                        <p class="stage__field__title"><strong>Activiteiten</strong></p>
                        <img class="stage__field__icon" src="/img/uitklappen.png" alt="uitklappen">
                </div>
                <div class="stage5__form">

                    
                   
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
                    
                    <div class="briefje">
                        <p class="briefje__title">Mijn aangeduiden activiteiten</p>
                        <p class="briefje__text">Hou dit lijstje bij de hand wanneer je je gaat aansluiten bij een sociaal verzekeringsfonds</p>
                    </div>

                </div>
            </div>

            @if(Auth::user()->roadmap->extra === 3)
            <div class="stage5">
            @else
            <div class="stage5Checked">
            @endif
                <div class="stage__field">
                        <p class="stage__field__title"><strong>Regime</strong></p>
                        <img class="stage__field__icon" src="/img/uitklappen.png" alt="uitklappen">
                </div>
                <div class="stage5__form">
                    <form class="form--stage" action="/check/stage5/regime" method="post">
                    @csrf
                        <p class="form--stage__title">In deze stap moet je kiezen welk btw-regime je op jouw onderneming wil toepassen, er zijn een aantal opties, maar in de meeste gevallen zal je kiezen voor optie “B”, “Belastingplichtige onderworpen aan de vrijstellingsregeling van de belasting”.</p>
                        <div class="form--stage__field">
                            <div class="form--stage__field__radio"><input type="radio" name="optie" value="a"><label for="a">A. Belastingplichtige gehouden tot het indienen van periodieke btw-aangiften</label></div>
                            <p class="form--stage__text">Kies je voor deze optie dan ben je verplicht elke maand of elk kwartaal een btw-aangifte in te dienen. Dit is werk voor boekhouders, als je voor deze optie kiest ben je vrijwel altijd genoodzaakt een boekhouder aan te stellen. Als je deze optie kiest, ben je verplicht het correcte btw-percentage aan te rekenen aan de klant, en door te storten aan de btw-administratie. Je krijgt op die manier ook het recht om btw terug te vorderen op elke aankoop die je doet.</p>
                            
                            <div class="form--stage__field__radio"><input type="radio" name="optie" value="b"><label for="b">B. Belastingplichtige onderworpen aan de vrijstellingsregeling van de belasting</label></div>
                            <p class="form--stage__text">Ondernemers met een jaaromzet lager dan 25.000,00 euro kunnen ervoor kiezen om vrijgesteld te worden van hun btw-plicht. Je bent dan wel btw-onderworpen en je hebt een btw-hoedanigheid, maar je hoeft geen (drie)maandelijkse aangifte in te dienen en je klanten geen btw aan te rekenen. Dit is veruit de eenvoudigste optie, je kan helaas geen btw terugvorderen op je aankopen.</p>
                            
                            <div class="form--stage__field__radio"><input type="radio" name="optie" value="c"><label for="c">Optie C, D, E en F</label></div>
                            <p class="form--stage__text">Deze andere opties zijn uitzonderlijke situaties waar je als student-zelfstandige hoogstwaarschijnlijk niet mee te maken zult krijgen. Denk je toch dat één van deze btw-regimes op jou van toepassing zal zijn, lees er hier dan meer over: <a href="https://financien.belgium.be/nl/ondernemingen/btw/btw-plicht/btw-regime#q1">https://financien.belgium.be/nl/ondernemingen/btw/btw-plicht/btw-regime#q1</a></p>

                            <button class="form--stage__field__btn" type="submit">Verstuur</button>

                        </div>
                    </form>
                </div>
            </div>

            @if(Auth::user()->roadmap->extra === 4)
            <div class="stage5">
            @else
            <div class="stage5Checked">
            @endif
                <div class="stage__field">
                        <p class="stage__field__title"><strong>Rekening</strong></p>
                        <img class="stage__field__icon" src="/img/uitklappen.png" alt="uitklappen">
                </div>
                <div class="stage5__form">
                    <form class="form--stage" action="/check/stage5/rekening" method="post">
                    @csrf
                        <p class="form--stage__title">Als je gekozen hebt voor de vrijstellingsregeling, hoef je hier geen rekeningnummer in te vullen. Koos je voor een maandelijkse of driemaandelijkse btw-aangifte, vul dan hier het correcte rekeningnummer in van je onderneming.</p>
                        <div class="form--stage__field">
                            <input class="form--stage__field__input" @if($roadmap->regime === "b")type="hidden" value="geen" @else type="text" @endif name="rekeningsnummer" placeholder="Rekeningsnummer">
                            <button class="form--stage__field__btn" type="submit">Verstuur</button>
                        </div>
                    </form>
                </div>
            </div>

            @if(Auth::user()->roadmap->extra === 5)
            <div class="stage5">
            @else
            <div class="stage5Checked">
            @endif
                <div class="stage__field">
                        <p class="stage__field__title"><strong>Handtekening</strong></p>
                        <img class="stage__field__icon" src="/img/uitklappen.png" alt="uitklappen">
                </div>
                <div class="stage5__form">
                    <form class="form--stage" action="/check/stage5/handtekening" method="post">
                    @csrf
                        <p class="form--stage__title">Vul hier gewoon je naam en hoedanigheid in. Jij bent de “Oprichter van een geregistreerde entiteit-natuurlijk persoon”.</p>
                        <div class="form--stage__field">
                            <input class="form--stage__field__input" type="text" name="naam" placeholder="Naam">
                            <input class="form--stage__field__input" type="text" name="hoedanigheid" placeholder="Hoedanigheid">
                            <button class="form--stage__field__btn" type="submit">Verstuur</button>
                        </div>
                    </form>
                </div>
            </div>

            @if(Auth::user()->roadmap->extra === 6)
            <div class="stage5">
            @else
            <div class="stage5Checked">
            @endif
                <div class="stage__field">
                        <p class="stage__field__title"><strong>Bevestigen</strong></p>
                        <img class="stage__field__icon" src="/img/uitklappen.png" alt="uitklappen">
                </div>
                <div class="stage5__form">
                    <form class="form--stage" action="/check/stage5/bevestig" method="post">
                    @csrf
                        <p class="form--stage__title">Bevestig hier je aanvraag tot btw-identificatie. Je krijgt een brief via de post die je zal vertellen wanneer je btw-identificatie in orde is. Vanaf dat moment mag je beginnen met factureren.</p>
                        <div class="form--stage__field">
                            
                        <div class="form--stage__field__radio"><input type="radio" name="bevestig" value="bevestig"><label for="bevestig">Ik bevestig dat ik mijn identificatie bij de btw-administratie in orde heb gebracht.</label></div>
                            <button class="form--stage__field__btn" type="submit">Verstuur</button>
                        </div>
                    </form>
                </div>
            </div>
            
            @if(Auth::user()->roadmap->check === 1)
            <form class="stage__check" action="/check/stage" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Stap afronden</button>
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
                <p class="stage__title">Laat aan de bank weten wat je ondernemingsnummer is</p>
                <p class="stage__text">Oef, dit is gelukkig maar een kleine stap. Nu je geregistreerd bent in de Kruispuntbank van Ondernemingen, heb je een ondernemingsnummer gekregen. Geef bij dit door aan je bank zodat zij jouw pas geopende rekening kunnen omzetten naar een rekening voor professioneel gebruik.</p>
            </div>
            @if($roadmap->check === 0)
            <form class="formStage6" action="/check/inputStage6" method="post">
            @csrf
                <div class="stage__btns">
                    <a class="stagebtn stagebtn--large stagebtn6"  href="#" >Ik bevestig dat ik mijn ondernemingsnummer aan mijn bank heb doorgegeven.</a>
                </div>
            </form>
            @endif
            @if($roadmap->check === 1)
            <form class="stage__check" action="/check/stage" method="post">
            @csrf
                <div class="stage__check__btn">
                    <button type="submit" class="stageCheckBtn">Stap afronden</button>
                    <input type="hidden" name="stage" value="6">
                </div>
            </form>
            @endif
        </div>

        <div class="stage__container stage__container--7">
            <div class="stage__header">
                <a href="" class="stage__header__back"><img  src="{{asset('img/back.png')}}"" alt="back"></a>
                <div class="stage__header__stap">Stap 7</div>
                <div class="stage__header__extra"></div>
            </div>
            <div class="stage">
                <p class="stage__title"> Je bent klaar om te starten als zelfstandige!</p>
                <p class="stage__text">Zo! Je bent klaar om te starten als zelfstandige. We geven je graag nog mee dat je op Jumpstart ook te recht kan voor hulp en begeleiding van medestudenten die ook de stap hebben gezet naar student-zelfstandige worden, maar je kan ook professioneel advies inwinnen.</p>
                <p class="stage__text">Ook verwijzen we je graag door naar Dexxter, waarme je eenvoudig online je boekhouding kan bijhouden. Je kan uiteraard ook op zoek gaan naar een professionele boekhouder die deze administratieve last van je schouders neemt, let op dat een boekhouder gemiddeld 100,00 euro per maand kost.</p>
                <p class="stage__text">Doe je liever zelf je boekhouding? Download hier het Excel-template van SBB. Zij organiseren regelmatig workshops voor student-zelfstandigen zodat je helemaal op weg gezet kan worden met het voeren van je eigen boekhouding.</p>
                <p class="stage__text">Tenslotte geven we je graag nog een overzichtje van de maximumdrempels waar je als student-zelfstandige rekening mee moet houden. Let op: Al deze bedragen worden jaarlijks geïndexeerd en dus verhoogd.</p>
                <p class="stage__text"><strong>Sociale bijdragen</strong></p>
                <ul class="stage__list">
                    <li>Bij een netto belastbaar inkomen <strong>lager dan 7.329,22 euro</strong> betaal je geen sociale bedragen.</li>
                    <li><strong>Vanaf 7.329,22 euro tot 14.658,44 euro</strong> betaal je 20,5% op het inkomen boven het grensbedrag.</li>
                    <li>Ligt je inkomen <strong>hoger dan 14.658,44 euro</strong> dan betaal je dezelfde bijdragen als een zelfstandige in hoofdberoep.</li>
                </ul>
                <p class="stage__text"><strong>Fiscaal ten laste blijven en de personenbelasting</strong></p>
                <ul class="stage__list">
                    <li>Als je ouders samen belast worden dan mag je <strong>maximum 3.490,00 euro netto</strong> verdienen om fiscaal ten laste te blijven.</li>
                    <li>Als je ouders elk apart worden belast en jij fiscaal ten laste bent van één van je ouders of je enige ouder, dan mag je <strong>maximaal 5.040,00 euro netto</strong> verdienen om fiscaal ten laste te blijven.</li>
                    <li>Als je ouders elk apart worden belast en jij fiscaal ten laste bent van één van je ouders of je enige ouder, én je wordt fiscaal als gehandicapt beschouwd, mag je <strong>maximaal 6.400,00 euro netto </strong> verdienen om fiscaal ten laste te blijven.</li>
                </ul>
                <p class="stage__text">Fiscaal ten laste blijven wil niet meer zeggen dan je ouders die in jouw plaats belastingen blijven betalen. Ben je niet meer fiscaal ten laste, zul je zelf belastingen moeten betalen. Geen paniek, je bent vrijgesteld tot een bepaald bedrag, maar het is wel iets om rekening mee te houden.</p>
                <p class="stage__text">Als gevolg zullen je ouders namelijk ook hun belastingvoordeel op jou verliezen! Zij zullen dus iets meer belastingen moeten betalen omdat jij niet meer fiscaal ten laste bent van hen. Dit is ook wat gebeurt als jij fulltime gaat werken, dan begin je ook zelf belastingen te betalen.</p>
                <p class="stage__text">Hoeveel belastingen je moet betalen als je niet meer fiscaal ten laste bent, lees je hier: <a href="https://financien.belgium.be/nl/particulieren/belastingaangifte/tarieven-belastbaar-inkomen/tarieven#q1">https://financien.belgium.be/nl/particulieren/belastingaangifte/tarieven-belastbaar-inkomen/tarieven#q1</a></p>
                <p class="stage__text"><strong>Kinderbijslag</strong></p>
                <p class="stage__text">Voor de kinderbijslag moet je kijken naar de grenswaarde van de sociale bijdragen, weet je nog, die <strong>7.329,22 euro.</strong> Vanaf dat moment betaal je niet alleen sociale bijdragen op je inkomsten, maar kan het ook zijn dat je je kinderbijslag verliest.</p>
                <p class="stage__text">In Vlaanderen verlies je je kinderbijslag als je meer dan 240 uren per maand werkt, in Brussel en Wallonië geldt een plafond van 240 uren per kwartaal. Zit je niet over dit aantal uren, hoef je je dus geen zorgen te maken over het verliezen van je kinderbijslag.</p>
                <p class="stage__text">Uiteraard moet je wel nog steeds voldoen aan de algemene voorwaarden om kinderbijslag te kunnen krijgen, lees hier meer over op de website van de Vlaamse Overheid <a href="https://www.vlaanderen.be/algemene-voorwaarden-en-procedure-voor-het-groeipakket">https://www.vlaanderen.be/algemene-voorwaarden-en-procedure-voor-het-groeipakket</a></p>
                <p class="stage__text"><strong>Wat is netto?</strong></p>
                <p class="stage__text">Als we spreken over “netto”-inkomen als student-zelfstandige, betekent dat je omzet, <strong>min</strong> je beroepskosten. Dat wil zeggen alle kosten die je maakt om je professionele activiteit te kunnen uitvoeren, denk aan telefoonkosten, sociale bijdragen, verzekeringen, lidmaatschap van Unizo, je boekhouder, opstartkosten, ...</p>
                <p class="stage__text">Het is veel informatie, maar mocht je nog vragen hebben, twijfel dan niet om links in het menu op “Contacten” te klikken en iemand om advies te vragen. Succes!</p>
                </div>
        </div>
    </div>

    </div>

@endsection