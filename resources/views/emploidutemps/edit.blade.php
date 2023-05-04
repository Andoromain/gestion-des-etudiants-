<div id="modifEt" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                <h4 class="modal-title">Modifier emplois du temps</h4>
                <div class="modal-close-area modal-close-df">
                </div>
            </div>
            
            <!--formulaire ajout de etablisement-->
            <form method="POST" action="{{route('emploisdutemps.update')}}" >
                {{ csrf_field() }}
                <input type="hidden" name="id">
                <input type="hidden" name="et" value="{{ $et }}">
                <input type="hidden" name="formation">
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
                <a href='#' class="deleteEt"><button class="btn btn-custon-four btn-danger" type="button">Supprimer</button></a>
                <button class="btn btn-custon-four btn-primary" type="submit">Modifier</button>
            </div>

            </form>
        </div>
    </div>
</div>