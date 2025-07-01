@extends('layouts.frontend_app')
@section('frontent_content')
    <div class="container">
        <div class="table-container">
            <table class="committee-table">
                <caption>
                    Предлагаемый состав комитетов при Наблюдательном совете АО "Компания Ташкент Инвест"
                </caption>
                <thead>
                    <tr>
                        <th colspan="2">Комитет по аудиту</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Н. Тогаев</td>
                        <td>председатель комитета</td>
                    </tr>
                    <tr>
                        <td>А. Прияткин</td>
                        <td>член комитета</td>
                    </tr>
                    <tr>
                        <td>Ш. Рахмонов</td>
                        <td>член комитета</td>
                    </tr>
                </tbody>
            </table>

            <table class="committee-table">
                <thead>
                    <tr>
                        <th colspan="2">Комитет по стратегии и инвестициям</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>А. Прияткин</td>
                        <td>председатель комитета</td>
                    </tr>
                    <tr>
                        <td>Н. Тогаев</td>
                        <td>член комитета</td>
                    </tr>
                    <tr>
                        <td>Ш. Рахмонов</td>
                        <td>член комитета</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <style>

        .table-container {
            display: flex;
            flex-direction: column;
            gap: 50px;
        }

        .committee-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
            margin: 30px 0;
        }

        .committee-table caption {
            font-size: 18px;
            font-weight: normal;
            margin-bottom: 30px;
            text-align: center;
            color: #666;
            line-height: 1.4;
            padding: 0 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .committee-table th {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
            font-weight: normal;
            font-size: 16px;
            color: #666;
        }

        .committee-table td {
            border: 1px solid #ddd;
            border-top: none;
            padding: 15px;
            vertical-align: middle;
            color: #333;
            font-size: 15px;
        }

        .committee-table td:first-child {
            width: 50%;
            font-weight: normal;
            border-left: 1px solid #ddd;
        }

        .committee-table td:last-child {
            width: 50%;
            font-weight: normal;
            border-right: 1px solid #ddd;
        }

        .committee-table tbody tr:last-child td {
            border-bottom: 1px solid #ddd;
        }

        .committee-table tbody tr:last-child td:first-child {
            border-bottom-left-radius: 0;
        }

        .committee-table tbody tr:last-child td:last-child {
            border-bottom-right-radius: 0;
        }

        /* Remove any hover effects or special styling */
        .committee-table tbody tr {
            background-color: white;
        }

        @media (max-width: 768px) {
            .container {
                padding: 40px 15px 60px;
            }

            .table-container {
                gap: 40px;
            }

            .committee-table {
                font-size: 14px;
                margin: 20px 0;
            }

            .committee-table caption {
                font-size: 16px;
                margin-bottom: 25px;
            }

            .committee-table th {
                padding: 12px 8px;
                font-size: 14px;
            }

            .committee-table td {
                padding: 12px 8px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 10px 50px;
            }

            .committee-table caption {
                font-size: 14px;
                margin-bottom: 20px;
            }

            .committee-table th {
                padding: 10px 6px;
                font-size: 13px;
            }

            .committee-table td {
                padding: 10px 6px;
                font-size: 13px;
            }
        }
    </style>
@endsection
