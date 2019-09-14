@extends('layouts.master',['title'=>'Bienvenu(e)'])	
@section('stylesheet')
<link rel="stylesheet" type="text/css" href="{{ asset('css/studentStyle.css') }}">
@stop

@push('stylesheets')
    <!-- Croppie css -->
    <link rel="stylesheet" type="text/css" 
        href="{{ asset('css/cropie.css') }}">

    <style type="text/css">
      .nounderline, .violet{
          color: #7c4dff !important;
      }
      .btn-dark {
          background-color: #7c4dff !important;
          border-color: #7c4dff !important;
      }
      .btn-dark .file-upload {
          width: 100%;
          padding: 10px 0px;
          position: absolute;
          left: 0;
          opacity: 0;
          cursor: pointer;
      }
      .profile-img img{
          width: 200px;
          height: 200px;
          border-radius: 50%;
      }    
    </style>

@endpush

@section('content')
<div id="jaxa"></div>
<div class="row d-flex justify-content-center">
  <div class="card">
    <div class="card-header  text-dark text-center text-monospace">Authentification des documents</div>
    <div class="card-body">
      <div class="error-msg alert alert-danger" id="error-msg" hidden="">
          
      </div>
     <button type="button" class=" text-monospace btn btn-primary btn-lg btn-block" id="capture-button" data-toggle="modal" data-target="#scan-code" >Scanner un code barre</button>
         <button type="button" class="text-monospace btn btn-primary btn-lg btn-block" id="capture-button" data-toggle="modal" data-target="#num-ref">Saisir le numéro de réference</button>
    </div>
  </div>
</div>

<div class="modal fade" id="scan-code" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          {{-- <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> --}}
          <div class="modal-body">
            {{-- Scannage du code --}}
            <div id="screenshot" style="text-align:center;">
              <video class="videostream img-fluid" autoplay=""></video>
              <img id="screenshot-img" class="img-fluid">
              {{-- <p><button class="capture-button">Capture video</button> --}}
              {{-- </p><p><button id="screenshot-button" disabled="">Take screenshot</button></p> --}}
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="button" class="capture btn btn-primary" id="screenshot-button" disabled="">Capturer</button>
            <button type="button" class="validate btn btn-primary" id="validate-button" hidden="">Valider</button>
            {{-- <button type="button" class="retry btn btn-primary"  hidden ="">Réssayer</button> --}}
          </div>
        </div>
      </div>
</div>

<div class="modal fade" id="num-ref" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="error-msg alert alert-danger" id="error-msg" hidden=""></div>
            @include('partials._msgFlash')
            <form class="form-signin" method="post">
              
              @csrf
              <p>
                 <input type="input" name="code" value="{{ old('code') }}"  maxlength="45" id="inputName" class="form-control" placeholder="Entrez le n° de réference du code barre" required autofocus>
              </p>
              <button class="btn btn-lg btn-primary btn-block" type="submit">Valider</button>
               
            </form>
            
          </div>
         {{--  <div class="modal-footer">
           
          </div> --}}
        </div>
      </div>
    </div>

@endsection

@section('script')
  <script type="text/javascript" src="{{  asset('js/appForm.js')  }}"></script>
  <script src="{{ asset('js/cropie.js') }}"></script>
  
  <script>
  const constraints = {
    video: true
  };
  const captureVideoButton = document.querySelector('#capture-button');
  const screenshotButton = document.querySelector('#screenshot-button');
  const validateButton = document.querySelector('#validate-button');
  const img = document.querySelector('#screenshot img');
  const video = document.querySelector('#screenshot video');

  const canvas = document.createElement('canvas');

  captureVideoButton.onclick = function() {
    navigator.mediaDevices.getUserMedia(constraints).then(handleSuccess).catch(handleError);
  };

  screenshotButton.onclick = video.onclick = function() {
    $('.videostream').hide();
    $('.capture').attr('hidden','true');
    $('.validate').removeAttr('hidden');
    // $('.retry').removeAttr('hidden');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0);
    // Other browsers will fall back to image/png
    img.src = canvas.toDataURL('image/png');
    // scanCodeBarre(canvas.toDataURL('image/png'));
    prepare_envoi();
 

  };


  // validateButton.onclick = function() {

  //   // imgAjax(canvas.toDataURL('image/png'));
  //   prepare_envoi();
  // };

  function prepare_envoi(){

     // var canvas = document.getElementById('cvs');

     canvas.toBlob(function(blob){envoi(blob)}, 'image/png');

 }

  function envoi(blob){
 
  console.log(blob.type)

   var formImage = new FormData();
   formImage.append('img-code-barre', blob);
   formImage.append('_token','{{ csrf_token() }}');
   // '_token': $('input[name=_token]').val(),

   var ajax = new XMLHttpRequest();
   $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
   ajax.open("POST","{{ route('scan_code_barre') }}",true);

   ajax.onreadystatechange=function(){

    if (ajax.readyState == 4 && ajax.status==200){
      var rep = ajax.responseText.split(',');
      if (rep[0] == 'uploaded') {
        var url_img_code = "{{ url(\Storage::url('/')) }}/" + rep[1];
        scanCodeBarre(url_img_code);
      }
     
     // document.getElementById("jaxa").innerHTML+=(ajax.responseText);
    }
    fermer();
   }

   ajax.onerror=function(){

    alert("la requette a échoué")
   }

   ajax.send(formImage);
   console.log("ok");
 }

 function fermer(){
 
  // var video = document.getElementById('sourcevid');
    // var mediaStream=video.srcObject;
    // console.log(mediaStream)
    // var tracks = mediaStream.getTracks();
    // console.log(tracks[0])
    // tracks.forEach(function(track) {
    //  track.stop();
    //  document.getElementById("message").innerHTML="message: "+tracks[0].label+" déconnecté"
    // });

    // video.srcObject = null;
 }

  function handleSuccess(stream) {
    screenshotButton.disabled = false;
    video.srcObject = stream;
  }

  function handleError(error) {
    console.error('Error: ', error);
  }

  function scanCodeBarre(img) {
    var img_data = img.replace("data:image/png;base64,", "");
    javascriptBarcodeReader(img_data, {
        barcode: 'EAN-8',
        // type: 'standard',
      }).then(code => {
          console.log(code)
        })
        .catch(err => {
          $('#capture-button').attr('hidden',true);
          $('.error-msg').html('Lecteur de code barre indisponible pour l\'instant !! <br> Veillez saisir manuellement le n° de réference du code barre ');
          $('.error-msg').attr('hidden',false);
          $('#scan-code').modal("hide");
          $('#num-ref').modal("show");
          // alert('Lecteur de code barre indisponible pour l\'instant !! Veillez Entrez manuellement le n° de réference du code barre ');

          // location = '/';
          console.log(err)
        })

  }
</script>


@stop

