<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Livro;
use App\Models\Versao;
use App\Models\Versiculo;
use Illuminate\Http\Request;

class Bibliacontroller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function livros(string $versao)
    {
        $livros = Livro::whereHas('versao', function ($query) use ($versao) {
            $query->where('abreviacao', $versao);
        })->get();
                
        return view('publico.versiculos', [
            'livros' => $livros
        ]);
    }

    /**
     * Handle the incoming request.
     */
    public function capitulos(string $versao, string $livro)
    {
        $capitulos = Versiculo::whereHas('livro', function ($query) use ($versao, $livro) {
            $query->where('abreviacao', $livro)
            ->whereHas('versao', function ($query) use ($versao) {
                $query->where('abreviacao', $versao);
            });
        })->selectRaw('MIN(id) as id, capitulo') // Seleciona o menor ID por capítulo (ou outro critério)
        ->groupBy('capitulo')->get();

        // return view('site.biblia', [
        //     'capitulos' => $capitulos
        // ]);
    }

    /**
     * Handle the incoming request.
     */
    public function versiculos(string $versao, string $livro, string $capitulo)
    {
        // $versiculos = Versiculo::whereHas('livro', function ($query) use ($versao, $livro) {
        //     $query->where('abreviacao', $livro)
        //     ->whereHas('versao', function ($query) use ($versao) {
        //         $query->where('abreviacao', $versao);
        //     });
        // })->with('livro')->where('capitulo', $capitulo)->orderBy('versiculo')->get();

        // $capitulos = Versiculo::whereHas('livro', function ($query) use ($versao, $livro) {
        //     $query->where('abreviacao', $livro)
        //     ->whereHas('versao', function ($query) use ($versao) {
        //         $query->where('abreviacao', $versao);
        //     });
        // })->selectRaw('MIN(id) as id, capitulo') // Seleciona o menor ID por capítulo (ou outro critério)
        // ->groupBy('capitulo')->get();

        // Definir um escopo de query para evitar repetição
        $queryBase = Versiculo::whereHas('livro', function ($query) use ($versao, $livro) {
            $query->where('abreviacao', $livro)
                ->whereHas('versao', function ($query) use ($versao) {
                    $query->where('abreviacao', $versao);
                });
        });

        // Buscar os versículos do capítulo específico
        $versiculos = (clone $queryBase)
            ->with('livro')
            ->where('capitulo', $capitulo)
            ->orderBy('versiculo')
            ->get();

        // Buscar os capítulos disponíveis
        $capitulos = (clone $queryBase)
            ->select('capitulo')
            ->distinct()
            ->orderBy('capitulo')
            ->get();

        return view('publico.versiculos', [
            'versiculos' => $versiculos,
            'capitulos' => $capitulos
        ]);
    }
}
