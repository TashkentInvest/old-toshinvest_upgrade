@extends('layouts.frontend_app')

@section('frontent_content')
    <div id="rec_vacancies" class="r t-rec t-rec_pt_120 t-rec_pb_135"
         style="padding-top:120px;padding-bottom:135px;background-color:#efefef;" data-animationappear="off"
         data-record-type="650" data-bg-color="#efefef">
        <div class="t650">
            <div class="t-section__container t-container t-container_flex">
                <div class="t-col t-col_12">
                    <div class="t-section__title t-title t-title_xs t-align_center t-margin_auto" field="btitle">
                        Вакансии
                    </div>
                </div>
            </div>
            <style>
                .t-section__descr {
                    max-width: 560px;
                }

                #rec_vacancies .t-section__title {
                    margin-bottom: 90px;
                }

                @media screen and (max-width: 960px) {
                    #rec_vacancies .t-section__title {
                        margin-bottom: 75px;
                    }
                }
            </style>
            <div class="t650__container t-card__container t-container" data-columns-in-row="1">
                <div class="t-card__col t-col t-col_12 t-align_center" style="cursor: pointer;">
                    <div class="t650__inner-col" style="background-color: rgb(255, 255, 255); height: 200px;">
                        <div class="t650__text">
                            <div class="t-card__title t-name t-name_lg" field="li_title_vacancies">
                                <a href="https://tashkent.hh.uz/search/vacancy?from=employerPage&employer_id=10755963&hhtmFrom=employer"
                                   class="t-card__link" id="cardtitle_vacancies"
                                   aria-labelledby="cardtitle_vacancies cardbtn_vacancies" target="_blank">
                                    Открытые вакансии на hh.uz

                                    <div class="t650__btn-container">
                                        <div class="t-card__btntext-wrapper">
                                            <div class="t-card__btn-text t-btntext t-btntext_sm"
                                                 id="cardbtn_vacancies" data-field="li_buttontitle_vacancies"
                                                 style="color:#193d88;font-weight:600;" aria-hidden="true"
                                                 data-buttonfieldset="li_button" data-lid="vacancies">
                                                Просмотреть вакансии
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            t_onReady(function() {
                t_onFuncLoad('t650_init', function() {
                    t650_init('rec_vacancies');
                });
                t_onFuncLoad('t650_unifyHeights', function() {
                    t650_unifyHeights('rec_vacancies');
                });
                if (typeof jQuery !== 'undefined') {
                    $('.t650').on('displayChanged', function() {
                        t650_unifyHeights('rec_vacancies');
                    });
                } else {
                    var rec = document.querySelector('#rec_vacancies');
                    if (!rec) return;
                    var wrapper = rec.querySelector('.t650');
                    if (wrapper) {
                        wrapper.addEventListener('displayChanged', function() {
                            t_onFuncLoad('t650_unifyHeights', function() {
                                t650_unifyHeights('rec_vacancies');
                            });
                        });
                    }
                }
            });

            window.addEventListener('resize', t_throttle(function() {
                t_onFuncLoad('t650_unifyHeights', function() {
                    t650_unifyHeights('rec_vacancies');
                });
            }));

            window.addEventListener('load', function() {
                t_onFuncLoad('t650_unifyHeights', function() {
                    t650_unifyHeights('rec_vacancies');
                });
            });
        </script>

        <style>
            #rec_vacancies .t650__inner-col {
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                border-radius: 5px;
            }

            #rec_vacancies .t650 .t650__inner-col:hover,
            #rec_vacancies .t650 .t-focusable .t650__inner-col,
            #rec_vacancies .t650 .t-card__col_btnfocusable .t650__inner-col {
                box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.1) !important;
            }
        </style>
    </div>
@endsection
