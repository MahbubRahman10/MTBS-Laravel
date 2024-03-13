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





/* Facebook login */
Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');












/* User  */
Route::get('users/{id}/profile/','UserController@users');
/* User Book  */
Route::get('users/book','UserController@usersbook');
/* Edit User  */
Route::post('usersedit','UserController@usersedit');
Route::get('users/edit', function () {

    return view('users\editusers');
});
/* changepassword */
Route::post('changepassword','PasswordChangeController@changepassword');














/* Login */
Route::get('/userlogin', function () {

    return view('auth\login');
});




/* movie search  */
Route::get('moviesearch','ViewController@search');



/* Ticket PDF  */
Route::get('ticket','TicketController@ticket');








/* Contact Us */
Route::get('contactus', function () {

    return view('contact');
});





/* View Theater */
Route::get('/Theater/{name}/{t}', 'TheaterController@details');


/* Payment  */
Route::post('payment','PaymentController@payment');



/* Auth */
Route::get('register/verify/{token}', 'Auth\RegisterController@verify'); 
Route::get('/register', 'Auth\RegisterController@indexs');
Route::post('register', 'Auth\RegisterController@register');
Route::get('/EmailConfirm', function () {

		    return view('emails/confirmmessage');	

});




/* Home Page */
Route::get('/', 'IndexController@index');

/* View Movie */
Route::get('/view/{name}/{id}/{date}', 'ViewController@details');

/* Upcoming Movie details */
Route::get('movie/{name}','MovieController@viewupcomingdetails');



Route::group(['middleware' => 'revalidate'],function(){
/* Seat Booking */
Route::get('/book/{name}/{id}', 'SeatController@view');
});

/* confim Booking */
Route::post('/book/{name}/{id}/confirm', 'BookController@book');


Route::get('/book/confirm', function () {

    return view('/data');
});



Route::get('/booked', function () {

    return view('/booked');
});










/*-----------------------------------------------Admin---------------------------------------------------------*/
Route::group(['middleware' => ['auth', 'admin']], function() {

Route::get('/admin','AdminController@index');




/* Movie */
Route::get('/admin/movie', 'MovieController@viewmovie');
Route::get('/admin/addmovie', function () {
    return view('admin/addmovie');
});
Route::post('/addmovie', 'MovieController@addmovie');
/* Edit Movie */
Route::get('admin/editMovie','MovieController@editMovie');
/* Delete Movie */
Route::get('admin/deleteMovie','MovieController@deleteMovie');
/* Movie search and load data */
Route::get('/search', 'MovieController@livesearch');
Route::get('movie/loaddata','MovieController@loadData' );










/* Theater */
Route::get('/admin/theater', 'TheaterController@viewtheater');
Route::get('/admin/addtheater', function () {
    return view('admin/addtheater');
});
Route::post('/addtheater', 'TheaterController@addtheater');

/* Theater search and load data */
Route::get('/TheaterSearch', 'TheaterController@TheaterSearch');
Route::get('movie/loaddata','MovieController@loadData' );
/* Edit Theater */
Route::get('admin/editTheater','TheaterController@editTheater');
/* Delete Theater */
Route::get('admin/deleteTheater','TheaterController@deleteTheater');









/* Screens */
Route::get('/admin/screens/{id}', 'ScreensController@viewscreens');
Route::get('/admin/addscreens/{id}','ScreensController@screens');
Route::post('/addscreens', 'ScreensController@addscreens');

/* Screens search and load data */
Route::get('/ScreenSearch', 'ScreensController@ScreenSearch');
Route::get('movie/loaddata','MovieController@loadData' );
/* Edit Screens */
Route::get('admin/editScreen','ScreensController@editScreen');
/* Delete Screens */
Route::get('admin/deleteScreen','ScreensController@deleteScreen');










/* Show */
Route::get('/admin/show/{id}', 'ShowController@viewshow');
Route::get('/admin/addshow/{id}','ShowController@show');
Route::post('/addshow', 'ShowController@addshow');

/* Show search and load data */
Route::get('/ShowSearch', 'ShowController@ShowSearch');
Route::get('movie/loaddata','MovieController@loadData' );
/* Edit Show */
Route::get('admin/editShow','ShowController@editShow');
/* Delete Show */
Route::get('admin/deleteShow','ShowController@deleteShow');










/* Seat */
Route::get('/admin/seat/{id}', 'SeatController@viewseat');
Route::get('/admin/addseat/{id}','SeatController@seat');
Route::post('/addseat', 'SeatController@addseat');

/* Seat search and load data */
Route::get('/SeatSearch', 'SeatController@SeatSearch');
Route::get('movie/loaddata','MovieController@loadData' );
/* Edit Seat */
Route::get('admin/editSeat','SeatController@editSeat');
/* Delete Seat */
Route::get('admin/deleteSeat','SeatController@deleteSeat');












/* SeatDistribution */
Route::get('/admin/seatdistribution/{id}', 'SeatdistributionController@viewseat');
Route::get('/admin/addseatcategory/{id}','SeatdistributionController@seatdistribution');
Route::post('/addseatcategory', 'SeatdistributionController@addseatcategory');

/* SeatDistribution search and load data */
Route::get('/SeatdistributionSearch', 'SeatdistributionController@SeatdistributionSearch');
Route::get('movie/loaddata','MovieController@loadData' );
/* Edit Screens */
Route::get('admin/editSeatdistribution','SeatdistributionController@editSeatdistribution');
/* Delete Screens */
Route::get('admin/deleteSeatdistribution','SeatdistributionController@deleteSeatdistribution');















/* Book */
Route::get('/admin/book', 'BookController@showbook');
/* Book search and load data */
Route::get('/BookSearch', 'BookController@BookSearch');

Route::get('admin/StatusBook','BookController@StatusBook');
/* Delete Book */
Route::get('admin/deleteBook','BookController@deleteBook');
/* Book search and load data */
Route::get('/UserSearch', 'UserController@UserSearch');
Route::get('admin/deleteUser','UserController@deleteUser');

















/* Upcoming Movie */
Route::get('admin/movie/upcoming','MovieController@upcomingmovie');
Route::get('/admin/addupcomingmovie', function () {
    return view('admin/addupcomingmovie');
});
Route::post('/addupcomingmovie', 'MovieController@addupcomingmovie');

Route::get('admin/editUpcomingMovie','MovieController@editUpcomingMovie');
Route::get('admin/deleteUpcomingMovie','MovieController@deleteUpcomingMovie');
Route::get('/searchmovie', 'MovieController@SearchUpcomingMovie');
Route::get('admin/addmovielist/{id}', 'MovieController@addmovielist');















/* User */
Route::get('admin/user','UserController@viewuser');








/* Slide */
Route::get('admin/slide','SlideController@view');
Route::post('admin/addslide','SlideController@addslide');
Route::get('admin/deleteslide/{id}','SlideController@delete');








/* Message */
Route::post('message', 'AdminController@message');
Route::get('/admin/message', 'AdminController@showmessage');
Route::get('admin/StatusMessage','AdminController@StatusMessage');
/* Delete Book */
Route::get('admin/deleteMessage','AdminController@deleteMessage');
Route::get('success', function () {

    return view('success');
});










/* Admin */


Route::get('admin/admin', function () {

    return view('admin\admin');
});


Route::get('admin/viewadmin','AdminController@view');




});




Auth::routes();

Route::get('/home', 'HomeController@index');










