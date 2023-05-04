<div id="modifEtab" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Modifier etablissement</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            
            <!--formulaire modif de etablisement-->
            <form method="POST" action="{{ route('etablissements.update',$etab->id) }}" >
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group-inner">
                        <label>Nom de l'etablissement</label>
                        <input type="text" name="nom" value="{{ $etab->nomEtab }}" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group-inner">
                        <label>Lieu</label>
                        <input type="text" name="lieu" value="{{ $etab->lieu }}" class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-custon-four btn-primary" type="submit">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>