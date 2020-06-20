<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use DB;

class UsuariosController extends Controller
{
    public function login($usuario, $pass){
        $usuarios = DB::select('SELECT * FROM usuarios WHERE usuario = ?',[$usuario],'AND password = ?',[$pass]);
        if(empty($usuarios)){
            $arr = array('resultado'=>'error');
            echo json_encode($arr);
        } else{
            $arr = array('resultado'=>'Valido');
            echo json_encode($usuarios);
        }
    }
}