<div id="choixFormation" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog" style="width: 317px;/*! height: 20px; */">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                <h4 class="modal-title">Formations</h4>
                <div class="modal-close-area modal-close-df">
                </div>
            </div>
            
            <!--formulaire ajout de etablisement-->
            <form action="{{ route('formations.index',$et) }}" >
            <div class="modal-body">
                <div class="form-group-inner">
                    <label>Choisir une Formation</label>
                    <select name="formation" class="form-control" required >
                        <option value='court' >Court</option>
                        <option value='long' >Long</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-custon-four btn-primary" type="submit">Entrer</button>
            </div>

            </form>
        </div>
    </div>
</div>