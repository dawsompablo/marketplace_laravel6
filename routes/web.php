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
})->name('home');

Route::get('/model', function () {
    // $user = new \App\User();
    // $user = \App\User::find(1);
    // $user->name = 'Usuario Teste editado';

    //$user->save();

    //\App\User::all(); - retorna todos os usuarios
    //\App\User::find(3); - retorna usuario pelo id
    //\App\User::where('name', 'nome do usuario')->get() || ->first() retorna usuario pela condição
    //\App\User::paginate(10); - paginar dados

    // Mass Assingnment - Atribuição em Massa
    // para usar o mass assingnment é necessario ter fillable no model

    // $user = \App\User::create([
    //     'name' => 'Pablo Dawson',
    //     'email' => 'dawsompablo@gmail.com',
    //     'password' => bcrypt('321321')
    // ]);
    // dd($user);

    // Mass Update

    // $user = \App\User::find(7);
    // $user->update([
    //     'name' => 'Dawson Pablo'
    // ]); // retorna true or false

    // como o cara do curso faria para pegar uma loja de um usuario
    //$user = \App\User::find(4);
    //return $user->store;
    // ou
    //dd($user->store()->count()); // O objeto unico (Store) se for collection de Dados(Objetos)

    // e se for os produtos de uma loja?
    //$loja = \App\Store::find(1);
    //return $loja->products()->where('id', 1)->get();

    // Pegar as lojas de uma categoria
    // $categoria = \App\Category::find(1)
    // return $categoria->products;

    // Criar uma loja para um usuario
    // $user = \App\User::find(1);
    // $store = $user->store()->create([
    //     'name' => 'Loja Teste',
    //     'description' => 'Loja teste de produtos de info',
    //     'mobile_phone' => '00-00000-0000',
    //     'phone' => '00-00000-0000',
    //     'slug' => 'loja-teste'
    // ]);

    // dd($store);

    // Criar um produto para uma loja
    // $store = \App\Store::find(5);
    // $product = $store->products()->create([
    //     'name' => 'Notebook Samsung Essentials',
    //     'description' => 'Notebook de linha da Sansung',
    //     'body' => 'Qualquer coisa',
    //     'price' => 2999.00,
    //     'slug' => 'nebook-samsung-essentials'
    // ]);

    // dd($product);

    // Criar uma categoria
    // \App\Category::create([
    //     'name' => 'Games',
    //     'description' => 'Encontre jogos',
    //     'slug' => 'games'
    // ]);

    // \App\Category::create([
    //     'name' => 'Perifericos',
    //     'description' => null,
    //     'slug' => 'perifericos'
    // ]);
    // return \App\Category::all();

    // Adicionar um produto para uma categoria ou vice-versa
    //$product = \App\Product::find(5);
    // adiciona
    //dd($product->categories()->attach([1]));
    // remove
    //dd($product->categories()->detach([1]));

    // faz o mesmo que attach e detach, porem mais dinamico :)
    //dd($product->categories()->sync([1, 2]));
    // sincroniza produtos na categoria
    //dd($product->categories()->sync([1]));


    //return \App\User::all();
});

/**
 * Route::get // recupera
 * Route::post // cria
 * Route::put // atualiza
 * Route::patch // atualiza
 * Route::delete // deleta
 * Route::options // retorna codigos http
 */

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {

        // Route::prefix('stores')->name('stores.')->group(function () {
        //     Route::get('/', 'StoreController@index')->name('index');

        //     Route::get('/create', 'StoreController@create')->name('create');
        //     Route::post('/store', 'StoreController@store')->name('store');

        //     Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
        //     Route::post('/update/{store}', 'StoreController@update')->name('update');

        //     Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
        // });

        // php artisan make:controller ProductController -resource || --r
        Route::resource('stores', 'StoreController');
        Route::resource('products', 'ProductController');
        Route::resource('categories', 'CategoryController');

        Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');
    });
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
