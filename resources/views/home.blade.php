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
                                    <div class="card-stats-title">Order Statistics -
                                        <div class="dropdown d-inline">
                                            <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month" aria-expanded="false">August</a>
                                            <ul class="dropdown-menu dropdown-menu-sm" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 18px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <li class="dropdown-title">Select Month</li>
                                                <li><a href="#" class="dropdown-item">January</a></li>
                                                <li><a href="#" class="dropdown-item">February</a></li>
                                                <li><a href="#" class="dropdown-item">March</a></li>
                                                <li><a href="#" class="dropdown-item">April</a></li>
                                                <li><a href="#" class="dropdown-item">May</a></li>
                                                <li><a href="#" class="dropdown-item">June</a></li>
                                                <li><a href="#" class="dropdown-item">July</a></li>
                                                <li><a href="#" class="dropdown-item active">August</a></li>
                                                <li><a href="#" class="dropdown-item">September</a></li>
                                                <li><a href="#" class="dropdown-item">October</a></li>
                                                <li><a href="#" class="dropdown-item">November</a></li>
                                                <li><a href="#" class="dropdown-item">December</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-stats-items">
                                        <div class="card-stats-item">
                                            <div class="card-stats-item-count">24</div>
                                            <div class="card-stats-item-label">Pending</div>
                                        </div>
                                        <div class="card-stats-item">
                                            <div class="card-stats-item-count">12</div>
                                            <div class="card-stats-item-label">Shipping</div>
                                        </div>
                                        <div class="card-stats-item">
                                            <div class="card-stats-item-count">23</div>
                                            <div class="card-stats-item-label">Completed</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-icon shadow-primary bg-primary">
                                    <i class="fas fa-archive"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Orders</h4>
                                    </div>
                                    <div class="card-body">
                                        59
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
                                        <h4>Balance</h4>
                                    </div>
                                    <div class="card-body">
                                        $187,13
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
    <script src="{{ asset('js/modules-chartjs.js') }}"></script>
@endsection

