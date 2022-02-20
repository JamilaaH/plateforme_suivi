@extends('suivi::layouts.app')
@section('slot')
    <div class="border-b-2 border-purple-100 block ">
        <h2 class="text-2xl">Modifier la séance "{{$seance->etape->nom}}" {{$seance->evenement_type->nom}} </h2>
        <div class="w-full bg-white lg:ml-4 ">
            <div class="rounded p-6">
                <form action="{{route('seance.update', $seance->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- nom --}}
                    <input type="number" name="evenement" id="evenement" hidden value="{{$seance->evenement_type_id}}">
                    <div class="sm:flex">
                        {{-- date --}}
                            <div class="w-full sm:w-2/4 sm:pr-5">
                                <label for="date_debut" class="font-semibold text-gray-700 block pb-1">Date de début :</label>
                                <div class="flex">
                                    <input id="date_debut" name="date_debut" class="@error('date_debut') is-invalid @enderror border border-gray-400 rounded-lg px-4 py-2 w-full" type="date"
                                        value="{{$seance->date_debut}}" />
                                        
                                    </div>
                                    @error('date_debut')
                                        <span class="invalid-feedback text-red-600"><strong>{{$message}}</strong></span>
                                    @enderror
                            </div>
                            {{-- Date fin --}}
                            <div class="w-full sm:w-2/4 sm:pl-5 sm:pt-0 pt-3">
                                <label for="date_fin" class="font-semibold text-gray-700 block pb-1">Date de fin</label>
                                <div class="flex">
                                    <input id="date_fin" name="date_fin" class="@error('date_fin') is-invalid @enderror border border-gray-400 rounded-lg px-4 py-2 w-full" type="date"
                                        value="{{$seance->date_fin}}" />
                                    </div>
                                    @error('date_fin')
                                        <span class="invalid-feedback text-red-600"><strong>{{$message}}</strong></span>
                                    @enderror
                                </div>

                        </div>
                        <div class="sm:flex pt-3">
                            {{-- heure debut --}}
                            <div class="w-full sm:w-2/4 sm:pr-5">
                                <label for="heure_debut" class="font-semibold text-gray-700 block pb-1">Heure de début : </label>
                                <div class="flex">
                                    <input id="heure_debut" name="heure_debut" class="@error('heure_debut') is-invalid @enderror border border-gray-400 rounded-lg px-4 py-2 w-full" type="time"
                                        value="{{$seance->heure_debut}}" />
                                        
                                    </div>
                                    @error('heure_debut')
                                        <span class="invalid-feedback text-red-600"><strong>{{$message}}</strong></span>
                                    @enderror
                            </div>
                            {{-- heure fin --}}
                            <div class="w-full sm:w-2/4 sm:pl-5 sm:pt-0 pt-3">
                                <label for="heure_fin" class="font-semibold text-gray-700 block pb-1">Heure de fin</label>
                                <div class="flex">
                                    <input id="heure_fin" name ="heure_fin"class="@error('heure_fin') is-invalid @enderror border border-gray-400 rounded-lg px-4 py-2 w-full" type="time"
                                        value="{{$seance->heure_fin}}" />
                                        
                                    </div>
                                    @error('heure_fin')
                                        <span class="invalid-feedback text-red-600"><strong>{{$message}}</strong></span>
                                    @enderror
                            </div>
                        </div>
                        <div class="sm:flex pt-3">
                            {{-- limite --}}
                            <div class="w-full sm:w-2/4 sm:pr-5">
                                <label for="limite" class="font-semibold text-gray-700 block pb-1">Limite d'inscrits</label>
                                <div class="flex">
                                    <input id="limite" name="limite" class="@error('limite') is-invalid @enderror border border-gray-400 rounded-lg px-4 py-2 w-full" type="number"
                                        value="{{$seance->limite}}" />
                                        
                                    </div>
                                    @error('limite')
                                        <span class="invalid-feedback text-red-600"><strong>{{$message}}</strong></span>
                                    @enderror
                            </div>
                            {{-- lieu --}}
                            <div class="w-full sm:w-2/4 sm:pl-5 sm:pt-0 pt-3">
                                <label for="lieu" class="font-semibold text-gray-700 block pb-1">Lieu</label>
                                <div class="flex">
                                    <input id="lieu" name="lieu" class="@error('lieu') is-invalid @enderror border border-gray-400 rounded-lg px-4 py-2 w-full" type="text"
                                        value="{{$seance->lieu}}" />
                                        
                                    </div>
                                    @error('lieu')
                                        <span class="invalid-feedback text-red-600"><strong>{{$message}}</strong></span>
                                    @enderror
                            </div>
                        </div>
        
                    {{-- etape --}}
                    <div class="sm:flex">
                        <div class="w-full sm:w-2/4 sm:pr-5 ">
                            <label for="etape" class="font-semibold text-gray-700 block pb-1">Quelle étape</label>
                            <div class="flex">
                                <select name="etape" id="etape" class=" @error('etape') is-invalid @enderror w-full px-4 py-2 font-thin transition duration-200 focus:shadow-md focus:outline-none ring-offset-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-purple-300">
                                    @foreach ($etapes as $etape)
                                        <option value="{{$etape->id}}" {{$etape->id == $seance->etape_id ? 'selected': ''}} >{{$etape->nom}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            @error('etape')
                                <span class="invalid-feedback text-red-600"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="w-full sm:w-2/4 sm:pl-5 sm:pt-0 pt-3">
                            <label for="etat" class="font-semibold text-gray-700 block pb-1">Visibilité</label>
                            <div class="flex">
                                <select name="etat" id="etat" class=" @error('etat') is-invalid @enderror w-full px-4 py-2 font-thin transition duration-200 focus:shadow-md focus:outline-none ring-offset-2 border border-gray-400 rounded-lg focus:ring-2 focus:ring-purple-300">
                                    <option value="0" {{$seance->etat == 0 ? 'selected': ''}}>privé</option>
                                    <option value="1" {{$seance->etat == 1 ? 'selected': ''}}>public</option>
                                </select>
                                
                            </div>
                            @error('etat')
                                <span class="invalid-feedback text-red-600"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>


                    </div>
                    <button class="bg-green-400 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-green-500" style="
                    margin-top: 1rem;" type="submit">Enregistrer</button>

                </form>
                </div>

        </div>
    </div>

@endsection