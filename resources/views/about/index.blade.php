@extends('layouts.app')

@section('content')
<div class="flex items-center space-x-6">
    {{-- Foto di sebelah kiri --}}
    <div class="w-45 h-64">
        <img src="{{ asset('storage/foto.png') }}" 
             alt="Foto Profil"
             class="w-full h-full object-cover rounded-lg shadow">
    </div>

    {{-- Teks di sebelah kanan --}}
    <div>
        <h1 class="text-xl font-bold">Nama: Alfian Dwi Ramadhani</h1>
        <h1 class="text-lg">NIM: 2231740028</h1>
        <h1 class="text-lg">Tanggal Pembuatan Aplikasi Ini: 04 September 2025</h1>
    </div>
</div>
@endsection
