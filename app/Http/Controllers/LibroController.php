<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Libro;

class LibroController extends Controller
{    
    public function listar_libros(){
        $libros = DB::table('libros')
            ->select('id','titulo','autor_id','isbn', 'editorial', 'sinopsis', 'portada', 'created_at', 'updated_at')
            ->orderBy('id','ASC')
            ->get();
        
        return view('libros.listar',['libros'=>$libros]);
    }

    public function crear(){
        $autores = DB::table('autores')
            ->select('id','nombre')
            ->orderBy('id','ASC')
            ->get();

        return view('libros.crear',['autores'=>$autores]);
    }



   public function guardar(Request $request){
    $titulo = $request->titulo;
    $autor_id = $request->autor_id;
    $isbn = $request->isbn;
    $editorial = $request->editorial; 
    $sinopsis = $request->sinopsis;
    $portada = $request->portada;
    
    DB::table('libros')->insert([
        'titulo' => $titulo,
        'autor_id' => $autor_id,
        'isbn' => $isbn,
        'editorial' => $editorial,
        'sinopsis' => $sinopsis,
        'portada' => $portada,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return to_route('libros.crear')->with('success','Libro creado exitosamente');
    }

    public function editar($idLibro){
        $libro = DB::table('libros')
           ->select('id', 'titulo', 'autor_id', 'isbn', 'editorial', 'sinopsis', 'portada', 'created_at', 'updated_at')
           ->where('id','=',$idLibro)
           ->get();

        //dd($libro);
        return view('libros.editar',['libro'=>$libro[0]]);
    }

    public function modificar(Request $request){
        $titulo = $request->titulo;
        $autor_id = $request->autor_id;
        $isbn = $request->isbn;
        $editorial = $request->editorial; 
        $sinopsis = $request->sinopsis;
        $portada = $request->portada;
        $idLibro = $request->idLibro;
        $updated_at = now();
   

        DB::table('libros')
            ->where('id',$idLibro)
            ->update(['titulo' => $titulo,'autor_id' => $autor_id,'isbn' => $isbn,'editorial' => $editorial,'sinopsis' => $sinopsis,'portada' => $portada,'updated_at' => $updated_at]);

        return to_route('libros.editar',['idLibro'=>$idLibro])->with(['success'=>'El libro se modificó exitosamente']);
    }

    public function eliminar($idLibro){
    DB::table('libros')
        ->where('id', $idLibro)
        ->delete();

    return redirect()->route('libros.listar_libros')
        ->with('success', 'Libro eliminado correctamente');
    }

    public function detalle($idLibro){
        $libro = DB::table('libros')
           ->select('id', 'titulo', 'autor_id', 'isbn', 'editorial', 'sinopsis', 'portada', 'created_at', 'updated_at')
           ->where('id', $idLibro)
           ->first();

        return view('libros.detalle',['libro'=>$libro]);
    }
}