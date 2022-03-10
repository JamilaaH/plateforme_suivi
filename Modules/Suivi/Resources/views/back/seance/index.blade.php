@extends('suivi::layouts.app')

@section('slot')
@include('suivi::partials.event.nav')
@if ($view != 'all')
    <section class="my-2 flex items-center justify-center px-4 mt-5">
        <div class="flex space-x-3">
            @if (count($parcours) == 0)
                <h3 class="font-semibold text-lg tracking-wide">Nouvelle Séance </h3>
                <form action="{{ route('seance.createSeance', $view) }}" method="get">
                    @csrf
                    <button
                        class="bg-blue-600 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-red-700"
                        type="submit"><i class="fas fa-plus"></i> </button>
                </form>
            
                <form action="{{route('evenementtype.destroy', $view)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-600 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-red-700">
                        <i class="fas fa-trash-alt"></i> Supprimer la formation
                    </button>
                </form>

            @else
                <h3 class="font-semibold text-lg tracking-wide">Nouvelle Séance pour
                    {{ ucfirst($parcours->first()->evenement_type->nom) }}</h3>
                <form action="{{ route('seance.create', $parcours->first()->evenement_type_id) }}" method="get">
                    @csrf
                    <button
                        class="bg-blue-600 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-red-700"
                        type="submit"><i class="fas fa-plus"></i> </button>
                </form>
            @endif
        </div>

    </section>
@endif
@foreach ($parcours->sortBy('etape_id') as $item)
    <section class="my-2 flex items-center justify-center px-4 bg-white">
        <div class=" w-full rounded-lg shadow-lg p-4 flex md:flex-row flex-col relative">
            <div class="flex-1">
                <h3 class="font-semibold text-lg tracking-wide">{{ ucfirst($item->etape->nom) }}
                    {{ ucfirst($item->evenement_type->nom) }} </h3>
                <h3 class="leading-relaxed text-base tracking-wide">
                    {{ date('d M o', strtotime($item->date_debut)) }}
                    {{ date('H:i', strtotime($item->heure_debut)) }}
                </h3>
            </div>
            <div>
                <a href="{{ route('seance.etudiants', $item->id) }}"><button
                        class="bg-purple-600 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-purple-700">Etudiants</button></a>
            </div>
            <form action=" {{ route('seance.update', $item->id) }}" method="POST" class="ml-2">
                @csrf
                @method("PUT")
                <button
                    class="bg-indigo-600 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-red-700"
                    type="submit">Archiver</button>
            </form>

            <form action="{{ route('seance.destroy', $item->id) }}" method="post" class="ml-2">
                @csrf
                @method('DELETE')
                <button
                class="bg-red-600 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-indigo-700"> <i class="fas fa-trash-alt"></i> </button>
            
            </form>
            <div class="absolute bottom-0 right-0 flex space-x-1">
                @if ($item->max - $item->limite > 0)
                    <form action=" {{ route('seance.cloture', $item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit"><i class="fas fa-ban text-red-600 text-l"></i> </button>
                    </form>

                @endif
                <p> {{ $item->max - $item->limite }} / {{ $item->max }} </p>
            </div>
        </div>

    </section>
@endforeach

@endsection
