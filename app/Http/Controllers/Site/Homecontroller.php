<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Idioma;
use App\Models\Testamento;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('home', [
            'idiomas' => Idioma::all(),
            'testamentos' => Testamento::with(['livros' => function ($query) {
                $query->where('versao_id', 1);
            }])->get(),
        ]);
    }
}
