@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-xl shadow max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-700 mb-4">Arsipkan Surat</h1>

    <form action="{{ route('mail.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        {{-- Nomor surat --}}
        <div>
            <label class="block text-gray-700">Nomor Surat</label>
            <input type="text" name="number" value="{{ old('number') }}"
                   class="w-full border px-3 py-2 rounded focus:ring focus:ring-blue-300"
                   required>
            @error('number') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>
        {{-- Judul --}}
        <div>
            <label class="block text-gray-700">Judul Surat</label>
            <input type="text" name="title" value="{{ old('title') }}"
                   class="w-full border px-3 py-2 rounded focus:ring focus:ring-blue-300"
                   required>
            @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Kategori --}}
        <div>
            <label class="block text-gray-700">Kategori Surat</label>
            <select name="category_id" class="w-full border px-3 py-2 rounded focus:ring focus:ring-blue-300" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected':'' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- File --}}
        <div>
            <label class="block text-gray-700">Upload File (PDF)</label>
            <input type="file" name="file_path" accept="application/pdf"
                   class="w-full border px-3 py-2 rounded focus:ring focus:ring-blue-300"
                   required>
            @error('file_path') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between">
            <a href="{{ route('mail.index') }}" 
               class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Kembali</a>
            <button type="submit" 
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
