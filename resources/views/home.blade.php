@extends('layouts.app3')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenue sur votre compte</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header header-color-modal bg-color-1">
                                <h4 class="modal-title">Choisir un etablissement</h4>
                                <div class="modal-close-area modal-close-df">
                                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                </div>
                            </div>
                            
                            <!--formulaire modif de etablisement-->
                            <form action="{{ route('home2')}}" >
                                <div class="modal-body">
                                <label>Etablissement</label>
                                    <select name="etab" class="form-control" required >
                                        @foreach($etabs as $etab)
                                                <option value='{{ $etab->id }}'  >{{ $etab->nomEtab }} {{ $etab->lieu }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-custon-four btn-primary" type="submit">Choisir</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
