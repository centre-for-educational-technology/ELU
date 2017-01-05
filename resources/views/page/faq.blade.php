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
                    <li role="presentation" class="active"><a data-toggle="tab" href="#item1">Mis?</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#item2">Milleks?</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#item3">Millal?</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#item4">Kellega?</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#item5">Kuidas?</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#item6">Missugune?</a></li>
                </ul>
            </div>
            <div class="col-md-8 margt content tab-content">
                <div id="item1" class="tab-pane fade in active">
                    <h2 class="h3 text-uppercase">Mis?
                    </h2>
                    <p>ELU on rühmatööna teostatud projekt, millel on konkreetselt sõnastatud eesmärk, etteantud tähtajad ja reaalne tulemus. Rühma moodustavad 6-8 üliõpilast vähemalt kolmest erinevast valdkonnast. Õppeaine maht on 6 EAP ja hindamine on arvestuslik.</p>
                    <p>ELU projekte iseloomustab suur variatiivsus, kuna projekti sisu ja läbiviimise viis on juhendaja ja üliõpilaste otsustada. Küll aga on ainekaardis kokku lepitud kolm kohustuslikku tööd: 1. üliõpilaste koostöös valminud projekti kavand, 2. enese ning rühmakaaslaste panuse hindamine ja 3. projekti tulemuse esitlemine. Ainekaart on ühine kõigile erialadele ja õppeastmetele, kuna projekti rühmad moodustuvad erinevate erialade ja õppeastmete üliõpilastest.</p>
                    <p>Lisainformatiooni leiab:</p>
                    <p><a href="https://ois.tlu.ee/portal/page?_pageid=35,454989&_dad=portal&_schema=PORTAL&p_msg=&p_public=1&p_what=1&p_lang=ET&p_open_node2=&p_session_id=52668090&p_id=124822&p_mode=1&p_pageid=OKM_AINE_WEB_OTSING&n_disp_result=1&n_export=0&_init=1&_nextsearch=1&_nextorder=1&_orfn_1=AINER_KOOD&_ordi_1=ASC&_disp_ainer_kood=1&_where_ainer_kood=&_ainer_kood=&_disp_ainer_nimetus=1&_where_ainer_nimetus=&_ainer_nimetus=erialasid%20lõimiv%20uuendus&_disp_ainer_nimetus_en=1&_where_ainer_nimetus_en=&_ainer_nimetus_en=&_disp_ainer_oppejoud=1&_where_ainer_oppejoud=&_ainer_oppejoud=&_where_ainer_opj_keel=&_ainer_opj_keel=&_where_ainer_kursus=&_ainer_kursus=&_where_aine_stryksus_nimetus_koodiga=&_aine_stryksus_nimetus_koodiga=&_where_tud_kava_vers=&_tud_kava_vers=&_disp_aine_opetamine_semester_id=1&_where_aine_opetamine_semester_id=&_aine_opetamine_semester_id=&_disp_ainer_eap=1&_vformaat=VFORMAAT_HTML&n_lov_offset=1&n_row_count=&n_row_pos=" target="_blank">Ainekaardist</a></p>
                    <p><a href="https://drive.google.com/file/d/0B5qLUW_SIC3MNmhwc3NMazVoVEk/view" target="_blank">ELU kontseptsioonist</a></p>
                </div>
                <div id="item2" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">Milleks?</h2>
                    <p>Projektõpe on oluline, kuna tänapäeval on erinevate eluvaldkondade töökorraldus üha sagedamini projektipõhine: etteantud tähtajaks ja piiratud ressurssidega tuleb saavutada konkreetsed eesmärgid ja leida lahendus mittestandardsele ülesandele, seda üldjuhul meeskonnatöös. </p>
                    <p>Lisaks tuleb kasuks interdistsiplinaarne lähenemine, kuna tulevases tööelus tuleb paratamatult tegeleda ideede ja probleemidega, mis ületavad ühe eriala piire. ELU projektid annavad võimaluse katsetada oma ideid, harjutada koostöötamist erinevate inimestega ja läbi kogemuse õppida iseenda kohta midagi uut. ELU on Tallinna ülikoolis kohustuslik, et kõik üliõpilased saaksid uudse koosõppimise ja -tegutsemise kogemuse.</p>
                </div>
                <div id="item3" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">Millal?</h2>
                    <p>ELU teostamise aja saab üliõpilane ise valida, kuigi erinevalt tavalisest õppeainest tuleb projekti ettevalmistamisega alustada juba eelneval semestril, kuna rühm peab koos olema semestri alguseks.</p>
                    <p>ELU projekt võib kesta 1-2 semestrit, olenevalt ülesande iseloomust. Kõige olulisem on projekti kestus kohe alguses üliõpilaste ja juhendaja vahel kokku leppida. Kui ELU kestab terve õppeaasta vältel, toimub ÕIS-i registreerimine ja tulemuse esitlemine alles teise semestri jooksul.</p>
                    <p>ELU projekti on soovituslik teha enne viimast ehk lõputöö kirjutamise semestrit.</p>
                    <p>Vaata lisaks ELU projekti </p>
                </div>
                <div id="item4" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">Kellega?</h2>
                    <p>ELU rühma suurus on 6-8 üliõpilast. Kui ühest teemast huvitatud üliõpilasi on rohkem, saab moodustada alamrühmad. Kuna tegemist on erialadevahelise projektiga, peavad rühmas olema vähemalt kolme erineva eriala üliõpilased.</p>
                    <p>ELU rühmad moodustatakse huvipakkuva idee alusel. Üliõpilased saavad valida, millise juhendaja algatatud projektiga liituda, või pakkuda välja oma idee. ELU projekti ideid tutvustatakse ideelaadal ja ELU veebis. Ideelaat on rühma moodustamist toetav sündmus, mis hakkab toimuma kaks korda õppeaastas (mais sügissemestriks, detsembris kevadsemestriks). Projektiga liitumine ja ainesse registreerimine toimub ELU veebis (projekti kirjelduse juures).</p>
                    <p>Igal ELU rühmal on abiks vähemalt üks projekti läbiviimist toetav õppejõud, kas juhendaja, kaasjuhendaja või mentori rollis. Õppejõu roll ELU-s sõltub sellest, kust teostamisele tulev idee pärineb ja missugune on tudengite rühma valmisolek protsessi juhtida. </p>
                    <p>ELU läbiviimise kirjeldamiseks oleme välja töötanud kaks mudelit: ELU 1.0 ehk projekti juhivad õppejõud ning ELU 2.0, mille puhul projektijuht on üliõpilane. ELU 1.0 puhul on projekti algatajaks üks või mitu õppejõudu, kes pakuvad välja idee, on abiks sobiva rühma moodustamisel ja suunavad üliõpilasi soovitud eesmärgi saavutamisel. Lisaks juhendajale või kaasjuhendajatele saavad ELU rühmad küsida sisendit vajaliku valdkonna spetsialistidelt.</p>
                    <p>ELU 2.0 mudelis on kogu vastutus projekti planeerimisel, teostamisel ja kaitsmisel üliõpilastel. Projekti hakkab juhtima üliõpilane, kes suure tõenäosusega on ise idee autor. Kui ELU 1.0 puhul on juhendaja rühma liige, siis tudengikeskses mudelis ei kuulu õppejõud ELU meeskonda. Samas on igal ELU 2.0 rühmal mentor-õppejõud, kes annab tagasisidet ja soovitusi. Üliõpilaste vastutusel põhinev mudel annab erakordse võimaluse enda ideed edasi arendada ja toetav meeskond leida. </p>
                </div>
                <div id="item5" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">Kuidas?</h2>
                    <p>Kõik saab alguse ideest. Idee võib välja pakkuda üliõpilane, õppejõud või partner väljastpoolt ülikooli. Igal ELU projektil peab olema vähemalt üks ülikooli poolne õppejõud.</p>
                    <p>ELU ettevalmistamisel tuleb idee autoril läbi mõelda, milliste oskuste ja teadmistega rühmakaaslasi tarvis oleks ja kes võiks sobida projekti (kaas)juhendajateks. Samamoodi tuleb jälgida, et idee ei oleks õpiprojektiks liiga mahukas ja mõelda läbi esialgne läbiviimise raamistik. </p>
                    <p>Järgnevalt tuleb idee ELU veebi sisestada ja seda ideelaadal tutvustada. Ideelaadaga saab alguse rühmade moodustamise etapp. Ideelaat toimub kaks korda õppeaastas, nii et enne uue semestri algust jääks piisavalt aega esimesteks kohtumisteks ja rühmade moodustamiseks. Kohe alguses tuleb kokku leppida, kui kaua projekt kestab.</p>
                    <p>Kui rühm on paigas, tuleb esialgsest ideest vormida konkreetse eesmärgi, tegevuste, ajakava ja oodatud tulemusega projekt. Projekti teostamine tähendab jagatud ülesannete täitmist ja regulaarseid kohtumisi omavahel ning juhendajaga. Kohtumistel juhendajaga esitlevad üliõpilased projekti hetkeseisu, saavad tagasisidet ja vajadusel olulist sisendit.</p>
                    <p>Enne semestri lõppu tuleb projekti tulemus vormistada ja seda esitleda. Selleks et üliõpilased ja juhendajad näeksid, missugused on teised ELUd, kuulutame iga semestri alguses välja võimalikud projekti esitlemise ajad. Sellest saab projekti lõpetamise tähtaeg. Lisaks tulemuste esitlemisele annavad kõik hinnangu nii enda kui ka rühmakaaslaste panusele.</p>
                </div>
                <div id="item6" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">Missugune?</h2>
                    <p>Õppeaine raames püüavad üliõpilased pakkuda lahendusi ELU olulistele väljakutsetele, arendada edasi olemasolevaid algatusi või luua midagi täiesti uut. ELU läbiviimise viis ning tulemus sõltuvad rühmast ja juhendajast. </p>
                    <p>ELU projekti eesmärk, selle saavutamiseks vajalikud tegevused ja ajakava lepitakse kokku projekti kavandis pärast rühma moodustamist. Õppeaine kohustuslikud osad on projekti kavand, enese ja rühmakaaslaste panuse hindamine ja tulemuse esitlemine.</p>
                    <p>Projekti eesmärkide saavutamiseks vajalike kulude katteks on igal ELU rühmal kasutada 100€ eelarve. </p>
                </div>

            </div>

        </div>

    </div>
@endsection