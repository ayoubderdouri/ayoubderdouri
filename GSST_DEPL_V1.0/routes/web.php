<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TravailleurController;
use App\Http\Controllers\RisqueController;
use App\Http\Controllers\ConjointeController;
use App\Http\Controllers\VisitesController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\OpportuniteController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\AuditsController;
use App\Http\Controllers\ConstatController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\sectionController;
use App\Http\Controllers\SimulationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\SurveyController;
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
//
Route::get('PlanActionGlobal',[ActionController::class,'planAction']);
//suggestion
Route::post('send-suggestion',[SuggestionController::class,'store_suggestion']);
Route::get('list_off_suggestion',[SuggestionController::class,'index'])->middleware(['auth', 'isAdmin' ]);

//reclamation
Route::get('list_off_reclamation',[ReclamationController::class,'index'])->middleware(['auth', 'isAdmin' ]);
Route::get('action_Maitrise_reclamation N={id}',[ReclamationController::class,'getActionMaitrsie'])->middleware(['auth', 'isAdmin' ]);
Route::post('delete-reclamation N= {id}',[ReclamationController::class,'delete'])->middleware(['auth', 'isAdmin' ]);
Route::post('send-reclamation',[ReclamationController::class,'store_reclamtion']);

//survey
Route::get('survey_index',[SurveyController::class,'index'])->middleware(['auth', 'isAdmin' ]);
Route::post('add-survey',[SurveyController::class,'store'])->middleware(['auth', 'isAdmin' ]);
Route::post('delete-survey/{id}',[SurveyController::class,'delete'])->middleware(['auth', 'isAdmin' ]);
Route::get('editer_content/{id}',[SurveyController::class,'getContent'])->middleware(['auth', 'isAdmin' ]);
Route::post('save_content_survey/{id}',[SurveyController::class,'setContent'])->middleware(['auth', 'isAdmin' ]);
Route::get('surveyDemo/{id}',[SurveyController::class,'demo']);
Route::post('sent_answer_survey/{id}',[SurveyController::class,'sentAnswer']);



//
Route::get('users',[UserController::class,'index'])->middleware(['auth', 'isAdmin' ]);
Route::post('add-user',[UserController::class,'store'])->middleware(['auth', 'isAdmin' ]);
Route::post('delete-user/{id}',[UserController::class,'destroy'])->middleware(['auth', 'isAdmin' ]);
Route::post('add-processus',[UserController::class,'setProcessus'])->middleware(['auth', 'isAdmin' ]);
Route::post('del_processus/{id}',[UserController::class,'destroyProcessus'])->middleware(['auth', 'isAdmin' ]);
Route::get('sensibilisation',[UserController::class,'getText'])->middleware(['auth', 'isAdmin' ]);
Route::post('addText', [UserController::class,'setText'])->middleware(['auth', 'isAdmin' ]);
Route::get('delete_text/{id}',[UserController::class,'delText'])->middleware(['auth', 'isAdmin' ]);

//formation
Route::get('formation', function(){
    return view('formation_et_sensibilisatio.formation');
});
Route::get('simulation',[SimulationController::class,'index'])->middleware(['auth', 'isAdmin' ]);
Route::get('rapportSimulation_situation/{id}',[SimulationController::class,'getRapport'])->middleware(['auth', 'isAdmin' ]);
Route::put('save_rapport/{id}',[SimulationController::class,'setRapport'])->middleware(['auth', 'isAdmin' ]);

Route::post('add_simulation',[SimulationController::class,'store'])->middleware(['auth', 'isAdmin' ]);

Route::post('delete_simulation/{id}',[SimulationController::class,'destroy'])->middleware(['auth', 'isAdmin' ]);
Route::put('edit_simulation/{id}',[SimulationController::class,'update'])->middleware(['auth', 'isAdmin' ]);
Route::post('import',[SimulationController::class,'import'])->middleware(['auth', 'isAdmin' ]);




// Questionnaire
Route::post('surveyjs',[QuestionnaireController::class,'saveSurvey'])->middleware(['auth', 'isAdmin' ]);

Route::get('Questionnaire',[QuestionnaireController::class,'redirect']);
Route::get('index',[QuestionnaireController::class,'index']);
Route::get('index1',[QuestionnaireController::class,'index1']);

Route::post('sendQuestionnaire/{id}',[QuestionnaireController::class,'getReponce']);

Route::post('add-questionnaire',[QuestionnaireController::class,'store']);
Route::post('delete-Questionnaire/{id}',[QuestionnaireController::class,'destroy']);
Route::put('update-questionnaire/{id}',[QuestionnaireController::class,'update']);
Route::get('get-section/{id}',[QuestionnaireController::class,'getSection']);
//reponce
Route::get('reponce',[QuestionnaireController::class,'getReponce']);

// section

Route::post('add-section/{id}',[sectionController::class,'store']);
Route::post('delete-section/{id}',[sectionController::class,'destroy']);
Route::put('update-section/{id}',[sectionController::class,'update']);
//question
Route::post('add-question/{id}',[sectionController::class,'setQuestion']);
Route::get('del-question/{id}',[sectionController::class,'delQuestion']);
Route::put('update-question/{id}',[sectionController::class,'updateQuestion']);










