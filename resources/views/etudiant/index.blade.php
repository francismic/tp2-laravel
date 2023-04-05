@extends('layouts.app')
@section('title', 'Liste des étudiants')
@section('content')

    <div class="container">
    {{-- session()->get('locale')--}}
    @php $lang = session()->get('locale') @endphp
        <div class="row">
            <div class="col-12 text-center pt-2">
                <div class="display-5 mt-2">
                @lang('etudiant.titre_etudiant')
                </div>
            </div>
        </div>
        
        <table class="table table-striped table-dark mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('etudiant.text_student')</th>
                    <th scope="col">@lang('etudiant.text_email')</th>
                    <th scope="col">@lang('etudiant.text_ville')</th>
                </tr>
            </thead>
            <tbody>
            @foreach($etudiants as $etudiant)
                <tr>
                    <th scope="row">{{ $etudiant->id }}</th>
                    <td><a href="{{ route('etudiant.show', $etudiant->id)}}">{{ $etudiant->nom }}</a></td>
                    <td>{{ $etudiant->email }}</td>
                    <td>{{$etudiant->etudiantHasVille->nom}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
        {{ $etudiants }}

@endsection
