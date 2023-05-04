<div id="modifForm" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Modifier utilisateur</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            
            <!--formulaire ajout de etablisement-->
            <form method="POST" action="{{ route('users.update',$user->id) }}" >
                {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group-inner">
                    <label>Username</label>
                    <input type="text" name="username" value="{{ $user->username }}" class="form-control" placeholder="" required>
                </div>
                <div class="form-group-inner">
                    <label>Mot de passe</label>
                    <input type="password" name="password" class="form-control" placeholder="" required>
                </div>
                <div class="form-group-inner">
                    <label>Confirmer mot de passe</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="" required>
                </div>
                <div class="form-group-inner">
                    <label>Choisir fonctions</label>
                    <select name="fonction_id" class="form-control" required >
                        @foreach($functions as $function)
                            @if($function->id==$user->fonction_id)
                            <option value="{{ $function->id }}" selected="selected">{{ $function->typefonction }}</option>
                            @else
                            <option value="{{ $function->id }}">{{ $function->typefonction }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-custon-four btn-primary" type="submit">Modifier</button>
            </div>

            </form>
        </div>
    </div>
</div>