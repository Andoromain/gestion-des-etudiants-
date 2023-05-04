
@extends('layouts.app1')

@section('content')
<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Modifier l' étudiant</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">

                                                    <!--formulaire ajout etudiant -->
                                                    <form action="{{ route('etudiant.update',$dt1->id) }}" method="POST" class="dropzone dropzone-custom needsclick add-professors dz-clickable" id="demo1-upload" novalidate="novalidate">
                                                    {{ csrf_field() }}
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Nom</label>
                                                                    <input name="nomEt" type="text" class="form-control" placeholder="" value="{{ $dt1->nomEt }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Prenom</label>
                                                                    <input name="prenomEt" type="text" class="form-control" placeholder="" value="{{ $dt1->prenomEt }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Sexe</label>
                                                                    <select class="form-control custom-select-value" name="sexe" required>
                                                                        @if($dt1->sexe=='Masculin')
																			<option value="Masculin" selected="selected">Masculin</option>
																			<option value="Feminin">Féminin</option>
                                                                        @else
                                                                            <option value="Masculin" >Masculin</option>
																			<option value="Féminin" selected="selected">Féminin</option>
                                                                        @endif
																	</select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Date de naissance</label>
                                                                    <input name="datenaiss" type="date" class="form-control" placeholder="" value="{{ $dt1->datenaiss }}" required>
                                                                </div>
                                                                
                                                                
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                
                                                                <div class="form-group">
                                                                    <label>Matricule</label>
                                                                    <input name="matricule" type="text" class="form-control" placeholder="" value="{{ $dt1->matricule }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input name="emailEt" id="finish" type="email" class="form-control hasDatepicker" placeholder="" value="{{ $dt1->emailEt }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Logement</label>
                                                                    <input name="logEt" id="postcode" type="text" class="form-control" placeholder="" value="{{ $dt1->logEt }}" required>
                                                                </div>
                                                            
                                                                <div class="form-group">
                                                                    <label>Frais Scolaire</label>
                                                                    <input name="fraisSco" id="postcode" type="number" class="form-control" placeholder="" value="{{ $dt1->fraisSco }}" required>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
@section('js')
     
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('jsProd/ajax.js') }}"></script>
   
    @if(Session::has('success'))
        @include('layouts.alertSucess')
     @endif

     @if(Session::has('error'))
        @include('layouts.alertError')
     @endif
    
@endsection