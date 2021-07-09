<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('modules.categoria.index',[
            'categorias' => Categoria::with('productos')->oldest()->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.categoria.create',[
           'categoria' => new Categoria,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SaveCategoriaRequest $request)
    {
        $categoria = new Categoria( $request->validated());

        $categoria->save();

        return redirect()->route('categorias.show',$categoria)->with('status',' La categoria '.$categoria->nombre.' fue creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return view('modules.categoria.show',[
            'categoria' => $categoria,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('modules.categoria.edit',[
            'categoria' => $categoria,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SaveCategoriaRequest $request, Categoria $categoria)
    {
            $categoria->update( $request->validated());

            return redirect()->route('categorias.index')->with('status','La categoria '.$categoria->nombre.' fue actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')->with('status','La categoria '.$categoria->nombre.' fue eliminada con exito');
    }

    public function setEstado(Categoria $categoria, $estado)
    {
        $categoria->estado = $estado;
        $categoria->update();
        return redirect()->route('categorias.index')->with('status','La categoria '.$categoria->nombre.' ahora esta '.$estado);

    }
}
