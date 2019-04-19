@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       {{--  <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div> --}}



        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Palmarès</span></a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Importer</span></a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Tab3</span></a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabcontent-border">
                <div class="tab-pane active show" id="home" role="tabpanel">
                    <div class="p-20">
                        <div class="container">
                            <br>
                            <div class="card m-b-0">
                                <div class="card-header" id="headingOne">
                                  <h5 class="mb-0">
                                    <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                        <i class="m-r-5 fa fa-magnet" aria-hidden="true"></i>
                                        <span>2018-2019</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                  <div class="card-body">
                                   <table>
                                        TABLEAU
                                   </table>
                                  </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="tab-pane p-20" id="profile" role="tabpanel">
                    <div class="p-20">
                        <img src="../../assets/images/background/img4.jpg" class="img-fluid">
                        <p class="m-t-10">And is full of waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment..</p>
                    </div>
                </div>
                <div class="tab-pane p-20" id="messages" role="tabpanel">
                    <div class="p-20">
                        <p>And is full of waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment..</p>
                        <img src="../../assets/images/background/img4.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src={{ asset('js/jquery.min.js') }}></script>
<script src={{ asset('js/bootstrap.min.js') }}></script>
@endsection