<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Producto;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductoController extends Controller
{
    public function productoform(){
        return view('productos.index');
    }
    public function save(Request $request){
        $image_name = Cloudinary::upload($request->file('image_name')->getRealPath())->getSecurePath();

        $validate=$this->validate($request,[
            'nombre'=>'required|string',
            'marca'=>'required|string',
            'precio'=>'required',
            'stock'=>'required|string'
        ]);
        $prodData=request()->except('_token');
        Producto::insert($prodData);
        return back()->with('productoGuardado','Producto guardado');
    }
    public function list(){
        $data['productos']=Producto::paginate(10);

        return view('productos.index',$data);
    }
    public function delete($id){
        Producto::destroy($id);
        return back()->with('productoEliminado','Producto Eliminado');
    }
    public function editform($id){
        $producto=Producto::findOrFail($id);

        return view('productos.edit',compact('producto'));
    }
    public function edit(Request $request,$id){
        $datosProductos=request()->except((['_token','_method']));
        Producto::where('id','=',$id)->update($datosProductos);

        return back()->with('productoModificado','Producto Modificado');
    }

}
