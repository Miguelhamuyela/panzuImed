<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Editor;
use App\Http\Middleware\Administrador;


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




/* Grupo de rotas autenticadas */

Route::middleware(['auth'])->group(function () {
    /* Manager Dashboard  */
    route::get('admin/painel', ['as' => 'admin.home', 'uses' => 'Admin\DashboardController@index']);

    Route::middleware([Administrador::class])->group(function () {

        /* User */
        Route::get('admin/user/index', ['as' => 'admin.user.index', 'uses' => 'Admin\UserController@index']);
        Route::get('admin/user/show/{id}', ['as' => 'admin.user.show', 'uses' => 'Admin\UserController@show'])->withoutMiddleware(Administrador::class);

        Route::get('admin/user/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'Admin\UserController@edit'])->withoutMiddleware(Administrador::class);;
        Route::put('admin/user/update/{id}', ['as' => 'admin.user.update', 'uses' => 'Admin\UserController@update'])->withoutMiddleware(Administrador::class);;

        Route::get('admin/user/delete/{id}', ['as' => 'admin.user.delete', 'uses' => 'Admin\UserController@destroy']);
        /* end user */
    });
    Route::middleware([Editor::class])->group(function () {
        /* gallery */
        Route::get('admin/gallery/index', ['as' => 'admin.gallery.index', 'uses' => 'Admin\GalleryController@list']);
        Route::get('admin/gallery/show/{id}', ['as' => 'admin.gallery.show', 'uses' => 'Admin\GalleryController@show']);
        Route::get('admin/gallery/create', ['as' => 'admin.gallery.create', 'uses' => 'Admin\GalleryController@create']);
        Route::post('admin/gallery/store', ['as' => 'admin.gallery.store', 'uses' => 'Admin\GalleryController@store']);
        Route::get('admin/gallery/edit/{id}', ['as' => 'admin.gallery.edit', 'uses' => 'Admin\GalleryController@edit']);
        Route::put('admin/gallery/update/{id}', ['as' => 'admin.gallery.update', 'uses' => 'Admin\GalleryController@update']);
        Route::get('admin/gallery/delete/{id}', ['as' => 'admin.gallery.delete', 'uses' => 'Admin\GalleryController@destroy']);
        /* end gallery */

        /* imageGallery */
        Route::get('admin/imageGallery/create/{id}', ['as' => 'admin.imageGallery.create', 'uses' => 'Admin\ImageGalleryController@create']);
        Route::post('admin/imageGallery/store/{id}', ['as' => 'admin.imageGallery.store', 'uses' => 'Admin\ImageGalleryController@store']);

        Route::get('admin/imageGallery/delete/{id}', ['as' => 'admin.imageGallery.delete', 'uses' => 'Admin\ImageGalleryController@destroy']);
        /* End imageGallery */



/**alumni gallery */
Route::get('admin/galeria-de-alumni/index', ['as' => 'admin.alumniGallery.index', 'uses' => 'Admin\AlumniGalleryController@list']);
Route::get('admin/galeria-de-alumni/show/{id}', ['as' => 'admin.alumniGallery.show', 'uses' => 'Admin\AlumniGalleryController@show']);
Route::get('admin/galeria-de-alumni/create', ['as' => 'admin.alumniGallery.create', 'uses' => 'Admin\AlumniGalleryController@create']);
Route::post('admin/galeria-de-alumni/store', ['as' => 'admin.alumniGallery.store', 'uses' => 'Admin\AlumniGalleryController@store']);
Route::get('admin/galeria-de-alumni/edit/{id}', ['as' => 'admin.alumniGallery.edit', 'uses' => 'Admin\AlumniGalleryController@edit']);
Route::put('admin/galeria-de-alumni/update/{id}', ['as' => 'admin.alumniGallery.update', 'uses' => 'Admin\AlumniGalleryController@update']);
Route::get('admin/galeria-de-alumni/delete/{id}', ['as' => 'admin.alumniGallery.delete', 'uses' => 'Admin\AlumniGalleryController@destroy']);

 /* imageGallery */
 Route::get('admin/imageGalleryAlumni/create/{id}', ['as' => 'admin.imageGalleryAlumni.create', 'uses' => 'Admin\ImageGalleryAlumniController@create']);
 Route::post('admin/imageGalleryAlumni/store/{id}', ['as' => 'admin.imageGalleryAlumni.store', 'uses' => 'Admin\ImageGalleryAlumniController@store']);

 Route::get('admin/imageGalleryAlumni/delete/{id}', ['as' => 'admin.imageGalleryAlumni.delete', 'uses' => 'Admin\ImageGalleryAlumniController@destroy']);
 /* End imageGallery */

/** end alumni gallery */

        /* video */
        Route::get('admin/video/index', ['as' => 'admin.video.index', 'uses' => 'Admin\VideoController@list']);
        Route::get('admin/video/show/{id}', ['as' => 'admin.video.show', 'uses' => 'Admin\VideoController@show']);

        Route::get('admin/video/create', ['as' => 'admin.video.create', 'uses' => 'Admin\VideoController@create']);
        Route::post('admin/video/store', ['as' => 'admin.video.store', 'uses' => 'Admin\VideoController@store']);

        Route::get('admin/video/edit/{id}', ['as' => 'admin.video.edit', 'uses' => 'Admin\VideoController@edit']);
        Route::put('admin/video/update/{id}', ['as' => 'admin.video.update', 'uses' => 'Admin\VideoController@update']);

        Route::get('admin/video/delete/{id}', ['as' => 'admin.video.delete', 'uses' => 'Admin\VideoController@destroy']);
        /* end video */

        /* slideshow */
        Route::get('admin/slideshow/index', ['as' => 'admin.slideshow.index', 'uses' => 'Admin\SlideShowController@list']);
        Route::get('admin/slideshow/show/{id}', ['as' => 'admin.slideshow.show', 'uses' => 'Admin\SlideShowController@show']);

        Route::get('admin/slideshow/create', ['as' => 'admin.slideshow.create', 'uses' => 'Admin\SlideShowController@create']);
        Route::post('admin/slideshow/store', ['as' => 'admin.slideshow.store', 'uses' => 'Admin\SlideShowController@store']);

        Route::get('admin/slideshow/edit/{id}', ['as' => 'admin.slideshow.edit', 'uses' => 'Admin\SlideShowController@edit']);
        Route::put('admin/slideshow/update/{id}', ['as' => 'admin.slideshow.update', 'uses' => 'Admin\SlideShowController@update']);

        Route::get('admin/slideshow/delete/{id}', ['as' => 'admin.slideshow.delete', 'uses' => 'Admin\SlideShowController@destroy']);
        /* end slideshow */

        /* missions */
        Route::get('admin/missions/index', ['as' => 'admin.missions.index', 'uses' => 'Admin\MissionsController@list']);
        Route::get('admin/missions/show/{id}', ['as' => 'admin.missions.show', 'uses' => 'Admin\MissionsController@show']);

        Route::get('admin/missions/create', ['as' => 'admin.missions.create', 'uses' => 'Admin\MissionsController@create']);
        Route::post('admin/missions/store', ['as' => 'admin.missions.store', 'uses' => 'Admin\MissionsController@store']);

        Route::get('admin/missions/edit/{id}', ['as' => 'admin.missions.edit', 'uses' => 'Admin\MissionsController@edit']);
        Route::put('admin/missions/update/{id}', ['as' => 'admin.missions.update', 'uses' => 'Admin\MissionsController@update']);

        Route::get('admin/missions/delete/{id}', ['as' => 'admin.missions.delete', 'uses' => 'Admin\MissionsController@destroy']);
        /* end missions */


        /* news */
        Route::get('admin/news/index', ['as' => 'admin.news.index', 'uses' => 'Admin\NewsController@list']);
        Route::get('admin/news/show/{id}', ['as' => 'admin.news.show', 'uses' => 'Admin\NewsController@show']);

        Route::get('admin/news/create', ['as' => 'admin.news.create', 'uses' => 'Admin\NewsController@create']);
        Route::post('admin/news/store', ['as' => 'admin.news.store', 'uses' => 'Admin\NewsController@store']);

        Route::get('admin/news/edit/{id}', ['as' => 'admin.news.edit', 'uses' => 'Admin\NewsController@edit']);
        Route::put('admin/news/update/{id}', ['as' => 'admin.news.update', 'uses' => 'Admin\NewsController@update']);

        Route::get('admin/news/delete/{id}', ['as' => 'admin.news.delete', 'uses' => 'Admin\NewsController@destroy']);
        /* end news */

        /* vision */
        Route::get('admin/visions/index', ['as' => 'admin.visions.index', 'uses' => 'Admin\VisionsController@list']);
        Route::get('admin/visions/show/{id}', ['as' => 'admin.visions.show', 'uses' => 'Admin\VisionsController@show']);
        Route::get('admin/visions/create', ['as' => 'admin.visions.create', 'uses' => 'Admin\VisionsController@create']);
        Route::post('admin/visions/store', ['as' => 'admin.visions.store', 'uses' => 'Admin\VisionsController@store']);
        Route::get('admin/visions/edit/{id}', ['as' => 'admin.visions.edit', 'uses' => 'Admin\VisionsController@edit']);
        Route::put('admin/visions/update/{id}', ['as' => 'admin.visions.update', 'uses' => 'Admin\VisionsController@update']);
        Route::get('admin/visions/delete/{id}', ['as' => 'admin.visions.delete', 'uses' => 'Admin\VisionsController@destroy']);
        /* end vision */

        /**PerfilDirector */
        Route::get('admin/perfil-do-director/show', ['as' => 'admin.perfilDirector.show', 'uses' => 'Admin\PerfilDirectorController@show']);
        Route::get('admin/perfil-do-director/edit/{id}', ['as' => 'admin.perfilDirector.edit', 'uses' => 'Admin\PerfilDirectorController@edit']);
        Route::put('admin/perfil-do-director/update/{id}', ['as' => 'admin.perfilDirector.update', 'uses' => 'Admin\PerfilDirectorController@update']);
        /**PerfilDirector */

        /* annonce */
        Route::get('admin/annonce/index', ['as' => 'admin.annonce.index', 'uses' => 'Admin\AnnonceController@list']);
        Route::get('admin/annonce/show/{id}', ['as' => 'admin.annonce.show', 'uses' => 'Admin\AnnonceController@show']);

        Route::get('admin/annonce/create', ['as' => 'admin.annonce.create', 'uses' => 'Admin\AnnonceController@create']);
        Route::post('admin/annonce/store', ['as' => 'admin.annonce.store', 'uses' => 'Admin\AnnonceController@store']);

        Route::get('admin/annonce/edit/{id}', ['as' => 'admin.annonce.edit', 'uses' => 'Admin\AnnonceController@edit']);
        Route::put('admin/annonce/update/{id}', ['as' => 'admin.annonce.update', 'uses' => 'Admin\AnnonceController@update']);

        Route::get('admin/annonce/delete/{id}', ['as' => 'admin.annonce.delete', 'uses' => 'Admin\AnnonceController@destroy']);
        /* end annonce */

        /* Events */
        Route::get('admin/event/index', ['as' => 'admin.event.index', 'uses' => 'Admin\EventController@list']);
        Route::get('admin/event/show/{id}', ['as' => 'admin.event.show', 'uses' => 'Admin\EventController@show']);
        Route::get('admin/event/create', ['as' => 'admin.event.create', 'uses' => 'Admin\EventController@create']);
        Route::post('admin/event/store', ['as' => 'admin.event.store', 'uses' => 'Admin\EventController@store']);
        Route::get('admin/event/edit/{id}', ['as' => 'admin.event.edit', 'uses' => 'Admin\EventController@edit']);
        Route::put('admin/event/update/{id}', ['as' => 'admin.event.update', 'uses' => 'Admin\EventController@update']);
        Route::get('admin/event/delete/{id}', ['as' => 'admin.event.delete', 'uses' => 'Admin\EventController@destroy']);
        /* end Events */


        /**Governing Bodies */
        Route::get('admin/orgaos-directivos/index', ['as' => 'admin.governingBodie.index', 'uses' => 'Admin\GoverningBodieController@list']);
        Route::get('admin/orgaos-directivos/show/{id}', ['as' => 'admin.governingBodie.show', 'uses' => 'Admin\GoverningBodieController@show']);

        Route::get('admin/orgaos-directivos/create', ['as' => 'admin.governingBodie.create', 'uses' => 'Admin\GoverningBodieController@create']);
        Route::post('admin/orgaos-directivos/store', ['as' => 'admin.governingBodie.store', 'uses' => 'Admin\GoverningBodieController@store']);

        Route::get('admin/orgaos-directivos/edit/{id}', ['as' => 'admin.governingBodie.edit', 'uses' => 'Admin\GoverningBodieController@edit']);
        Route::put('admin/orgaos-directivos/update/{id}', ['as' => 'admin.governingBodie.update', 'uses' => 'Admin\GoverningBodieController@update']);

        Route::get('admin/orgaos-directivos/delete/{id}', ['as' => 'admin.governingBodie.delete', 'uses' => 'Admin\GoverningBodieController@destroy']);
        /**End Governing Bodies */


        /**Former Director Start */
        Route::get('admin/ex-directores/index', ['as' => 'admin.formerDirector.index', 'uses' => 'Admin\FormerDirectorController@list']);
        Route::get('admin/ex-directores/show/{id}', ['as' => 'admin.formerDirector.show', 'uses' => 'Admin\FormerDirectorController@show']);

        Route::get('admin/ex-directores/create', ['as' => 'admin.formerDirector.create', 'uses' => 'Admin\FormerDirectorController@create']);
        Route::post('admin/ex-directores/store', ['as' => 'admin.formerDirector.store', 'uses' => 'Admin\FormerDirectorController@store']);

        Route::get('admin/ex-directores/edit/{id}', ['as' => 'admin.formerDirector.edit', 'uses' => 'Admin\FormerDirectorController@edit']);
        Route::put('admin/ex-directores/update/{id}', ['as' => 'admin.formerDirector.update', 'uses' => 'Admin\FormerDirectorController@update']);

        Route::get('admin/ex-directores/delete/{id}', ['as' => 'admin.formerDirector.delete', 'uses' => 'Admin\FormerDirectorController@destroy']);
        /**Former Director End */


        /**Normative Start */
        Route::get('admin/normativos/index', ['as' => 'admin.normative.index', 'uses' => 'Admin\NormativeController@list']);
        Route::get('admin/normativos/show/{id}', ['as' => 'admin.normative.show', 'uses' => 'Admin\NormativeController@show']);

        Route::get('admin/normativos/create', ['as' => 'admin.normative.create', 'uses' => 'Admin\NormativeController@create']);
        Route::post('admin/normativos/store', ['as' => 'admin.normative.store', 'uses' => 'Admin\NormativeController@store']);

        Route::get('admin/normativos/edit/{id}', ['as' => 'admin.normative.edit', 'uses' => 'Admin\NormativeController@edit']);
        Route::put('admin/normativos/update/{id}', ['as' => 'admin.normative.update', 'uses' => 'Admin\NormativeController@update']);

        Route::get('admin/normativos/delete/{id}', ['as' => 'admin.normative.delete', 'uses' => 'Admin\NormativeController@destroy']);
        /**Normative End */



            /**Normative Start */
            Route::get('admin/matricula/index', ['as' => 'admin.registration.index', 'uses' => 'Admin\RegistrationController@list']);
            Route::get('admin/matricula/show/{id}', ['as' => 'admin.registration.show', 'uses' => 'Admin\RegistrationController@show']);

            Route::get('admin/matricula/create', ['as' => 'admin.registration.create', 'uses' => 'Admin\RegistrationController@create']);
            Route::post('admin/matricula/store', ['as' => 'admin.registration.store', 'uses' => 'Admin\RegistrationController@store']);

            Route::get('admin/matricula/edit/{id}', ['as' => 'admin.registration.edit', 'uses' => 'Admin\RegistrationController@edit']);
            Route::put('admin/matricula/update/{id}', ['as' => 'admin.registration.update', 'uses' => 'Admin\RegistrationController@update']);

            Route::get('admin/matricula/delete/{id}', ['as' => 'admin.registration.delete', 'uses' => 'Admin\RegistrationController@destroy']);
            /**Normative End */





        /* serviços */
        Route::get('admin/serviços/index', ['as' => 'admin.services.index', 'uses' => 'Admin\ServicesController@index']);
        Route::get('admin/serviços/show/{id}', ['as' => 'admin.services.show', 'uses' => 'Admin\ServicesController@show']);
        Route::get('admin/serviços/create', ['as' => 'admin.services.create', 'uses' => 'Admin\ServicesController@create']);
        Route::post('admin/serviços/store', ['as' => 'admin.services.store', 'uses' => 'Admin\ServicesController@store']);
        Route::get('admin/serviços/edit/{id}', ['as' => 'admin.services.edit', 'uses' => 'Admin\ServicesController@edit']);
        Route::put('admin/serviços/update/{id}', ['as' => 'admin.services.update', 'uses' => 'Admin\ServicesController@update']);
        Route::get('admin/serviços/delete/{id}', ['as' => 'admin.services.delete', 'uses' => 'Admin\ServicesController@destroy']);
        /* end serviços */


        /* serviços */
        Route::get('admin/quadro-honra/index', ['as' => 'admin.honorBoard.index', 'uses' => 'Admin\HonorBoardController@index']);
        Route::get('admin/quadro-honra/show/{id}', ['as' => 'admin.honorBoard.show', 'uses' => 'Admin\HonorBoardController@show']);
        Route::get('admin/quadro-honra/create', ['as' => 'admin.honorBoard.create', 'uses' => 'Admin\HonorBoardController@create']);
        Route::post('admin/quadro-honra/store', ['as' => 'admin.honorBoard.store', 'uses' => 'Admin\HonorBoardController@store']);
        Route::get('admin/quadro-honra/edit/{id}', ['as' => 'admin.honorBoard.edit', 'uses' => 'Admin\HonorBoardController@edit']);
        Route::put('admin/quadro-honra/update/{id}', ['as' => 'admin.honorBoard.update', 'uses' => 'Admin\HonorBoardController@update']);
        Route::get('admin/quadro-honra/delete/{id}', ['as' => 'admin.honorBoard.delete', 'uses' => 'Admin\HonorBoardController@destroy']);
        /* end serviços */

        /* parceiros */
        Route::get('admin/parceiros/index', ['as' => 'admin.partner.index', 'uses' => 'Admin\PartnersController@index']);
        Route::get('admin/parceiros/show/{id}', ['as' => 'admin.partner.show', 'uses' => 'Admin\PartnersController@show']);
        Route::get('admin/parceiros/create', ['as' => 'admin.partner.create', 'uses' => 'Admin\PartnersController@create']);
        Route::post('admin/parceiros/store', ['as' => 'admin.partner.store', 'uses' => 'Admin\PartnersController@store']);
        Route::get('admin/parceiros/edit/{id}', ['as' => 'admin.partner.edit', 'uses' => 'Admin\PartnersController@edit']);
        Route::put('admin/parceiros/update/{id}', ['as' => 'admin.partner.update', 'uses' => 'Admin\PartnersController@update']);
        Route::get('admin/parceiros/delete/{id}', ['as' => 'admin.partner.delete', 'uses' => 'Admin\PartnersController@destroy']);
        /* end parceiros */



        /* cursos */
        Route::get('admin/curso/index', ['as' => 'admin.course.index', 'uses' => 'Admin\CourseController@index']);
        Route::get('admin/curso/show/{id}', ['as' => 'admin.course.show', 'uses' => 'Admin\CourseController@show']);
        Route::get('admin/curso/create', ['as' => 'admin.course.create', 'uses' => 'Admin\CourseController@create']);
        Route::post('admin/curso/store', ['as' => 'admin.course.store', 'uses' => 'Admin\CourseController@store']);
        Route::get('admin/curso/edit/{id}', ['as' => 'admin.course.edit', 'uses' => 'Admin\CourseController@edit']);
        Route::put('admin/curso/update/{id}', ['as' => 'admin.course.update', 'uses' => 'Admin\CourseController@update']);
        Route::get('admin/curso/delete/{id}', ['as' => 'admin.course.delete', 'uses' => 'Admin\CourseController@destroy']);
        /* end cursos */


        /* Oferta Formativa */
        Route::get('admin/oferta-formativa/show/{id}', ['as' => 'admin.subCourse.show', 'uses' => 'Admin\SubCourseController@show']);
        Route::get('admin/oferta-formativa/create/{id}', ['as' => 'admin.subCourse.create', 'uses' => 'Admin\SubCourseController@create']);
        Route::post('admin/oferta-formativa/store/{id}', ['as' => 'admin.subCourse.store', 'uses' => 'Admin\SubCourseController@store']);
        Route::get('admin/oferta-formativa/edit/{id}', ['as' => 'admin.subCourse.edit', 'uses' => 'Admin\SubCourseController@edit']);
        Route::put('admin/oferta-formativa/update/{id}', ['as' => 'admin.subCourse.update', 'uses' => 'Admin\SubCourseController@update']);
        Route::get('admin/oferta-formativa/delete/{id}', ['as' => 'admin.subCourse.delete', 'uses' => 'Admin\SubCourseController@destroy']);
        /* end Oferta Formativa */




        /* about */
        Route::get('admin/about/show', ['as' => 'admin.about.show', 'uses' => 'Admin\AboutController@show']);
        Route::get('admin/about/edit/{id}', ['as' => 'admin.about.edit', 'uses' => 'Admin\AboutController@edit']);
        Route::put('admin/about/update/{id}', ['as' => 'admin.about.update', 'uses' => 'Admin\AboutController@update']);
        /* end about */


         /* about */
         Route::get('admin/sobre-o-percurso/show', ['as' => 'admin.aboutRoute.show', 'uses' => 'Admin\AboutRoutesController@show']);
         Route::get('admin/sobre-o-percurso/edit/{id}', ['as' => 'admin.aboutRoute.edit', 'uses' => 'Admin\AboutRoutesController@edit']);
         Route::put('admin/sobre-o-percurso/update/{id}', ['as' => 'admin.aboutRoute.update', 'uses' => 'Admin\AboutRoutesController@update']);
         /* end about */

        /* route Start */
        Route::get('admin/percurso/index', ['as' => 'admin.route.index', 'uses' => 'Admin\RouteController@list']);
        Route::get('admin/percurso/show/{id}', ['as' => 'admin.route.show', 'uses' => 'Admin\RouteController@show']);
        Route::get('admin/percurso/create', ['as' => 'admin.route.create', 'uses' => 'Admin\RouteController@create']);
        Route::post('admin/percurso/store', ['as' => 'admin.route.store', 'uses' => 'Admin\RouteController@store']);
        Route::get('admin/percurso/edit/{id}', ['as' => 'admin.route.edit', 'uses' => 'Admin\RouteController@edit']);
        Route::put('admin/percurso/update/{id}', ['as' => 'admin.route.update', 'uses' => 'Admin\RouteController@update']);
        Route::get('admin/percurso/delete/{id}', ['as' => 'admin.route.delete', 'uses' => 'Admin\RouteController@destroy']);
        /*route End*/


        /*AfilliatedSchools Start*/
        Route::get('admin/escolas-filiadas/index', ['as' => 'admin.affiliatedSchools.index', 'uses' => 'Admin\AffiliatedSchoolsController@list']);
        Route::get('admin/escolas-filiadas/show/{id}', ['as' => 'admin.affiliatedSchools.show', 'uses' => 'Admin\AffiliatedSchoolsController@show']);
        Route::get('admin/escolas-filiadas/create', ['as' => 'admin.affiliatedSchools.create', 'uses' => 'Admin\AffiliatedSchoolsController@create']);
        Route::post('admin/escolas-filiadas/store', ['as' => 'admin.affiliatedSchools.store', 'uses' => 'Admin\AffiliatedSchoolsController@store']);
        Route::get('admin/escolas-filiadas/edit/{id}', ['as' => 'admin.affiliatedSchools.edit', 'uses' => 'Admin\AffiliatedSchoolsController@edit']);
        Route::put('admin/escolas-filiadas/update/{id}', ['as' => 'admin.affiliatedSchools.update', 'uses' => 'Admin\AffiliatedSchoolsController@update']);
        Route::get('admin/escolas-filiadas/delete/{id}', ['as' => 'admin.affiliatedSchools.delete', 'uses' => 'Admin\AffiliatedSchoolsController@destroy']);
        /*AfilliatedSchools End */

        /* Donation */
        Route::get('admin/doacoes/show', ['as' => 'admin.donation.show', 'uses' => 'Admin\DonationController@show']);
        Route::get('admin/doacoes/create', ['as' => 'admin.donation.create', 'uses' => 'Admin\DonationController@create']);
        Route::put('admin/doacoes/update/{id}', ['as' => 'admin.donation.update', 'uses' => 'Admin\DonationController@update']);
        /* end donation */

        /* configuration */
        Route::get('admin/configuration/show', ['as' => 'admin.configuration.show', 'uses' => 'Admin\ConfigurationController@show']);

        Route::get('admin/configuration/edit/{id}', ['as' => 'admin.configuration.edit', 'uses' => 'Admin\ConfigurationController@edit']);
        Route::put('admin/configuration/update/{id}', ['as' => 'admin.configuration.update', 'uses' => 'Admin\ConfigurationController@update']);
        /* end configuration */
    });
});
