@extends('layouts.master')
@include('partials.includes.dataTables.dataTables')
@include('partials.includes.dataTables.buttons')
@push('stylesheets')
<link href="{{ asset('bootstrap-fileinput-master/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css"/>

@endpush

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">

                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#profile" role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span class="hidden-xs-down text-dark">Mes documents</span></a> </li>
                <li class="nav-item"> 
                    <a class="nav-link " data-toggle="tab" href="#home" role="tab" aria-selected="true"><span class="hidden-sm-up"></span> <span class="hidden-xs-down text-dark">Importer nouveau documents</span></a> 
                </li>
                
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabcontent-border" style="min-width: 800px">
                <div class="tab-pane p-20 " id="home" role="tabpanel">
                    <div class="p-20">
                        <div class="container" >
                           <form enctype="multipart/form-data">
                            <label>Importation des bulletins</label>
                            <div class="file-loading">
                                @csrf
                                <input id="file-fr" name="bulletins" type="file" multiple>
                            </div>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="tab-pane p-20 active show" id="profile" role="tabpanel">
                    <div class="p-20 text-dark">
                        <div class="card">
                            <div class="card-body border-dark">
                                {!!$dataTable->table() !!}
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@endsection
@push('scripts')
    {!!$dataTable->scripts() !!}
    <script src="{{ asset('bootstrap-fileinput-master/js/plugins/piexif.js') }}" type="text/javascript"></script>
    <script src="{{ asset('bootstrap-fileinput-master/js/plugins/sortable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('bootstrap-fileinput-master/js/fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('bootstrap-fileinput-master/js/locales/fr.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ asset('bootstrap-fileinput-master/js/locales/es.js') }}" type="text/javascript"></script> --}}
    <script src="{{ asset('bootstrap-fileinput-master/themes/fas/theme.js') }}" type="text/javascript"></script>
    <script src="{{ asset('bootstrap-fileinput-master/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $('#file-fr').fileinput({
        theme: 'fas',
        language: 'fr',
        uploadUrl: '{{ route('upload_document') }}',
        allowedFileExtensions: ['pdf'],
        uploadExtraData: function(){
            return {
                _token : $("input[name = '_token']").val(),
            }
        }
    });
    </script>

@endpush