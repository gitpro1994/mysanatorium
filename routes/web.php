<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\{
    AdminController,
    CountriesController,
    CitiesController,
    CompanyController,
    CurrencyController,
    TransferCompaniesController,
    RoutesModelController,
    RouteLinesController,
    TreatmentDirectionsController,
    RoomConditionsController,
    RoomElementsController,
    RoomKindsController,
    MedicalBaseController,
    MedicalBaseElementsController,
    SanatoriumFeaturesController,
    SanatoriumFeaturesElementsController,
    TreatmentRoomsController,
    FoodTypesController,
    ViewFromRoomController,
    TreatmentPackageController,
    SanatoriumsController,
    CreditCardsController,
    DiscountController
};
use Illuminate\Support\Facades\Redirect;

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

Route::controller(PageController::class)->group(function () {

    Route::get('/', 'welcome')->name('welcome');
    Route::get('/about', 'about')->name('about');
    Route::get('/team', 'team')->name('team');
    Route::get('/faq', 'faq')->name('faq');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/treaty', 'treaty')->name('treaty');
    Route::get('/how-to-choose-right-resort', 'choose_right_resort')->name('choose_right_resort');
    Route::get('/balneology-consultation', 'balneology_consultation')->name('balneology_consultation');
    Route::get('/visa-support', 'visa_support')->name('visa_support');
    Route::get('/transfer', 'transfer')->name('transfer');

    Route::get('/{treatment_id}/treatment', 'treatment_specialization')->name('treatment_specialization');
    Route::group(['prefix' => 'sanatoriums'], function () {
        Route::get('/{country_slug}/{city_slug}/', 'city_sanatoriums')->name('city_sanatoriums');
        Route::get('/{id}/', 'sanatorium_details')->name('sanatorium_details');

        Route::post('/selected-sanatoriums', 'selected_sanatoriums')->name('selected_sanatoriums');
        Route::post('/gss', 'gss');
    });
});

