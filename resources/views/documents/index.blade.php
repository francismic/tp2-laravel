@extends('layouts.app')
@section('title', 'Liste des documents')
@section('content')

    <div class="container">
    {{-- session()->get('locale')--}}
    @php $lang = session()->get('locale') @endphp
        <div class="row">
            <div class="col-12 text-center pt-2">
                <div class="display-5 mt-2">
                @lang('doc.titre_doc')
                </div>
            </div>
        </div>

        <div class="col-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                @lang('doc.text_add')
                </button>
        </div>
        
        <table class="table table-striped table-dark mt-4">
            <thead>
                <tr>
                    <th scope="col">@lang('doc.text_title')</th>
                    <th scope="col">@lang('doc.text_date')</th>
                    <th scope="col">@lang('doc.text_user')</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($documents as $document)
            <tr>
                <td>{{ $document->title_en }}</td>
                <td>{{ $document->created_at }}</td>
                <td>{{ $document->user->name }}</td>
                <td>
                    <a href="{{ route('documents.download', $document->id) }}" class="btn btn-primary btn-sm">@lang('doc.text_dl')</a>
                    @can('delete', $document)
                    @if($document->user_id == auth()->id())
                    <form action="{{ route('documents.delete', $document->id) }}" method="post" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">@lang('doc.text_delete')</button>
                    </form>
                    @endif
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $documents->links() !!}
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="container mb-4">
        <h1>Ajouter un document</h1>
        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title_en">Title</label>
                <input type="text" class="form-control" id="title_en" name="title_en" required>
            </div>

            <div class="form-group">
                <label for="title_fr">Titre</label>
                <input type="text" class="form-control" id="title_fr" name="title_fr" required>
            </div>

            <div class="form-group">
                <label for="document">Document</label>
                <input type="file" class="form-control-file" id="file_name" name="file_name" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
      </div>
    </div>
  </div>
  </div>

@endsection