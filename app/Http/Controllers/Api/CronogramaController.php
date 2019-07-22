<?php

namespace App\Http\Controllers\Api;

use App\Model\Api\Cronograma;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CronogramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Cronograma[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $retorno['cronogramas'] = Cronograma::all();
        return response()->json($retorno);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cron = new Cronograma();
        $return['cronograma'] = $cron->createCronograma($request);
        return response()->json($return);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $return['cronograma'] = Cronograma::findOrFail($id);
        return response()->json($return);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cron = Cronograma::findOrFail($id);
        $return['cronograma'] = $cron->updateCronograma($request);
        return response()->json($return);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cron = Cronograma::findOrFail($id);
        $return = [
            'success' => $cron->deleteCronograma(),
            'cronograma'    => $cron,
            'message' => "Cronograma excluído com sucesso"
        ];

        return response()->json($return);
    }


    public function getAllWithRelations(){
        $cron = new Cronograma();
        $retorno['cronogramas'] = $cron->cronogramasAndRelations();
        return response()->json($retorno);
    }

    public function showFullCronograma($id){
        $cron = new Cronograma();
        $retorno['cronograma'] = $cron->cronogramaAndRelations($id);
        return response()->json($retorno);
    }

}
