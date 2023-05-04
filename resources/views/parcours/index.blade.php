@extends('layouts.app1')

@section('content')
<div id="ajoutForm" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Ajouter matière</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            
            <!--formulaire ajout de formateur-->
            <form method="POST" action="{{ route('parcours.store') }}" >
                {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group-inner">
                    <label>Nom de la matière</label>
                    <input type="text" name="nom" class="form-control" placeholder="" required>
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
                                    <h1>Liste <span class="table-project-n">des</span> matières</h1>
                                </div>
                                <div class="add-product">
                                    <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#ajoutForm">Ajouter matière</a>
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
                                                <th data-field="name" data-editable="true">Nom  de la matière</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($parcours as $parcour)
                                            <tr>
                                                <td>{{ $parcour->id }}</td>
                                                <td>{{ $parcour->nomP }}</td>
                                                <td style="text">
                                                    <a data-id="{{ $parcour->id }}" href="{{ route('formateurs.edit',$parcour->id) }}" title="Edit" class="editFormateur" href="#" style="color:#FFC107"><button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></button></a>
                                                    <a data-id="{{ $parcour->id }}" class="deleteFormateur" href="{{ route('formateurs.destroy',[$parcour->id])}}" style="color:#E34724"><button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
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
     @if(Session::has('success'))
        @include('layouts.alertSucess')
     @endif

     @if(Session::has('error'))
        @include('layouts.alertError')
     @endif
     <script src="{{ asset('jsProd/ajax.js') }}"></script>
     <script type="text/javascript">
        $document.ready(function(){
            document.getElementById('formateur').classList.add('active');
            //document.getElementById('sub-lettre-adm').style.color='#9070b7';
			//document.getElementById('sub-lettre').classList.add('in');
        });
	  </script>
    
@endsection