//constats

Route::get('constat-list/{id}',[ConstatController::class,'index'])->middleware(['auth']);
Route::post('add-constat',[ConstatController::class,'store'])->middleware(['auth']);
Route::put('update-constat/{id}',[ConstatController::class,'update'])->middleware(['auth']);
Route::post('del-constat/{id}',[ConstatController::class,'delete'])->middleware(['auth']);
Route::get('getActionForConstat/{id}',[ConstatController::class,'getAction'])->middleware(['auth']);




//audits

Route::post('delete-audits/{id}',[AuditsController::class,'destroy'])->middleware(['auth', 'isAdmin' ]);
Route::put('update-audits/{id}',[AuditsController::class,'update'])->middleware(['auth', 'isAdmin' ]);
Route::get('audits',[AuditsController::class,'index'])->middleware(['auth', 'isAdmin' ]);
Route::post('add-audit',[AuditsController::class,'store'])->middleware(['auth', 'isAdmin' ]);


//opportunite

Route::post('add-opportunite',[OpportuniteController::class,'store'])->middleware(['auth']);
Route::get('add-Action-Maitrise-opportunite/{id}',[OpportuniteController::class,'getActionOpportunite'])->middleware(['auth']);
Route::put('update-opportunite/{id}',[OpportuniteController::class,'update'])->middleware(['auth']);
Route::post('delete-opp/{id}',[OpportuniteController::class,'delete'])->middleware(['auth']);


//rique
Route::get('risque-page',[RisqueController::class,'main'])->middleware(['auth']);
Route::get('risque-index/{id}',[RisqueController::class,'index'])->middleware(['auth']);
Route::post('add-risque',[RisqueController::class,'store'])->middleware(['auth']);

Route::put('update-risque/{id}',[RisqueController::class,'update'])->middleware(['auth']);

Route::post('delete-risque/{id}',[RisqueController::class,'destroy'])->middleware(['auth']);
Route::get('mesurer-risque/{id}',[RisqueController::class,'mesurer'])->middleware(['auth']);
Route::post('mesure-risque',[RisqueController::class,'mesure']);
Route::get('add-Action-Maitrise-risque/{id}',[RisqueController::class,'getAction'])->middleware(['auth']);

//action
Route::post('del-action/{id}',[ActionController::class,'delAction'])->middleware(['auth']);
Route::put('update-action/{id}',[ActionController::class,'updateAction'])->middleware(['auth']);
Route::post('add-action',[ActionController::class,'setAction'])->middleware(['auth']);


//visite

Route::get('medcin_visite',[VisitesController::class,'index'])->middleware(['auth', 'isMedcin']);
Route::post('add-visite',[VisitesController::class,'store'])->middleware(['auth', 'isMedcin']);;
Route::get('list-visite/{id}',[VisitesController::class,'listeVisite'])->middleware(['auth', 'isMedcin']);
Route::get('delete-visite/{id}',[VisitesController::class,'deleteVisite'])->middleware(['auth', 'isMedcin']);
Route::put('update-visite/{id}',[VisitesController::class,'updateVisite'])->middleware(['auth', 'isMedcin']);
Route::get('print-pdf/{id}',[VisitesController::class,'export'])->middleware(['auth', 'isMedcin']);



//conjointe

Route::post('add-conjointe',[ConjointeController::class,'store']);
Route::post('delete-conjointe/{id}',[ConjointeController::class,'destroy']);
Route::put('update-conjointe/{id}',[ConjointeController::class,'update']);



// travailleur route
Route::get('travailleurs',[travailleurController::class,'index'])->middleware(['auth', 'isAdmin' ]);
Route::get('Export_pdf/{id}',[travailleurController::class,'export'])->middleware(['auth', 'isAdmin' ]);

Route::get('about_travailleur/{id}',[travailleurController::class,'show'])->middleware(['auth', 'isAdmin' ]);

Route::get('add-travailleur',[travailleurController::class,'create'])->middleware(['auth', 'isAdmin' ]);
Route::get('edit-travailleur/{id}',[travailleurController::class,'edit'])->middleware(['auth', 'isAdmin' ]);
Route::post('delete-travailleur/{id}',[travailleurController::class,'destroy'])->middleware(['auth', 'isAdmin' ]);
Route::put('update-travailleur/{id}',[travailleurController::class,'update'])->middleware(['auth', 'isAdmin' ]);
Route::post('add-travailleur',[travailleurController::class,'store'])->middleware(['auth', 'isAdmin' ]);



Route::get('/', function () {
    return view('slider.slide');
});
Route::get('/erreur404', function () {
    return view('erreur_page.erreur404');
});

Route::get('/Reclamation', function () {
    return view('reclamation.reclamation');
});


Auth::routes();

// Route::group(['middleware' => ['auth']], function() {
//     /**
//     * Logout Route
//     */
//     Route::get('/log-out', 'LogoutController@perform')->name('logout.perform');
//  });
Route::get('log-out',[LogOutController::class,'perform']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
