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
          'name' => 'Haldusjuhtimine',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'STSTB.YK',
          'kood_htm' => '1615',
          'name' => 'Sotsiaaltöö',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUKTM.LT',
          'kood_htm' => '80929',
          'name' => 'Kunstiteraapiad',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'AKOM.YK',
          'kood_htm' => '106245',
          'name' => 'Õigusteadus',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HKLOR.HK',
          'kood_htm' => '84838',
          'name' => 'Liiklusohutus',
          'tase' => 'OPPETASEHM_514',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAKLI.HR',
          'kood_htm' => '1514',
          'name' => 'Klassiõpetaja',
          'tase' => 'OPPETASEHM_503',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KKHB.HT',
          'kood_htm' => '81757',
          'name' => 'Humanitaarteadused',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'INITM.DT',
          'kood_htm' => '1729',
          'name' => 'Infoteadus',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAPB.HR',
          'kood_htm' => '1545',
          'name' => 'Pedagoogika',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAKOM.HR',
          'kood_htm' => '100519',
          'name' => 'Kutseõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'PSOKM.LT',
          'kood_htm' => '1700',
          'name' => 'Organisatsioonikäitumine',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'IFIFB.DT',
          'kood_htm' => '1605',
          'name' => 'Informaatika',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'TSKOM.LT',
          'kood_htm' => '1737',
          'name' => 'Kehakultuuri õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLECD.LT',
          'kood_htm' => '80546',
          'name' => 'Ökoloogia',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLKSB.LT',
          'kood_htm' => '1616',
          'name' => 'Keskkonnakorraldus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKSOB.HT',
          'kood_htm' => '1576',
          'name' => 'Soome filoloogia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUTOM.LT',
          'kood_htm' => '1623',
          'name' => 'Töö- ja tehnoloogiaõpetuse õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLKSM.LT',
          'kood_htm' => '1735',
          'name' => 'Keskkonnakorraldus',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFMFM.FK',
          'kood_htm' => '108865',
          'name' => 'Muusika ja filmikunsti helitehnoloogiad',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'TSRKB.LT',
          'kood_htm' => '1620',
          'name' => 'Rekreatsioonikorraldus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HILAM.HT',
          'kood_htm' => '80104',
          'name' => 'Aasia uuringud',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLBKD.LT',
          'kood_htm' => '112377',
          'name' => 'Analüütiline biokeemia',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RIRAM.YK',
          'kood_htm' => '81927',
          'name' => 'Rahvusvahelised suhted',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HIKSM.HT',
          'kood_htm' => '100521',
          'name' => 'Võrdlev kirjandusteadus ja kultuurisemiootika',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUKTB.LT',
          'kood_htm' => '80928',
          'name' => 'Kunstiteraapiad',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFRM.FK',
          'kood_htm' => '108524',
          'name' => 'Ristmeedia tootmine',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAALM.HR',
          'kood_htm' => '1660',
          'name' => 'Alushariduse pedagoog',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFRB.FK',
          'kood_htm' => '112758',
          'name' => 'Ristmeedia filmis ja televisioonis',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RIRIB.YK',
          'kood_htm' => '1591',
          'name' => 'Riigiteadused',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'TSKB.LT',
          'kood_htm' => '1619',
          'name' => 'Kehakultuur',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUKKM.LT',
          'kood_htm' => '1631',
          'name' => 'Käsitöö ja kodunduse õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RASLB.YK',
          'kood_htm' => '1584',
          'name' => 'Sotsioloogia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'SKVB.HT',
          'kood_htm' => '1577',
          'name' => 'Vene filoloogia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFFKR.FK',
          'kood_htm' => '143957',
          'name' => 'Filmikunst',
          'tase' => 'OPPETASEHM_514',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'DIDD.YK',
          'kood_htm' => '80550',
          'name' => 'Demograafia',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'TPNM.HR',
          'kood_htm' => '136597',
          'name' => 'Noorsootöö korraldus',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KKLHB.HT',
          'kood_htm' => '108965',
          'name' => 'Interdistsiplinaarsed humanitaarteadused - Artes Liberales',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAANM.HR',
          'kood_htm' => '1665',
          'name' => 'Andragoogika',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RKSPB.RK',
          'kood_htm' => '81620',
          'name' => 'Sotsiaalpedagoogika',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRENB.HT',
          'kood_htm' => '144337',
          'name' => 'Euroopa nüüdiskeeled ja kultuurid',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'SKSLM.HT',
          'kood_htm' => '1684',
          'name' => 'Slaavi keeled ja kultuurid',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'AKROM.YK',
          'kood_htm' => '112757',
          'name' => 'Rahvusvaheline äriõigus',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUMUM.FK',
          'kood_htm' => '144344',
          'name' => 'Muusikaõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'INDLM.DT',
          'kood_htm' => '135217',
          'name' => 'Digitaalraamatukogundus',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLGM.LT',
          'kood_htm' => '1712',
          'name' => 'Maastike ökoloogia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'TSTD.LT',
          'kood_htm' => '146497',
          'name' => 'Tervisekäitumine ja heaolu',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLLOM.LT',
          'kood_htm' => '126197',
          'name' => 'Põhikooli loodus- ja täppisteaduslike ainete õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'IFIOM.DT',
          'kood_htm' => '1636',
          'name' => 'Informaatikaõpetaja, kooli infojuht',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HIFIB.HT',
          'kood_htm' => '80108',
          'name' => 'Filosoofia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KORMB.FK',
          'kood_htm' => '1587',
          'name' => 'Reklaam ja imagoloogia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'STSTM.YK',
          'kood_htm' => '1734',
          'name' => 'Sotsiaaltöö',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'PSPSM.LT',
          'kood_htm' => '1701',
          'name' => 'Psühholoogia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKLND.HT',
          'kood_htm' => '3363',
          'name' => 'Lingvistika',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRRB.HT',
          'kood_htm' => '80115',
          'name' => 'Romaani keeled ja kultuurid',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'IFITD.DT',
          'kood_htm' => '100219',
          'name' => 'Infoühiskonna tehnoloogiad',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAKTD.HR',
          'kood_htm' => '80551',
          'name' => 'Kasvatusteadused',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HIANM.HT',
          'kood_htm' => '80525',
          'name' => 'Antropoloogia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'SKAMB.FK',
          'kood_htm' => '1608',
          'name' => 'Ajakirjandus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RASLD.YK',
          'kood_htm' => '80547',
          'name' => 'Sotsioloogia',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLLNM.LT',
          'kood_htm' => '80095',
          'name' => 'Linnakorraldus',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLLB.LT',
          'kood_htm' => '132737',
          'name' => 'Integreeritud loodusteadused',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRTSM.HT',
          'kood_htm' => '1673',
          'name' => 'Suuline tõlge',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'DTLGM.DT',
          'kood_htm' => '137657',
          'name' => 'Digitaalsed õpimängud',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RIPGB.YK',
          'kood_htm' => '144339',
          'name' => 'Poliitika ja valitsemine',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLFOM.LT',
          'kood_htm' => '1659',
          'name' => 'Füüsikaõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RIRIM.YK',
          'kood_htm' => '1693',
          'name' => 'Riigiteadused',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAEPB.HR',
          'kood_htm' => '1542',
          'name' => 'Eripedagoogika',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'STSPM.YK',
          'kood_htm' => '1733',
          'name' => 'Sotsiaalpedagoogika ja lastekaitse',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HIKTB.HT',
          'kood_htm' => '80112',
          'name' => 'Kultuuriteadus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFFVM.FK',
          'kood_htm' => '1669',
          'name' => 'Filmikunst',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'AIAJM.HT',
          'kood_htm' => '1687',
          'name' => 'Ajalugu',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HKIFR.HK',
          'kood_htm' => '3361',
          'name' => 'Rakendusinformaatika',
          'tase' => 'OPPETASEHM_514',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HKKDR.HK',
          'kood_htm' => '100520',
          'name' => 'Käsitöötehnoloogiad ja disain',
          'tase' => 'OPPETASEHM_514',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HKTJR.HK',
          'kood_htm' => '81522',
          'name' => 'Tervisejuht',
          'tase' => 'OPPETASEHM_514',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUMOM.FK',
          'kood_htm' => '1648',
          'name' => 'Muusikaõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUTTB.LT',
          'kood_htm' => '1607',
          'name' => 'Töö- ja tehnoloogiaõpetus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAKTM.HR',
          'kood_htm' => '80402',
          'name' => 'Kasvatusteadused',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKKTM.HT',
          'kood_htm' => '1683',
          'name' => 'Kirjandusteadus',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'AIAJD.HT',
          'kood_htm' => '3041',
          'name' => 'Ajalugu',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLGOM.LT',
          'kood_htm' => '1711',
          'name' => 'Geograafiaõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KOSKB.FK',
          'kood_htm' => '107764',
          'name' => 'Suhtekorraldus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAMOM.HR',
          'kood_htm' => '1634',
          'name' => 'Mitme aine õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'AIAOM.HT',
          'kood_htm' => '1654',
          'name' => 'Ajaloo ja ühiskonnaõpetuse õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'PSPSD.LT',
          'kood_htm' => '80548',
          'name' => 'Psühholoogia',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRVOM.HT',
          'kood_htm' => '145117',
          'name' => 'Võõrkeeleõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRRMM.HT',
          'kood_htm' => '80116',
          'name' => 'Romanistika',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUKAM.FK',
          'kood_htm' => '144342',
          'name' => 'Kunstiõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRS2M.HT',
          'kood_htm' => '81584',
          'name' => 'Germaani filoloogia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLMM.DT',
          'kood_htm' => '1719',
          'name' => 'Matemaatika',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAEPM.HR',
          'kood_htm' => '1666',
          'name' => 'Eripedagoog-nõustaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RIHKB.YK',
          'kood_htm' => '1590',
          'name' => 'Haldus- ja ärikorraldus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKEB.HT',
          'kood_htm' => '1563',
          'name' => 'Eesti filoloogia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'INITB.DT',
          'kood_htm' => '1613',
          'name' => 'Infoteadus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAKPB.HR',
          'kood_htm' => '1517',
          'name' => 'Kutsepedagoogika',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLGB.LT',
          'kood_htm' => '1593',
          'name' => 'Geoökoloogia (kõrvalerialaga)',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'AKLB.YK',
          'kood_htm' => '112737',
          'name' => 'Õigusteadus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLMOM.DT',
          'kood_htm' => '1632',
          'name' => 'Matemaatikaõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLFD.LT',
          'kood_htm' => '80094',
          'name' => 'Füüsika',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KATHM.HR',
          'kood_htm' => '144347',
          'name' => 'Täiskasvanuõpe sotsiaalsetes muutustes',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLGLM.LT',
          'kood_htm' => '136077',
          'name' => 'Gümnaasiumi loodusteaduslike ainete õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKKLM.HT',
          'kood_htm' => '3362',
          'name' => 'Keeletoimetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRPOM.HT',
          'kood_htm' => '1649',
          'name' => 'Prantsuse keele õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKEVB.HT',
          'kood_htm' => '1564',
          'name' => 'Eesti keel kui teine keel ja eesti kultuur',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKKOM.FK',
          'kood_htm' => '1725',
          'name' => 'Kommunikatsioon',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUKKB.LT',
          'kood_htm' => '1606',
          'name' => 'Käsitöö ja kodundus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRTKM.HT',
          'kood_htm' => '1672',
          'name' => 'Kirjalik tõlge',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFAM.FK',
          'kood_htm' => '112777',
          'name' => 'Audiovisuaalne meedia: televisioon/dokumentaalfilm',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'TPLR.HR',
          'kood_htm' => '115679',
          'name' => 'Koolieelse lasteasutuse õpetaja',
          'tase' => 'OPPETASEHM_514',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'IFHTM.DT',
          'kood_htm' => '100279',
          'name' => 'Haridustehnoloogia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'IFITM.DT',
          'kood_htm' => '1704',
          'name' => 'Infotehnoloogia juhtimine',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUKUM.FK',
          'kood_htm' => '1639',
          'name' => 'Kunstiõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KOKJM.FK',
          'kood_htm' => '107824',
          'name' => 'Kommunikatsioonijuhtimine',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'ININD.DT',
          'kood_htm' => '80895',
          'name' => 'Info- ja kommunikatsiooniteadused',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLBB.LT',
          'kood_htm' => '1595',
          'name' => 'Bioloogia (kõrvalerialaga)',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RASLM.YK',
          'kood_htm' => '1697',
          'name' => 'Sotsioloogia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HIFIM.HT',
          'kood_htm' => '80121',
          'name' => 'Filosoofia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAANB.HR',
          'kood_htm' => '1544',
          'name' => 'Andragoogika',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'TPSR.YK',
          'kood_htm' => '115678',
          'name' => 'Sotsiaaltöö',
          'tase' => 'OPPETASEHM_514',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'TSRKM.LT',
          'kood_htm' => '1738',
          'name' => 'Rekreatsioonikorraldus',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFTVM.FK',
          'kood_htm' => '136737',
          'name' => 'Televisioon: režii, toimetamine ja tootmine',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRSB.HT',
          'kood_htm' => '1575',
          'name' => 'Saksa keel ja kultuur',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFKEM.FK',
          'kood_htm' => '136237',
          'name' => 'Filmikunst',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLFM.LT',
          'kood_htm' => '1716',
          'name' => 'Füüsika',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRIB.HT',
          'kood_htm' => '1572',
          'name' => 'Inglise keel ja kultuur',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'TPNR.HR',
          'kood_htm' => '115677',
          'name' => 'Noorsootöö',
          'tase' => 'OPPETASEHM_514',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRSOM.HT',
          'kood_htm' => '1652',
          'name' => 'Saksa keele õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'AIAJB.HT',
          'kood_htm' => '3040',
          'name' => 'Ajalugu',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'PSPSB.LT',
          'kood_htm' => '1586',
          'name' => 'Psühholoogia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUKUB.FK',
          'kood_htm' => '1528',
          'name' => 'Kunstiõpetus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KKLSB.YK',
          'kood_htm' => '108966',
          'name' => 'Interdistsiplinaarsed sotsiaalteadused - Artes Liberales',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLFB.LT',
          'kood_htm' => '1538',
          'name' => 'Füüsika (kõrvalerialaga)',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFMB.FK',
          'kood_htm' => '80575',
          'name' => 'Audiovisuaalne meedia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RIPOM.YK',
          'kood_htm' => '1692',
          'name' => 'Politoloogia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'RIRPD.YK',
          'kood_htm' => '80552',
          'name' => 'Riigi- ja poliitikateadused',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KKSB.YK',
          'kood_htm' => '81758',
          'name' => 'Sotsiaalteadused',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAHJM.HR',
          'kood_htm' => '1707',
          'name' => 'Hariduse juhtimine',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'GRIOM.HT',
          'kood_htm' => '1637',
          'name' => 'Inglise keele õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKLNM.HT',
          'kood_htm' => '1676',
          'name' => 'Keeleteadus ja keeletoimetamine',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HIKTM.HT',
          'kood_htm' => '80113',
          'name' => 'Kultuuriteooria ja filosoofia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUKOB.FK',
          'kood_htm' => '1558',
          'name' => 'Koreograafia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKEVM.HT',
          'kood_htm' => '1658',
          'name' => 'Eesti keele kui teise keele õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLBKM.LT',
          'kood_htm' => '81405',
          'name' => 'Molekulaarne biokeemia ja ökoloogia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUKOM.FK',
          'kood_htm' => '1670',
          'name' => 'Koreograafia',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUIKB.LT',
          'kood_htm' => '145097',
          'name' => 'Integreeritud tehnoloogiad ja käsitöö',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAALB.HR',
          'kood_htm' => '1541',
          'name' => 'Alushariduse pedagoog',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'AKMRB.YK',
          'kood_htm' => '106264',
          'name' => 'Turundus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLMB.DT',
          'kood_htm' => '1603',
          'name' => 'Matemaatika',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'AKOB.YK',
          'kood_htm' => '106244',
          'name' => 'Õigusteadus',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKRTB.HT',
          'kood_htm' => '1610',
          'name' => 'Referent-toimetaja',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HILAB.HT',
          'kood_htm' => '80103',
          'name' => 'Aasia uuringud',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'IFIMM.DT',
          'kood_htm' => '80405',
          'name' => 'Inimese ja arvuti interaktsioon',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HIANB.HT',
          'kood_htm' => '80513',
          'name' => 'Antropoloogia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'MLBOM.LT',
          'kood_htm' => '1656',
          'name' => 'Bioloogiaõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'BFFVB.FK',
          'kood_htm' => '1556',
          'name' => 'Filmikunst',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'HIKUD.HT',
          'kood_htm' => '80577',
          'name' => 'Kultuuride uuringud',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'EKEOM.HT',
          'kood_htm' => '1657',
          'name' => 'Eesti keele ja kirjanduse õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUMUB.FK',
          'kood_htm' => '1550',
          'name' => 'Muusika',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'STSTD.YK',
          'kood_htm' => '81762',
          'name' => 'Sotsiaaltöö',
          'tase' => 'OPPETASEHM_734',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'SKVOM.HT',
          'kood_htm' => '1646',
          'name' => 'Vene keele ja kirjanduse õpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KAKPM.HR',
          'kood_htm' => '135197',
          'name' => 'Kutseõpetaja',
          'tase' => 'OPPETASEHM_614',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'KUMMB.FK',
          'kood_htm' => '144338',
          'name' => 'Integreeritud kunst, muusika ja multimeedia',
          'tase' => 'OPPETASEHM_511',
      ));

      \App\Course::create(array(
          'kood_tlu' => 'SKVVB.HT',
          'kood_htm' => '1578',
          'name' => 'Vene keel võõrkeelena (kõrvalainega)',
          'tase' => 'OPPETASEHM_511',
      ));
    }
}
