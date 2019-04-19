@extends('layouts.master',['title'=>'Bienvenu(e)'])	
@section('stylesheet')
<link rel="stylesheet" type="text/css" href="{{ asset('css/studentStyle.css') }}">
@stop

@section('container')
    <form class="form-signin" method="post">
      @csrf
      <div class="text-center mb-4">
        @include('partials._logoIspt')
        <div class="form-label-group"> 
         <button class="btn btn-lg btn-success " type="submit">Scanner un code</button>
        </div>
        <div class="card">
          <div class="card-body">
              <h5 class="card-title">Authentification Document</h5>
              @include('partials._msgFlash')
              <p>
                 <input type="input" name="code" value="{{ old('code') }}"  maxlength="45" id="inputName" class="form-control" placeholder="Entrez la réference du code barre" required autofocus>
              </p>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Valider</button>

          </div>
      </div>


     {{--    <div class="card">
          <div class="form-label-group">
            <input type="input" name="name" value="{{ old('name') }}"  maxlength="45" id="inputName" class="form-control" placeholder="Nom ou Matricule" required autofocus>
            <label for="inputName">Entrez la réference du code barre</label>
          </div>
         <button class="btn btn-lg btn-primary btn-block" type="submit">Valider</button>
        </div> --}}
      </div>

      {{-- @include('partials._@kindev') --}}
   </form>
@stop
@section('script')
  <script type="text/javascript" src="{{  asset('js/appForm.js')  }}"></script>
@stop
