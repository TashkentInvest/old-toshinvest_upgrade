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
                            {{ __('frontend.npa.title') }}

                        </h1>
                    </div>

                    <!-- Hujjatlar jadvali -->
                    <div class="documents-container">
                        <table class="documents-table">

                            <thead>
                                <tr class="table-header">
                                    <th class="table-header-cell number">
                                        {{ __('frontend.npa.number') }}
                                    </th>
                                    <th class="table-header-cell document-name">
                                        {{ __('frontend.npa.document_name') }}
                                    </th>
                                    <th class="table-header-cell actions">
                                        {{ __('frontend.npa.actions') }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="table-row">
                                    <td class="table-cell number">
                                        1
                                    </td>
                                    <td class="table-cell document-name">
                                        ПҚ-236
                                    </td>
                                    <td class="table-cell actions">
                                        <a href="{{ asset('assets/frontend/Normativ-huquqiy hujjatlar/ПҚ-236.pdf') }}"
                                            target="_blank"
                                            class="btn">
                                            {{ __('frontend.npa.download') }}
                                        </a>
                                    </td>
                                </tr>
                                <tr class="table-row">
                                    <td class="table-cell number">
                                        2
                                    </td>
                                    <td class="table-cell document-name">
                                        ПФ-112
                                    </td>
                                    <td class="table-cell actions">
                                        <a href="{{ asset('assets/frontend/Normativ-huquqiy hujjatlar/ПФ-112.pdf') }}"
                                            target="_blank"
                                            class="btn">
                                            {{ __('frontend.npa.download') }}
                                        </a>
                                    </td>
                                </tr>
                                <tr class="table-row">
                                    <td class="table-cell number">
                                        3
                                    </td>
                                    <td class="table-cell document-name">
                                        ВМҚ №149
                                    </td>
                                    <td class="table-cell actions">
                                        <a href="{{ asset('assets/frontend/Normativ-huquqiy hujjatlar/ВМҚ 149.pdf') }}"
                                            target="_blank"
                                            class="btn">
                                            {{ __('frontend.npa.download') }}
                                        </a>
                                    </td>
                                </tr>

                                <tr class="table-row">
                                    <td class="table-cell number">
                                        4
                                    </td>
                                    <td class="table-cell document-name">
                                        Toshkent shahri VI-104-94-14-0-K
                                    </td>
                                    <td class="table-cell actions">
                                        <a href="{{ asset('assets/frontend/Normativ-huquqiy hujjatlar/Toshkent shahri_VI-104-94-14-0-K_24.pdf') }}"
                                            target="_blank"
                                            class="btn">
                                            {{ __('frontend.npa.download') }}
                                        </a>
                                    </td>
                                </tr>





                            </tbody>

                        </table>


                    </div>

                    <!-- Ma'lumot -->
                    <div class="info-section">
                        <p class="info-text">
                            {{ __('frontend.npa.info_text') }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- CSS -->
    <style>
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
            margin-bottom: 8px;
            font-family: 'Times New Roman', serif;
        }

        .documents-container {
            margin: 0 auto;
            max-width: 1000px;
            background: #ffffff;
        }

        .documents-table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #34495e;
            font-family: Arial, sans-serif;
        }

        .table-header {
            background-color: #34495e;
        }

        .table-header-cell {
            padding: 15px 20px;
            font-weight: 600;
            font-size: 14px;
            color: #ffffff;
            border-right: 1px solid #2c3e50;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table-header-cell.number {
            text-align: center;
            width: 60px;
        }

        .table-header-cell.document-name {
            text-align: left;
        }

        .table-header-cell.actions {
            text-align: center;
            width: 120px;
        }

        .table-row {
            border-bottom: 1px solid #bdc3c7;
            background-color: #f8f9fa;
        }

        .table-cell {
            padding: 12px 20px;
            font-size: 13px;
            color: #2c3e50;
        }

        .table-cell.number {
            text-align: center;
            font-weight: 600;
        }

        .table-cell.document-name {
            /* Inherits default styles */
        }

        .table-cell.actions {
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            background-color: #34495e;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.3px;
            transition: background-color 0.2s;
            border: none;
        }

        .btn:hover {
            background-color: #2c3e50;
        }

        .info-section {
            margin-top: 30px;
            padding: 20px;
            background: #ffffff;
            border: 1px solid #ddd;
            text-align: center;
        }

        .info-text {
            color: #7f8c8d;
            font-size: 12px;
            margin: 0;
            line-height: 1.5;
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

            .btn {
                padding: 4px 8px !important;
                font-size: 10px !important;
            }

            .page-title {
                font-size: 20px;
            }

            .documents-container {
                margin: 0 10px;
            }
        }

        @media (max-width: 480px) {
            .table-header-cell:first-child,
            .table-cell:first-child {
                display: none;
            }

            .table-header-cell.actions,
            .table-cell.actions {
                display: none;
            }
        }
    </style>
@endsection
