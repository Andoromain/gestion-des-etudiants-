@extends('layouts.app1')



@section('content')
<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Inscription d'un Etudiant</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">

                                                    <!--formulaire ajout etudiant -->
                                                    <form action="{{ route('etudiants.store',$et) }}" method="POST" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick add-professors dz-clickable" >
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="etab" value="{{$et}}">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Nom</label>
                                                                    <input name="nom" type="text" class="form-control" placeholder="" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Prenom</label>
                                                                    <input name="prenom" type="text" class="form-control" placeholder="" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Sexe</label>
                                                                    <select class="form-control custom-select-value" name="sexe">
																			<option value="Masculin">Masculin</option>
																			<option value="Féminin">Féminin</option>
																	</select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Date de naissance</label>
                                                                    <input name="datenaiss" type="date" class="form-control" placeholder="" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Matricule</label>
                                                                    <input name="matricule" type="text" class="form-control" placeholder="" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input name="email" id="finish" type="email" class="form-control hasDatepicker" placeholder="" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Logement</label>
                                                                    <input name="logement" id="postcode" type="text" class="form-control" placeholder="" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Photo de l'etudiant</label>
                                                                    <input name="photo" id="postcode" type="file" class="form-control" accept=".png,.jpeg,.jpg,.gif" required >
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Certificat medical</label>
                                                                    <input name="certificatMed" id="postcode" type="file" accept=".png,.jpeg,.jpg,.gif" class="form-control" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Acte de naissance</label>
                                                                    <input name="actNaiss" accept=".png,.jpeg,.jpg,.gif" id="postcode" type="file" class="form-control" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>CIN</label>
                                                                    <input name="cin" id="postcode" type="file" accept=".png,.jpeg,.jpg,.gif" class="form-control" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Diplome</label>
                                                                    <input name="diplome" id="postcode" type="file" accept=".png,.jpeg,.jpg,.gif" class="form-control" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Bordereau</label>
                                                                    <input name="bordereau" id="postcode" type="file" accept=".png,.jpeg,.jpg,.gif" class="form-control" >
                                                                </div>
                                                                <label for="etablissemet">Cycle</label>
                                                                <div class="form-group">
                                                                    <input class="pull-left radio-checked" type="radio" checked="" value="court" id="court" name="cycle">      Court<br>
                                                                    <input class="pull-left" type="radio" value="long" id="long" name="cycle">Long
                                                                </div>
                                                               
                                                                <div class="form-group">
                                                                    <label for="formation">liste des Formation</label>

                                                                    <?php $formCs=DB::table('formations')->where('type','court')->get(); ?>
                                                                    <select name="formation" class="form-control court" style="display:none" required>
                                                                        @foreach($formCs as $formC)
																		<option value="{{$formC->id}}">{{date_format(date_create($formC->debut),'d / m / Y')}} à {{date_format(date_create($formC->fin),'d / m / Y')}}</option>
																		@endforeach
																	</select>

                                                                    <?php $formLs=DB::table('formations')->where('type','long')->get(); ?>
                                                                    <select name="formation" class="form-control long" style="display:none" required>
                                                                        @foreach($formLs as $formL)
																		<option value="{{$formL->id}}">{{date_format(date_create($formL->debut),'d / m / Y')}} à {{date_format(date_create($formL->fin),'d / m / Y')}}</option>
																		@endforeach
																	</select>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label>Frais de scolarité</label>
                                                                    <input name="frais" length=5 id="postcode" type="number" required class="form-control" >
                                                                </div>
                                                              
                                                            </div>
                                                        
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Enregistrer</button>
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
    <script src="{{ asset('jsProd/ajax.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
   
   @if(Session::has('success'))
       @include('layouts.alertSucess')
    @endif

    @if(Session::has('error'))
       @include('layouts.alertError')
    @endif
@endsection