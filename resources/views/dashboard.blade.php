@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Card: Total Surat -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold">Total Surat</h2>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalSurat }}</p>
    </div>

    <!-- Card: Total Kategori -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold">Total Kategori</h2>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalKategori }}</p>
    </div>

    <!-- Card: User Login -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold">Pengguna Aktif</h2>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalUser }}</p>
    </div>
</div>
@endsection
