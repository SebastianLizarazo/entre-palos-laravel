<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\SaveProductoRequest;


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
     * @return SaveProductoRequest|array|false|\Illuminate\Http\RedirectResponse|Request|\Illuminate\Http\UploadedFile|\Illuminate\Http\UploadedFile[]|string
     */
    public function store(SaveProductoRequest $request)
    {
        $producto = new Producto( $request->validated() );//el validated asigna los campos que estan especificados en el SaveProductoRequest

        $producto->imagen_producto = $request->file('imagen_producto')->store('images');//guardamos la imagen del formulario dentro de la carpeta storage/images

        $producto->save();

        return redirect()->route('productos.index')->with('status','El producto '.$producto->nombre.' fue creado con exito');
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
    public function update(Producto $producto,SaveProductoRequest $request)
    {

        $producto->update( $request->validated());// update solo va a actualizar en la BD los campos que que esten validados en el SaveProductoRequest
        return redirect()->route('productos.index')->with('status','El producto '.$producto->nombre.' fue actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Producto $producto
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('status','El producto '.$producto->nombre.' fue borrado con exito');//redireccionamos al index con el mensaje de session
                                                                                                             //de tipo status que el producto se borro exitosamente
    }

    /**
     * Actualiza el estado de un producto
     */
    public function setEstado(Producto $producto, $estado)// recibe el producto al que se le quiere hacer el cambio y el estado a establecer
    {
            $producto->estado = $estado;// le asignamos el estado que llego al estado del producto
            $producto->update();//actualizamos
            return redirect()->route('productos.index')->with('status','El producto '.$producto->nombre.' ahora esta '.$estado);//redireccionamos al index con el mensaje de session
            //de tipo status que el producto se el cambio el estado, ademas muestra el nombre y el estado actual de producto
    }
}
