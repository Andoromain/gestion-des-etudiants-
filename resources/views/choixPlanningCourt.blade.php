<div id="choixPlanningCourt" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog" style="width: 317px;/*! height: 20px; */">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Planning</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            
            <!--formulaire ajout de etablisement-->
            <form action="{{ route('planning.index',$et) }}" >
            <div class="modal-body">
                <div class="form-group-inner">
                    <label>Choisir un planning</label>
                    <select name="planning" class="form-control" required >
                        <option value='1'  >Evenement</option>
                        <option value='2'  >Emploi du temps</option>
                    </select>
                    <label>Formation du</label>
                    <?php $courts=DB::table('formations')->where('type','court')->get(); ?>
                    <select name="formation" class="form-control" required >
                        @foreach($courts as $court)
                            <option value='{{ $court->id }}'  >{{date_format(date_create($court->debut),'d / m / Y')}} à {{date_format(date_create($court->fin),'d / m / Y')}}</option>
                        @endforeach
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