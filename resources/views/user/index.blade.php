@extends('layouts.app1')

@section('content')
<div id="ajoutEtab" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Ajouter utilisateur</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            
            <!--formulaire ajout de etablisement-->
            <form method="POST" action="{{ route('users.store') }}" >
                {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group-inner">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="" required>
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
                            <option value="{{ $function->id }}">{{ $function->typefonction }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-custon-four btn-primary" type="submit">Enregistrer</button>
            </div>

            </form>
        </div>
    </div>
</div>

<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Liste <span class="table-project-n">des</span> utilisateurs</h1>
                                </div>
                                <div class="add-product">
                                    <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#ajoutEtab">Ajouter utilisateur</a>
                                </div>
                                <br>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                   
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false " data-show-toggle="false" data-resizable="true" data-cookie="false"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="false" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="username">Username</th>
                                                <th data-field="fonction" data-editable="true">Fonction</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(App\User::all() as $user)
                                            <tr>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->fonctions->pluck('typefonction') }}</td>

                                                @if(Auth::user()->authorizeFunctions(['admin']))
                                                    <td style="text">
                                                    <a data-id="{{ $user->id }}" href="{{ route('users.edit',$user->id) }}" title="Edit" class="editUser"  style="color:#FFC107"><button><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></button>
                                                        </a>
                                                        <a data-id="{{ $user->id }}" class="deleteUser" href="{{ route('users.destroy',[$user->id])}}" style="color:#E34724"><button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                    </td>
                                                @else
                                                    <td>--</td>
                                                @endif

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
        </div>


@endsection

@section('js')
     <!-- data table JS
		============================================ -->
        <script src="{{ asset('js/data-table/bootstrap-table.js') }}"></script>
    <script src="{{ asset('js/data-table/tableExport.js') }}"></script>
    <script src="{{ asset('js/data-table/data-table-active.js') }}"></script>
   
    <script src="{{ asset('js/data-table/bootstrap-table-resizable.js') }}"></script>
    <script src="{{ asset('js/data-table/colResizable-1.5.source.js') }}"></script>
    <script src="{{ asset('js/data-table/bootstrap-table-export.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    
     @if(Session::has('success'))
        @include('layouts.alertSucess')
     @endif

     @if(Session::has('error'))
        @include('layouts.alertError')
     @endif
     <script src="{{ asset('jsProd/ajax.js') }}"></script>
    
@endsection