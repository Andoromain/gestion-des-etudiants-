<div id="modifEvt" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                <h4 class="modal-title">Modifier evenement</h4>
                <div class="modal-close-area modal-close-df">
                </div>
            </div>
            
            <!--formulaire ajout de etablisement-->
            <form method="POST" action="{{ route('evenement.update') }}" >
                {{ csrf_field() }}
                <input type="hidden" name="id">
                <input type="hidden" name="et" value="{{ $et }}">
                <input type="hidden" name="formation">
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
                <a href='#' class="deleteEvt"><button class="btn btn-custon-four btn-danger" type="button">Supprimer</button></a>
                <button class="btn btn-custon-four btn-primary" type="submit">Modifier</button>
            </div>

            </form>
        </div>
    </div>
</div>
