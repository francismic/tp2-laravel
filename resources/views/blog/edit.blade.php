@extends('layouts.app')
@section('title', 'Create')
@section('content')
<div class="container">
    {{-- session()->get('locale')--}}
    @php $lang = session()->get('locale') @endphp
        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-5">
                @lang('blog.text_update')
                </h1>
            </div> <!--/col-12-->
        </div><!--/row-->
                <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                                @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="text-danger">{{$error}}</li>
                    @endforeach
                </ul>
                @endif
                <div class="card">
                    <form  action="" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            Formulaire
                        </div>
                        <div class="card-body">  
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="en-tab" data-bs-toggle="tab" data-bs-target="#en-tab-pane" type="button" role="tab" aria-controls="en-tab-pane" aria-selected="true">English</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="fr-tab" data-bs-toggle="tab" data-bs-target="#fr-tab-pane" type="button" role="tab" aria-controls="fr-tab-pane" aria-selected="false">Français</button>
                        </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="en-tab-pane" role="tabpanel" aria-labelledby="en-tab" tabindex="0">
                                <div class="col-12 mt-4">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control" value="{{ $blogPost ->title}}">
                                </div>
                                <div class="col-12">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" name="body">{{ $blogPost ->body}}</textarea>
                                </div>

                                </div>
                        <div class="tab-pane fade" id="fr-tab-pane" role="tabpanel" aria-labelledby="fr-tab" tabindex="0">
                                
                                <div class="col-12 mt-4">
                                    <label for="title_fr">Titre du message</label>
                                    <input type="text" id="title_fr" name="title_fr" class="form-control" value="{{ $blogPost ->title_fr }}">
                                </div>
                                <div class="col-12">
                                    <label for="message_fr">Texte</label>
                                    <textarea class="form-control" id="message_fr" name="body_fr">{{ $blogPost ->body_fr}}</textarea>
                                </div>

                                </div>
                                
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="@lang('blog.text_update')">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div><!--/container-->

@endsection
