@extends('suivi::layouts.app')

@section('slot')
    <div class="border-b-2 border-purple-100 block ">
        <h2 class="text-2xl">Nouvel événement</h2>
        <h3 class="text-xl">Etape 1</h3>
        <div class="w-full bg-white lg:ml-4 ">
            <div class="rounded p-6">
                <form action="{{route('seance.secondStep')}}" method="get">
                    @csrf
                    {{-- nom --}}
                    <div class="w-full sm:w-2/4 sm:pr-5 ">
                        <label for="nom" class="font-semibold text-gray-700 block pb-1">Quel type d'événement</label>
                        <div class="flex">
                            <select name="type" id="type" class="w-full p-3 m-2 font-thin transition duration-200 focus:shadow-md focus:outline-none ring-offset-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-purple-300">
                                @foreach ($formations as $formation)
                                    <option value="{{$formation->id}}">{{$formation->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button class="bg-green-400 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-green-500" style="
                    margin-top: 1rem;
                " type="submit">Enregistrer</button>

                </form>
        
            </div>
        </div>
    </div>

@endsection