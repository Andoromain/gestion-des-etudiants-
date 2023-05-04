<div id="modifSyl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                <h4 class="modal-title">Modifier syllabus</h4>
                <div class="modal-close-area modal-close-df">
                </div>
            </div>
            
            <!--formulaire ajout de etablisement-->
            <form method="POST" action="{{ route('syllabus.update') }}" >
                {{ csrf_field() }}
                <input type="hidden" name="id">
                <input type="hidden" name="et" value="{{ $et }}">
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
                    <textarea name="resume" class="form-control" id="" cols="30" rows="5" required></textarea>
                </div>
                <div class="form-group-inner">
                    <label>Absences</label>
                    <select name="id_et[]" id="prof_id" class="form-control tay" style="width: 100% !important;" multiple="multiple" multiple >

                        <!--recherche etudiant dans table avec formation court ou long -->
                        <?php 
                            $etudiants=DB::table('etudiants')->join('formations','formations.id','=','etudiants.id_formation')->join('etablissements','etablissements.id','=','etudiants.id_etab')->where('formations.type',$_GET['formation'])->where('etablissements.id',$et)->select('etudiants.id','etudiants.matricule','etudiants.nomEt','etudiants.prenomEt')->get();
                        ?>
                        @foreach($etudiants as $etudiant)
                            <option value="{{$etudiant->id}}">{{ $etudiant->matricule }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <a href='#' class="deleteSyl"><button class="btn btn-custon-four btn-danger" type="button">Supprimer</button></a>
                <button class="btn btn-custon-four btn-primary" type="submit">Enregistrer</button>
            </div>

            </form>
        </div>
    </div>
</div>