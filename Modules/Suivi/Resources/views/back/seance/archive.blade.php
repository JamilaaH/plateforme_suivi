@extends('suivi::layouts.app')

@section('slot')
    @include('suivi::partials.event.nav')

    @forelse ($parcours as $item)
    <section class="my-3 flex items-center justify-center px-4 bg-white">
        <div class=" w-full rounded-lg shadow-lg p-4 flex md:flex-row flex-col">
            <div class="flex-1">
                <h3 class="font-semibold text-lg tracking-wide">{{ucfirst($item->etape->nom)}} {{ucfirst($item->evenement_type->nom)}} </h3>
                <h3 class="leading-relaxed text-base tracking-wide">                                        {{ date('d M', strtotime($item->date_debut)) }}
                    {{ date('H:i', strtotime($item->heure_debut)) }}
                </h3>

            </div>
            <div>
                
                <a href=""><button class="bg-purple-600 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-purple-700" type="submit">Etudiants</button></a>
                <p> {{$item->max - $item->limite}} / {{$item->max}}    </p>
            </div>
            <form action="{{route('seance.update', $item->id)}}" method="POST" class="ml-2">
                @csrf
                @method("PUT")
                <button class="bg-green-600 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-red-700" type="submit">publier</button>
            </form>

        </div>
    </section>
    @empty
    <section class="my-3 flex items-center justify-center px-4 bg-white">
        <p class="font-bold">Pas de séances archivées</p>
    </section>
    @endforelse

    {{-- @if ($view == 'all')
    <div class="mx-auto flex justify-center mt-5">
        {{$parcours->links('vendor.pagination.simple-tailwind')}}
    </div>

    @endif --}}

@endsection