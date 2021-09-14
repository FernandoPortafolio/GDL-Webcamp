<?php

namespace Database\Seeders;

use App\Models\Invitado;
use Illuminate\Database\Seeder;

class InvitadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Invitado::create([
            'nombre' => 'Rafael', 
            'apellido' => 'Bautista', 
            'descripcion' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.",
            'url_foto' => 'invitados/invitado1.jpg'
        ]);

        Invitado::create([
            'nombre' => 'Shari', 
            'apellido' => 'Herrera', 
            'descripcion' => "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.",
            'url_foto' => 'invitados/invitado2.jpg'
        ]);

        Invitado::create([
            'nombre' => 'Gregortio', 
            'apellido' => 'Sanchez', 
            'descripcion' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.",
            'url_foto' => 'invitados/invitado3.jpg'
        ]);

        Invitado::create([
            'nombre' => 'Susana', 
            'apellido' => 'Rivera', 
            'descripcion' => "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source",
            'url_foto' => 'invitados/invitado4.jpg'
        ]);

        Invitado::create([
            'nombre' => 'Carol', 
            'apellido' => 'García', 
            'descripcion' => "Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.",
            'url_foto' => 'invitados/invitado5.jpg'
        ]);

        Invitado::create([
            'nombre' => 'Susana', 
            'apellido' => 'Distancia', 
            'descripcion' => "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.",
            'url_foto' => 'invitados/invitado6.jpg'
        ]);
    }
}
