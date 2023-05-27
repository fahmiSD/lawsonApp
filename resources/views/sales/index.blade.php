@extends('layouts.app')

@section('body')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Sales</h1>
    </div>

    <hr />

    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Sales Per Bulan
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Download atau Kirim Email Data Sales Per Bulan</h5>
                        <p class="card-text">Fitur 2a pada technical test programmer Lawson</p>
                        <a href="sales/exportPerBulan" class="btn btn-success">Download Excel</a>
                        <a href="sales/kirimPerBulan" class="btn btn-secondary">Kirim Email</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Sales Per Product
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Download atau Kirim Email Data Sales Per Product</h5>
                        <p class="card-text">Fitur 2a pada technical test programmer Lawson</p>
                        <a href="sales/exportPerProduct" class="btn btn-success">Download Excel</a>
                        <a href="#" class="btn btn-secondary">Kirim Email</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Sales Per Kota
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Download atau Kirim Email Data Sales Per Kota</h5>
                        <p class="card-text">Fitur 2a pada technical test programmer Lawson</p>
                        <a href="sales/exportPerCity" class="btn btn-success">Download Excel</a>
                        <a href="#" class="btn btn-secondary">Kirim Email</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Sales Per User
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Download atau Kirim Email Data Sales Per User Berdasarkan Total Belanja
                            Perbulannnya</h5>
                        <p class="card-text">Fitur 2b pada technical test programmer Lawson</p>
                        <a href="sales/exportPerUser" class="btn btn-success">Download Excel</a>
                        <a href="#" class="btn btn-secondary">Kirim Email</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
