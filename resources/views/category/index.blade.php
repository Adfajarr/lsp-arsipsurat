@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-xl shadow">
    {{--header--}}
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-gray-700">Kategori Surat</h1>
        <a href="{{ route('category.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
           Tambah Kategori
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{--search--}}
    <form method="GET" action="{{ route('category.index') }}" class="mb-4">
        <div class="flex">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Cari nama kategori..."
                   class="w-full px-4 py-2 border rounded-l-lg focus:ring focus:ring-blue-300">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-r-lg hover:bg-blue-700 transition">
                Cari
            </button>
        </div>
    </form>

   <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded-lg">
            <thead class="bg-gray-100 text-gray-600 uppercase text-sm">
                <tr>
                    <th class="py-3 px-4 border">ID Kategori</th>
                    <th class="py-3 px-4 border text-left">Nama Kategori</th>
                    <th class="py-3 px-4 border text-left">Keterangan</th>
                    <th class="py-3 px-4 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($categories as $category)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border text-center">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 border">{{ $category->name }}</td>
                    <td class="py-2 px-4 border">{{ $category->information ?? '-' }}</td>
                    <td class="py-2 px-4 border text-center space-x-2">
                        {{-- Edit --}}
                        <a href="{{ route('category.edit', $category->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                           Edit
                        </a>

                        {{-- Hapus --}}
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="inline delete-form">
                            @csrf
                            @method('DELETE')
                                <button type="button" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 delete-btn">
                                    Hapus
                                </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-4 px-4 text-center text-gray-500">
                        Tidak ada data kategori.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $categories->links() }}
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
