<div id="modifForm" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Modifier formateur</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            
            <!--formulaire modif de formateur-->
            <form method="POST" action="{{ route('formateurs.update',$formateur->id) }}" >
                {{ csrf_field() }}
                <input type="hidden" name="et" value="{{ $formateur->id_etab }}">
            <div class="modal-body">
                <div class="form-group-inner">
                    <label>Nom du formateur</label>
                    <input type="text" name="nom" class="form-control" value="{{ $formateur->nomF }}" placeholder="" required>
                </div>
                <div class="form-group-inner">
                    <label>Prenom du formateur</label>
                    <input type="text" name="prenom" class="form-control" value="{{ $formateur->prenomF }}" placeholder="" required>
                </div>
                <div class="form-group-inner">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $formateur->emailF }}" placeholder="" required>
                </div>
                <div class="form-group-inner">
                    <label>Telephone</label>
                    <input type="number" name="tel" value="{{ $formateur->tel }}" class="form-control" placeholder="" required>

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-custon-four btn-primary" type="submit">Modifier</button>
            </div>

            </form>
        </div>
    </div>
</div>