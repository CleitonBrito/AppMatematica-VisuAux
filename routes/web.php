<?php

    namespace App\Http\middleware;
    use App\Http\Controllers\C_Unidades_Dezenas_Centenas;
    use App\Http\Controllers\C_Operacoes_Basicas;
    use App\Http\Controllers\C_Fracoes;
    use App\Http\Controllers\C_Porcentagem;
    
    use App\Http\Controllers\C_Conteudos;
    use App\Http\Controllers\C_Dificuldade;
    use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () { return view('index'); });
Route::get('/dificuldade', [C_Dificuldade::class, 'index'])->name('dificuldade');
Route::post('/dificuldade/{nivel?}', [C_Dificuldade::class, 'index'])->name('dificuldade');
Route::get('/estatisticas', function () { return view('estatisticas'); });
Route::get('/area_professor', function () { return view('area_professor'); });
Route::get('/configuracoes', function () { return view('configuracoes'); });

Route::middleware(sessionDificult::class)->group(function () {
    Route::get('/conteudos', [C_Conteudos::class, 'index'])->name('conteudos');
    Route::get('/conteudos/Unidades_Dezenas_Centenas/{fase?}', [C_Unidades_Dezenas_Centenas::class, 'fases']);
    Route::get('/conteudos/Operacoes_Basicas/{fase?}', [C_Operacoes_Basicas::class, 'fases']);
    Route::get('/conteudos/Fracoes/{fase?}', [C_Fracoes::class, 'fases']);
    Route::get('/conteudos/Porcentagem/{fase?}', [C_Porcentagem::class, 'fases']);
});
