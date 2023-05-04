<div id="mailEvt" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                <h4 class="modal-title">Envoyer Mail</h4>
                <div class="modal-close-area modal-close-df">
                </div>
            </div>
            
            <!--formulaire ajout de etablisement-->
            <form method="POST" action="{{ route('evenement.mail') }}" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <input type="hidden" name="id">
                <input type="hidden" name="et" value="{{ $et }}">
                <input type="hidden" name="formation" value="{{ $_GET['formation'] }}">
            <div class="modal-body">
                <div class="form-group-inner">
                    <label>Objet</label>
                    <input type="text" name="objet" class="form-control" placeholder="" required>
                </div>
                <div class="form-group-inner">
                    <label>Fichier</label>
                    <input type="file" name="fichier" accept=".pdf" class="form-control" placeholder="" required>
                </div>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-custon-four btn-primary" type="submit">Envoyer</button>
            </div>

            </form>
        </div>
    </div>
</div>
