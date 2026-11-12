@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h5>Halo, {{ auth()->user()->name }} 👋</h5>
            <p class="text-muted mb-0">
                Kamu masuk sebagai <strong>{{ auth()->user()->role }}</strong>.
                Statistik dan grafik stok akan muncul di sini setelah data barang tersedia.
            </p>
        </div>
    </div>
@endsection
