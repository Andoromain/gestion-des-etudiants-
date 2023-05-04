@extends('layouts.app1')

@section('content')
<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-2 col-xs-6">
                        <div class="profile-info-inner">
                            <div class="profile-img" style="text-align: center">
                                <img src="http://localhost/projet/public/<?php echo asset("storage/$data->photo") ?>" alt="" style=" width:150px;height: 150px;">
                            </div>
                            <div class="profile-details-hr">                             
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="address-hr" style="text-align: left">
                                            <p><b>Informations</b>
                                            <br> <u>Matricule:</u> {{ $data->matricule }}
                                            <br> <u>Nom:</u> {{ $data->nomEt }}
                                            <br> <u>Prenom:</u> {{ $data->prenomEt }}
                                            <br> <u>Email:</u> {{ $data->emailEt }}
                                            <br> <u>Date de naissance:</u> {{ date_format(date_create($data->datenaiss),'d / m / Y')  }}
                                            <br> <u>sexe:</u> {{ $data->sexe }}
                                            <br> <u>Logement:</u> {{ $data->logEt }}
                                            <?php 
                                                $forms=DB::table('formations')->where('id',$data->id_formation)->get()->first();

                                            ?>
                                            <br> <u>Reste du droit:</u> {{ (float)$forms->ecolage - (float)$data->fraisSco }} Ar
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <hr>
                            
                        <br/>
                        <br/>
                        
                        </div>
                        
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                           
                            <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                
                                                
                                                <div class="row mg-b-15">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="skill-title">
                                                                    <h2>Pieces</h2>
                                                                    <hr>
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
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                           
                            <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <?php $i=1;?>
                                                    @foreach($fichiers as $fichier)
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p> 
                                                            
                                                            <div class="profile-info-inner">
                                                                <div class="profile-img" style="text-align: center">
                                                                    <a href="<?php echo asset("storage/$fichier->fichier") ?>" target="_blank"><img src="<?php echo asset("storage/$fichier->fichier") ?>" alt="" style=" width:150px;height: 150px;"></a>
                                                                </div>
                                                                <div class="profile-details-hr">                             
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="address-hr">
                                                                                <p><b>Fichier {{$i}} </b></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <?php $i++;?>
                                                    @endforeach
                                                </div>
                                                
                                                <div class="row mg-b-15">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="skill-title">
                                                                    
                                                                    <hr>
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
                    </div>
                </div>
            </div>
        </div>
        @endsection