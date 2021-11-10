@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <style>
        button.likeButton svg {
            transition: transform .1s ease-in;
        }

        button.likeButton svg path {
            fill: #E4565E;
            fill-opacity: 0;
            stroke: #1f2937;
            stroke-width: 12px;
            transition: fill-opacity .1s ease-in;
            transition: stroke-opacity .1s ease-in;
        }

        .likeButton:hover svg path {
            fill-opacity: 1;
            stroke-opacity: 0;
        }

        .likeButton:hover svg {
            transform: scale(1.5);
        }

        .collapse-arrow .collapse-title:after {
            content: none;
        }

        #menu-toggle+div svg {
            transition: transform .2s ease-in;
        }

        #menu-toggle:checked+div svg {
            transform: rotate(180deg);
        }

    </style>
    @livewireStyles
@endsection

@section('main')
    <main class="py-4 grid grid-cols-4 gap-4">
        <div class="content w-full col-span-3">
            <article class="bg-base-200 py-8 px-10 rounded-2xl h-screen">
                <section class="flex gap-4 h-1/2">
                    {{-- Video --}}
                    <iframe class="h-full w-3/4 rounded-2xl" src="https://www.youtube.com/embed/QwG1Jj23Zts"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    {{-- Foto --}}
                    <div class="h-full w-1/4 flex flex-col gap-4">
                        @foreach ($resep->photos as $photo)
                            @if ($loop->last)
                                @break
                            @endif
                        <div class="h-1/2 w-full bg-no-repeat bg-cover bg-center rounded-2xl">
                            <img class="rounded-2xl w-full h-full object-cover"
                                src="{{ asset('/storage/photos/' . $photo->filename) }}" alt="{{ $resep->title }}">
                        </div>
                        @endforeach
                    </div>
                </section>
                <section class="mt-6">
                    <div class="flex justify-between items-center">
                        <h2 class="font-bold text-3xl w-3/4">{{ $resep->title }}</h2>
                        <button class="btn btn-outline btn-primary w-1/4">Simpan</button>
                    </div>
                    <div class="flex gap-6 mt-2">
                        <button class="flex gap-2 justify-center items-center cursor-default">
                            <i class='bx bxs-timer text-3xl'></i>
                            <span class="text-sm">{{ $resep->duration }}</span>
                        </button>
                        @livewire('like-button', ['resep' => $resep, 'authUser' => Auth::user()])
                        <a href="#comment" class="flex gap-2 justify-center items-center">
                            <i class="bi bi-chat-dots-fill text-xl"></i>
                            <span class="text-sm">10 Komentar</span></a>
                        <button class="flex gap-2 justify-center items-center cursor-default">
                            <i class='bx bxs-bookmark text-2xl'></i>
                            <span class="text-sm">20 Simpan</span>
                        </button>
                    </div>
                    <div class="w-full mt-2">
                        <p>{{ $resep->description }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="flex justify-between items-center mt-2">
                        <a href="{{ $resep->user->path() }}" class="flex gap-2 items-center w-3/4">
                            <img src="https://i.insider.com/5ca389adc6cc503c5a53fd96?width=500&format=jpeg&auto=webp"
                                class="mask mask-circle w-16">
                            <p class="font-bold text-lg">{{ $resep->user->name }}</p>
                        </a>
                        <button class="btn btn-outline btn-primary w-1/4"><i class='bx bx-plus'></i> Ikuti</button>
                    </div>
                </section>
            </article>
            <article class="bg-base-200 py-8 px-10 rounded-2xl mt-4">
                <h3 class="font-bold text-2xl mb-4">Bahan Masakan</h3>
                <ul class="list-disc px-6">
                    @foreach ($resep->bahans as $bahan)
                        <li>{{ $bahan->baseQuantity . ' ' . $bahan->unit }}<b> {{ $bahan->nama }}</b></li>
                    @endforeach
                </ul>
            </article>
            <article class="collapse w-full collapse-arrow bg-base-200 rounded-2xl mt-4">
                <input type="checkbox" id="menu-toggle">
                <div class="collapse-title text-xl font-medium px-10 pt-8 pb-8 flex justify-between items-center">
                    <h3 class="font-bold text-2xl">Total Kalori</h3>
                    <div class="flex gap-2">
                        <p class="font-bold text-2xl">{{ $resep->bahans->sum('kalori') }} Kkal</p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 chevron" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div class="collapse-content px-10">
                    <table class="w-full">
                        @foreach ($resep->bahans as $bahan)
                            <tr class="h-8 align-top">
                                <td>{{ $bahan->nama }}</td>
                                <td class="text-right">{{ $bahan->kalori }} Kkal / {{ $bahan->baseQuantity }}
                                    {{ $bahan->unit }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </article>
            <article class="bg-base-200 py-8 px-10 rounded-2xl mt-4">
                <h3 class="font-bold text-2xl mb-4">Langkah-langkah</h3>
                @foreach ($resep->steps as $step)
                    <p class="mb-4"><b>Step {{ $step->nomor_step }}: </b>{{ $step->description }}</p>
                @endforeach
            </article>
            {{-- LIVEWIRE DAFTAR KOMENTAR --}}
            @livewire('daftar-komentar', ['resep_id' => $resep->id])
        </div>
        <aside class="col-span-1 flex flex-col gap-4">
            @for ($i = 0; $i <= 3; $i++)
                <a href="#" class="relative">
                    <img src="https://cdn-2.tstatic.net/tribunnews/foto/bank/images/resep-ayam-goreng-kuning-tabur-serundeng.jpg"
                        alt="Image 1" class="rounded-2xl">
                    <div
                        class="from-black bg-gradient-to-t w-full h-full rounded-2xl absolute top-0 left-0 image-filter opacity-50">
                    </div>
                    <div
                        class="text-white rounded-2xl absolute w-full h-full top-0 left-0 z-30 p-4 flex flex-col justify-end">
                        <h3 class="font-bold text-xl">Ayam Goreng Jawa</h3>
                        <p class="font-medium">Eko Prasetyo</p>
                    </div>
                </a>
            @endfor
        </aside>
    </main>
@endsection

@section('script')
    <script src="{{ asset('js/detail-resep.js') }}"></script>
    @livewireScripts
@endsection

</html>
