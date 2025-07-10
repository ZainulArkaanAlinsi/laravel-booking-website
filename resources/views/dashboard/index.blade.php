@extends('dashboard.layout.main')
@section('title')
<title>Dashboard Admin</title>
@endsection

@section('content')
<style>
    /* Glassmorphism Card Effect */
    .card {
        border: none;
        border-radius: 1.2rem;
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(8px);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.10), 0 1.5px 8px #b9c9d9;
        transition: transform 0.18s, box-shadow 0.18s;
    }

    .card:hover {
        transform: translateY(-6px) scale(1.025);
        box-shadow: 0 12px 36px 0 rgba(31, 38, 135, 0.16), 0 2px 12px #4a6fa555;
    }

    .border-left-primary {
        border-left: 0.4rem solid #4a6fa5 !important;
        background: linear-gradient(90deg, #e3f0ff 60%, #f6fafe 100%);
    }

    .border-left-success {
        border-left: 0.4rem solid #5bbd8d !important;
        background: linear-gradient(90deg, #e6fff7 60%, #f6fafe 100%);
    }

    .border-left-info {
        border-left: 0.4rem solid #5bb0ba !important;
        background: linear-gradient(90deg, #e0f7fa 60%, #f6fafe 100%);
    }

    .border-left-warning {
        border-left: 0.4rem solid #ffb347 !important;
        background: linear-gradient(90deg, #fff8e1 60%, #f6fafe 100%);
    }

    .card-header {
        background: linear-gradient(90deg, #4a6fa5 30%, #5bb0ba 80%);
        color: #fff;
        border-top-left-radius: 1.2rem;
        border-top-right-radius: 1.2rem;
        font-weight: 600;
        letter-spacing: 0.04em;
    }

    .font-weight-bold {
        font-weight: 700 !important;
    }

    .text-gray-800 {
        color: #232323 !important;
    }

    .text-gray-300 {
        color: #b9c9d9 !important;
    }

    .progress {
        height: 0.7rem;
        border-radius: 0.6rem;
        background: #e0e0e0;
        box-shadow: 0 1px 4px #b9c9d933;
    }

    .progress-bar {
        border-radius: 0.6rem;
        font-size: 0.85rem;
        font-weight: 600;
        transition: width 0.6s cubic-bezier(.4, 0, .2, 1);
    }

    /* Button style */
    .btn-primary {
        background: linear-gradient(90deg, #4a6fa5 30%, #5bb0ba 80%);
        border: none;
        font-weight: 600;
        letter-spacing: 0.02em;
        border-radius: 0.8rem;
        box-shadow: 0 2px 8px #b9c9d933;
        transition: background 0.2s, box-shadow 0.2s;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #5bb0ba 30%, #4a6fa5 80%);
        box-shadow: 0 4px 16px #4a6fa533;
    }

    /* Heading style */
    .h3,
    h3,
    .h1,
    h1 {
        font-family: 'Montserrat', 'Segoe UI', Arial, sans-serif;
        font-weight: 800;
        letter-spacing: 0.01em;
        color: #4a6fa5;
    }

    /* Print style */
    @media print {
        body * {
            visibility: hidden;
        }

        #print,
        #print * {
            visibility: visible;
            zoom: 100%;
        }

        #print {
            position: absolute;
            left: 0;
            top: 0;
        }

        .btn,
        .card-header .dropdown {
            display: none !important;
        }

        .card {
            box-shadow: none !important;
        }
    }
</style>

<div class="print" id="print">
    <div class="container">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0">Dashboard</h1>
            <a href="#" onclick="window.print()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </a>
        </div>

        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Earnings {{ Carbon\Carbon::now()->isoformat('MMMM') }} (Monthly)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    IDR {{ number_format($monthCount) }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (All Time) -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Earnings (All Time)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    IDR {{ number_format($totalAmount) }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Profit Compared Last Month -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Profit Compared Last Month
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-2 font-weight-bold text-gray-800">
                                            {{ $percentage }}%
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            @if ($percentage > 10)
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: {{ $kiri }}%" aria-valuenow="{{ $kiri }}"
                                                aria-valuemin="0" aria-valuemax="100">
                                                @if ($percentage > 100) 100 @endif
                                            </div>
                                            @if ($percentage > 100)
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: {{ $kanan }}%" aria-valuenow="{{ $kanan }}"
                                                aria-valuemin="0" aria-valuemax="100">
                                                {{ $percentage - 100 }}
                                            </div>
                                            @endif
                                            @else
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: {{ $percentage }}%" aria-valuenow="{{ $percentage }}"
                                                aria-valuemin="0" aria-valuemax="100">
                                                @if ($percentage > 100) 100 @endif
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Transaction -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total Transaction
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $transactionCount }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold">Earnings Overview</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myChart" style="max-height: 100%;max-width:100%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold">Revenue Sources</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-pie pt-4">
                            <canvas id="myChart2" style="max-height: 100%;max-width:100%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script>
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Earnings A Month',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: JSON.parse('{!! json_encode($count) !!}'),
                borderWidth: 1
            }]
        },
        options: {
            scales: { y: { beginAtZero: true } }
        }
    });
</script>
<script>
    const labels2 = JSON.parse('{!! json_encode($months) !!}');
    const data = {
        labels: labels2,
        datasets: [{
            data: JSON.parse('{!! json_encode($qty) !!}'),
            backgroundColor: [
                'rgb(255, 61, 61)', 'rgb(255, 245, 61)', 'rgb(61, 64, 255)', 'rgb(139, 255, 61)',
                'rgb(1, 200, 255)', 'rgb(255, 132, 61)', 'rgb(102, 204, 204)', 'rgb(255, 171, 171)',
                'rgb(102, 153, 255)', 'rgb(102, 102, 102)', 'rgb(197, 163, 255)', 'rgb(231, 255, 172)'
            ],
        }]
    };
    const config = { type: 'doughnut', data: data };
    const myChart2 = new Chart(document.getElementById('myChart2'), config)
</script>
@endsection
