<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Rota index
Route::get('/', 'LayoutController@index');
Route::get('/',['as'=>'home','uses'=> 'LayoutController@index']);


//Rota store
Route::get('store/index',['as'=>'store.index','uses'=> 'StoreController@index']);


//Mostrar produtos View
Route::get('category/{id}',['as'=>'store.category','uses'=> 'StoreController@category']);
Route::get('colection/{id}',['as'=>'store.colection','uses'=> 'StoreController@colection']);
Route::get('product/{id}',['as'=>'store.product','uses'=> 'StoreController@product']);


//carrinho de compra e chekout
Route::get('cart',['as'=>'cart','uses'=> 'CartController@index']);
Route::get('cart/add/{id}',['as'=>'cart.add','uses'=> 'CartController@add']);
Route::get('cart/destroy/{id}',['as'=>'cart.destroy','uses'=> 'CartController@destroy']);




//Rota AUTENTICADOS
Route::group(['middleware'=>'auth'],function()
{
    //Rota account
    Route::get('account/index',['as'=>'account.index','uses'=> 'AccountController@index']);
    Route::get('account/orders',['as'=>'account.orders','uses'=> 'AccountController@orders']);

//Rota checkout
    Route::get('checkout/placeOrder',['as'=>'checkout.place','uses'=> 'CheckoutController@place']);

});





Route::group(['prefix'=>'admin','middleware'=>'auth.checkrole:admin','as'=>'admin.'],function(){

    Route::get('categories',['as'=>'categories.index','uses'=> 'CategoriesController@index']);
    Route::get('categories/create',['as'=>'categories.create','uses'=> 'CategoriesController@create']);
    Route::get('categories/edit/{id}',['as'=>'categories.edit','uses'=> 'CategoriesController@edit']);
    Route::post('categories/update/{id}',['as'=>'categories.update','uses'=> 'CategoriesController@update']);
    Route::post('categories/store',['as'=>'categories.store','uses'=> 'CategoriesController@store']);


    Route::get('colections',['as'=>'colections.index','uses'=> 'ColectionsController@index']);
    Route::get('colections/create',['as'=>'colections.create','uses'=> 'ColectionsController@create']);
    Route::get('colections/edit/{id}',['as'=>'colections.edit','uses'=> 'ColectionsController@edit']);
    Route::post('colections/update/{id}',['as'=>'colections.update','uses'=> 'ColectionsController@update']);
    Route::post('colections/store',['as'=>'colections.store','uses'=> 'ColectionsController@store']);

    Route::get('colectionsimage/{id}',['as'=>'colectionsimage.index','uses'=> 'ColectionsImageController@index']);
    Route::get('colectionsimage/create/{id}',['as'=>'colectionsimage.create','uses'=> 'ColectionsImageController@createImage']);
    Route::post('colectionsimage/store/{id}',['as'=>'colectionsimage.store','uses'=> 'ColectionsImageController@storeImage']);
    Route::get('colectionsimage/destroy/{id}',['as'=>'colectionsimage.destroy','uses'=> 'ColectionsImageController@destroyImage']);



    Route::get('products',['as'=>'products.index','uses'=> 'ProductsController@index']);
    Route::get('products/create',['as'=>'products.create','uses'=> 'ProductsController@create']);
    Route::get('products/edit/{id}',['as'=>'products.edit','uses'=> 'ProductsController@edit']);
    Route::post('products/update/{id}',['as'=>'products.update','uses'=> 'ProductsController@update']);
    Route::post('products/store',['as'=>'products.store','uses'=> 'ProductsController@store']);
    Route::get('products/destroy/{id}',['as'=>'products.destroy','uses'=> 'ProductsController@destroy']);

    Route::get('images/{id}',['as'=>'images.index','uses'=> 'ProductImageController@index']);
    Route::get('images/create/{id}',['as'=>'images.create','uses'=> 'ProductImageController@createImage']);
    Route::post('images/store/{id}',['as'=>'images.store','uses'=> 'ProductImageController@storeImage']);
    Route::get('images/destroy/{id}',['as'=>'images.destroy','uses'=> 'ProductImageController@destroyImage']);


    Route::get('clients',['as'=>'clients.index','uses'=> 'ClientsController@index']);
    Route::get('clients/create',['as'=>'clients.create','uses'=> 'ClientsController@create']);
    Route::get('clients/edit/{id}',['as'=>'clients.edit','uses'=> 'ClientsController@edit']);
    Route::post('clients/update/{id}',['as'=>'clients.update','uses'=> 'ClientsController@update']);
    Route::post('clients/store',['as'=>'clients.store','uses'=> 'ClientsController@store']);


    Route::get('orders',['as'=>'orders.index','uses'=> 'OrdersController@index']);
    Route::get('orders/{id}',['as'=>'orders.edit','uses'=> 'OrdersController@edit']);
    Route::post('orders/update/{id}',['as'=>'orders.update','uses'=> 'OrdersController@update']);


    Route::get('cupoms',['as'=>'cupoms.index','uses'=> 'CupomsController@index']);
    Route::get('cupoms/create',['as'=>'cupoms.create','uses'=> 'CupomsController@create']);
    Route::post('cupoms/store',['as'=>'cupoms.store','uses'=> 'CupomsController@store']);
    Route::get('cupoms/{id}',['as'=>'cupoms.edit','uses'=> 'CupomsController@edit']);
    Route::post('cupoms/update/{id}',['as'=>'cupoms.update','uses'=> 'CupomsController@update']);
});

Route::group(['prefix'=>'customer','middleware'=>'auth.checkrole:client','as'=>'customer.'],function(){

    Route::get('order',['as'=>'order.index','uses'=> 'CheckoutController@index']);
    Route::get('order/create',['as'=>'order.create','uses'=> 'CheckoutController@create']);
    Route::post('order/store',['as'=>'order.store','uses'=> 'CheckoutController@store']);

});


Route::group(['middleware' => 'cors'], function(){

    Route::post('oauth/access_token', function() {
        return Response::json(Authorizer::issueAccessToken());

    });
    Route::group(['prefix'=>'api','middleware'=>'oauth','as'=>'api.'],function(){

        //client
        Route::group(['prefix'=>'client','middleware'=>'oauth.checkrole:client','as'=>'client.'],function(){
            Route::resource(
                'order',
                'Api\Client\ClientCheckoutController', [
                'except' =>['create', 'edit','destroy']
            ]);

            Route::get('products','Api\Client\ClientProductController@index');

        });


        Route::group(['prefix'=>'deliveryman','middleware'=>'oauth.checkrole:deliveryman','as'=>'deliveryman.'],function(){

            Route::resource('order',
                'Api\Deliveryman\DeliverymanCheckoutController', [
                    'except' =>['create', 'edit','destroy','store']
                ]);

            Route::patch('order/{id}/update-status',
                ['uses'=> 'Api\Deliveryman\DeliverymanCheckoutController@updateStatus',
                    'as'=>'orders.update_status']);

        });

    });


});



