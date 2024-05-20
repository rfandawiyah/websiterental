{{-- dashboard --}}

@extends('kerangka.master')
@section('title', 'Dashboard')
@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>table order</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-dark table-striped">
                                    <tr>
                                        <th>ORDER ID</th>
                                        <th>CREATED</th>
                                        <th>CUSTOMER</th>
                                        <th>TOTAL</th>
                                        <th>DATE</th>
                                        <th>STATUS</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
