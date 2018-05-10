<?php

/*Route::get('/', ['as' => 'home', function() {

	return view('home');
 
}]);*/


/*App\User::create([

'name' => 'Moderador',
'email' => 'mod@gmail.com',
'password' => bcrypt('123456'),
'role_id' => '2'

]);*/


Route::get('roles',function(){

return \App\Role::with('user')->get();
});


Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

//Route::get('contactanos',[ 'as' => 'contactos', 'uses' => 'PagesController@contact']);

//Route::post('contacto','PagesController@mesaje');

Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PagesController@salud'])->where('nombre',"[A-Za-z]+");

Route::resource('mensajes','MessagesController');

Route::resource('usuarios','UsersController');



/*Route::get('mensajes',['as' => 'messages.index','uses' => 'MessagesController@index']);

Route::get('mensajes/crear',['as' => 'messages.create','uses' => 'MessagesController@create']);

Route::post('mensajes',['as' => 'messages.store','uses' => 'MessagesController@store']);

Route::get('mensajes/{id}',['as' => 'messages.show','uses' => 'MessagesController@show']);

Route::get('mensajes/{id}/edit',['as' => 'messages.edit','uses' => 'MessagesController@edit']);

Route::put('mensajes/{id}',['as' => 'messages.update','uses' => 'MessagesController@update']);

Route::delete('mensajes/{id}',['as' => 'messages.destroy','uses' => 'MessagesController@destroy']);*/



		//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');


		Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
		Route::post('login', 'Auth\LoginController@login');
		Route::get('logout','Auth\LoginController@logout');
		 /*      

        // Registration Routes...
       Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
       Route::post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
       Route::post('password/reset', 'Auth\ResetPasswordController@reset');*/





/*Route::get('/home', 'HomeController@index')->name('home');*/
