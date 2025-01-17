@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        .likeButton svg {
            transition: transform .1s ease-in;
        }

        .likeButton svg path {
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

        .carousel-indicators {
            width: fit-content;
            left: 50%;
            transform: translateX(-50%);
        }

        button.likeButton .liked path {
            fill-opacity: 1;
            stroke: none;
            stroke-width: 0;
        }

    </style>
    @livewireStyles
@endsection

@section('main')
    <main class="lg:grid lg:gap-4 lg:grid-cols-4 lg:py-4">
        <div class="content w-full mb-4 lg:mb-0 lg:col-span-3">
            <article class="rounded-2xl py-1 px-0 lg:py-8 lg:px-10 lg:bg-base-200">
                <section class="carousel relative shadow bg-white mt-2 rounded-2xl lg:h-auto">
                    <div class="carousel-inner relative overflow-hidden w-full relative">
                        <!--Slide 1-->
                        <input class="carousel-open hidden" type="radio" id="carousel-1" name="carousel" aria-hidden="true"
                            hidden checked="checked">
                        <div class="carousel-item absolute opacity-0" style="height:50vh;">
                            <div class="block h-full w-full">
                                <iframe class="block h-full w-full"
                                    src="https://www.youtube.com/embed/{{ $resep->youtube_id }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                        <label for="carousel-3"
                            class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                        <label for="carousel-2"
                            class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                        <!--Slide 2-->
                        <input class="carousel-open hidden" type="radio" id="carousel-2" name="carousel" aria-hidden="true"
                            hidden>
                        <div class="carousel-item absolute opacity-0" style="height:50vh;">
                            <div class="block h-full w-full">
                                @if ($resep->photos->count() > 0)
                                <img src="{{  asset('/storage/photos/' . $resep->photos[0]->filename) }}"
                                class="rounded-2xl w-full h-full object-cover">
                                @else
                                <img src="http://blog.sayurbox.com/wp-content/uploads/2021/03/edisibelajarmasak-595x375.jpg"
                                    class="rounded-2xl w-full h-full object-cover">
                                @endif
                                <div
                                    class="from-black bg-gradient-to-t w-full h-full rounded-2xl absolute top-0 left-0 image-filter opacity-50">
                                </div>
                            </div>
                        </div>
                        <label for="carousel-1"
                            class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                        <label for="carousel-3"
                            class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                        <!--Slide 3-->
                        <input class="carousel-open hidden" type="radio" id="carousel-3" name="carousel" aria-hidden="true"
                            hidden>
                        <div class="carousel-item absolute opacity-0" style="height:50vh;">
                            <div class="block h-full w-full">
                                @if ($resep->photos->count() > 1)
                                <img src="{{  asset('/storage/photos/' . $resep->photos[1]->filename) }}"
                                class="rounded-2xl w-full h-full object-cover">
                                @else
                                <img src="http://blog.sayurbox.com/wp-content/uploads/2021/03/edisibelajarmasak-595x375.jpg"
                                    class="rounded-2xl w-full h-full object-cover">
                                @endif
                                <div
                                    class="from-black bg-gradient-to-t w-full h-full rounded-2xl absolute top-0 left-0 image-filter opacity-50">
                                </div>
                            </div>
                        </div>
                        <label for="carousel-2"
                            class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                        <label for="carousel-1"
                            class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                        <!-- Add additional indicators for each slide-->
                        <ol class="carousel-indicators">
                            <li class="inline-block mr-3">
                                <label for="carousel-1"
                                    class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                            </li>
                            <li class="inline-block mr-3">
                                <label for="carousel-2"
                                    class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                            </li>
                            <li class="inline-block mr-3">
                                <label for="carousel-3"
                                    class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                            </li>
                        </ol>

                    </div>
                </section>
                <section class="mt-6">
                    <div class="flex justify-between items-center">
                        <h2 class="font-bold w-3/4 text-xl lg:text-2xl">{{ $resep->title }}</h2>
                        {{-- LIVEWIRE BOOKMARK BUTTON --}}
                        @auth
                            @if (!auth()->user()->is($resep->user))
                                @livewire('bookmark-button', ['resep' => $resep, 'authUser' => Auth::user()])
                            @endif
                        @endauth
                    </div>
                    <div class="flex gap-1 flex-wrap">
                        @foreach ($resep->categories as $category)
                            <span
                                class="bg-transparent border border-gray-900 peer-checked:bg-gray-900 rounded-lg py-1 px-2 flex items-center font-medium text-sm max-w-max">{{ $category->name }}</span>
                        @endforeach
                    </div>
                    <div class="flex items-center mt-2 gap-4 lg:gap-6">
                        <button class="flex justify-center items-center cursor-default gap-1 lg:gap-2">
                            <i class='bx bxs-timer text-2xl lg:text-3xl'></i>
                            <span>{{ $resep->duration }}</span>
                        </button>
                        {{-- LIVEWIRE LIKE BUTTON --}}
                        @livewire('like-button', ['resep' => $resep, 'authUser' => Auth::user()])
                        <a href="#comment" class="flex justify-center items-center gap-1 lg:gap-2">
                            <i class="bi bi-chat-dots-fill text-lg lg:text-xl"></i>
                            <span class="text-sm">{{ $resep->komentars_count }} <span
                                    class="hidden md:inline lg:inline">Komentar</span></span></a>
                        <button class="flex justify-center items-center cursor-default gap-1 lg:gap-2">
                            <i class='bx bxs-bookmark text-xl lg:text-2xl'></i>
                            <span class="text-sm">{{ $bookmarkCount }} <span
                                    class="hidden md:inline lg:inline">Simpan</span></span>
                        </button>
                    </div>
                    <div class="w-full mt-2">
                        <p class="text-sm lg:text-base">{{ $resep->description }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="flex justify-between items-center mt-0 lg:mt-2">
                        <a href="{{ $resep->user->path() }}" class="avatar flex gap-3 items-center w-3/4">
                            <div class="rounded-full w-8 h-8 lg:w-10 lg:h-10">
                                <img src="http://daisyui.com/tailwind-css-component-profile-1@94w.png">
                            </div>
                            <p class="font-bold text-base lg:text-lg">{{ $resep->user->name }}</p>
                        </a>
                        @auth
                            @if (!auth()->user()->is($resep->user))
                                @livewire('follow-button', ['user' => $resep->user, 'authUser' => Auth::user(), 'isProfile' =>
                                false])
                            @endif
                        @endauth
                    </div>
                </section>
            </article>
            <article class="bg-base-200 rounded-2xl mt-4 py-4 px-6 lg:py-8 lg:px-10">
                <h3 class="font-bold mb-4 text-lg lg:text-xl">Bahan Masakan</h3>
                <ul class="list-disc px-6">
                    @foreach ($resep->bahans as $bahan)
                        <li class="text-sm lg:text-base">
                            {{ $bahan->baseQuantity * $bahan->pivot->quantity . ' ' . $bahan->unit }}<b>
                                {{ $bahan->nama }}</b></li>
                    @endforeach
                </ul>
            </article>
            <article class="collapse w-full collapse-arrow bg-base-200 rounded-2xl mt-4">
                <input type="checkbox" id="menu-toggle">
                <div
                    class="collapse-title text-xl font-medium flex justify-between items-center py-4 px-6 lg:py-8 lg:px-10">
                    <h3 class="font-bold text-lg lg:text-xl">Total Kalori</h3>
                    <div class="flex gap-2">
                        <p class="font-bold text-lg lg:text-xl">{{ $totalCalory }} Kkal</p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="chevron w-6 h-6 lg:w-8 lg:h-8" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div class="collapse-content px-8 lg:px-10">
                    <table class="w-full">
                        @foreach ($resep->bahans as $bahan)
                            <tr class="h-8 align-top">
                                <td>{{ $bahan->nama }}</td>
                                <td class="text-right">{{ $bahan->kalori * $bahan->pivot->quantity }} Kkal /
                                    {{ $bahan->baseQuantity * $bahan->pivot->quantity }}
                                    {{ $bahan->unit }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </article>
            <article class="bg-base-200 rounded-2xl mt-4 py-4 px-6 lg:py-8 lg:px-10">
                <h3 class="font-bold mb-4 text-lg lg:text-xl">Langkah-langkah</h3>
                @foreach ($resep->steps as $step)
                    <p class="mb-4"><b>Step {{ $step->nomor_step }}: </b>{{ $step->description }}</p>
                @endforeach
            </article>
            {{-- LIVEWIRE DAFTAR KOMENTAR --}}
            @livewire('daftar-komentar', ['resep' => $resep])
        </div>
        {{-- TODO: Implement --}}
        <aside class="lg:col-span-1">
            <h3 class="font-bold mb-2 text-lg lg:text-xl">Disarankan untuk kamu</h3>
            <div class="flex flex-col gap-5">
                @foreach ($resepRecommendations as $resep)
                    <a href="/reseps/{{ $resep->id }}" class="relative">
                        @if (!$resep->photos->isEmpty())
                            <img src="{{ asset('/storage/photos/' . $resep->photos[0]->filename) }}"
                                alt="Gambar {{ $resep->title }}" class="w-full h-full object-cover rounded-2xl">
                        @else
                            <img src="http://blog.sayurbox.com/wp-content/uploads/2021/03/edisibelajarmasak-595x375.jpg"
                                alt="Gambar {{ $resep->title }}" class="w-full h-full object-cover rounded-2xl">
                        @endif
                        <div
                            class="from-black bg-gradient-to-t w-full h-full rounded-2xl absolute top-0 left-0 image-filter opacity-50">
                        </div>
                        <div
                            class="text-white rounded-2xl absolute w-full h-full top-0 left-0 z-30 p-4 flex flex-col justify-end">
                            <h3 class="font-bold text-lg lg:text-xl">{{ $resep->title }}</h3>
                            <p class="font-medium text-sm lg:text-base">{{ $resep->user->name }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </aside>
    </main>
@endsection

@section('script')
    <script src="{{ asset('js/detail-resep.js') }}"></script>
    @livewireScripts
@endsection

</html>
