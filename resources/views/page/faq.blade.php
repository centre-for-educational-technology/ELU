@extends('layouts.app')

@section('content')
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-10 col-md-offset-1">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading"><h3>KKK</h3></div>--}}
                    {{--<div class="panel-body faq">--}}
                        {{--{!! nl2br($faq->body) !!}--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}


{{--XXX Static content--}}
    <div class="container">
        <h1>KKK</h1>
        <div class="row">
            <div class="col-md-4 margt">
                <ul class="nav menu02 nav-stacked">
                    <li role="presentation" class="active"><a data-toggle="tab" href="#menu1">Mis on ELU?</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#menu2">Miks on ELU kõigis ülikooli õppekavades?</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#menu3">Millal saab õppeainet võtta?</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#menu4">Kuidas moodustatakse ELU rühmad?</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#menu5">Missugustele tingimustele peab ELU rühm vastama?</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#menu6">Missugune peab olema projekt?</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#menu7">Kust saan rohkem infot ELU kohta?</a></li>
                </ul>
            </div>
            <div class="col-md-8 margt content tab-content">
                <div id="menu1" class="tab-pane fade in active">
                    <h2 class="h3 text-uppercase">MIKS ON ELU KÕIGIS ÜLIKOOLI ÕPPEKAVADES?
                    </h2>
                    <p>ELU on sellel sügisel alustav uus üleülikooliline õppeaine, mille raames eri valdkondade üliõpilased viivad koostöös ellu erialadevahelisi projekte.
                    </p>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">Miks on ELU kõigis ülikooli õppekavades?</h2>
                    <p>ELU on kõigile üliõpilastele kohustuslik, kuna tulevases tööelus tuleb tegeleda ideede ja probleemidega, mis ületavad ühe eriala piire. Tuleb kasuks, kui tunnustame ja mõistame teistes valdkondades toimuvat. Samuti tekib tänapäeval just palju uusi erialadevahelisi teadmisi, mille omamine annab konkurentsieelise. Seetõttu soovime kõigile oma üliõpilastele anda uudse koos õppimise ja –tegutsemise kogemuse.</p>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">MILLAL SAAB ÕPPEAINET VÕTTA?</h2>
                    <p>ELU aja saab üliõpilane ise valida. See tähendab, et ainesse võib registreeruda endale sobival semestril. Siiski tuleb silmas pidada, et projekti ei tohiks jätta lõputöö kirjutamisega samale ehk õpingute viimasele semestrile.
                    </p>
                    <p>Sel sügisel alustavad esimesed 10-15 ELU projekti. Ootame kõiki huvilisi 16. septembril Astra aatriumis toimuvale Ideelaadale, kus saab lisainformatsiooni ja tutvuda sel semestril välja pakutud ideedega.
                    </p>
                </div>
                <div id="menu4" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">KUIDAS MOODUSTATAKSE ELU RÜHMAD?</h2>
                    <p>
                        Rühmade moodustumine toimub üliõpilastele huvipakkuva ELU idee alusel. See tähendab, et iga üliõpilane saab ise valida, millise projektiga liituda.
                    </p>
                    <p>
                        ELU ideid tutvustatakse Ideelaada üritusel, ELU veebis ja kursusega seotud õppejõudude poolt. Kõige parem on ise Ideelaadale kohale tulla, et võimalike rühma ehk ELU kaaslaste ja juhendajatega tutvuda ning soovi korral ka oma ELU idee välja pakkuda.
                    </p>
                    <p>
                        Need, kes Ideelaadale kohale tulla ei saa, saavad pakutud projektidega tutvuda ELU veebis. Alates 2017. õa kevadsemestrist toimub rühmade kinnitamine samuti ELU veebis, 2016. õa sügissemestril tuleb registreerimiseks pärast Ideelaata vastava juhendajaga ühendust võtta.
                    </p>
                </div>
                <div id="menu5" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">MISSUGUSTELE TINGIMUSTELE PEAB ELU RÜHM VASTAMA?</h2>
                    <p>
                        ELU rühma suurus on 6-8 üliõpilast. Kuna tegemist on erialadevahelise projektiga, moodustavad rühma vähemalt kolme erineva eriala üliõpilased. Näiteks võib ELU projekti rühmas olla kaks kommunikatsiooni, üks rekreatsiooni ja neli psühholoogia tudengit.
                    </p>
                    <p>
                        ELU projektide puhul on sobiva rühma moodustamine väga oluline, mistõttu toimub ELU kaaslaste otsimine reeglina juba üks semester enne projekti teostamist. Kevadel projektiga alustamiseks tuleb huvipakkuvat teemat otsida juba sügissemestril. Seega on soovitav 16. septembri Ideelaadale tulla ka neil, kes plaanivad ELU läbida alles kevadel.
                    </p>
                </div>
                <div id="menu6" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">MISSUGUNE PEAB OLEMA PROJEKT?</h2>
                    <p>
                        ELU läbiviimise viis ning tulemus sõltuvad rühmast ja juhendajast. ELU projekti eesmärk, selle saavutamiseks vajalikud tegevused ja ajakava lepitakse kokku projekti kavandis pärast rühma moodustamist. Juhendaja ülesanne on üliõpilasi toetada, hinnata kavandi teostatavust ja anda rühmale tagasisidet.
                    </p>
                    <p>
                        Näide: Kommunikatsiooni, rekreatsiooni ja psühholoogia tudengite rühm võib oma ELU-s uurida, milliseid eksimusi tehti Reidi tee planeerimisel ja projekti avalikustamisel. ELU tulemuseks on analüüs ja projekti käigus saadud teadmised esitatakse ka audiovisuaalselt.
                    </p>
                </div>
                <div id="menu7" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">KUST SAAN ROHKEM INFOT ELU KOHTA?</h2>
                    <p>Vaata ainekaarti: OIS.tlu.ee – Õppeained – otsing – Aine nimetus: Erialasid Lõimiv Uuendus</p>
                </div>
            </div>

        </div>

    </div>
@endsection