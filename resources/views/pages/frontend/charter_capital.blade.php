@extends('layouts.frontend_app')
@section('frontent_content')
    <div id="rec748127900" class="r t-rec t-rec_pb_210" data-animationappear="off"
        data-record-type="131">
        <!-- T123 -->
        <div class="t123">
            <div class="t-container_100">
                <div class="t-width t-width_100">

                    <!-- Sahifa sarlavhasi -->
                    <div class="page-header">
                        <h1 class="page-title">
                            {{ __('frontend.charter_capital.title') }}
                        </h1>
                    </div>

                    <!-- Hujjatlar jadvali -->
                    <div class="documents-container">
                        <p class="content-text">
                            {{ __('frontend.charter_capital.content') }}</p>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- CSS -->
    <style>
        /* Page Header */
        .page-header {
            text-align: center;
            margin: 40px 0;
            padding: 30px 20px;
            background: #ffffff;
            border: 1px solid #ddd;
        }

        .page-title {
            color: #2c3e50;
            font-size: 24px;
            font-weight: 600;
            margin: 0;
            font-family: 'Times New Roman', serif;
        }

        /* Documents Container */
        .documents-container {
            margin: 0 auto;
            max-width: 1000px;
            background: #ffffff;
        }

        .content-text {
            font-size: 18px;
            line-height: 1.6;
            color: #333;
            margin: 40px 0;
        }

        @media print {
            .page-header {
                border: 1px solid #000;
            }

            .page-title {
                color: #000;
            }
        }

        @media (max-width: 768px) {
            .page-header {
                padding: 20px 15px;
            }

            .page-title {
                font-size: 20px;
            }

            .documents-container {
                margin: 0 10px;
            }

            .content-text {
                font-size: 16px;
                margin: 30px 0;
            }
        }

        @media (max-width: 480px) {
            .page-header {
                padding: 15px 10px;
                margin: 20px 0;
            }

            .page-title {
                font-size: 18px;
            }

            .content-text {
                font-size: 14px;
                margin: 20px 0;
            }
        }
    </style>
@endsection
