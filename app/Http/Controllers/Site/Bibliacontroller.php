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
    public function listaLivros(string $versao)
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
    public function listaCapitulos(string $versao, string $livro)
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
    public function listaVersiculos(string $versao, string $livro, string $capitulo, string $versiculos = null)
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

        // Se houver um intervalo de versículos (ex: "1-2") ou um versículo específico
        if ($versiculos) {
            $intervalo = explode('-', $versiculos);
            if (count($intervalo) === 2) {
                $queryBase->whereBetween('versiculo', [$intervalo[0], $intervalo[1]]);
            } else {
                $queryBase->where('versiculo', $versiculos);
            }
        }

        // Buscar os versículos filtrados
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

        // Determinar o próximo capítulo
        $proximoCapitulo = (clone $queryBase)
            ->where('capitulo', '>', $capitulo)
            ->orderBy('capitulo')
            ->first();
        $proximoLivro = null; // Garante que a variável sempre exista
        if (!$proximoCapitulo) {
            // Se não houver um próximo capítulo, buscar o próximo livro
            $proximoLivro = Livro::whereHas('versao', function ($query) use ($versao) {
                    $query->where('abreviacao', $versao);
                })
                ->where('id', '>', $versiculos->first()->livro_id)
                ->first();
                
            if ($proximoLivro) {
                $proximoCapitulo = Versiculo::whereHas('livro', function ($query) use ($versao, $proximoLivro) {
                    $query->where('abreviacao', $proximoLivro->abreviacao)
                        ->whereHas('versao', function ($query) use ($versao) {
                            $query->where('abreviacao', $versao);
                        });
                })->select('capitulo')->orderBy('capitulo')->first();
            }
        }
            

        return view('publico.versiculos', [
            'versiculos' => $versiculos,
            'capitulos' => $capitulos,
            'proximoCapitulo' => $proximoCapitulo ?  $proximoCapitulo->capitulo : null,
            'proximoLivro' => $proximoLivro ? $proximoLivro?->abreviacao : null,
        ]);
    }
}
