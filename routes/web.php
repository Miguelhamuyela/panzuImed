<?php

use Illuminate\Support\Facades\Route;

/* SITE */
route::get('/', ['as' => 'site.home', 'uses' => 'Site\HomeController@index']);
/* noticias */
Route::get('/noticias', ['as' => 'site.news', 'uses' => 'Site\NewsController@index']);
Route::get('/noticia/{title}', ['as' => 'site.news.show', 'uses' => 'Site\NewsController@show']);

/* noticias */
Route::get('/missions', ['as' => 'site.missions', 'uses' => 'Site\MissionsController@index']);
Route::get('/missions/{title}', ['as' => 'site.missions.show', 'uses' => 'Site\MissionsController@show']);


/* visao */
Route::get('/visao', ['as' => 'site.visions', 'uses' => 'Site\VisionsController@index']);
Route::get('/visao/{title}', ['as' => 'site.visions.show', 'uses' => 'Site\VisionsController@show']);

/* Galeria fotos */
Route::get('/galerias/', ['as' => 'site.gallery', 'uses' => 'Site\GalleryController@index']);
Route::get('/galeria/{name}', ['as' => 'site.gallery.show', 'uses' => 'Site\GalleryController@show']);


/**Registration */
Route::get('/matricula', ['as' => 'site.registration.index', 'uses' => 'Site\RegistrationController@index']);


/* Galeria de Alumi */
Route::get('/galeria-de-alumni/', ['as' => 'site.galleryAlumi', 'uses' => 'Site\AlumniGalleryController@index']);
Route::get('/galeria-de-alumni/{name}', ['as' => 'site.galleryAlumi.show', 'uses' => 'Site\AlumniGalleryController@show']);



/* Galeria de Videos */
Route::get('/videos/', ['as' => 'site.videos', 'uses' => 'Site\VideoController@index']);


/**course */
Route::get('/curso/{name}', ['as' => 'site.course.show', 'uses' => 'Site\CourseController@show']);
/**end course */

Route::get('/subcurso/{name}', ['as' => 'site.subcourse.show', 'uses' => 'Site\SubCourseController@show']);

/**Contact */
Route::get('/contactos', ['as' => 'site.contact', 'uses' => 'Site\ContactController@index']);
route::post('site/help/email', ['as' => 'site.help.email', 'uses' => 'Site\Email\HelpController@index']);

/** serviços */
Route::get('/servicos', ['as' => 'site.services', 'uses' => 'Site\ServiceController@index']);

/**sobre */
Route::get('/sobre', ['as' => 'site.about', 'uses' => 'Site\AboutController@index']);

/**Affiliated Schools Start */
Route::get('/escolas-filiadas', ['as' => 'site.affiliatedSchools', 'uses' => 'Site\AffiliatedSchoolsController@index']);
/**Affiliated Schools End*/

/**route */
Route::get('/percurso', ['as' => 'site.route', 'uses' => 'Site\RouteController@index']);


/**doações */
Route::get('/doacoes', ['as' => 'site.donation', 'uses' => 'Site\DonationController@index']);

/**Quadro de honra */
Route::get('/quadro-honra', ['as' => 'site.hoboard', 'uses' => 'Site\honorBoardController@index']);

/* anuncios */
Route::get('/anuncios', ['as' => 'site.announcent', 'uses' => 'Site\AnnouncementController@index']);
Route::get('/anuncio/{title}', ['as' => 'site.announcent.show', 'uses' => 'Site\AnnouncementController@show']);

/**Director Perfil */
Route::get('/perfil-do-director', ['as' => 'site.perfilDirector', 'uses' => 'Site\PerfilDirectorController@index']);
/**End Director Perfil */


/**GoverningBodies */
Route::get('/orgaos-directivos', ['as' => 'site.governingBodie', 'uses' => 'Site\GoverningBodieController@index']);
/**End GoverningBodies */

/**Former Director */
Route::get('/ex-directores', ['as' => 'site.formerDirector', 'uses' => 'Site\FormerDirectorController@index']);
/**End Former Director */


/**Normative */
Route::get('/normativos', ['as' => 'site.normative', 'uses' => 'Site\NormativeController@index']);
/**End Normative */

/* policyPrivacy */
Route::get('/politicas-de-privacidade', ['as' => 'site.policyPrivacy', 'uses' => 'Site\PolicyPrivacyController@index']);

/* END SITE */



/* inclui as rotas de autenticação do ficheiro auth.php */
require __DIR__ . '/auth.php';

require __DIR__ . '/admin.php';
