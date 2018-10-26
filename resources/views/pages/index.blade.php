@extends('layouts.app')

@section('content')

<div class="row"> 
  <div class="col-md-8">
    <div class="card card-profile">
      <div class="card-avatar">
        <a href="#pablo">
          <img class="img" src="../assets/img/BPS.png" />
        </a>
      </div>
      <div class="card-body">
        <h6 class="card-category text-gray">Badan Pusat Statistik Provinsi Jambi</h6>
        <h4 class="card-title"></h4>
        <p class="card-description">
            
        </p>
        <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Silahkan login untuk masuk ke sistem') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Alamat E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Kata Sandi') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                           <!--  <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div> -->
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Masuk') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Lupa Kata Sandi?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
      </div>
    </div>
  </div>
  <!-- menampilkan jumlah surat masuk hari ini -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">archive</i>
            </div>
            <p class="card-category">Surat Masuk Hari Ini</p>
              <h3 class="card-title">{{ $no_today_masuk }} 
               <small>SURAT</small>
              </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">update</i> Terakhir diperbarui
            </div>
          </div>
        </div>
      </div>
</div> 

@endsection