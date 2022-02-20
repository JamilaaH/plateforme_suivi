@extends('suivi::layouts.app')

@section('slot')
    <div class="border-b-2 border-purple-100 block ">
        <h2 class="text-2xl">Nouvel événement de type {{ $etapes->first()->evenement->nom }}</h2>
        <h3 class="text-xl">Etape 2</h3>
        <div class="w-full bg-white lg:ml-4 ">
            <div class="rounded p-6">
                <form action="{{ route('event.store') }}" method="POST">
                    @csrf
                    {{-- nom --}}
                    <input type="number" name="evenement" id="evenement" hidden
                        value="{{ $etapes->first()->evenement->id }}">
                    <div class="sm:flex">
                        <div class="w-full sm:w-2/4 sm:pr-5 ">
                            <label for="nom" class="font-semibold text-gray-700 block pb-1">Nom de la formation</label>
                            <input type="text" name="nom" id="nom"
                                class="@error('nom') is-invalid @enderror w-full px-4 py-2 font-thin transition duration-200 focus:shadow-md focus:outline-none ring-offset-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-purple-300"
                                value="{{ old('nom') }}">
                            @error('nom')
                                <span class="invalid-feedback text-red-600"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:flex">
                        {{-- date --}}
                        <div class="w-full sm:w-2/4 sm:pr-5">
                            <label for="date_debut" class="font-semibold text-gray-700 block pb-1">Date de début
                                :</label>
                            <div class="flex">
                                <input id="date_debut" name="date_debut"
                                    class="@error('date_debut') is-invalid @enderror border border-gray-400 rounded-lg px-4 py-2 w-full"
                                    type="date" value="{{ old('date_debut') }}" />

                            </div>
                            @error('date_debut')
                                <span class="invalid-feedback text-red-600"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        {{-- Date fin --}}
                        <div class="w-full sm:w-2/4 sm:pl-5 sm:pt-0 pt-3">
                            <label for="date_fin" class="font-semibold text-gray-700 block pb-1">Date de fin</label>
                            <div class="flex">
                                <input id="date_fin" name="date_fin"
                                    class="@error('date_fin') is-invalid @enderror border border-gray-400 rounded-lg px-4 py-2 w-full"
                                    type="date" value="{{ old('date_fin') }}" />
                            </div>
                            @error('date_fin')
                                <span class="invalid-feedback text-red-600"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                    </div>
                    <div class="sm:flex pt-3">
                        {{-- heure debut --}}
                        <div class="w-full sm:w-2/4 sm:pr-5">
                            <label for="heure_debut" class="font-semibold text-gray-700 block pb-1">Heure de début :
                            </label>
                            <div class="flex">
                                <input id="heure_debut" name="heure_debut"
                                    class="@error('heure_debut') is-invalid @enderror border border-gray-400 rounded-lg px-4 py-2 w-full"
                                    type="time" value="{{ old('heure_debut') }}" />

                            </div>
                            @error('heure_debut')
                                <span class="invalid-feedback text-red-600"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        {{-- heure fin --}}
                        <div class="w-full sm:w-2/4 sm:pl-5 sm:pt-0 pt-3">
                            <label for="heure_fin" class="font-semibold text-gray-700 block pb-1">Heure de fin</label>
                            <div class="flex">
                                <input id="heure_fin" name="heure_fin"
                                    class="@error('heure_fin') is-invalid @enderror border border-gray-400 rounded-lg px-4 py-2 w-full"
                                    type="time" value="{{ old('heure_fin') }}" />

                            </div>
                            @error('heure_fin')
                                <span class="invalid-feedback text-red-600"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:flex pt-3">
                        {{-- limite --}}
                        <div class="w-full sm:w-2/4 sm:pr-5">
                            <label for="limite" class="font-semibold text-gray-700 block pb-1">Limite d'inscrits</label>
                            <div class="flex">
                                <input id="limite" name="limite"
                                    class="@error('limite') is-invalid @enderror border border-gray-400 rounded-lg px-4 py-2 w-full"
                                    type="number" value="{{ old('limite') }}" />

                            </div>
                            @error('limite')
                                <span class="invalid-feedback text-red-600"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        {{-- lieu --}}
                        <div class="w-full sm:w-2/4 sm:pl-5 sm:pt-0 pt-3">
                            <label for="lieu" class="font-semibold text-gray-700 block pb-1">Lieu</label>
                            <div class="flex">
                                <input id="lieu" name="lieu"
                                    class="@error('lieu') is-invalid @enderror border border-gray-400 rounded-lg px-4 py-2 w-full"
                                    type="text" value="{{ old('lieu') }}" />

                            </div>
                            @error('lieu')
                                <span class="invalid-feedback text-red-600"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    {{-- etape --}}
                    <div class="sm:flex">
                        <div class="w-full sm:w-2/4 sm:pr-5 ">
                            <label for="etape" class="font-semibold text-gray-700 block pb-1">Quelle étape</label>
                            <div class="flex">
                                <select name="etape" id="etape"
                                    class=" @error('etape') is-invalid @enderror w-full px-4 py-2 font-thin transition duration-200 focus:shadow-md focus:outline-none ring-offset-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-purple-300">
                                    <option value="" disabled selected>Sélectionner une étape</option>
                                    @foreach ($etapes as $etape)
                                        <option value="{{ $etape->id }}" {{ old('etape') == $etape->id ? 'selected' : '' }}>{{ $etape->nom }}</option>
                                    @endforeach
                                </select>

                            </div>
                            @error('etape')
                                <span class="invalid-feedback text-red-600"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        {{-- etat --}}

                        <div class="w-full sm:w-2/4 sm:pl-5 sm:pt-0 pt-3">
                            <label for="etat" class="font-semibold text-gray-700 block pb-1">Visibilité</label>
                            <div class="flex">
                                <select name="etat" id="etat"
                                    class=" @error('etat') is-invalid @enderror w-full px-4 py-2 font-thin transition duration-200 focus:shadow-md focus:outline-none ring-offset-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-purple-300">
                                    <option value="" disabled selected>Visibilité</option>
                                    <option value="0"  {{ old('etat') == 0 ? 'selected' : '' }}>privé</option>
                                    <option value="1"  {{ old('etat') == 1 ? 'selected' : '' }}>public</option>
                                </select>

                            </div>
                            @error('etat')
                                <span class="invalid-feedback text-red-600"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                    </div>
                    {{-- choix coach si séance == week --}}
                    <div class="sm:flex " id="coach2" style="display: none">
                        <div class="w-full sm:w-2/4 sm:pr-5 ">
                            <label for="coach" class="font-semibold text-gray-700 block mt-1 pb-1">Coach</label>
                            <div class="flex">
                                <select name="coach" id="coach" required="required"
                                    class=" @error('coach') is-invalid @enderror w-full px-4 py-2 font-thin transition duration-200 focus:shadow-md focus:outline-none ring-offset-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-purple-300">
                                    <option disabled selected>Sélectionner un coach</option>
                                    @foreach ($coachs as $coach)
                                        <option value="{{ $coach->id }}" >{{ $coach->prenom }}</option>
                                    @endforeach
                                </select>

                            </div>
                            @error('coach')
                                <span class="invalid-feedback text-red-600"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    
                    <button
                        class="bg-green-400 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-green-500"
                        style="
                    margin-top: 1rem;" type="submit">Enregistrer</button>

                </form>
            </div>

        </div>
    </div>
    <script>
        let etape = document.querySelector('#etape');
        let coach = document.querySelector('#coach2');
        etape.addEventListener('change', ()=>{
            const value = etape.value;
            const desc = etape.options[etape.selectedIndex].text;            
            if (desc == 'week') {
                coach.style.display ="unset";
            } else {
                coach.style.display ="none";
        }
        })
        const value = etape.value;
        const desc = etape.options[etape.selectedIndex].text;            
        if (desc == 'week') {
            coach.style.display ="unset";
        } 

    </script>

@endsection