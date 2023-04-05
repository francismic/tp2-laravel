@extends('layouts.app')
@section('title', 'Page de connexion')
@section('content')

<div class="container">
{{-- session()->get('locale')--}}
  @php $lang = session()->get('locale') @endphp
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">@lang('auth.text_login')</h5>
            <form method="post">
            @csrf
              <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" placeholder="name@example.com">
                <label for="floatingInput">@lang('auth.text_email')</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <label for="floatingPassword">@lang('auth.text_password')</label>
              </div>

              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">@lang('auth.text_login')</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection