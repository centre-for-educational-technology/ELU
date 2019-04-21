<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('courses')->delete();


      \App\Course::create(array(
          'kood_tlu' => 'RIHJM.YK',
          'kood_htm' => '1706',
          'oppekava_est' => 'Haldusjuhtimine',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'STSTB.YK',
          'kood_htm' => '1615',
          'oppekava_est' => 'Sotsiaaltöö',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUKTM.LT',
          'kood_htm' => '80929',
          'oppekava_est' => 'Kunstiteraapiad',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'AKOM.YK',
          'kood_htm' => '106245',
          'oppekava_est' => 'Õigusteadus',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HKLOR.HK',
          'kood_htm' => '84838',
          'oppekava_est' => 'Liiklusohutus',
          'tase' => 'OPPETASEHM_514',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAKLI.HR',
          'kood_htm' => '1514',
          'oppekava_est' => 'Klassiõpetaja',
          'tase' => 'OPPETASEHM_503',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KKHB.HT',
          'kood_htm' => '81757',
          'oppekava_est' => 'Humanitaarteadused',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'INITM.DT',
          'kood_htm' => '1729',
          'oppekava_est' => 'Infoteadus',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAPB.HR',
          'kood_htm' => '1545',
          'oppekava_est' => 'Pedagoogika',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAKOM.HR',
          'kood_htm' => '100519',
          'oppekava_est' => 'Kutseõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'PSOKM.LT',
          'kood_htm' => '1700',
          'oppekava_est' => 'Organisatsioonikäitumine',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'IFIFB.DT',
          'kood_htm' => '1605',
          'oppekava_est' => 'Informaatika',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'TSKOM.LT',
          'kood_htm' => '1737',
          'oppekava_est' => 'Kehakultuuri õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLECD.LT',
          'kood_htm' => '80546',
          'oppekava_est' => 'Ökoloogia',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLKSB.LT',
          'kood_htm' => '1616',
          'oppekava_est' => 'Keskkonnakorraldus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKSOB.HT',
          'kood_htm' => '1576',
          'oppekava_est' => 'Soome filoloogia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUTOM.LT',
          'kood_htm' => '1623',
          'oppekava_est' => 'Töö- ja tehnoloogiaõpetuse õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLKSM.LT',
          'kood_htm' => '1735',
          'oppekava_est' => 'Keskkonnakorraldus',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFMFM.FK',
          'kood_htm' => '108865',
          'oppekava_est' => 'Muusika ja filmikunsti helitehnoloogiad',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'TSRKB.LT',
          'kood_htm' => '1620',
          'oppekava_est' => 'Rekreatsioonikorraldus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HILAM.HT',
          'kood_htm' => '80104',
          'oppekava_est' => 'Aasia uuringud',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLBKD.LT',
          'kood_htm' => '112377',
          'oppekava_est' => 'Analüütiline biokeemia',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RIRAM.YK',
          'kood_htm' => '81927',
          'oppekava_est' => 'Rahvusvahelised suhted',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HIKSM.HT',
          'kood_htm' => '100521',
          'oppekava_est' => 'Võrdlev kirjandusteadus ja kultuurisemiootika',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUKTB.LT',
          'kood_htm' => '80928',
          'oppekava_est' => 'Kunstiteraapiad',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFRM.FK',
          'kood_htm' => '108524',
          'oppekava_est' => 'Ristmeedia tootmine',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAALM.HR',
          'kood_htm' => '1660',
          'oppekava_est' => 'Alushariduse pedagoog',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFRB.FK',
          'kood_htm' => '112758',
          'oppekava_est' => 'Ristmeedia filmis ja televisioonis',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RIRIB.YK',
          'kood_htm' => '1591',
          'oppekava_est' => 'Riigiteadused',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'TSKB.LT',
          'kood_htm' => '1619',
          'oppekava_est' => 'Kehakultuur',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUKKM.LT',
          'kood_htm' => '1631',
          'oppekava_est' => 'Käsitöö ja kodunduse õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RASLB.YK',
          'kood_htm' => '1584',
          'oppekava_est' => 'Sotsioloogia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'SKVB.HT',
          'kood_htm' => '1577',
          'oppekava_est' => 'Vene filoloogia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFFKR.FK',
          'kood_htm' => '143957',
          'oppekava_est' => 'Filmikunst',
          'tase' => 'OPPETASEHM_514',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'DIDD.YK',
          'kood_htm' => '80550',
          'oppekava_est' => 'Demograafia',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'TPNM.HR',
          'kood_htm' => '136597',
          'oppekava_est' => 'Noorsootöö korraldus',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KKLHB.HT',
          'kood_htm' => '108965',
          'oppekava_est' => 'Interdistsiplinaarsed humanitaarteadused - Artes Liberales',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAANM.HR',
          'kood_htm' => '1665',
          'oppekava_est' => 'Andragoogika',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RKSPB.RK',
          'kood_htm' => '81620',
          'oppekava_est' => 'Sotsiaalpedagoogika',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRENB.HT',
          'kood_htm' => '144337',
          'oppekava_est' => 'Euroopa nüüdiskeeled ja kultuurid',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'SKSLM.HT',
          'kood_htm' => '1684',
          'oppekava_est' => 'Slaavi keeled ja kultuurid',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'AKROM.YK',
          'kood_htm' => '112757',
          'oppekava_est' => 'Rahvusvaheline äriõigus',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUMUM.FK',
          'kood_htm' => '144344',
          'oppekava_est' => 'Muusikaõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'INDLM.DT',
          'kood_htm' => '135217',
          'oppekava_est' => 'Digitaalraamatukogundus',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLGM.LT',
          'kood_htm' => '1712',
          'oppekava_est' => 'Maastike ökoloogia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'TSTD.LT',
          'kood_htm' => '146497',
          'oppekava_est' => 'Tervisekäitumine ja heaolu',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLLOM.LT',
          'kood_htm' => '126197',
          'oppekava_est' => 'Põhikooli loodus- ja täppisteaduslike ainete õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'IFIOM.DT',
          'kood_htm' => '1636',
          'oppekava_est' => 'Informaatikaõpetaja, kooli infojuht',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HIFIB.HT',
          'kood_htm' => '80108',
          'oppekava_est' => 'Filosoofia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KORMB.FK',
          'kood_htm' => '1587',
          'oppekava_est' => 'Reklaam ja imagoloogia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'STSTM.YK',
          'kood_htm' => '1734',
          'oppekava_est' => 'Sotsiaaltöö',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'PSPSM.LT',
          'kood_htm' => '1701',
          'oppekava_est' => 'Psühholoogia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKLND.HT',
          'kood_htm' => '3363',
          'oppekava_est' => 'Lingvistika',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRRB.HT',
          'kood_htm' => '80115',
          'oppekava_est' => 'Romaani keeled ja kultuurid',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'IFITD.DT',
          'kood_htm' => '100219',
          'oppekava_est' => 'Infoühiskonna tehnoloogiad',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAKTD.HR',
          'kood_htm' => '80551',
          'oppekava_est' => 'Kasvatusteadused',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HIANM.HT',
          'kood_htm' => '80525',
          'oppekava_est' => 'Antropoloogia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'SKAMB.FK',
          'kood_htm' => '1608',
          'oppekava_est' => 'Ajakirjandus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RASLD.YK',
          'kood_htm' => '80547',
          'oppekava_est' => 'Sotsioloogia',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLLNM.LT',
          'kood_htm' => '80095',
          'oppekava_est' => 'Linnakorraldus',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLLB.LT',
          'kood_htm' => '132737',
          'oppekava_est' => 'Integreeritud loodusteadused',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRTSM.HT',
          'kood_htm' => '1673',
          'oppekava_est' => 'Suuline tõlge',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'DTLGM.DT',
          'kood_htm' => '137657',
          'oppekava_est' => 'Digitaalsed õpimängud',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RIPGB.YK',
          'kood_htm' => '144339',
          'oppekava_est' => 'Poliitika ja valitsemine',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLFOM.LT',
          'kood_htm' => '1659',
          'oppekava_est' => 'Füüsikaõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RIRIM.YK',
          'kood_htm' => '1693',
          'oppekava_est' => 'Riigiteadused',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAEPB.HR',
          'kood_htm' => '1542',
          'oppekava_est' => 'Eripedagoogika',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'STSPM.YK',
          'kood_htm' => '1733',
          'oppekava_est' => 'Sotsiaalpedagoogika ja lastekaitse',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HIKTB.HT',
          'kood_htm' => '80112',
          'oppekava_est' => 'Kultuuriteadus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFFVM.FK',
          'kood_htm' => '1669',
          'oppekava_est' => 'Filmikunst',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'AIAJM.HT',
          'kood_htm' => '1687',
          'oppekava_est' => 'Ajalugu',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HKIFR.HK',
          'kood_htm' => '3361',
          'oppekava_est' => 'Rakendusinformaatika',
          'tase' => 'OPPETASEHM_514',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HKKDR.HK',
          'kood_htm' => '100520',
          'oppekava_est' => 'Käsitöötehnoloogiad ja disain',
          'tase' => 'OPPETASEHM_514',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HKTJR.HK',
          'kood_htm' => '81522',
          'oppekava_est' => 'Tervisejuht',
          'tase' => 'OPPETASEHM_514',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUMOM.FK',
          'kood_htm' => '1648',
          'oppekava_est' => 'Muusikaõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUTTB.LT',
          'kood_htm' => '1607',
          'oppekava_est' => 'Töö- ja tehnoloogiaõpetus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAKTM.HR',
          'kood_htm' => '80402',
          'oppekava_est' => 'Kasvatusteadused',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKKTM.HT',
          'kood_htm' => '1683',
          'oppekava_est' => 'Kirjandusteadus',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'AIAJD.HT',
          'kood_htm' => '3041',
          'oppekava_est' => 'Ajalugu',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLGOM.LT',
          'kood_htm' => '1711',
          'oppekava_est' => 'Geograafiaõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KOSKB.FK',
          'kood_htm' => '107764',
          'oppekava_est' => 'Suhtekorraldus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAMOM.HR',
          'kood_htm' => '1634',
          'oppekava_est' => 'Mitme aine õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'AIAOM.HT',
          'kood_htm' => '1654',
          'oppekava_est' => 'Ajaloo ja ühiskonnaõpetuse õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'PSPSD.LT',
          'kood_htm' => '80548',
          'oppekava_est' => 'Psühholoogia',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRVOM.HT',
          'kood_htm' => '145117',
          'oppekava_est' => 'Võõrkeeleõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRRMM.HT',
          'kood_htm' => '80116',
          'oppekava_est' => 'Romanistika',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUKAM.FK',
          'kood_htm' => '144342',
          'oppekava_est' => 'Kunstiõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRS2M.HT',
          'kood_htm' => '81584',
          'oppekava_est' => 'Germaani filoloogia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLMM.DT',
          'kood_htm' => '1719',
          'oppekava_est' => 'Matemaatika',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAEPM.HR',
          'kood_htm' => '1666',
          'oppekava_est' => 'Eripedagoog-nõustaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RIHKB.YK',
          'kood_htm' => '1590',
          'oppekava_est' => 'Haldus- ja ärikorraldus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKEB.HT',
          'kood_htm' => '1563',
          'oppekava_est' => 'Eesti filoloogia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'INITB.DT',
          'kood_htm' => '1613',
          'oppekava_est' => 'Infoteadus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAKPB.HR',
          'kood_htm' => '1517',
          'oppekava_est' => 'Kutsepedagoogika',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLGB.LT',
          'kood_htm' => '1593',
          'oppekava_est' => 'Geoökoloogia (kõrvalerialaga)',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'AKLB.YK',
          'kood_htm' => '112737',
          'oppekava_est' => 'Õigusteadus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLMOM.DT',
          'kood_htm' => '1632',
          'oppekava_est' => 'Matemaatikaõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLFD.LT',
          'kood_htm' => '80094',
          'oppekava_est' => 'Füüsika',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KATHM.HR',
          'kood_htm' => '144347',
          'oppekava_est' => 'Täiskasvanuõpe sotsiaalsetes muutustes',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLGLM.LT',
          'kood_htm' => '136077',
          'oppekava_est' => 'Gümnaasiumi loodusteaduslike ainete õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKKLM.HT',
          'kood_htm' => '3362',
          'oppekava_est' => 'Keeletoimetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRPOM.HT',
          'kood_htm' => '1649',
          'oppekava_est' => 'Prantsuse keele õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKEVB.HT',
          'kood_htm' => '1564',
          'oppekava_est' => 'Eesti keel kui teine keel ja eesti kultuur',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKKOM.FK',
          'kood_htm' => '1725',
          'oppekava_est' => 'Kommunikatsioon',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUKKB.LT',
          'kood_htm' => '1606',
          'oppekava_est' => 'Käsitöö ja kodundus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRTKM.HT',
          'kood_htm' => '1672',
          'oppekava_est' => 'Kirjalik tõlge',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFAM.FK',
          'kood_htm' => '112777',
          'oppekava_est' => 'Audiovisuaalne meedia: televisioon/dokumentaalfilm',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'TPLR.HR',
          'kood_htm' => '115679',
          'oppekava_est' => 'Koolieelse lasteasutuse õpetaja',
          'tase' => 'OPPETASEHM_514',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'IFHTM.DT',
          'kood_htm' => '100279',
          'oppekava_est' => 'Haridustehnoloogia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'IFITM.DT',
          'kood_htm' => '1704',
          'oppekava_est' => 'Infotehnoloogia juhtimine',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUKUM.FK',
          'kood_htm' => '1639',
          'oppekava_est' => 'Kunstiõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KOKJM.FK',
          'kood_htm' => '107824',
          'oppekava_est' => 'Kommunikatsioonijuhtimine',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'ININD.DT',
          'kood_htm' => '80895',
          'oppekava_est' => 'Info- ja kommunikatsiooniteadused',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLBB.LT',
          'kood_htm' => '1595',
          'oppekava_est' => 'Bioloogia (kõrvalerialaga)',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RASLM.YK',
          'kood_htm' => '1697',
          'oppekava_est' => 'Sotsioloogia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HIFIM.HT',
          'kood_htm' => '80121',
          'oppekava_est' => 'Filosoofia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAANB.HR',
          'kood_htm' => '1544',
          'oppekava_est' => 'Andragoogika',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'TPSR.YK',
          'kood_htm' => '115678',
          'oppekava_est' => 'Sotsiaaltöö',
          'tase' => 'OPPETASEHM_514',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'TSRKM.LT',
          'kood_htm' => '1738',
          'oppekava_est' => 'Rekreatsioonikorraldus',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFTVM.FK',
          'kood_htm' => '136737',
          'oppekava_est' => 'Televisioon: režii, toimetamine ja tootmine',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRSB.HT',
          'kood_htm' => '1575',
          'oppekava_est' => 'Saksa keel ja kultuur',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFKEM.FK',
          'kood_htm' => '136237',
          'oppekava_est' => 'Filmikunst',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLFM.LT',
          'kood_htm' => '1716',
          'oppekava_est' => 'Füüsika',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRIB.HT',
          'kood_htm' => '1572',
          'oppekava_est' => 'Inglise keel ja kultuur',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'TPNR.HR',
          'kood_htm' => '115677',
          'oppekava_est' => 'Noorsootöö',
          'tase' => 'OPPETASEHM_514',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRSOM.HT',
          'kood_htm' => '1652',
          'oppekava_est' => 'Saksa keele õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'AIAJB.HT',
          'kood_htm' => '3040',
          'oppekava_est' => 'Ajalugu',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'PSPSB.LT',
          'kood_htm' => '1586',
          'oppekava_est' => 'Psühholoogia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUKUB.FK',
          'kood_htm' => '1528',
          'oppekava_est' => 'Kunstiõpetus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KKLSB.YK',
          'kood_htm' => '108966',
          'oppekava_est' => 'Interdistsiplinaarsed sotsiaalteadused - Artes Liberales',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLFB.LT',
          'kood_htm' => '1538',
          'oppekava_est' => 'Füüsika (kõrvalerialaga)',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFMB.FK',
          'kood_htm' => '80575',
          'oppekava_est' => 'Audiovisuaalne meedia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RIPOM.YK',
          'kood_htm' => '1692',
          'oppekava_est' => 'Politoloogia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RIRPD.YK',
          'kood_htm' => '80552',
          'oppekava_est' => 'Riigi- ja poliitikateadused',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KKSB.YK',
          'kood_htm' => '81758',
          'oppekava_est' => 'Sotsiaalteadused',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAHJM.HR',
          'kood_htm' => '1707',
          'oppekava_est' => 'Hariduse juhtimine',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRIOM.HT',
          'kood_htm' => '1637',
          'oppekava_est' => 'Inglise keele õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKLNM.HT',
          'kood_htm' => '1676',
          'oppekava_est' => 'Keeleteadus ja keeletoimetamine',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HIKTM.HT',
          'kood_htm' => '80113',
          'oppekava_est' => 'Kultuuriteooria ja filosoofia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUKOB.FK',
          'kood_htm' => '1558',
          'oppekava_est' => 'Koreograafia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKEVM.HT',
          'kood_htm' => '1658',
          'oppekava_est' => 'Eesti keele kui teise keele õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLBKM.LT',
          'kood_htm' => '81405',
          'oppekava_est' => 'Molekulaarne biokeemia ja ökoloogia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUKOM.FK',
          'kood_htm' => '1670',
          'oppekava_est' => 'Koreograafia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUIKB.LT',
          'kood_htm' => '145097',
          'oppekava_est' => 'Integreeritud tehnoloogiad ja käsitöö',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAALB.HR',
          'kood_htm' => '1541',
          'oppekava_est' => 'Alushariduse pedagoog',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'AKMRB.YK',
          'kood_htm' => '106264',
          'oppekava_est' => 'Turundus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLMB.DT',
          'kood_htm' => '1603',
          'oppekava_est' => 'Matemaatika',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'AKOB.YK',
          'kood_htm' => '106244',
          'oppekava_est' => 'Õigusteadus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKRTB.HT',
          'kood_htm' => '1610',
          'oppekava_est' => 'Referent-toimetaja',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HILAB.HT',
          'kood_htm' => '80103',
          'oppekava_est' => 'Aasia uuringud',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'IFIMM.DT',
          'kood_htm' => '80405',
          'oppekava_est' => 'Inimese ja arvuti interaktsioon',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HIANB.HT',
          'kood_htm' => '80513',
          'oppekava_est' => 'Antropoloogia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLBOM.LT',
          'kood_htm' => '1656',
          'oppekava_est' => 'Bioloogiaõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFFVB.FK',
          'kood_htm' => '1556',
          'oppekava_est' => 'Filmikunst',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HIKUD.HT',
          'kood_htm' => '80577',
          'oppekava_est' => 'Kultuuride uuringud',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKEOM.HT',
          'kood_htm' => '1657',
          'oppekava_est' => 'Eesti keele ja kirjanduse õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUMUB.FK',
          'kood_htm' => '1550',
          'oppekava_est' => 'Muusika',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'STSTD.YK',
          'kood_htm' => '81762',
          'oppekava_est' => 'Sotsiaaltöö',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'SKVOM.HT',
          'kood_htm' => '1646',
          'oppekava_est' => 'Vene keele ja kirjanduse õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAKPM.HR',
          'kood_htm' => '135197',
          'oppekava_est' => 'Kutseõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUMMB.FK',
          'kood_htm' => '144338',
          'oppekava_est' => 'Integreeritud kunst, muusika ja multimeedia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'SKVVB.HT',
          'kood_htm' => '1578',
          'oppekava_est' => 'Vene keel võõrkeelena (kõrvalainega)',
          'tase' => 'OPPETASEHM_511',
      ));
    }
}
