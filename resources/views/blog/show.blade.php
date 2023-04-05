@extends('layouts.app')
@section('title', 'Post')
@section('content')
    <div class="container">
    {{-- session()->get('locale')--}}
    @php $lang = session()->get('locale') @endphp
        <div class="row">
            <div class="col-12 text-center pt-2">
                <div class="display-5 mt-2">
                {{$blogPost->title}}
                </div>
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h3>English Text</h3>
                <p>
                {!! $blogPost->body !!}
                </p>

                <hr>

                <h3>Article en Francais</h3>

                @if ($blogPost->title_fr === null && $blogPost->body_fr === null)
                <p>Aucune traduction disponible</p>
                @else
                <p>
                {!! $blogPost->body_fr !!}
                </p>
                @endif

                <p>
                    <strong>Author : </strong> 
                    @isset($blogPost->blogHasUser)
                        {{$blogPost->blogHasUser->name}}
                    @endisset

                    {{-- PHP V8  $blogPost->blogHasUser?->name --}}
                </p>
                <a href="{{route('blog.index')}}" class="btn btn-sm btn-primary">@lang('blog.text_return')</a>
            </div>
        </div>
        <div class="row mt-2">
            <hr>
            @can('update', $blogPost)
            <div class="col-6">
                <a href="{{ route('blog.edit', $blogPost->id)}}" class="btn btn-success btn-sm">@lang('blog.text_update')</a>
            </div>
            @endcan
            
            @can('delete', $blogPost)
            <div class="col-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                @lang('blog.text_delete')
                </button>
            </div>
            @endcan
        </div>

    </div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('blog.titre_delete')</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      @lang('blog.text_confirm') {{ $blogPost->title}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('blog.text_return')</button>
        <form action="{{ route('blog.delete', $blogPost->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="@lang('blog.text_delete')">
         </form>
      </div>
    </div>
  </div>
</div>

@endsection