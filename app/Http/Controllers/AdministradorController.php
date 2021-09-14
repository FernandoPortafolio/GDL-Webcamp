<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\NewAdminNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('id', '!=', 1)->get();
        return view('admin.administradores.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.administradores.create');
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password_repeat' => 'required|same:password',
            'image' => 'required|image'
        ]);

        $ruta_imagen = $this->uploadImage($request->file('image'));
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image' => $ruta_imagen,
        ]);

        $user->notify(new NewAdminNotification(['email' => $user->email, 'password' => $data['password']]));


        return redirect()->route('administradores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        return view('admin.administradores.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'image'
        ]);
        if ($request->password) {
            $request->validate([
                'password' => 'min:6',
                'password_repeat' => 'required|same:password',
            ]);
            $data = array_merge($data, $request->all());
            $admin->password = Hash::make($data['password']);
        }
        if ($request->file('imagen')) {
            $url_foto = $this->uploadImage($request->file('imagen'));
            $this->deleteImage($admin->image);
            $admin->image = $url_foto;
        }

        $admin->name = $data['name'];
        $admin->email = $data['email'];
        $admin->save();

        return redirect()->route('administradores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        $admin->delete();
        $this->deleteImage($admin->image);
        return "$admin->name ha sido eliminado satisfactoriamente";
    }

    private function uploadImage($image)
    {
        $ruta_imagen = $image->store('admins', 'public');
        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(160, 160);
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
