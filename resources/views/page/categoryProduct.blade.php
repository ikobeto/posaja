@extends('layouts.main')

@section('title', 'Produk')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Produk</h1>
            </div>
        </section>
        <livewire:flashmessage />

        <livewire:components.basictable 
        model="App\Models\category_product" 
        :columns="[
            ['label' =>  'nama Kategori', 'field' => 'name', 'sortby' => 'name'],
            ['label' => 'created_at', 'field' => 'created_at', 'sortby' => 'created_at'],
        ]" 
        :actions="['edit', 'delete', 'show']"
        is_paranoid='true'
        />

    </div>
@endsection