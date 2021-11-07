@extends('layouts.master')
@section('css')
    @livewireStyles
@endsection
@section('main')
    <main class="py-4">
        <article class="w-full">
            <h1 class="mb-4 text-xl font-bold">Tambah Resep</h1>
            <form method="POST" action="{{ route('login') }}">
                <div class="flex gap-10">
                    <section class="flex-1">
                        <div class="form-group row mb-3">
                            <label for="judul-resep" class="col-md-4 col-form-label text-md-right">Judul</label>

                            <div class="col-md-6">
                                <input id="judul-resep" type="text"
                                    class="input w-full bg-gray-50 form-control @error('judul-resep') is-invalid @enderror"
                                    name="judul-resep" value="{{ old('judul-resep') }}" required
                                    autocomplete="judul-resep" autofocus placeholder="Judul masakannmu">

                                @error('judul-resep')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="deskripsi-resep" class="col-md-4 col-form-label text-md-right">Deskripsi</label>

                            <div class="col-md-6">
                                <input id="deskripsi-resep" type="text"
                                    class="input w-full bg-gray-50 form-control @error('deskripsi-resep') is-invalid @enderror"
                                    name="deskripsi-resep" value="{{ old('deskripsi-resep') }}" required
                                    autocomplete="deskripsi-resep" autofocus placeholder="Tentang masakannmu">

                                @error('deskripsi-resep')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <h2 class="mb-4 text-lg font-bold">Bahan Masakan</h2>
                        <table class="table w-full table-zebra">
                            <thead>
                                <tr>
                                    <th>Bahan</th>
                                    <th>Kuantitas</th>
                                    <th>Unit</th>
                                    <th>Kalori</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Kucing</td>
                                    <td>100</td>
                                    <td>gram</td>
                                    <td>1000</td>
                                    <td>
                                        <button><i class='bx bxs-trash-alt text-xl'></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kucing</td>
                                    <td>100</td>
                                    <td>gram</td>
                                    <td>1000</td>
                                    <td>
                                        <button><i class='bx bxs-trash-alt text-xl'></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kucing</td>
                                    <td>100</td>
                                    <td>gram</td>
                                    <td>1000</td>
                                    <td>
                                        <button><i class='bx bxs-trash-alt text-xl'></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="btn-plus-wrapper">
                                        <a href="#">
                                            <button class="w-full btn btn-outline">
                                                <iclass='bx bx-plus'></i> Tambah Bahan Makanan
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                        </table>
                    </section>
                    <section class="flex-1">
                        <h2 class="mb-4 text-lg font-bold">Langkah-langkah</h2>
                        <section>
                            <div class="form-control">
                                <textarea name="inputLangkah" class="textarea h-24 resize-none"
                                    placeholder="Langkah-langkah untuk memasak"></textarea>
                            </div>
                            <a href="#">
                                <button class="w-full btn btn-outline">
                                    <iclass='bx bx-plus'></i> Tambah Langkah Memasak
                                </button>
                            </a>
                        </section>
                        <h2 class="mb-4 text-lg font-bold">Gambar atau Video</h2>
                    </section>
                </div>

                <div class="action w-full text-center">
                    <button type="submit" class="btn btn-primary w-1/4">Simpan</button>
                </div>
            </form>
        </article>
    </main>
@endsection

@section('script')
    @livewireScripts
@endsection
