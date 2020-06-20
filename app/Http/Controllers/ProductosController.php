<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use DB;

class ProductosController extends Controller
{
    public function getProductos($id){
        $productos = DB::select('SELECT * FROM productos WHERE id_producto ='.$id);
        echo json_encode($productos);
    }

    public function obtenerProductos(){
        $productos = DB::select('SELECT id_producto, descripcion, precio_venta, departamento FROM productos');
        echo json_encode($productos);
    }

    public function updateProductos($id, $descripcion, $precio_venta, $costo, $departamento, $categoria){
        try {
            $productos = Productos::find($id);
            $productos->descripcion = $descripcion;
            $productos->precio_venta = $precio_venta;
            $productos->costo = $costo;
            $productos->departamento = $departamento;
            $productos->categoria = $categoria;
            $productos->save();

            if(empty($productos)){
                $arr = array('descripcion'=>'error');
                echo json_encode($arr);
            }
            else{
                echo $productos;
            }
        } catch (\Illuminate\Database\QueryException $e)   {
            $errorCore = $e->getMessage();
            $arr = array('estado'=> $errorCore);
            echo json_encode($arr);
        }
        
    }

    public function eliminar($id){
        try {
            $producto = DB::delete('DELETE FROM productos WHERE id_producto = ?', [$id]);
            if (empty($producto)){
                $arr = array('resultado'=>'No se pudo eliminar'); 
                echo json_encode($arr); 
            } else { 
                $arr = array('resultado'=>'eliminado'); 
                echo json_encode($arr);
            } 
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCore = $e->getMessage(); 
            $arr = array('estado' => $errorCore); 
            echo json_encode($arr);

        }
    }

    public function insertar($descripcion, $precio_venta, $costo, $departamento, $categoria){
        try {
            $producto = Productos::insert(['descripcion' => $descripcion, 'precio_venta'=>$precio_venta, 'costo'=>$costo,
            'departamento'=>$departamento, 'categoria'=>$categoria]);
    
            if($producto == 1){
                $arr = array('resultado'=>"insertado");
                echo json_encode($arr);
            } else{
                $arr = array('resultado'=>"No insertado");
                echo json_encode($arr);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->getMessage();
            $arr = array('estado'=> $errorCode);
            echo json_encode($arr);
        }
       
    }
}