// Route::any('{url}', function(){
//     return Redirect::back();
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::view('/login', 'admin.login')->name('admin.login');
        Route::post('/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::post('/profile/{id}/update', [AdminController::class, 'update'])->name('admin.profile.update');
        Route::post('/profile/{id}/update_pi', [AdminController::class, 'update_pi'])->name('admin.profile.update_pi');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

        Route::controller(CountriesController::class)->group(function () {
            Route::group(['prefix' => 'countries'], function () {
                Route::get('/', 'index')->name('admin.countries');
                Route::get('/create', 'create')->name('admin.countries.create');
                Route::post('/store', 'store')->name('admin.countries.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.countries.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.countries.edit');
                Route::post('/{id}/update', 'update')->name('admin.countries.update');
                Route::get('/deleted', 'deleted_countries')->name('admin.countries.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.countries.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.countries.check_status');
            });
        });

        Route::controller(CitiesController::class)->group(function () {
            Route::group(['prefix' => 'cities'], function () {
                Route::get('/', 'index')->name('admin.cities');
                Route::get('/create', 'create')->name('admin.cities.create');
                Route::post('/store', 'store')->name('admin.cities.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.cities.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.cities.edit');
                Route::post('/{id}/update', 'update')->name('admin.cities.update');
                Route::get('/deleted', 'deleted_cities')->name('admin.cities.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.cities.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.cities.check_status');
            });
        });

        Route::controller(CompanyController::class)->group(function () {
            Route::group(['prefix' => 'companies'], function () {
                Route::get('/', 'index')->name('admin.companies');
                Route::get('/create', 'create')->name('admin.companies.create');
                Route::post('/store', 'store')->name('admin.companies.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.companies.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.companies.edit');
                Route::post('/{id}/update', 'update')->name('admin.companies.update');
                Route::get('/deleted', 'deleted_companies')->name('admin.companies.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.companies.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.companies.check_status');
            });
        });

        Route::controller(TransferCompaniesController::class)->group(function () {
            Route::group(['prefix' => 'transfer-companies'], function () {
                Route::get('/', 'index')->name('admin.transfer-companies');
                Route::get('/create', 'create')->name('admin.transfer-companies.create');
                Route::post('/store', 'store')->name('admin.transfer-companies.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.transfer-companies.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.transfer-companies.edit');
                Route::post('/{id}/update', 'update')->name('admin.transfer-companies.update');
                Route::get('/deleted', 'deleted_companies')->name('admin.transfer-companies.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.transfer-companies.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.transfer-companies.check_status');
            });
        });

        Route::controller(SanatoriumsController::class)->group(function () {
            Route::group(['prefix' => 'sanatoriums'], function () {
                Route::get('/', 'index')->name('admin.sanatoriums');
                Route::get('/create', 'create')->name('admin.sanatoriums.create');
                Route::post('/store', 'store')->name('admin.sanatoriums.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.sanatoriums.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.sanatoriums.edit');
                Route::post('/{id}/update', 'update')->name('admin.sanatoriums.update');
                Route::get('/deleted', 'deleted_sanatoriums')->name('admin.sanatoriums.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.sanatoriums.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.sanatoriums.check_status');
                Route::get('/getCities/{country_id}', 'getCities')->name('admin.sanatoriums.getCities');
                Route::post('/upload', 'upload')->name('admin.sanatoriums.upload');

                Route::get('/{sanatorium_id}/discount', 'discount')->name('admin.discount');
                Route::get('/{sanatorium_id}/penalty', 'penalty')->name('admin.penalty');
                Route::post('/{id}/penalty', 'update_penalty')->name('admin.update_penalty');


                //medical-bases
                Route::get('{sanatorium_id}/medical-bases', 'medical_bases')->name('admin.sanatoriums.medical-bases');
                Route::get('/medical-bases/{element_id}/{sanatorium_id}', 'element_available');

                //discount-options
                Route::get('/{sanatorium_id}/discount-options/create', 'doc')->name('admin.sanatoriums.discount-options.create');
                Route::get('/getDiscountOption/{discount_id}', 'getDiscountOption');
                Route::post('/discount-options/store', 'save_discount_options')->name('admin.sanatoriums.discount-options.store');

                //room-kinds
                Route::get('{sanatorium_id}/room-kinds', 'room_kinds')->name('admin.sanatoriums.room-kinds');
                Route::get('{sanatorium_id}/room-kinds/create', 'room_kinds_create')->name('admin.sanatoriums.room-kinds.create');
                Route::post('{sanatorium_id}/room-kinds/store', 'room_kinds_store')->name('admin.sanatoriums.room-kinds.store');
                Route::get('room-kinds/{id}/edit', 'edit_room_kind')->name('admin.sanatoriums.room-kinds.edit-room-kind');
                Route::post('room-kinds/{id}/update', 'update_room_kinds')->name('admin.sanatoriums.room-kinds.update');
                Route::post('/room-kinds/check_room_kinds_status/{id}', 'check_room_kinds_status');

                //credit-cards
                Route::get('{sanatorium_id}/sanatorium-credit-cards', 'sccs')->name('admin.sanatoriums.sanatorium-credit-cards');
                Route::get('{sanatorium_id}/sanatorium-credit-cards/create', 'sccs_create')->name('admin.sanatoriums.sanatorium-credit-cards.create');
                Route::post('{sanatorium_id}/sanatorium-credit-cards/store', 'sccs_store')->name('admin.sanatoriums.sanatorium-credit-cards.store');
                Route::get('sanatorium-credit-cards/{sanatorium_id}/{card_id}/edit', 'edit_sccs')->name('admin.sanatoriums.sanatorium-credit-cards.edit-sanatorium-credit-cards');
                Route::post('sanatorium-credit-cards/{sanatorium_id}/{card_id}/update', 'update_sccs')->name('admin.sanatoriums.sanatorium-credit-cards.update-sanatorium-credit-cards');
                Route::post('/sanatorium-credit-cards/check_status/{id}', 'check_credit_cards_status')->name('admin.sanatoriums.credit_cards_status');

                //wizarts
                Route::get('{sanatorium_id}/wizarts', 'wizarts')->name('admin.sanatoriums.wizarts');
                Route::post('wizarts/{sanatorium_id}/wizart-save', 'wizart_save')->name('admin.sanatoriums.wizarts.wizart-save');
                Route::post('wizarts/change_room_count/{sanatorium_id}/{room_kinds_id}/{value}', 'change_room_count');
                Route::post('wizarts/change_general_human_count/{sanatorium_id}/{room_kinds_id}/{value}', 'change_general_human_count');
                Route::post('wizarts/change_minimum_human_count/{sanatorium_id}/{room_kinds_id}/{value}', 'change_minimum_human_count');
                Route::post('wizarts/change_older_count/{sanatorium_id}/{room_kinds_id}/{value}', 'change_older_count');
                Route::post('wizarts/change_child_count/{sanatorium_id}/{room_kinds_id}/{value}', 'change_child_count');
                Route::post('wizarts/change_possible_additional_beds/{sanatorium_id}/{room_kinds_id}/{value}', 'change_possible_additional_beds');
                Route::post('wizarts/change_for_beds/{sanatorium_id}/{room_kinds_id}/{value}', 'change_for_beds');

                //children-age
                Route::get('{sanatorium_id}/children', 'children')->name('admin.sanatoriums.children');
                Route::post('stchild/{sanatorium_id}/store', 'stchild_store')->name('admin.sanatoriums.stchild.store');
                Route::post('stoutchild/{sanatorium_id}/store', 'stoutchild_store')->name('admin.sanatoriums.stoutchild.store');

                //comments
                Route::get('{sanatorium_id}/comments', 'comments')->name('admin.sanatoriums.comments');
                Route::get('{sanatorium_id}/comments/create', 'comments_create')->name('admin.sanatoriums.comments.create');
                Route::post('{sanatorium_id}/comments/store', 'comments_store')->name('admin.sanatoriums.comments.store');
                Route::get('/comments/{sanatorium_id}/{comment_id}/edit', 'comments_edit')->name('admin.sanatoriums.comments.edit-comments');
                Route::post('/comments/{comment_id}/update', 'comments_update')->name('admin.sanatoriums.comments.update-comments');
                Route::post('/comments/check_status/{id}', 'check_comments_status')->name('admin.sanatoriums.comments_status');

                //price
                Route::get('{sanatorium_id}/price', 'price')->name('admin.sanatoriums.price');
                Route::post('/get-calendar/{sanatorium_id}', 'get_calendar')->name('admin.get_calendar');

                //room-status
                Route::get('{sanatorium_id}/room-status', 'room_status')->name('admin.sanatoriums.room-status');

                //room-price
                Route::post('/save-price/', 'save_price')->name('admin.sanatoriums.save-price');
                Route::post('/save-special-price/', 'save_special_price')->name('admin.sanatoriums.save-special-price');
            });
        });

        Route::controller(RoutesModelController::class)->group(function () {
            Route::group(['prefix' => 'transfer-companies/routes'], function () {
                Route::get('/{country_id}', 'list')->name('admin.routes');
                Route::get('/create', 'create')->name('admin.routes.create');
                Route::post('/store', 'store')->name('admin.routes.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.routes.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.routes.edit');
                Route::post('/{id}/update', 'update')->name('admin.routes.update');
                Route::get('/deleted', 'deleted_routes')->name('admin.routes.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.routes.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.routes.check_status');
            });
        });

        Route::controller(RouteLinesController::class)->group(function () {
            Route::group(['prefix' => 'transfer-companies/route-lines'], function () {
                Route::get('/{company_id}', 'list')->name('admin.route-lines');
                Route::get('/create', 'create')->name('admin.route-lines.create');
                Route::post('/store', 'store')->name('admin.route-lines.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.route-lines.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.route-lines.edit');
                Route::post('/{id}/update', 'update')->name('admin.route-lines.update');
                Route::get('/deleted', 'deleted_route_lines')->name('admin.route-lines.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.route-lines.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.route-lines.check_status');
            });
        });

        Route::controller(TreatmentDirectionsController::class)->group(function () {
            Route::group(['prefix' => 'sanatorium-properties/treatment-directions'], function () {
                Route::get('/', 'index')->name('admin.treatment-directions');
                Route::get('/create', 'create')->name('admin.treatment-directions.create');
                Route::post('/store', 'store')->name('admin.treatment-directions.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.treatment-directions.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.treatment-directions.edit');
                Route::post('/{id}/update', 'update')->name('admin.treatment-directions.update');
                Route::get('/deleted', 'deleted_td')->name('admin.treatment-directions.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.treatment-directions.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.treatment-directions.check_status');
            });
        });

        Route::controller(RoomConditionsController::class)->group(function () {
            Route::group(['prefix' => 'sanatorium-properties/room-conditions'], function () {
                Route::get('/', 'index')->name('admin.room-conditions');
                Route::get('/create', 'create')->name('admin.room-conditions.create');
                Route::post('/store', 'store')->name('admin.room-conditions.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.room-conditions.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.room-conditions.edit');
                Route::post('/{id}/update', 'update')->name('admin.room-conditions.update');
                Route::get('/deleted', 'deleted_room_conditions')->name('admin.room-conditions.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.room-conditions.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.room-conditions.check_status');
            });
        });

        Route::controller(RoomElementsController::class)->group(function () {
            Route::group(['prefix' => 'sanatorium-properties/room-conditions/elements'], function () {
                Route::get('/{room_condition_id}', 'list')->name('admin.elements');
                Route::get('/{room_condition_id}/create', 'create')->name('admin.elements.create');
                Route::post('/store', 'store')->name('admin.elements.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.elements.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.elements.edit');
                Route::post('/{id}/update', 'update')->name('admin.elements.update');
                Route::get('/deleted', 'deleted_room_elements')->name('admin.elements.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.elements.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.elements.check_status');
            });
        });

        Route::controller(RoomKindsController::class)->group(function () {
            Route::group(['prefix' => 'sanatorium-properties/room-kinds'], function () {
                Route::get('/', 'index')->name('admin.room-kinds');
                Route::get('/create', 'create')->name('admin.room-kinds.create');
                Route::post('/store', 'store')->name('admin.room-kinds.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.room-kinds.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.room-kinds.edit');
                Route::post('/{id}/update', 'update')->name('admin.room-kinds.update');
                Route::get('/deleted', 'deleted_room_elements')->name('admin.room-kinds.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.room-kinds.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.room-kinds.check_status');
            });
        });

        Route::controller(MedicalBaseController::class)->group(function () {
            Route::group(['prefix' => 'sanatorium-properties/medical-base'], function () {
                Route::get('/', 'index')->name('admin.medical-base');
                Route::get('/create', 'create')->name('admin.medical-base.create');
                Route::post('/store', 'store')->name('admin.medical-base.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.medical-base.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.medical-base.edit');
                Route::post('/{id}/update', 'update')->name('admin.medical-base.update');
                Route::get('/deleted', 'deleted_medical_base')->name('admin.medical-base.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.medical-base.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.medical-base.check_status');
                Route::post('/upload', 'upload')->name('admin.medical-base.upload');
            });
        });

        Route::controller(MedicalBaseElementsController::class)->group(function () {
            Route::group(['prefix' => 'sanatorium-properties/medical-base/medical-base-elements'], function () {
                Route::get('/{medical_bases_id}', 'list')->name('admin.medical-base-elements');
                Route::get('/{medical_bases_id}/create', 'create')->name('admin.medical-base-elements.create');
                Route::post('/store', 'store')->name('admin.medical-base-elements.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.medical-base-elements.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.medical-base-elements.edit');
                Route::post('/{id}/update', 'update')->name('admin.medical-base-elements.update');
                Route::get('/deleted', 'deleted_features')->name('admin.medical-base-elements.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.medical-base-elements.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.medical-base-elements.check_status');
            });
        });



        Route::controller(SanatoriumFeaturesController::class)->group(function () {
            Route::group(['prefix' => 'sanatorium-properties/sanatorium-features'], function () {
                Route::get('/', 'index')->name('admin.sanatorium-features');
                Route::get('/create', 'create')->name('admin.sanatorium-features.create');
                Route::post('/store', 'store')->name('admin.sanatorium-features.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.sanatorium-features.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.sanatorium-features.edit');
                Route::post('/{id}/update', 'update')->name('admin.sanatorium-features.update');
                Route::get('/deleted', 'deleted_medical_base')->name('admin.sanatorium-features.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.sanatorium-features.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.sanatorium-features.check_status');
            });
        });

        Route::controller(SanatoriumFeaturesElementsController::class)->group(function () {
            Route::group(['prefix' => 'sanatorium-properties/sanatorium-features/sanatorium-elements'], function () {
                Route::get('/{sanatorium_features_id}/', 'list')->name('admin.sanatorium-elements');
                Route::get('/{sanatorium_features_id}/create', 'create')->name('admin.sanatorium-elements.create');
                Route::post('/store', 'store')->name('admin.sanatorium-elements.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.sanatorium-elements.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.sanatorium-elements.edit');
                Route::post('/{id}/update', 'update')->name('admin.sanatorium-elements.update');
                Route::get('/deleted', 'deleted_medical_base')->name('admin.sanatorium-elements.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.sanatorium-elements.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.sanatorium-elements.check_status');
            });
        });

        Route::controller(TreatmentRoomsController::class)->group(function () {
            Route::group(['prefix' => 'sanatorium-properties/treatment-rooms'], function () {
                Route::get('/', 'index')->name('admin.treatment-rooms');
                Route::get('/create', 'create')->name('admin.treatment-rooms.create');
                Route::post('/store', 'store')->name('admin.treatment-rooms.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.treatment-rooms.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.treatment-rooms.edit');
                Route::post('/{id}/update', 'update')->name('admin.treatment-rooms.update');
                Route::get('/deleted', 'deleted_tr')->name('admin.treatment-rooms.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.treatment-rooms.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.treatment-rooms.check_status');
            });
        });

        Route::controller(FoodTypesController::class)->group(function () {
            Route::group(['prefix' => 'sanatorium-properties/food-types'], function () {
                Route::get('/', 'index')->name('admin.food-types');
                Route::get('/create', 'create')->name('admin.food-types.create');
                Route::post('/store', 'store')->name('admin.food-types.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.food-types.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.food-types.edit');
                Route::post('/{id}/update', 'update')->name('admin.food-types.update');
                Route::get('/deleted', 'deleted_tr')->name('admin.food-types.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.food-types.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.food-types.check_status');
            });
        });

        Route::controller(ViewFromRoomController::class)->group(function () {
            Route::group(['prefix' => 'sanatorium-properties/view-from-rooms'], function () {
                Route::get('/', 'index')->name('admin.view-from-rooms');
                Route::get('/create', 'create')->name('admin.view-from-rooms.create');
                Route::post('/store', 'store')->name('admin.view-from-rooms.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.view-from-rooms.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.view-from-rooms.edit');
                Route::post('/{id}/update', 'update')->name('admin.view-from-rooms.update');
                Route::get('/deleted', 'deleted_tr')->name('admin.view-from-rooms.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.view-from-rooms.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.view-from-rooms.check_status');
            });
        });

        Route::controller(TreatmentPackageController::class)->group(function () {
            Route::group(['prefix' => 'sanatorium-properties/treatment-package'], function () {
                Route::get('/', 'index')->name('admin.treatment-package');
                Route::get('/create', 'create')->name('admin.treatment-package.create');
                Route::post('/store', 'store')->name('admin.treatment-package.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.treatment-package.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.treatment-package.edit');
                Route::post('/{id}/update', 'update')->name('admin.treatment-package.update');
                Route::get('/deleted', 'deleted_tp')->name('admin.treatment-package.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.treatment-package.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.treatment-package.check_status');
            });
        });

        Route::controller(CurrencyController::class)->group(function () {
            Route::group(['prefix' => 'settings/currencies'], function () {
                Route::get('/', 'index')->name('admin.currencies');
                Route::get('/create', 'create')->name('admin.currencies.create');
                Route::post('/store', 'store')->name('admin.currencies.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.currencies.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.currencies.edit');
                Route::post('/{id}/update', 'update')->name('admin.currencies.update');
                Route::get('/deleted', 'deleted_currencies')->name('admin.currencies.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.currencies.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.currencies.check_status');
            });
        });

        Route::controller(DiscountController::class)->group(function () {
            Route::group(['prefix' => 'discounts'], function () {
                Route::get('/', 'index')->name('admin.discounts');
                Route::get('/create', 'create')->name('admin.discounts.create');
                Route::post('/store', 'store')->name('admin.discounts.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.discounts.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.discounts.edit');
                Route::post('/{id}/update', 'update')->name('admin.discounts.update');
                Route::get('/deleted', 'deleted_discounts')->name('admin.discounts.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.discounts.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.discounts.check_status');
            });
        });

        Route::controller(CreditCardsController::class)->group(function () {
            Route::group(['prefix' => 'settings/credit-cards'], function () {
                Route::get('/', 'index')->name('admin.credit-cards');
                Route::get('/create', 'create')->name('admin.credit-cards.create');
                Route::post('/store', 'store')->name('admin.credit-cards.store');
                Route::any('/{id}/destroy', 'destroy')->name('admin.credit-cards.destroy');
                Route::get('/{id}/edit', 'edit')->name('admin.credit-cards.edit');
                Route::post('/{id}/update', 'update')->name('admin.credit-cards.update');
                Route::get('/deleted', 'deleted_cards')->name('admin.credit-cards.deleted');
                Route::get('/{id}/restore', 'restore')->name('admin.credit-cards.restore');
                Route::post('/check_status/{id}', 'check_status')->name('admin.credit-cards.check_status');
            });
        });
    });
});
