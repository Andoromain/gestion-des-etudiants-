@extends('layouts.app1')

@section('ink')
    <link href="{{ asset('css/fullcalendar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2/select2.min.css') }}" rel="stylesheet" />
    
@endsection

@section('content')

<div id="ajoutSyl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                <h4 class="modal-title">Ajouter syllabus</h4>
                <div class="modal-close-area modal-close-df">
                </div>
            </div>
            
            <!--formulaire ajout de etablisement-->
            <form method="POST" action="{{ route('syllabus.store',$et) }}" >
                {{ csrf_field() }}
            <div class="modal-body">
                <input type="hidden" name="type" value="{{ $_GET['formation'] }}">
                <div class="form-group-inner">
                    <label>Formateur</label>
                       <select name="formateur" class="form-control">
                           <?php $formateurs=DB::table('formateurs')->where('id_etab',$et)->get();?>
                           @foreach($formateurs as $formateur)
                                <option value="{{ $formateur->id}}">{{ $formateur->titreF}} {{ $formateur->nomF}} {{ $formateur->prenomF}}</option>
                           @endforeach
                       </select>
                </div>
                <div class="form-group-inner">
                    <label>Matiere</label>
                    <input type="text" name="matiere" class="form-control" placeholder="" required>
                </div>
                <div class="form-group-inner">
                    <label>Heure debut</label>
                    <input type="time" name="debut" class="form-control" placeholder="" required>
                </div>
                <div class="form-group-inner">
                    <label>Heure Fin</label>
                    <input type="time" name="fin" class="form-control" placeholder="" required>
                </div>
                <div class="form-group-inner">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control" placeholder="" required>
                </div>
                <div class="form-group-inner">
                    <label>Resumé du cours</label>
                    <textarea name="resume" class="form-control" id="" cols="30" rows="5" ></textarea>
                </div>
                <div class="form-group-inner">
                    <label>Absences</label>
                    <select name="id_et[]" id="prof_id" class="form-control tay" style="width: 100% !important;" multiple="multiple" multiple >

                        <!--recherche etudiant dans table avec formation court ou long -->
                        <?php 
                            $etudiants=DB::table('etudiants')->join('formations','formations.id','=','etudiants.id_formation')->join('etablissements','etablissements.id','=','etudiants.id_etab')->where('formations.type',$_GET['formation'])->where('etablissements.id',$et)->select('etudiants.id','etudiants.matricule','etudiants.nomEt','etudiants.prenomEt')->get();
                        ?>
                        @foreach($etudiants as $etudiant)
                            <option value="{{$etudiant->id}}">{{ $etudiant->matricule }} {{ $etudiant->nomEt }} {{ $etudiant->prenomEt }}</option>
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
                                    <h1>Liste <span class="table-project-n">des</span> syllabus de formation {{ $formation }}</h1>
                                </div>
                                <div class="add-product">
                                @if(Auth::user()->authorizeFunctions(['chef']))
                                @else
                                    <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#ajoutSyl">Ajouter Syllabus</a>
                                @endif
                                </div>
                                <br>
                            </div>

                            <div class="container-fluid">
                                <div id="calendrierSyllabus"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

@include('syllabus.edit')

@endsection
@section('js')
    <script src="{{ asset('js/jquery-ui.min.js') }}" defer></script>
    <script src="{{ asset('js/moment.min.js') }}" defer></script>
    <script src=" {{ asset('js/fullcalendar.min.js') }}" defer></script>
    <script src=" {{ asset('jsProd/ajaxFullSyllabus.js') }}" defer></script>
    <script src="{{ asset('js/sample_french.js') }}" defer></script>

    <script src="{{ asset('assets/select2/js/select2.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    
    <script>
         function liste(){               
            <?php
                  if(isset($_GET['formation'])){ 
            ?>
               $('#calendrierSyllabus').fullCalendar('addEventSource','/listeSyllabus?formation=<?php echo $_GET["formation"]?>&etab={{$et}}');             
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
    
@endsection