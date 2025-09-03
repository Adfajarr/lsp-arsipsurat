@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-xl shadow">
    {{-- header --}}
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-gray-700">Arsip Surat</h1>
        <a href="{{ route('mail.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
           Arsipkan Surat..
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif


    {{-- Search --}}
    <form method="GET" action="{{ route('mail.index') }}" class="mb-4">
        <div class="flex">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Cari judul surat..."
                   class="w-full px-4 py-2 border rounded-l-lg focus:ring focus:ring-blue-300">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-r-lg hover:bg-blue-700 transition">
                Cari
            </button>
        </div>
    </form>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded-lg">
            <thead class="bg-gray-100 text-gray-600 uppercase text-sm">
                <tr>
                    <th class="py-3 px-3 border">Nomor Surat</th>
                    <th class="py-3 px-3 border text-left">Kategori</th>
                    <th class="py-3 px-3 border text-left">Judul Surat</th>
                    <th class="py-3 px-3 border text-left">Waktu Pengarsipan</th>
                    <th class="py-3 px-3 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($mails as $mail)
                <tr class="hover:bg-gray-50">
                    {{-- <td class="py-2 px-4 border text-center">{{ $loop->iteration }}</td> --}}
                    <td class="py-2 px-3 border">{{ $mail->number ?? '-' }}</td>
                    <td class="py-2 px-3 border">{{ $mail->category->name }}</td>
                    <td class="py-2 px-3 border">{{ $mail->title }}</td>
                    <td class="py-2 px-3 border">
                        {{ $mail->created_at->timezone('Asia/Jakarta')->format('d / F / Y H:i') }}
                    </td>

                    <td class="py-2 px-3 border text-center space-x-2">
                        {{-- Lihat --}}
                        <a href="{{ route('mail.show', $mail->id) }}"
                           class="text-blue-600 hover:underline">Lihat >></a>

                        {{-- Unduh --}}
                        <a href="{{ route('mail.download', $mail->id) }}"
                           class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                           Unduh
                        </a>

                         {{-- Edit --}}
                        <a href="{{ route('mail.edit', $mail->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                           Edit
                        </a>


                        {{-- Hapus --}}
                        <form action="{{ route('mail.destroy', $mail->id) }}" method="POST" class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 delete-btn">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-4 px-4 text-center text-gray-500">
                        Tidak ada data arsip surat.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $mails->links() }}
    </div>
</div> 
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", () => {
    const deleteButtons = document.querySelectorAll('.delete-btn');
    
    deleteButtons.forEach((btn) => {
        btn.addEventListener('click', function (e) {
            let form = this.closest('form');
            
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang sudah dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>
@endpush
