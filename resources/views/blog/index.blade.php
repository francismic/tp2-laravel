@extends('layouts.app')
@section('title', 'Blog List')
@section('content')

    <div class="container">
    {{-- session()->get('locale')--}}
    @php $lang = session()->get('locale') @endphp
        <div class="row">
            <div class="col-12 text-center pt-2">
                <div class="display-5 mt-2">
                @lang('blog.titre_blog')
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    @lang('blog.text_blog')
                    </div>
                    <div class="card-body">
                    @forelse($blogs as $blog)
                                <li><a href="{{ route('blog.show', $blog->id)}}">{{ $blog->title }}</a></li>
                            @empty
                                <li>Aucun article de blog disponible</li>
                    @endforelse
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('blog.create')}}" class="btn btn-success">@lang('blog.text_add')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
