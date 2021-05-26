@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Панель управления</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Статистика</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body">
                        <div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                                </div>
                            </div>
                            <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:200%;height:200%;left:0; top:0">

                                </div>
                            </div>
                        </div>
                        <canvas id="myChart3" style="display: block; width: 734px; height: 367px;" width="734" height="367" class="chartjs-render-monitor">

                        </canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                        <div class="row">
                            <div class="card card-statistic-2">
                                <div class="card-stats">
                                    <div class="card-stats-title">
                                        Статистика заказов
                                    </div>
                                    <div class="card-stats-items">
                                        @foreach ($ordersCounting as $counts)
                                            <div class="card-stats-item">
                                                <div class="card-stats-item-count">{{ $counts->con }}</div>
                                                <div class="card-stats-item-label">{{ $counts->status }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-icon shadow-primary bg-primary">
                                    <i class="fas fa-archive"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Всего заказов</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $ordersTotalCount }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card card-statistic-2">
                                <div class="card-chart">
                                    <div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                    <canvas id="balance-chart" height="124" style="display: block; width: 523px; height: 124px;" width="523" class="chartjs-render-monitor"></canvas>
                                </div>
                                <div class="card-icon shadow-primary bg-primary">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Баланс</h4>
                                    </div>
                                    <div class="card-body">
                                        {!! $balans !!} Руб.
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>

            </div>
        </div>
    </section>
@endsection
@section('page_js')
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script>
        var ctx = document.getElementById("myChart3").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: {!! $data !!},
                    backgroundColor: [
                        '#191d21',
                        '#63ed7a',
                        '#ffa426',
                        '#fc544b',
                        '#800e90',
                        '#4566db',
                        '#b8031d',
                    ],
                    label: 'Dataset 1'
                }],
                labels: {!! $labels !!},
            },
            options: {
                responsive: true,
                legend: {
                    position: 'right',
                },
            }
        });
        var balance_chart = document.getElementById("balance-chart").getContext('2d');

        var balance_chart_bg_color = balance_chart.createLinearGradient(0, 0, 0, 70);
        balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
        balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

        var myChart = new Chart(balance_chart, {
            type: 'line',
            data: {
                labels: {!! $labels2 !!},
                datasets: [{
                    label: 'Balance',
                    data: {!! $data2 !!},
                    backgroundColor: balance_chart_bg_color,
                    borderWidth: 3,
                    borderColor: 'rgba(63,82,227,1)',
                    pointBorderWidth: 0,
                    pointBorderColor: 'transparent',
                    pointRadius: 3,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(63,82,227,1)',
                }]
            },
            options: {
                layout: {
                    padding: {
                        bottom: -1,
                        left: -1
                    }
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            beginAtZero: true,
                            display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            drawBorder: false,
                            display: false,
                        },
                        ticks: {
                            display: false
                        }
                    }]
                },
            }
        });
    </script>

@endsection

