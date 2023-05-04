@extends('layouts.app1')

@section('ink')
    <link href="{{ asset('css/fullcalendar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2/select2.min.css') }}" rel="stylesheet" />
    
@endsection

@section('content')

<div id="ajoutEt" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                <h4 class="modal-title">Ajouter emplois du temps</h4>
                <div class="modal-close-area modal-close-df">
                </div>
            </div>
            
            <!--formulaire ajout de etablisement-->
            <form method="POST" action="{{ route('emploisdutemps.store',[$et,$_GET['formation']]) }}" >
                {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group-inner">
                    <label>Formateur</label>
                    <?php $formateurs=DB::table('formateurs')->get(); ?>
                    <select class="form-control" name="formateur" required>
                        <option selected="" value="">choisir un formateur</option>
                        @foreach($formateurs as $formateur)
                            <option value="{{ $formateur->id }}" >{{$formateur->titreF}} {{ $formateur->nomF }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group-inner">
                    <label>Matière</label>
                    <?php $parcours=DB::table('parcours')->get(); ?>
                    <select class="form-control" name="matiere" required>
                        <option selected="" value="">choisir une matière</option>
                        @foreach($parcours as $parcour)
                            <option value="{{ $parcour->id }}" >{{ $parcour->nomP }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group-inner">
                    <label>Jour</label>
                    <input type="date" name="jour" class="form-control" placeholder="" required>
                </div>
                <div class="form-group-inner">
                    <label>Heure Debut</label>
                    <input type="time" name="debut" class="form-control" placeholder="" required>
                </div>
                <div class="form-group-inner">
                    <label>Heure Fin</label>
                    <input type="time" name="fin" class="form-control" placeholder="" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-custon-four btn-primary" type="submit">Enregistrer</button>
            </div>

            </form>
        </div>
    </div>
</div>

<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Liste <span class="table-project-n">des</span> emploi du temps de la formation cycle <u>{{ $formation }} </u> du <strong>{{date_format(date_create($f->debut),'d / m / Y')}}</strong> à <strong>{{date_format(date_create($f->fin),'d / m / Y')}}</strong></h1>
                                </div>
                                <div class="add-product">
                                    <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#ajoutEt">Ajouter emploi du temps</a>
                                </div>
                                <br>
                            </div>

                            <div class="container-fluid">
                                <div id="calendrierEt"></div>
                            </div>
                            <br>
                            <a href="#" class="genererPdfEt">    
                                <button class="btn btn-custon-four btn-primary" type="button">Generer PDF</button>
                            </a>
                            <a href="#" data-toggle="modal" data-target="#mailEt" class="envoieMail">    
                                <button class="btn btn-custon-four btn-primary" type="button">Envoyer Mail</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
</div>

<a href="#" data-toggle='modal' id="btnA" data-target="#ajoutEvt" style="display:none">dsk</button>
@include('emploidutemps.edit')

@endsection
@section('js')
    <script src="{{ asset('js/jquery-ui.min.js') }}" defer></script>
    <script src="{{ asset('js/moment.min.js') }}" defer></script>
    <script src=" {{ asset('js/fullcalendar.min.js') }}" defer></script>
    <script src=" {{ asset('jsProd/ajaxFullEt.js') }}" defer></script>
    <script src="{{ asset('js/sample_french.js') }}" defer></script>

    <script src="{{ asset('assets/select2/js/select2.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    
    <script>
         function liste(){               
            <?php
                  if(isset($_GET['formation'])){ 
            ?>
               $('#calendrierEt').fullCalendar('addEventSource','/listeEt?formation=<?php echo $_GET["formation"]?>&etab={{$et}}');             
            <?php
                  }
            ?>
            }
    </script>
    <script src="{{ asset('jsProd/ajax.js') }}"></script>

    @if(Session::has('success'))
       @include('layouts.alertSucess')
    @endif

    @if(Session::has('error'))
       @include('layouts.alertError')
    @endif
    
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
	 <script src="{{ asset('js/pdfmake/vfs_fonts.js') }}"></script>
	 <script src="{{ asset('js/html2canvas.min.js') }}"></script>
    
@endsection