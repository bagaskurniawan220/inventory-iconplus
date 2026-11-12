@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="card border-0 shadow-sm" style="max-width: 600px;">
        <div class="card-body">
            <form method="POST" action="{{ route('categories.store') }}">
                @csrf
                @include('categories._form')
            </form>
        </div>
    </div>
@endsection
