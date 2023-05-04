<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/etudiants','etudiantControleur');
Route::resource('/etablissements','etablissementControleur');
Route::resource('/formateurs','formateurControleur');
Route::resource('/users','utilisateurControleur');
Route::resource('/evenements','evenementControleur');
Route::resource('/formations','formationControleur');
Route::resource('/syllabus','syllabusControleur');
Route::resource('/parcours','parcoursControleur');
Route::resource('/planning','planningControleur');

Route::get('/etudiants/etab/{p1}','etudiantControleur@index')->name('etudiants.index');
Route::get('/etablissements/etab/{p1}','etablissementControleur@index')->name('etablissements.index');
Route::get('/formateurs/etab/{p1}','formateurControleur@index')->name('formateurs.index');
Route::get('/users/etab/{p1}','utilisateurControleur@index')->name('users.index');
Route::get('/evenements/etab/{p1}','evenementControleur@index')->name('evenements.index');
Route::get('/formations/etab/{p1}','formationControleur@index')->name('formations.index');
Route::get('/syllabus/etab/{p1}','syllabusControleur@index')->name('syllabus.index');
Route::get('/parcours/etab/{p1}','parcoursControleur@index')->name('parcours.index');
Route::get('/planning/etab/{p1}','planningControleur@index')->name('planning.index');


Route::get('/etudiant/etab/{p1}/ajout/','etudiantControleur@add')->name('etudiant.ajout');
Route::post('/etudiant/etab/{p1}/store/','etudiantControleur@store')->name('etudiants.store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/acceuil', 'HomeController@index2')->name('home2');

Route::delete('etablissements/{id}', 'etablissementControleur@destroy')->name('etablissements.destroy');
Route::delete('formateurs/{id}', 'formateurControleur@destroy')->name('formateurs.destroy');
Route::delete('users/{id}', 'utilisateurControleur@destroy')->name('users.destroy');

Route::get('/etablissements/{id}/edit','etablissementControleur@edit')->name('etablissements.edit');
Route::get('/formateurs/{id}/edit','formateurControleur@edit')->name('formateurs.edit');

Route::post('/etablissements/update/{id}','etablissementControleur@update')->name('etablissements.update');
Route::post('/formateurs/update/{id}','formateurControleur@update')->name('formateurs.update');

Route::post('/evenement/etab/{p1}/formation/{p2}','evenementControleur@store')->name('evenement.store');
Route::post('/emploisdutemps/etab/{p1}/formation/{p2}','emploisdutempsControleur@store')->name('emploisdutemps.store');

//affichage des evenment dans fullcalendar
Route::get('/liste','evenementControleur@listeEvt'); 
Route::get('/listeEt','emploisdutempsControleur@listeEt'); 
Route::get('/listeSyllabus','syllabusControleur@listeSyllabus'); 

Route::get('/listeEtudiantC/etab/{p1}/formation/{p2}/','formationControleur@listeEtudiantCourt')->name('formations.listeEtC');
Route::get('/listeEtudiantL/etab/{p1}/formation/{p2}/','formationControleur@listeEtudiantLong')->name('formations.listeEtL');

Route::post('/syllabus/etab/{p1}/store','syllabusControleur@store')->name('syllabus.store');

Route::delete('/evenement/{p2}','evenementControleur@destroy')->name('evenement.destroy');
Route::delete('/emploisdutemps/{p2}','emploisdutempsControleur@destroy')->name('emploisdutemps.destroy');
Route::delete('/syllabus/{p2}','syllabusControleur@destroy')->name('syllabus.destroy');

Route::delete('/formations/{p2}','formationControleur@destroy')->name('formations.destroy');


Route::post('/evenement/update','evenementControleur@update')->name('evenement.update');
Route::post('/emploisdutemps/update','emploisdutempsControleur@update')->name('emploisdutemps.update');
Route::post('/syllabus/update','syllabusControleur@update')->name('syllabus.update');


Route::post('/etudiants/update/{id}','etudiantControleur@update')->name('etudiant.update');//


Route::get('/etudiants/etab/{p1}/detail/{id}','etudiantControleur@detail')->name('etudiant.detail');//
Route::get('/etudiants/etab/{p1}/edit/{id}','etudiantControleur@edit')->name('etudiant.edit');//
Route::delete('/etudiants/{id}','etudiantControleur@destroy')->name('etudiants.destroy');//

Route::post('/evenement/mail','evenementControleur@mail')->name('evenement.mail');

Route::get('/users/{id}/edit','utilisateurControleur@edit')->name('users.edit');
Route::post('/users/{id}/update','utilisateurControleur@update')->name('users.update');


Route::post('/formations/update/{p1}','formationControleur@update')->name('formations.update');
Route::get('/formations/edit/{p1}','formationControleur@edit')->name('formations.edit');

