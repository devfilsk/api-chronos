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
        return response()->json(Cronograma::all());
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
        return response()->json($cron->createCronograma($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Cronograma::findOrFail($id));
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
        return response()->json($cron->updateCronograma($request));
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
        return response()->json($cron->deleteCronograma());
    }


    public function getAllWithRelations(){
        $cron = new Cronograma();
        return response()->json($cron->cronogramasAndRelations());
    }

    public function showFullCronograma($id){
        $cron = new Cronograma();
        return response()->json($cron->cronogramaAndRelations($id));
    }

}
