@extends('suivi::layouts.app')

@section('slot')
    <div class="my-5 p-5">
        <div class="flex justify-between">
            <h2 class="text-xl">{{ ucfirst($seance->etape->nom) }} {{ ucfirst($seance->evenement_type->nom) }} du
                {{ date('d M Y', strtotime($seance->date_debut)) }}</h2>
            <div class="flex space-x-1">
                @if ($seance->limite == $seance->max)
                    <a href="{{ route('seance.edit', $seance->id) }}"
                        class="bg-green-600 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-red-700">edit</a>
                @endif
                <a href="{{ route('seance.index') }}"><button
                        class="bg-purple-600 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-purple-700">Retour</button></a>
                <form action="{{ route('seance.update', $seance->id) }}" method="POST" class="flex">
                    @csrf
                    @method("PUT")
                    <button
                        class="bg-red-600 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-red-700"
                        type="submit">Mettre fin</button>
                </form>
            </div>
        </div>
        @if ($seance->etape->nom == 'week')
            <p class="font-semibold text-l">Coach : {{ $seance->coach->first()->prenom }}</p>
        @endif
        <h3>{{ date('d M Y', strtotime($seance->date_debut)) }}</h3>
        <h3>{{ date('H:i', strtotime($seance->heure_debut)) }} - {{ date('H:i', strtotime($seance->heure_fin)) }}
        </h3>
    </div>
    <hr>
    <div class="flex flex-col py-5">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nom
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Présence
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Profil
                                </th>
                                @if ($seance->etape->nom == 'week')
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        valider
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($seance_user as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                <p>{{ $item->candidat->nom }} {{ $item->candidat->prenom }}</p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @switch($item->presence)
                                                @case(0)
                                                    <form
                                                        action="{{ route('seance.presence', [$item->candidat_id, $seance->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method("PUT")
                                                        <div class="md:px-2  md:mt-0 items-center flex">
                                                            <button
                                                                class="text-white font-bold text-sm uppercase rounded tracking-wider focus:outline-none"
                                                                type="submit"><i
                                                                    class="fas fa-times-circle text-red-600 text-4xl"
                                                                    style="user-select: auto;"></i></button>
                                                        </div>
                                                    </form>
                                                @break
                                                @case(1)
                                                    <form
                                                        action="{{ route('seance.presence', [$item->candidat_id, $seance->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method("PUT")
                                                        <div class="md:px-2  md:mt-0 items-center flex">
                                                            <button
                                                                class="text-white font-bold text-sm uppercase rounded tracking-wider focus:outline-none"
                                                                type="submit"><i
                                                                    class="fas fa-check-square text-green-600 text-4xl"></i></i></button>
                                                        </div>
                                                    </form>
                                                @break
                                                @default
                                            @endswitch
                                        </td>
                                        <td class="py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('etudiant.show', $item->candidat_id) }}"><button
                                                    class="mx-3 bg-white text-gray-800 font-bold rounded border-b-2 border-purple-500 hover:border-purple-600 hover:bg-purple-600 hover:text-white shadow-md py-2 px-6 inline-flex items-center"><i
                                                        class="fas fa-eye pr-5"></i>Voir</button>
                                            </a>
                                            @if ($seance->etape->nom == 'interview' && $item->presence == 1 && $item->inscrit == 1)
                                                <button
                                                    class="modal-open mx-3 bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-600 hover:text-white shadow-md py-2 px-6 inline-flex items-center">Inviter
                                                    pour une Week</button>

                                                <!--Modal-->
                                                <div
                                                    class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                                                    <div
                                                        class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50">
                                                    </div>

                                                    <div
                                                        class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

                                                        <div
                                                            class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                                                            <svg class="fill-current text-white"
                                                                xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                                viewBox="0 0 18 18">
                                                                <path
                                                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                                                </path>
                                                            </svg>
                                                            <span class="text-sm">(Esc)</span>
                                                        </div>

                                                        <!-- Add margin if you want to see some of the overlay behind the modal-->
                                                        <div class="modal-content py-4 text-left px-6">
                                                            <!--Title-->
                                                            <div class="flex justify-between items-center pb-3">
                                                                <p class="text-2xl font-bold">Sélectionner la week</p>
                                                                <div class="modal-close cursor-pointer z-50">
                                                                    <svg class="fill-current text-black"
                                                                        xmlns="http://www.w3.org/2000/svg" width="18"
                                                                        height="18" viewBox="0 0 18 18">
                                                                        <path
                                                                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                                                        </path>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <form
                                                                action="}"
                                                                method="POST">
                                                                @csrf
                                                                @method("PUT")
                                                                <!--Body-->
                                                                <input type="number" name="invitation" id="invitation"
                                                                    hidden value="{{ $seance->id }}">
                                                                <input type="number" name="user" id="user" hidden
                                                                    value="{{ $item->user->id }}">
                                                                <select name="seance" id="seance"
                                                                    class="border border-gray-400 rounded-lg px-4 py-2 w-full">
                                                                    @foreach ($seances as $seance)
                                                                        <option value="{{ $seance->id }}">
                                                                            {{ ucfirst($seance->etape->nom) }}
                                                                            {{ ucfirst($seance->evenement_type->nom) }}
                                                                            du
                                                                            {{ date('d/m ', strtotime($seance->date_debut)) }}
                                                                            au
                                                                            {{ date('d/m ', strtotime($seance->date_fin)) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>

                                                                <!--Footer-->
                                                                <div class="flex justify-end pt-2">
                                                                    <button
                                                                        class="w-full  mb-3 bg-green-500 rounded-lg text-white hover:bg-green-600 hover:text-white-400 p-3"
                                                                        type="submit">Valider</button>
                                                                </div>
                                                            </form>
                                                            <button
                                                                class="w-full mr-2 modal-close bg-red-500 p-3 rounded-lg text-white hover:bg-red-600">Fermer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- script du modal --}}
                                                <script>
                                                    var openmodal = document.querySelectorAll('.modal-open')
                                                    for (var i = 0; i < openmodal.length; i++) {
                                                        openmodal[i].addEventListener('click', function(event) {
                                                            event.preventDefault()
                                                            toggleModal()
                                                        })
                                                    }

                                                    const overlay = document.querySelector('.modal-overlay')
                                                    overlay.addEventListener('click', toggleModal)

                                                    var closemodal = document.querySelectorAll('.modal-close')
                                                    for (var i = 0; i < closemodal.length; i++) {
                                                        closemodal[i].addEventListener('click', toggleModal)
                                                    }

                                                    document.onkeydown = function(evt) {
                                                        evt = evt || window.event
                                                        var isEscape = false
                                                        if ("key" in evt) {
                                                            isEscape = (evt.key === "Escape" || evt.key === "Esc")
                                                        } else {
                                                            isEscape = (evt.keyCode === 27)
                                                        }
                                                        if (isEscape && document.body.classList.contains('modal-active')) {
                                                            toggleModal()
                                                        }
                                                    };


                                                    function toggleModal() {
                                                        const body = document.querySelector('body')
                                                        const modal = document.querySelector('.modal')
                                                        modal.classList.toggle('opacity-0')
                                                        modal.classList.toggle('pointer-events-none')
                                                        body.classList.toggle('modal-active')
                                                    }
                                                </script>

                                        </td>
                                    @elseif ($item->inscrit == 0 && $item->presence == 1)
                                        <td>
                                            <p>invitation envoyé</p>

                                        </td>


                                @if ($item->seance->etape->nom == 'week' && $item->presence == 1)
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('etudiant.admis', $item->user_id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="mx-3 mb-2 bg-green-700 font-bold rounded  hover:bg-green-500 text-white shadow-md py-2 px-6 inline-flex items-center"><i
                                                    class="fas fa-check text-white mr-1">
                                                </i>Accepter</button>
                                        </form>
                                        <a href="" class="text-white"><button
                                                class="mx-3 bg-red-700 font-bold rounded  hover:bg-red-500 text-white shadow-md py-2 px-6 inline-flex items-center"><i
                                                    class="fas fa-check text-white mr-1"></i>Refus</button>
                                        </a>
                                    </td>
                                @endif

                                </tr>
                            @endif
                            @empty
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <p>Pas d'étudiants inscrits</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- liste des students désincrits à cette séance $seance->id --}}
                @php
                    $test = Modules\Suivi\Entities\SeanceCandidat::where('seance_id', $seance->id)
                        ->onlyTrashed()
                        ->get();
                @endphp
                @if ($test->isNotEmpty())
                    <div class="py-4 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <h3 class="text-xl">Liste des étudiants qui ont annulé la seance</h3>
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nom
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Profil
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @php
                                        $seance = App\Models\SeanceCandidat::where('seance_id', $seance->id)
                                            ->onlyTrashed()
                                            ->get();
                                    @endphp
                                    @isset($seance)
                                        @forelse ($seance->unique('user_id') as $item)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        <p>{{ $item->user->nom }} {{ $item->user->prenom }}</p>
                                                    </div>
                                                </td>
                                                <td class="py-4 whitespace-nowrap text-sm font-medium">
                                                    <a href="{{ route('etudiant.show', $item->user_id) }}"><button
                                                            class="mx-3 bg-white text-gray-800 font-bold rounded border-b-2 border-purple-500 hover:border-purple-600 hover:bg-purple-600 hover:text-white shadow-md py-2 px-6 inline-flex items-center"><i
                                                                class="fas fa-eye pr-5"></i>Voir</button>
                                                    </a>

                                            </tr>

                                        @empty
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <p>pas de désinscription</p>
                                                </td>
                                            </tr>
                                    @endforelse
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
