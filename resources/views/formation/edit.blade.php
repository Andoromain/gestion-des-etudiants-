<div id="editForm" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Ajouter formation {{$formation->type }}</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            
            <!--formulaire ajout de formateur-->
            <form method="POST" action="{{ route('formations.update',$formation->id) }}" >
                {{ csrf_field() }}
            <div class="modal-body">
                <input type="hidden" name='formation' value="{{ $formation->type }}">
                <div class="form-group-inner">
                    <label>Debut de la formation</label>
                    <input type="date" name="debut" value="{{ $formation->debut }}" class="form-control" placeholder="" required>
                </div>
                <div class="form-group-inner">
                    <label>Fin de la formation</label>
                    <input type="date" name="fin" class="form-control" value="{{ $formation->fin }}" placeholder="" required>
                </div>
                <div class="form-group-inner">
                    <label>Droit d'inscription</label>
                    <input type="number" name="droit" class="form-control" value="{{ $formation->ecolage }}" placeholder="" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-custon-four btn-primary" type="submit">Modifier</button>
            </div>

            </form>
        </div>
    </div>
</div>