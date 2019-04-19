@extends('layouts.master',['title'=>'Bienvenu(e)']) 
@section('stylesheet')
<link rel="stylesheet" type="text/css" href="{{ asset('css/studentStyle.css') }}">
@stop
@section('container')
    <div class="content-center" method= 'post' id='form' data-parsley-validate>
      <div class="text-center mb-6">
        @include('partials._logoIspt')
       <div >
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title-code"></h5>
            </div>
            <div class="modal-body" style="font-size: 1.1rem">
                <div class="row">
                  <ul class="list-unstyled ml-3 font-bold text-monospace" style="text-align: left">
                    <li>Année académique :<span>{{ $annee->annee_format }}</span></li>
                    <li>Matricule : <span>{{ $document->matricule }}</span></li>
                    <li>Nom : <span>{{ $document->nom }}</span></li>
                    <li>Postnom : <span>{{ $document->postnom }}</span></li>
                    <li>Prénom : <span>{{ $document->prenom }}</span></li>
                    <li>promotion : <span>{{ $promotion->abbr }}</span></li>
                  </ul>
                </div>
                <div class="justify-content-center" style="width: 60%; margin-left: 20%; margin-right: 20%; ">
                  <div class="btn btn-lg btn-block btn-outline-info" id="modal-code" style="font-size: 2.3rem">
                    {{ $document->pourcentage }}% | {{ $document->mention }} 
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('index') }}" class="btn btn-secondary" >Ok</a>
            </div>
        </div>
    </div>
</div>


      {{-- @include('partials._@kindev') --}}
</div>
@stop
@section('script')
  <script type="text/javascript" src="{{  asset('js/appForm.js')  }}"></script>
@stop
