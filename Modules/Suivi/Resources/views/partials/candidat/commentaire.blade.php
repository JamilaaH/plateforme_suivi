<div class="p-5">
    <h2 class="text-5xl">Commentaire</h2>
    <div class="px-12 mt-3">
        @forelse ($etudiant->commentaires as $commentaire)
        <div class="flex justify-between">
            <h4 class="text-xl border-b-2 border-purple-500 max-w-max pb-1">
                {{$commentaire->auteur->nom}} {{$commentaire->auteur->prenom}}
                || {{$commentaire->sujet}}
            </h4>
            @if ($commentaire->auteur->id  == Auth::user()->id)
                <form action="{{route('commentaire.destroy', $commentaire)}}" method="post">
                    @csrf
                @method('DELETE')
                <button class="hover:text-red-600  text-xs text-gray-300 ">Supprimer</button>
                </form>
            @else

            @endif
        </div>
        <p class="my-3">{{$commentaire->contenu}}</p>
        @empty
        <h2 class="text-3xl text-center  text-gray-100">Aucun Commentaire</h2>
        @endforelse
    </div>
    <div class="">
        <h2 class="text-xl">Ecrire un commentaire</h2>
        <form method="POST" action="{{route('commentaire.store', $etudiant->id)}}">
            @csrf
            <div class="w-full sm:w-2/4 sm:pl-5 px-5 sm:pt-0 pt-5">
                <label for="sujet" class="font-semibold text-gray-700 block pb-1">Sujet</label>
                <input id="sujet" name='sujet' class="border-1 rounded-r px-4 py-2 w-full bg-gray-50" type="text" />
            </div>
            <div class="w-full sm:pl-5 px-5 sm:pt-0 pt-5">
                <label for="contenu" class="font-semibold text-gray-700 block pb-1">Message</label>
                <textarea style="height: 20vh; resize:none" name="contenu" id="contenu" cols="30" rows="10" class="border-1 rounded-r px-4 py-2 w-full bg-gray-50"></textarea>
            </div>
            <div class="flex justify-end ">
                <button class="my-3  justify-end text-right bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-500 hover:bg-green-400 hover:text-white shadow-md py-2 px-6 items-center">Envoyer</button>
            </div>

    </form>
    </div>
