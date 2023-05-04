@extends('layouts.app1')

@section('content')

<div id="ajoutForm" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Ajouter formation Long</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            
            <!--formulaire ajout de formateur-->
            <form method="POST" action="{{ route('formations.store') }}" >
                {{ csrf_field() }}
            <div class="modal-body">
                <input type="hidden" name='formation' value="{{ $_GET['formation'] }}">
                
                <div class="form-group-inner">
                    <label>Debut de la formation</label>
                    <input type="date" name="debut" class="form-control" placeholder="" required>
                </div>
                <div class="form-group-inner">
                    <label>Fin de la formation</label>
                    <input type="date" name="fin" class="form-control" placeholder="" required>
                </div>
                <div class="form-group-inner">
                    <label>Droit d'inscription</label>
                    <input type="number" name="droit" class="form-control" placeholder="" required>
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
                                    <h1>Liste <span class="table-project-n">des</span> formations longs</h1>
                                </div>
                                <div class="add-product">
                                    @if(Auth::user()->authorizeFunctions(['chef']))
                                    @else
                                    <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#ajoutForm">Ajouter formation long</a>
                                    @endif
                                </div>
                                <br>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false " data-show-toggle="false" data-resizable="true" data-cookie="false"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="false" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="id">ID</th>
                                                <th data-field="prenom" data-editable="true">Debut de la formation</th>
                                                <th data-field="email" data-editable="true">Fin de la formation</th>
                                                <th data-field="droit" data-editable="true">Droit d'inscription</th>
                                                <th data-field="action" data-editable="true">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($formations as $formation)
                                            <tr>
                                                <td>{{ $formation->id }}</td>
                                                <td>{{ date_format(date_create($formation->debut),'d / m / Y') }}</td>
                                                <td>{{ date_format(date_create($formation->fin),'d / m / Y') }}</td>
                                                <td>{{ $formation->ecolage }} Ar</td>
                                                <td style="text">
                                                
                                                    <a href="{{ route('formations.listeEtL',[$et,$formation->id]) }}"><button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Liste de etudiants dans cet formation"><i class="fa fa-eye fa-lg"  aria-hidden="true"></i></button></a>
                                                @if(Auth::user()->authorizeFunctions(['chef']))
                                                @else
                                                    <a data-id="{{ $formation->id }}" href="{{ route('formations.edit',$formation->id) }}" title="Edit" class="editFormation" href="#" style="color:#FFC107"><button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></button></a>
                                                    <a data-id="{{ $formation->id }}" class="deleteFormation" href="{{ route('formations.destroy',$formation->id) }}" style="color:#E34724"><button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                @endif
                                                </td>
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
    <script src="{{ asset('jsProd/ajax.js') }}"></script>
     @if(Session::has('success'))
        @include('layouts.alertSucess')
     @endif

     @if(Session::has('error'))
        @include('layouts.alertError')
     @endif
@endsection