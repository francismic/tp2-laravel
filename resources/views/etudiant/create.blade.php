@extends('layouts.app')
@section('title', 'Ajouter un étudiant')
@section('content')

<div class="container mt-4">
{{-- session()->get('locale')--}}
@php $lang = session()->get('locale') @endphp
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>@lang('etudiant.titre_form')</h3>
                        <p>@lang('etudiant.text_form')</p>
                        <form action="{{route('etudiant.store')}}" method="post">
                        @csrf
                            <div class="col-md-12 mt-4">
                               <input class="form-control" type="text" name="nom" placeholder="@lang('etudiant.text_nom')" required>
                            </div>

                            <div class="col-md-12 mt-4">
                                <input class="form-control" type="text" name="adresse" placeholder="@lang('etudiant.text_adresse')" required>
                            </div>

                            <div class="col-md-12 mt-4">
                                <input class="form-control" type="tel" name="phone" placeholder="@lang('etudiant.text_phone')" required>
                            </div>

                            <div class="col-md-12 mt-4">
                                <input class="form-control" type="email" name="email" placeholder="@lang('etudiant.text_email')" required>
                            </div>

                            <div class="col-md-12 mt-4">
                                <input class="form-control" type="date" name="birthday" placeholder="@lang('etudiant.text_dob')" required>
                            </div>

                           <div class="col-md-12">
                                <select class="form-select mt-3" name="villeId" required>
                                      <option selected disabled value="">@lang('etudiant.text_ville')</option>
                                      @foreach($villes as $ville)
                                        <option value="{{ $ville->id }}">{{$ville->nom}}</option>
                                     @endforeach
                               </select>
                           </div>

                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">@lang('etudiant.text_create')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection