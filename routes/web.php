<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bus_comp_Controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/brand', [App\Http\Controllers\bus_comp_Controller::class, 'index'])->name('brand');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::POST('BrandAddTicketSubmit','App\Http\Controllers\BrandTicketPublishedController@BrandAddTicketSubmit');
Route::POST('BrandDeleteTicketSubmit','App\Http\Controllers\BrandTicketPublishedController@BrandDeleteTicketSubmit');

Route::get('/edit_ticket', [App\Http\Controllers\EditTicketsController::class, 'funcEditTickets'])->name('edit_ticket');
Route::POST('funcSubmitEditedTickets','App\Http\Controllers\EditTicketsController@funcSubmitEditedTickets');

Route::get('bus_company_profile_edit', [App\Http\Controllers\Bus_company_profile_edit_Controller::class, 'show_profile'])->name('bus_company_profile_edit');
Route::POST('profile_update','App\Http\Controllers\Bus_company_profile_edit_Controller@profile_update');

Route::get('/profile_page', [App\Http\Controllers\profile_Controller::class, 'show_profile'])->name('profile');
Route::POST('profile_update','App\Http\Controllers\profile_Controller@profile_update');

//Shopping Feature
// use App\Http\Controllers\ShoppingItemController;

// Route::middleware('auth')->group(function () {
//     Route::get('/shopping-items', [ShoppingItemController::class, 'index'])->name('shopping-items.index');
//     Route::post('/shopping-items/{shoppingItem}/add-to-cart', [ShoppingItemController::class, 'addToCart'])->name('shopping-items.add-to-cart');
//     Route::post('/shopping-items/{shoppingItem}/remove-from-cart', [ShoppingItemController::class, 'removeFromCart'])->name('shopping-items.remove-from-cart');
// });

// // Route::post('/shopping-items/{shoppingItem}/add-to-cart', [ShoppingItemController::class, 'addToCart'])->name('shopping-items.add-to-cart');
// Route::POST('addToCart','App\Http\Controllers\ShoppingItemController@addToCart');



//Shopping Feature
use App\Http\Controllers\ShoppingItemController;
use App\Http\Controllers\CartController;

Route::middleware('auth')->group(function () {
    Route::get('/shopping-items', [ShoppingItemController::class, 'index'])->name('shopping-items.index');
    Route::post('/addToCart', [ShoppingItemController::class, 'addToCart'])->name('shopping-items.addToCart');
    Route::get('/shopping-cart', [CartController::class, 'cart'])->name('shopping-items.cart');


    // Route::get('/customersearch', [App\Http\Controllers\HomeController::class, 'customersearch'])->name('customersearch'); //parom
    // Route::post('/bookticket', [App\Http\Controllers\HomeController::class, 'bookTicket'])->name('bookticket'); //parom
    Route::POST('/brand-register', [App\Http\Controllers\BController::class, 'store'])->name('brand_register')->middleware('auth'); //parom

});


//adding items to menu
Route::get('/add_food_to_menu', [App\Http\Controllers\AddShoppingItemController::class, 'showMenu'])->name('add_food_to_menu');
Route::POST('addToMenu','App\Http\Controllers\AddShoppingItemController@addToMenu');

//ends adding items to menu


//ranking show
Route::get('/ranking', [App\Http\Controllers\ShowAllBusCompForRanking::class, 'show'])->name('ranking');
Route::POST('rating_of_bus_comp','App\Http\Controllers\ShowAllBusCompForRanking@select_rating'); //pressing the ranking button


Route::POST('submit_rating','App\Http\Controllers\ShowAllBusCompForRanking@give_rating'); //pressing the submit button




// showing all tickets
Route::get('/buy_ticket', [App\Http\Controllers\BuyTicket::class, 'showTickets'])->name('buy_ticket');
Route::POST('buy_ticket','App\Http\Controllers\BuyTicket@showTickets'); //pressing the search button 
Route::POST('BuyingTheSelectedTicket','App\Http\Controllers\BuyTicket@select_seats'); //pressing the buying button 
Route::POST('submit_seat','App\Http\Controllers\BuyTicket@submitted_seat'); //pressing the submit button