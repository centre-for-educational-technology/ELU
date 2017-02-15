<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



      \App\Page::create(array(
          'title' => 'What?',
          'body_et' => "<p>ELU on rühmatööna teostatud projekt, millel on konkreetselt sõnastatud eesmärgid, etteantud tähtajad ja reaalne tulemus. Rühm moodustub 6-8 tudengist vähemalt kolmelt erinevalt erialalt. Õppeaine maht on 6 EAP ja hindamine on arvestuslik.</p><p>ELU iseloomustab suur variatiivsus, kuna projektide sisu ja läbiviimise viis on juhendajate ja üliõpilaste otsustada. ELU ainekaardis on kokku lepitud kolm kohustuslikku tööd:</p><p>1) üliõpilaste koostöös valminud projekti kavand;</p><p>2) enese ning rühmakaaslaste panuse hindamine;</p><p>3) projekti tulemuse esitlemine.</p><p>Ainekaart on ühine kõigile erialadele ja õppeastmetele, kuna projekti rühmad moodustuvad erinevate erialade ja õppeastmete üliõpilastest.</p><p>Lisainformatsiooni leiab:</p><p><a href='https://ois.tlu.ee/portal/page?_pageid=35,454989&amp;_dad=portal&amp;_schema=PORTAL&amp;p_msg=&amp;p_public=1&amp;p_what=1&amp;p_lang=ET&amp;p_open_node2=&amp;p_session_id=52668090&amp;p_id=124822&amp;p_mode=1&amp;p_pageid=OKM_AINE_WEB_OTSING&amp;n_disp_result=1&amp;n_export=0&amp;_init=1&amp;_nextsearch=1&amp;_nextorder=1&amp;_orfn_1=AINER_KOOD&amp;_ordi_1=ASC&amp;_disp_ainer_kood=1&amp;_where_ainer_kood=&amp;_ainer_kood=&amp;_disp_ainer_nimetus=1&amp;_where_ainer_nimetus=&amp;_ainer_nimetus=erialasid%20l%C3%B5imiv%20uuendus&amp;_disp_ainer_nimetus_en=1&amp;_where_ainer_nimetus_en=&amp;_ainer_nimetus_en=&amp;_disp_ainer_oppejoud=1&amp;_where_ainer_oppejoud=&amp;_ainer_oppejoud=&amp;_where_ainer_opj_keel=&amp;_ainer_opj_keel=&amp;_where_ainer_kursus=&amp;_ainer_kursus=&amp;_where_aine_stryksus_nimetus_koodiga=&amp;_aine_stryksus_nimetus_koodiga=&amp;_where_tud_kava_vers=&amp;_tud_kava_vers=&amp;_disp_aine_opetamine_semester_id=1&amp;_where_aine_opetamine_semester_id=&amp;_aine_opetamine_semester_id=&amp;_disp_ainer_eap=1&amp;_vformaat=VFORMAAT_HTML&amp;n_lov_offset=1&amp;n_row_count=&amp;n_row_pos=' target='_blank'>Ainekaardist</a></p><p><a href='https://drive.google.com/file/d/0BxOqwuSVpflsdnBCNGxuVXUtbWs/view?usp=sharing\' target='_blank'>ELU kontseptsioonist</a></p>",
          'body_en' => "<p>ELU project is carried out as a group assignment. It has clearly defined goals, deadlines and a real outcome. The team consists of 6-8 students, including students from at least three different study areas. Students will get 6 ECTS and the course ends with a pass/fail assessment.</p><p>ELU is described by great variety, as the project content and the way the project is carried out is decided by the supervisors and the students. The outline of the course includes three compulsory tasks:</p><p>1) a collaboratively created project draft;</p><p>2) evaluation of one’s own contribution and of the team members;</p><p>3) presentation of project results.</p><p>Since project teams are formed of students from different study areas and study levels, the course outline is common for all study areas and study levels.</p><p>Further information:</p><p><a href='https://ois.tlu.ee/portal/page?_pageid=35,454989&amp;_dad=portal&amp;_schema=PORTAL&amp;p_msg=&amp;p_public=1&amp;p_what=1&amp;p_lang=EN&amp;p_open_node2=&amp;p_session_id=53465157&amp;p_id=124822&amp;p_mode=1&amp;p_pageid=OKM_AINE_WEB_OTSING&amp;n_disp_result=1&amp;n_export=0&amp;_init=1&amp;_nextsearch=1&amp;_nextorder=1&amp;_orfn_1=AINER_KOOD&amp;_ordi_1=ASC&amp;_disp_ainer_kood=1&amp;_where_ainer_kood=&amp;_ainer_kood=YID&amp;_disp_ainer_nimetus=1&amp;_where_ainer_nimetus=&amp;_ainer_nimetus=&amp;_disp_ainer_nimetus_en=1&amp;_where_ainer_nimetus_en=&amp;_ainer_nimetus_en=&amp;_disp_ainer_oppejoud=1&amp;_where_ainer_oppejoud=&amp;_ainer_oppejoud=&amp;_where_ainer_opj_keel=&amp;_ainer_opj_keel=&amp;_where_ainer_kursus=&amp;_ainer_kursus=&amp;_where_aine_stryksus_nimetus_koodiga=&amp;_aine_stryksus_nimetus_koodiga=&amp;_where_tud_kava_vers=&amp;_tud_kava_vers=&amp;_disp_aine_opetamine_semester_id=1&amp;_where_aine_opetamine_semester_id=&amp;_aine_opetamine_semester_id=&amp;_disp_ainer_eap=1&amp;_vformaat=VFORMAAT_HTML&amp;n_lov_offset=1&amp;n_row_count=&amp;n_row_pos=' target='_blank'>Course outline</a></p><p><a href='' target='_blank'></a></p>",
          'permalink' => 'what',
       ));



      \App\Page::create(array(
          'title' => 'Why?',
          'body_et' => "<p>Projektõpe on oluline, kuna tänapäeval on erinevate eluvaldkondade töökorraldus üha sagedamini projektipõhine: etteantud tähtajaks ja piiratud ressurssidega tuleb saavutada konkreetsed eesmärgid ning leida lahendusi mittestandardsetele ülesannetele, seda üldjuhul meeskonnatööna.</p><p>Oskus lahendada interdistsiplinaarseid probleeme tuleb kasuks tulevases tööelus, kuna paratamatult puutume kokku küsimuste ja ideedega, mis ületavad ühe eriala piire. ELU projektid annavad võimaluse ellu viia oma ideid, edendada koostööoskust ja suhelda erinevate inimestega. ELU projektis osalemine on võimalus arendada enda juhtimis- ja sotsiaalseid oskusi, algatusvõimet ning saada alusteadmisi projektide planeerimise ja läbiviimise kohta. ELU on Tallinna Ülikoolis kohustuslik õppeaine, et kõik üliõpilased saaksid uudse koosõppimise ja -tegutsemise kogemuse ning kogeksid võimalust oma teadmisi rakendada interdistsiplinaarsete probleemide lahendamisel, mis võivad ka tööelus ette tulla.</p>",
          'body_en' => "<p>Project-based learning is important because in today’s world the work arrangement of different areas of life is more often than not project-based: concrete goals have to be achieved by given deadlines and on limited resources, and solutions have to be sought to non-standard tasks. All of it is often carried out in the form of teamwork.</p><p>The ability to solve interdisciplinary problems will be useful in future work life since we inevitably have to handle issues and ideas that reach beyond one single field. ELU projects will enable to carry out your own ideas, practice working together and communicate with different people. Participating in an ELU project is a possibility to develop your leadership and social skills as well as your initiative and to gain basic knowledge of how to plan and carry out projects. ELU is a compulsory subject in Tallinn University so as to provide all the students with an innovative experience of studying and doing activities together and experience the possibility of applying their knowledge when solving issues that are interdisciplinary in nature and are likely to occur in real work life.</p>",
          'permalink' => 'why',
      ));



      \App\Page::create(array(
          'title' => 'When?',
          'body_et' => "<p>ELU projektiga alustamise aja saab üliõpilane ise valida.  Erinevalt tavalisest õppeainest tuleb ettevalmistamisega alustada juba eelneval semestril, kuna projekti rühm peab olema moodustatud semestri alguseks.</p><p>ELU projekt võib kesta 1–2 semestrit olenevalt selle eesmärkidest ja sisust. Projekti läbiviimise ajakava lepitakse kokku üliõpilaste ja juhendaja(te) vahel esimestel kohtumistel. Kui ELU kestab kaks semestrit, siis lisatakse aine õpingukavasse teisel semestril (st ainepunktid saadakse alles projekti lõppedes). ELU õppeainesse registreerimine toimub ainult läbi ELU veebi ning üliõpilane ise ÕISis ainesse registreerima ei pea. ELU aines on soovituslik osaleda enne viimast ehk lõputöö kirjutamise semestrit.</p>",
          'body_en' => "<p>Students themselves can choose when to carry out an ELU project. Unlike ordinary subjects, the preparation of the projects must be started during the previous semester, as the team needs to be formed before the beginning of the semester.</p><p>An ELU project may last for one or two semesters, depending on its goals and content. The timeframe of carrying out the project is agreed upon among the students and the supervisor(s) during the first meeting. If an ELU project lasts for two semesters, the course will be added to the study plan during the second semester (the credit points will be received at the end of the project). Registration for ELU course can be done only on ELU website and the students do not have to register for the course in ÕIS. It is recommended to take the course before the last semester, i.e. before the semester of writing the final thesis.</p>",
          'permalink' => 'when',
      ));




      \App\Page::create(array(
          'title' => 'With Who?',
          'body_et' => "<p>ELU rühma moodustavad 6–8 üliõpilast. Kui ühest teemast huvitatud üliõpilasi on rohkem, siis moodustatakse alarühmad. Kuna tegemist on erialadevahelise projektiga, peavad rühmas olema vähemalt kolme erineva eriala üliõpilased.</p><p>ELU rühmad moodustuvad huvipakkuva idee alusel. Üliõpilased saavad valida, millise juhendaja algatatud projektiga liituda, või välja pakkuda oma idee. Enda projekti idee lisamiseks tuleb täita veebis ankeet “Mul on idee”, mis kantakse ELU projektide andmebaasi läbivaatamisele. Järgmise sammuna tuleb tudengil enda ideele leida õppejõud-juhendaja.</p><p>ELU projekti ideid tutvustatakse ideelaadal ja ELU veebis. Ideelaat on rühma moodustamist toetav sündmus, mis toimub kaks korda õppeaastas (mais ja detsembris). Projektida liituda ja ainesse registreerida saab ainult ELU veebis.</p><p>ELU läbiviimiseks on kaks mudelit: ELU 1.0 ehk projekti juhivad õppejõud ning ELU 2.0, mille puhul projektijuht on üliõpilane. ELU 1.0 puhul on projekti algatajaks üks või mitu õppejõudu, kes pakuvad välja idee, on abiks sobiva rühma moodustamisel ning suunavad üliõpilasi soovitud eesmärgi saavutamisel. Lisaks juhendajatele saavad ELU rühmad küsida sisendit vajaliku valdkonna spetsialistidelt.</p><p>ELU 2.0 mudelis on kogu vastutus projekti planeerimisel, teostamisel ja kaitsmisel üliõpilastel. Projekti hakkab juhtima üliõpilane, kes suure tõenäosusega on ise selle idee autoriks. Igal ELU 2.0 rühmal on mentor-õppejõud, kes annab vajadusel tagasisidet ja soovitusi. Üliõpilaste vastutusel põhinev mudel annab võimaluse oma ideid reaalselt ellu viia ja arendada endas juhtimisoskust ja algatusvõimet.</p>",
          'body_en' => "<p>ELU team consists of 6-8 students. If there are more students interested in one and the same topic, sub-teams will be formed. Since it is an interdisciplinary project, each team should include students from at least three different study areas.</p><p>ELU teams are formed based on an idea of interest. Students can choose which supervisor’s project to join, or they can come forward with their own idea. To add their own idea for a project a form “I have an idea” needs to be filled in on the website and it will be then forwarded to the database of ELU projects for revision. The next step would be to find a teacher-supervisor for the idea.</p><p>The ideas for ELU projects are introduced at the Idea Fair and on ELU website. Idea Fair is an event supporting the formation of teams and it takes place twice a year (in May and December). Joining a project and registration for ELU course can be done only on ELU website.</p><p>An ELU project can be carried out following either of the two models: ELU 1.0 where members of the teaching staff lead the project, and ELU 2.0 where the project leader is a student. ELU 1.0 projects are initiated by one or more members of the teaching staff. They come forward with an idea, help with forming a suitable team and guide the students towards achieving the goal. In addition to supervisors, ELU teams can ask for input from specialists of relevant areas.</p><p>In ELU 2.0 model the whole responsibility of planning, carrying out and defending a project lies on the student. The project leader is a student who is most probably also the author of the idea. Each ELU 2.0 team has a mentor-teacher who will give feedback and advice, if necessary. This model, based on the responsibility of the student, enables the students to put their ideas into real-life practice and develop leadership skills and initiative.</p>",
          'permalink' => 'with_who',
      ));





      \App\Page::create(array(
          'title' => 'How?',
          'body_et' => "<p>Kõik saab alguse ideest. Idee võib välja pakkuda üliõpilane, õppejõud või partner väljaspoolt ülikooli. Igal ELU projektil peab olema vähemalt üks ülikoolipoolne õppejõud.</p><p>ELU ettevalmistamisel tuleb idee autoril läbi mõelda, millistel erinevatel erialadel õppivaid tudengeid ta oma projekti vajab ja kes võiksid sobida projekti juhendajateks. Samamoodi tuleks jälgida, et idee ei oleks ELU projektiks liiga mahukas ja mõelda läbi esialgne läbiviimise raamistik.</p><p>Järgnevalt tuleb idee ELU veebi sisestada ja seda ideelaadal tutvustada. Ideelaadaga saab alguse rühmade moodustamise etapp. Ideelaat toimub kaks korda õppeaastas, et enne uue semestri algust jääks piisavalt aega esimesteks kohtumisteks ja rühmade moodustamiseks.</p><p>ELU rühmade esimestel kohtumisel lepitakse kokku konkreetsed eesmärgid, tegevuste ajakava, sõlmitakse kokkulepped, mis aitavad kaasa projekti lõplikule teostamisele. Projekti edukaks läbiviimiseks jagatakse omavahel ülesanded ning toimuvad regulaarsed kohtumised üliõpilaste ja juhendataja vahel. Kohtumistel juhendajaga esitlevad üliõpilased projekti hetkeseisu ning saavad vajadusel tagasisidet ja sisendit.</p><p>Enne semestri lõppu tuleb projekti tulemus vormistada ja seda esitleda ning anda hinnang nii enda kui ka rühmakaaslaste panusele. Selleks, et üliõpilased ja juhendajad näeksid, missugused on teised ELUd, kuulutakse iga semestri alguses välja võimalikud projekti esitlemise ajad, millest saab projekti lõpetamise tähtaeg.</p>",
          'body_en' => "<p>Everything starts with an idea. Ideas can be proposed by the students, members of the teaching staff or by a partner from outside the university. Each ELU project needs to include at least one member of the university teaching staff.</p><p>When preparing an ELU project the author of the idea needs to consider what kind of students from different study areas could be needed for the project and who would be suitable to supervise the project. It should also be taken into account that the idea cannot be too expansive for the project and a draft framework for carrying out the project should be outlined.</p><p>The next step is to enter the idea on ELU website and introduce it at Idea Fair. Idea Fair is where the stage of forming the teams begins. Idea Fair takes place twice during the academic year, so as to give enough time for first meetings and for forming the teams before the beginning of the semester.</p><p>During the first meeting of ELU teams concrete goals and the timeframe of the activities are agreed upon and agreements are made to facilitate the process of achieving the final outcome. In order to carry out the project in a successful manner, the tasks are divided among the members of the team and regular meetings are held with the students and the supervisor. During the meetings with the supervisor the students present the state of the project and, if necessary, get feedback and input.</p><p>Before the end of the semester, the outcome of the project has to be formulated and presented and an evaluation of one’s own contribution and of the team members must be given. The possible dates for presentation of the projects, being the deadlines for finishing the projects, are declared at the beginning of each semester, so that the students and supervisors could get acquainted with other ELU projects.</p>",
          'permalink' => 'how',
      ));



      \App\Page::create(array(
          'title' => 'Which?',
          'body_et' => "<p>ELU õppeaines saavad üliõpilased pakkuda lahendusi väljakutsetele, arendada edasi olemasolevaid algatusi või luua midagi täiesti uut. ELU läbiviimise viis ning tulemus sõltuvad rühmast ja juhendajast.</p><p>ELU projekti eesmärk ning selle saavutamiseks vajalikud tegevused ja ajakava lepitakse kokku projekti kavandis pärast rühma moodustumist. Õppeaine kohustuslikud osad on projekti kavand, enese ja rühmakaaslaste panuse hindamine ja tulemuse esitlemine.</p><p>Projekti eesmärkide saavutamiseks vajalike kulude katteks on igal ELU rühmal kasutada 100€ eelarve</p>",
          'body_en' => "<p>ELU course enables students to come forward with solutions to challenges, develop the already existing initiatives further or create something totally new.  The way an ELU project is carried out and its outcome depend on the team and the supervisor.</p><p>The goal of an ELU project and activities necessary for reaching the goal and the timeframe are agreed upon in the project draft after the team has been formed. The compulsory parts of the subject are the draft of the project, evaluation of one’s own contribution and of the team members and presentation of the outcome.</p><p>Each ELU team will have a budget of 100€ to cover the costs necessary to achieve the project goals.</p>",
          'permalink' => 'which',
      ));



      $info = \App\Page::where('permalink', 'LIKE', '%info%')->first();

      $info->body_en = "<p>ELU is a new type of subject where, together with their supervisors, students from different study areas create a project on a topic of their interest whereas suitable methods for carrying out their ideas are chosen by themselves.</p>";

      $info->body_et = "<p>ELU on uutmoodi õppeaine, kus erinevate erialade üliõpilased koostöös juhendajatega koostavad projekti endale huvipakkuval teemal, valides seejuures ise sobilikud viisid oma ideede teostamiseks.</p>";

      $info->save();


      \App\Page::create(array(
          'title' => 'Ideelaat',
          'body_et' => "<p>Kaks korda aastas (mais ja detsembris) toimuv üritus, kus tutvustatakse järgmisel semestril alustavaid projekte. Ideelaadal saab küsida huvipakkuvate ideede kohta täpsemat infot ja kohtuda tulevaste rühmakaaslastega.</p>",
          'body_en' => "<p>An event that takes place twice a year (in May and December) where projects that start the following semester are introduced. You can ask for more information about ideas that you find interesting and meet future members of your team.</p>",
          'permalink' => 'fair_info',
      ));



      $faq = \App\Page::where('permalink', 'LIKE', '%faq%')->first();

      $faq->delete();





    }


  }

