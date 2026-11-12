@extends('layouts.app')

@section('title', 'Ubah Kategori')

@section('content')
    <div class="card border-0 shadow-sm" style="max-width: 600px;">
        <div class="card-body">
            <form method="POST" action="{{ route('categories.update', $category) }}">
                @csrf
                @method('PUT')
                @include('categories._form')
            </form>
        </div>
    </div>
@endsection
