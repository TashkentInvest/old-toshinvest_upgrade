@extends('layouts.frontend_app')
@section('frontent_content')
    <div id="rec748127900" class="r t-rec t-rec_pb_210" style="padding-bottom:0px;" data-animationappear="off"
        data-record-type="131">
        <!-- T123 -->
        <div class="t123">
            <div class="t-container_100">
                <div class="t-width t-width_100">

                    <!-- Sahifa sarlavhasi -->
                    <div class="page-header"
                        style="text-align: center; margin: 40px 0; padding: 30px 20px; background: #ffffff; border: 1px solid #ddd;">
                        <h1
                            style="color: #2c3e50; font-size: 24px; font-weight: 600; margin-bottom: 8px; font-family: 'Times New Roman', serif;">
                            Риски
                        </h1>
                    </div>

                    <!-- Hujjatlar jadvali -->
                    <div class="documents-container" style="margin: 0 auto; max-width: 1000px; background: #ffffff;">
                        <p style="font-size: 18px; line-height: 1.6; color: #333; margin: 40px 0;">
                            − Введение системы мониторинга и прозрачной отчётности. <br><br>
                            − Активное взаимодействие с частным бизнесом и международными партнёрами<br><br>
                            − Гибкая корректировка стратегии с учётом экономической ситуации и обратной связи от жителей и
                            предпринимателей.<br><br>

                        </p>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- CSS -->
    <style>
        .documents-table {
            font-family: Arial, sans-serif;
        }

        .documents-table a {
            text-decoration: none;
        }

        .documents-table a:hover {
            text-decoration: none;
        }

        .page-header h1 {
            margin: 0;
        }

        @media print {
            .documents-table {
                border: 1px solid #000;
            }

            .documents-table th,
            .documents-table td {
                border: 1px solid #000;
                padding: 8px;
            }

            .documents-table a {
                color: #000;
                text-decoration: underline;
            }
        }

        @media (max-width: 768px) {
            .documents-table {
                font-size: 11px;
            }

            .documents-table th,
            .documents-table td {
                padding: 8px 12px;
            }

            .documents-table a {
                padding: 4px 8px !important;
                font-size: 10px !important;
            }

            .page-header h1 {
                font-size: 20px;
            }

            .documents-container {
                margin: 0 10px;
            }

            .stats-section div {
                flex-direction: column;
            }

            .signature-section {
                text-align: center;
            }

            .signature-section>div {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 480px) {

            .documents-table th:first-child,
            .documents-table td:first-child {
                display: none;
            }

            .documents-table th:nth-child(3),
            .documents-table td:nth-child(3) {
                display: none;
            }
        }
    </style>
@endsection
