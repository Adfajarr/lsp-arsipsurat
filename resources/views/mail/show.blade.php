@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 font-bold text">Detail Surat</h1>

    <div class="card">
        <div class="card-body">
            <p class="card-text"><strong>Nomor Surat:</strong> {{ $mail->number ?? '-' }}</p>
            <p class="card-text"><strong>Kategori:</strong> {{ $mail->category->name ?? '-' }}</p>
            <p class="card-title"><strong>Judul Surat:</strong>{{ $mail->title }}</p>
            <p class="card-text"><strong>Waktu Unggah:</strong> {{ $mail->created_at->timezone('Asia/Jakarta')->format('d / F / Y') ?? '-' }}</p>

            @if($mail->file_path)
                <div class="mt-4">
                    <strong>Preview File:</strong>
                    <iframe src="{{ asset('storage/' . $mail->file_path) }}" 
                            width="100%" height="500px" 
                            style="border:1px solid #ccc;">
                    </iframe>
                </div>

                {{-- <a href="{{ route('mail.download', $mail->id) }}" class="btn btn-primary mt-3">
                    Download File
                </a> --}}
            @else
                <p class="text-danger mt-3"><em>Tidak ada file terlampir</em></p>
            @endif
                <button type="#"
                    class="bg-blue-500 text-white mt-3 px-3 py-1 rounded hover:bg-blue-600 ">
                        <a href="{{ route('mail.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                </button>
        </div>
    </div>
</div>
@endsection
