@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">
        {{ isset($user) ? 'Edit User' : 'Tambah User' }}
    </h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(isset($user))
        <form action="{{ route('users.update', $user) }}" method="POST">
        @method('PUT')
    @else
        <form action="{{ route('users.store') }}" method="POST">
    @endif
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Nama</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name ?? '') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-gray-700 font-bold mb-2">Phone</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-bold mb-2">
                {{ isset($user) ? 'Password (kosongkan jika tidak ingin mengubah)' : 'Password' }}
            </label>
            <input type="password" id="password" name="password" {{ isset($user) ? '' : 'required' }} class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" {{ isset($user) ? '' : 'required' }} class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Simpan
        </button>
        <a href="{{ route('users.index') }}" class="ml-4 text-gray-700 hover:text-gray-900">Batal</a>
    </form>
</div>
@endsection