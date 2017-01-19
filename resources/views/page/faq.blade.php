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
        <h1>{{trans('faq.faq')}}</h1>
        <div class="row">
            <div class="col-md-4 margt">
                <ul class="nav menu02 nav-stacked">
                    <li role="presentation" class="active"><a data-toggle="tab" href="#item1">{{trans('faq.what')}}</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#item2">{{trans('faq.why')}}</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#item3">{{trans('faq.when')}}</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#item4">{{trans('faq.with_who')}}</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#item5">{{trans('faq.how')}}</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#item6">{{trans('faq.which')}}</a></li>
                </ul>
            </div>
            <div class="col-md-8 margt content tab-content">
                <div id="item1" class="tab-pane fade in active">
                    <h2 class="h3 text-uppercase">{{trans('faq.what')}}
                    </h2>
                    <p>
                        {{trans('faq.what.desc')}}
                    </p>
                    <p>
                        {{trans('faq.what.desc2')}}
                    </p>
                    <p>
                        {{trans('faq.what.desc3')}}
                    </p>
                    <p>
                        {{trans('faq.what.desc4')}}
                    </p>
                    <p>
                        {{trans('faq.what.desc5')}}
                    </p>
                    <p>
                        {{trans('faq.what.desc6')}}
                    </p>
                    <p>
                        {{trans('faq.what.desc7')}}
                    </p>
                    <p><a href="https://ois.tlu.ee/portal/page?_pageid=35,454989&_dad=portal&_schema=PORTAL&p_msg=&p_public=1&p_what=1&p_lang=ET&p_open_node2=&p_session_id=52668090&p_id=124822&p_mode=1&p_pageid=OKM_AINE_WEB_OTSING&n_disp_result=1&n_export=0&_init=1&_nextsearch=1&_nextorder=1&_orfn_1=AINER_KOOD&_ordi_1=ASC&_disp_ainer_kood=1&_where_ainer_kood=&_ainer_kood=&_disp_ainer_nimetus=1&_where_ainer_nimetus=&_ainer_nimetus=erialasid%20lõimiv%20uuendus&_disp_ainer_nimetus_en=1&_where_ainer_nimetus_en=&_ainer_nimetus_en=&_disp_ainer_oppejoud=1&_where_ainer_oppejoud=&_ainer_oppejoud=&_where_ainer_opj_keel=&_ainer_opj_keel=&_where_ainer_kursus=&_ainer_kursus=&_where_aine_stryksus_nimetus_koodiga=&_aine_stryksus_nimetus_koodiga=&_where_tud_kava_vers=&_tud_kava_vers=&_disp_aine_opetamine_semester_id=1&_where_aine_opetamine_semester_id=&_aine_opetamine_semester_id=&_disp_ainer_eap=1&_vformaat=VFORMAAT_HTML&n_lov_offset=1&n_row_count=&n_row_pos=" target="_blank">{{trans('faq.what.desc8')}}</a></p>
                    <p><a href="https://drive.google.com/file/d/0B5qLUW_SIC3MNmhwc3NMazVoVEk/view" target="_blank">{{trans('faq.what.desc9')}}</a></p>
                </div>
                <div id="item2" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">{{trans('faq.why')}}</h2>
                    <p>
                        {{trans('faq.why.desc')}}
                    </p>
                    <p>
                        {{trans('faq.why.desc2')}}
                    </p>
                </div>
                <div id="item3" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">{{trans('faq.when')}}</h2>
                    <p>
                        {{trans('faq.when.desc')}}
                    </p>
                    <p>
                        {{trans('faq.when.desc2')}}
                    </p>
                </div>
                <div id="item4" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">{{trans('faq.with_who')}}</h2>
                    <p>
                        {{trans('faq.with_who.desc')}}
                    </p>
                    <p>
                        {{trans('faq.with_who.desc2')}}
                    </p>
                    <p>
                        {{trans('faq.with_who.desc3')}}
                    </p>
                    <p>
                        {{trans('faq.with_who.desc4')}}
                    </p>
                    <p>
                        {{trans('faq.with_who.desc5')}}
                    </p>
                </div>
                <div id="item5" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">{{trans('faq.how')}}</h2>
                    <p>
                        {{trans('faq.how.desc')}}
                    </p>
                    <p>
                        {{trans('faq.how.desc2')}}
                    </p>
                    <p>
                        {{trans('faq.how.desc3')}}
                    </p>
                    <p>
                        {{trans('faq.how.desc4')}}
                    </p>
                    <p>
                        {{trans('faq.how.desc5')}}
                    </p>
                </div>
                <div id="item6" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">{{trans('faq.which')}}</h2>
                    <p>
                        {{trans('faq.which.desc')}}
                    </p>
                    <p>
                        {{trans('faq.which.desc2')}}
                    </p>
                    <p>
                        {{trans('faq.which.desc3')}}
                    </p>
                </div>

            </div>

        </div>

    </div>
@endsection