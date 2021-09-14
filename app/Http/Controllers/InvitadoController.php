<?php

namespace App\Http\Controllers;

use App\Models\Invitado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class InvitadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invitados = Invitado::all();
        return view('admin.invitados.index', compact('invitados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.invitados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image'
        ]);

        $ruta_imagen = $this->uploadImage($request->file('imagen'));
        Invitado::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'descripcion' => $data['descripcion'],
            'url_foto' => $ruta_imagen,
        ]);
        return redirect()->route('invitados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invitado  $invitado
     * @return \Illuminate\Http\Response
     */
    public function show(Invitado $invitado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invitado  $invitado
     * @return \Illuminate\Http\Response
     */
    public function edit(Invitado $invitado)
    {
        return view('admin.invitados.edit', compact('invitado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invitado  $invitado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invitado $invitado)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'descripcion' => 'required',
            'imagen' => 'image'
        ]);
        $invitado->nombre = $data['nombre'];
        $invitado->apellido = $data['apellido'];
        $invitado->descripcion = $data['descripcion'];
        if ($request->file('imagen')) {
            $url_foto = $this->uploadImage($request->file('imagen'));
            $this->deleteImage($invitado->url_foto);
            $invitado->url_foto = $url_foto;
        }
        $invitado->save();
        return redirect()->route('invitados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invitado  $invitado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invitado $invitado)
    {
        $invitado->delete();
        $this->deleteImage($invitado->url_foto);
        return "$invitado->nombre $invitado->apellido ha sido eliminado satisfactoriamente";
    }

    private function uploadImage($image)
    {
        $ruta_imagen = $image->store('invitados', 'public');
        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(450, 300);
        $img->save();
        return $ruta_imagen;
    }

    public function deleteImage($name)
    {
        if (Storage::disk('public')->exists($name)) {
            Storage::disk('public')->delete($name);
        }
    }
}
