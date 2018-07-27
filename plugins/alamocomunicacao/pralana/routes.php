<?php
    Route::get('/api/banners', 'AlamoComunicacao\Pralana\Models\Banners@getBanners');
    Route::get('/api/produtos', 'AlamoComunicacao\Pralana\Models\Produtos@getProdutos');
    Route::get('/api/categorias', 'AlamoComunicacao\Pralana\Models\Categorias@getCategories');
    Route::get('/api/representantes', 'AlamoComunicacao\Pralana\Models\Representantes@getRepresentantes');
    Route::get('/api/page/{pg}', 'AlamoComunicacao\Pralana\Http\Controllers\PagesController@getPage');
    Route::post('/api/contato', 'Martin\Forms\Models\Record@saveFormApp');

    // Route::get('/api/produtos/{pg?}/{perpage?}', 'AlamoComunicacao\Pralana\Models\Produtos@getProdutos');
    // Route::get('/api/searchprodutos/{prod?}', 'AlamoComunicacao\Pralana\Models\Produtos@searchprodutos');
    // Route::get('/api/catprodutos/{cat?}/{pg?}/{perpage?}', 'AlamoComunicacao\Pralana\Models\Produtos@catprodutos');
    // Route::get('/api/produtos/image/{id}', 'AlamoComunicacao\Pralana\Models\Produtos@getImageProduct');
    // Route::get('/api/banners', 'AlamoComunicacao\Pralana\Models\Banners@getBanners');
    // Route::get('/api/banners/image/{id}', 'AlamoComunicacao\Pralana\Models\Banners@getImagesBanner');
    // Route::get('/api/page/{pg}', 'AlamoComunicacao\Pralana\Http\Controllers\PagesController@getPage');
    // Route::post('/api/contato', 'Martin\Forms\Models\Record@saveFormApp');
    // Route::post('/api/filprodutos/{pg?}/{perpage?}', 'AlamoComunicacao\Pralana\Models\Produtos@onFiltro');
?>