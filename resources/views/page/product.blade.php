@extends('layouts.main')

@section('title', 'Produk')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Produk</h1>
            </div>
        </section>
        <livewire:allproduct />
    </div>
@endsection
