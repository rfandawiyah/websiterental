@extends('kerangka.master')
@section('title', 'Dashboard')
@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                        <div class="w-100">
                                            <h6 class="text-muted font-semibold">PENDAPATAN BULAN INI</h6>
                                            <h6 class="font-extrabold mb-0">Rp {{ number_format($total, 0, ',', '.') }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                        <div class="w-100">
                                            <h6 class="text-muted font-semibold">PENDAPATAN TAHUN INI</h6>
                                            <h6 class="font-extrabold mb-0">Rp
                                                {{ number_format($totalpendapatan, 0, ',', '.') }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card" style="height: 129px">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                        <div class="w-100">
                                            <h6 class="text-muted font-semibold">JUMLAH MOBIL</h6>
                                            <h6 class="font-extrabold mb-0">{{ $jumlah_mobil }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                        <div class="w-100">
                                            <h6 class="text-muted font-semibold">JUMLAH SEWA BULAN INI</h6>
                                            <h6 class="font-extrabold mb-0">{{ $tot }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <a href="{{ route('profile.index') }}">
                                    <img src="{{ asset('template/assets/images/faces/1.jpg') }}" alt="Face 1">
                                </a>
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">Admin Profile</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="card w-100">
                        <div class="card-header">
                            <h4>CHART PENDAPATAN TIAP BULAN</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-pendapatan"></div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Armada Terlaris</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-populer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var options = {
                chart: {
                    type: 'line'
                },
                series: [{
                    name: 'Pendapatan',
                    data: @json($earnings)
                }],
                xaxis: {
                    categories: @json($months)
                },
                title: {
                    text: ''
                },
                yaxis: {
                    labels: {
                        formatter: function(val) {
                            return "Rp " + val.toLocaleString();
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-pendapatan"), options);
            chart.render();

            var visitorOptions = {
                chart: {
                    type: 'pie',
                    height: 350
                },
                series: @json($visitorCounts),
                labels: @json($carBrands),
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chartVisitorsProfile = new ApexCharts(document.querySelector("#chart-populer"), visitorOptions);
            chartVisitorsProfile.render();
        });
    </script>
@endsection
