@extends('layouts.app1')

@section('content')
<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1 style="text-align:center">Liste <span class="table-project-n">des</span> etudiants de formations longs du {{date_format(date_create($f->debut),'d / m / Y')}} au {{date_format(date_create($f->fin),'d / m / Y')}}</h1>
                                </div>
                                <br>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false " data-show-toggle="false" data-resizable="true" data-cookie="false"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="false" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="id">Matricule</th>
                                                <th data-field="name" data-editable="true">Nom et Prenom</th>
                                                <th data-field="date" data-editable="true">Date de naissance</th>
                                                <th data-field="email" data-editable="true">Email</th>
                                                <th data-field="logement">Logement</th>
                                                <th data-field="Sexe" data-editable="true">Sexe</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($etudiants as $etudiant)
                                            <tr>
                                                <td>{{ $etudiant->matricule }}</td>
                                                <td>{{ $etudiant->nomEt }} {{ $etudiant->prenomEt }}</td>
                                                <td>{{ date_format(date_create($etudiant->datenaiss),'d / m / Y') }}</td>
                                                <td class="datatable-ct"><span class="pie">{{ $etudiant->emailEt }}</span>
                                                </td>
                                                <td>{{ $etudiant->logEt }}</td>
                                                <td>{{ $etudiant->sexe }}</td>
                                                <td>
                                                <a href="{{ route('etudiant.detail',[$et,$etudiant->id]) }}"><button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-eye fa-lg"  aria-hidden="true"></i></button></a>
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
      
            document.getElementById('etudiant').classList.add('active');
            //document.getElementById('sub-lettre-adm').style.color='#9070b7';
			//document.getElementById('sub-lettre').classList.add('in');
        
	  </script>
    
@endsection