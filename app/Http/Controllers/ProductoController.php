<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('modules.producto.index', [
            'productos' => Producto::all(),
            'newProducto' => new Producto(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.producto.create',[
            'producto' => new Producto,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre = $request->get('nombre');
        $producto->tamano = $request->get('tamano');
        $producto->referencia_tamano = $request->get('referencia_tamano');
        $producto->referencia = $request->get('referencia');
        $producto->precio_base = $request->get('precio_base');
        $producto->precio_unidad_trabajador = $request->get('precio_unidad_trabajador');
        $producto->precio_unidad_venta = $request->get('precio_unidad_venta');
        $producto->presentacion_producto = $request->get('presentacion_producto');
        $producto->cantidad_producto = $request->get('cantidad_producto');
        $producto->estado = $request->get('estado');

        $producto->save();

        return redirect(route('productos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('modules.producto.show',[
            'producto' => $producto,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('modules.producto.edit',[
            'producto' => $producto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Producto $producto,Request $request)
    {
        $producto->nombre = $request->get('nombre');
        $producto->tamano = $request->get('tamano');
        $producto->referencia_tamano = $request->get('referencia_tamano');
        $producto->referencia = $request->get('referencia');
        $producto->precio_base = $request->get('precio_base');
        $producto->precio_unidad_trabajador = $request->get('precio_unidad_trabajador');
        $producto->precio_unidad_venta = $request->get('precio_unidad_venta');
        $producto->presentacion_producto = $request->get('presentacion_producto');
        $producto->cantidad_producto = $request->get('cantidad_producto');
        $producto->estado = $request->get('estado');

        $producto->update();
        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Producto $producto
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return view('modules.producto.index',[
            'productos' => Producto::all(),
        ]);
    }

    /**
     * Actualiza el estado de un producto
     */
    public function setEstado(Producto $producto, $estado)// recibe el producto al que se le quiere hacer el cambio y el estado a establecer
    {
            $producto->estado = $estado;// le asignamos el estado que llego al estado del producto
            $producto->update();//actualizamos
            return redirect(route('productos.index'));
    }
}
