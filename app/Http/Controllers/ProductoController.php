<?php

namespace App\Http\Controllers;

use App\Events\ProductoSaved;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\SaveProductoRequest;
use Illuminate\Support\Facades\Storage;


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
            //Utilizamos el with en la variable producto para no hacer consultas N+1 con categorias
            'productos' => Producto::with('categoria')->oldest()->paginate(),//el metodo oldest obtiene los registros mas antiguos de la tabla
            'newProducto' => new Producto(),
            'categoria' => Categoria::pluck('nombre'),
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
            'categorias' => Categoria::pluck('nombre','id'),//Pluck nos trae las columnas especificas que le pidamos de un objeto, el primer parametro es el valor y el segundo es la llave
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

        if ( $request->hasFile('imagen_producto')){

            $producto->imagen_producto = $request->file('imagen_producto')->store('images');//guardamos la imagen del formulario dentro de la carpeta storage/images

            $producto->save();

            ProductoSaved::dispatch($producto);//dispatch dispara el evento que optimizara la imagen
        }else {
            $producto->save();
        }

        return redirect()->route('productos.show',$producto)->with('status','El producto '.$producto->nombre.' fue creado con exito');
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
            'categorias' => Categoria::pluck('nombre','id'),
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
        if ( $request->hasFile('imagen_producto'))//Pregunta si llego una imagen
        {
            Storage::delete($producto->imagen_producto);//Borramos la imagen antigua

            $producto->fill($request->validated());//Primer asignamos los demas datos al proyecto si guardarlos en la bd aun

            $producto->imagen_producto = $request->file('imagen_producto')->store('images');//Despues asignamos la nueva imagen

            $producto->save();

            ProductoSaved::dispatch($producto);//dispatch dispara el evento que optimizara la imagen

        }
        else{//Si el formulario no manda ninguna imagen
            $producto->update($request->validated());// update solo va a actualizar en la BD los campos que que esten validados en el SaveProductoRequest
        }
        return redirect()->route('productos.show',$producto)->with('status','El producto '.$producto->nombre.' fue actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Producto $producto
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Producto $producto)
    {
        Storage::delete($producto->imagen_producto);//Elimina la imagen del producto de la bd y del storage

        $producto->delete();// Elimina el producto

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
