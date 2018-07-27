<?php namespace AlamoComunicacao\Pralana\Http\Controllers;
use Illuminate\Routing\Controller;
use AlamoComunicacao\Pralana\Models\Produtos as ProdutosModel;
use AlamoComunicacao\Pralana\Models\Categorias as  CategoriasModel;
use AlamoComunicacao\Pralana\Models\FiltrosProdutos as  FiltrosProdutosModel;
use AlamoComunicacao\Pralana\Models\Filtros as  FiltrosModel;
use AlamoComunicacao\Pralana\Helper\Helper as Helper;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }
    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function getPage($pg)
    {
        return json_encode(array('html'=>file_get_contents(themes_path('pralana/content/'.$pg.'.htm'))));        
    }
}