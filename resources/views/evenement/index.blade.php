@extends('layouts.app1')

@section('ink')
    <link href="{{ asset('css/fullcalendar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2/select2.min.css') }}" rel="stylesheet" />
    
@endsection

@section('content')

<div id="ajoutEvt" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                <h4 class="modal-title">Ajouter evenement</h4>
                <div class="modal-close-area modal-close-df">
                </div>
            </div>
            
            <!--formulaire ajout de etablisement-->
            <form method="POST" action="{{ route('evenement.store',[$et,$_GET['formation']]) }}" >
                {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group-inner">
                    <label>Nom de l'evenement</label>
                    <input type="text" name="nom" class="form-control" placeholder="" required>
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
                <div class="form-group-inner">
                    <label>Couleur de Fond</label>
                    <input type="color" name="couleur" class="form-control" placeholder="" required>
                </div>
                <div class="form-group-inner">
                    <label>Etudiants affectés à cet evenement</label>
                    <select name="id_et[]" id="prof_id" class="form-control tay" style="width: 100% !important;" multiple="multiple" multiple required>

                        <!--recherche etudiant dans table avec formation court ou long -->
                        <?php 
                            $etudiants=DB::table('etudiants')->join('formations','formations.id','=','etudiants.id_formation')->join('etablissements','etablissements.id','=','etudiants.id_etab')->where('formations.id',$f->id)->where('etablissements.id',$et)->select('etudiants.id','etudiants.matricule','etudiants.nomEt','etudiants.prenomEt')->get();
                        ?>
                        @foreach($etudiants as $etudiant)
                            <option value="{{$etudiant->id}}">{{ $etudiant->matricule }} : {{ $etudiant->nomEt }} {{ $etudiant->prenomEt }}</option>
                        @endforeach
                    </select>
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
                                    <h1>Liste <span class="table-project-n">des</span> évenements de la formation cycle <u>{{ $formation }} </u> du <strong>{{date_format(date_create($f->debut),'d / m / Y')}}</strong> à <strong>{{date_format(date_create($f->fin),'d / m / Y')}}</strong></h1>
                                </div>
                                <div class="add-product">
                                    <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#ajoutEvt">Ajouter evenement</a>
                                </div>
                                <br>
                            </div>

                            <div class="container-fluid">
                                <div id="calendrier"></div>
                            </div>
                            <br>
                            <a href="#" class="genererPdfEvt">    
                                <button class="btn btn-custon-four btn-primary" type="button">Generer PDF</button>
                            </a>
                            <a href="#" data-toggle="modal" data-target="#mailEvt" class="envoieMail">    
                                <button class="btn btn-custon-four btn-primary" type="button">Envoyer Mail</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
</div>


<a href="#" data-toggle='modal' id="btnA" data-target="#ajoutEvt" style="display:none">dsk</button>
@include('evenement.edit')
@include('evenement.mail')

@endsection
@section('js')
    <script src="{{ asset('js/jquery-ui.min.js') }}" defer></script>
    <script src="{{ asset('js/moment.min.js') }}" defer></script>
    <script src=" {{ asset('js/fullcalendar.min.js') }}" defer></script>
    <script src=" {{ asset('jsProd/ajaxFull.js') }}" defer></script>
    <script src="{{ asset('js/sample_french.js') }}" defer></script>

    <script src="{{ asset('assets/select2/js/select2.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    
    <script>
         function liste(){               
            <?php
                  if(isset($_GET['formation'])){ 
            ?>
               $('#calendrier').fullCalendar('addEventSource','/liste?formation=<?php echo $_GET["formation"]?>&etab={{$et}}');             
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