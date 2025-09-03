@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-xl shadow max-w-lg mx-auto">
    <h1 class="text-2xl font-bold text-gray-700 mb-4">Edit Kategori</h1>

    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
            <input type="text" name="name" id="name" 
                   value="{{ old('name', $category->name) }}"
                   class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" required>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Information -->
        <div class="mb-4">
            <label for="information" class="block text-sm font-medium text-gray-700">Keterangan</label>
            <textarea name="information" id="information"
                      class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">{{ old('information', $category->information) }}</textarea>
            @error('information')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('category.index') }}" 
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>

            <button type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
@endsection
