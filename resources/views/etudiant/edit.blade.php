@extends('layouts.app')
@section('title', 'Modifier un étudiant')
@section('content')

<div class="container mt-4">
{{-- session()->get('locale')--}}
@php $lang = session()->get('locale') @endphp
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>@lang('etudiant.titre_edit')</h3>
                        <p>@lang('etudiant.text_edit')</p>
                        <form action="" method="post">
                        @csrf
                        @method('PUT')
                            <div class="col-md-12 mt-4">
                               <input class="form-control" type="text" name="nom" value="{{ $etudiant ->nom }}">
                            </div>

                            <div class="col-md-12 mt-4">
                                <input class="form-control" type="text" name="adresse" value="{{ $etudiant ->adresse }}">
                            </div>

                            <div class="col-md-12 mt-4">
                                <input class="form-control" type="tel" name="phone" value="{{ $etudiant ->phone }}">
                            </div>

                            <div class="col-md-12 mt-4">
                                <input class="form-control" type="email" name="email" value="{{ $etudiant ->email }}">
                            </div>

                            <div class="col-md-12 mt-4">
                                <input class="form-control" type="date" name="birthday" value="{{ $etudiant ->birthday }}">
                            </div>

                           <div class="col-md-12">
                                <select class="form-select mt-3" name="villeId" required>
                                      <option selected value="{{$etudiant->etudiantHasVille->id}}">{{$etudiant->etudiantHasVille->nom}}</option>
                                      @foreach($villes as $ville)
                                        <option value="{{ $ville->id }}">{{$ville->nom}}</option>
                                     @endforeach
                               </select>
                           </div>

                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">@lang('etudiant.text_modifier')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection