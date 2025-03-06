@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des compteurs</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('compteurs.create') }}" class="btn btn-dark mb-3">Ajouter un compteur</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Année</th>
                <th>Compteur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compteurs as $compteur)
                <tr>
                    <td>{{ $compteur->annee }}</td>
                    <td>{{ $compteur->compteur }}</td>
                    <td>
                        <!-- Lien de modification -->
                        <a href="{{ route('compteurs.edit', $compteur->id) }}" class="btn btn-warning btn-sm">Modifier</a>

                        <!-- Formulaire de suppression -->
                        <form action="{{ route('compteurs.destroy', $compteur->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce compteur ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
