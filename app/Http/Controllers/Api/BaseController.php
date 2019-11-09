<?php
/**
 * Created by PhpStorm.
 * User: Filipe Maciel
 * Date: 04/08/2019
 * Time: 13:14
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{

    public $repository;
    protected $modelName;

    public function index()
    {
        try{
//        $retorno['cronogramas'] = $this->repository->model()->all();
            return $this->responseJson($this->repository->model()->all());
        }catch (\Exception $e){
            return response()->json(["message" => "Ops. Ocorreu um erro interno."], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            return $this->responseJson($this->repository->model()->create($request->all()));
        }catch (\Exception $e){
            return response()->json(["message" => "Ops. Ocorreu um erro interno."], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return $this->responseJson($this->repository->model()->findOrFail($id));
        }catch (\Exception $e){
            return response()->json(["message" => "Ops. Ocorreu um erro interno."], 500);
        }
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
        try{
            $model = $this->repository->model()->findOrFail($id);
            $model->fill($request->all());
            return $this->responseSuccessJson($model->save(), $model->fresh());
        }catch (\Exception $e){
            return response()->json(["message" => "Ops. Ocorreu um erro interno."], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $model = $this->repository->model()->findOrFail($id);
            return $this->responseSuccessJson($model->delete(), $model);
        }catch (\Exception $e){
            return response()->json(["message" => "Ops. Ocorreu um erro interno."], 500);
        }
    }

    public function responseJson($result)
    {
        $name = class_basename($this->repository->model());
        $response[strtolower($name)] = $result;
        return response()->json($response);
    }

    public function responseSuccessJson($action, $data)
    {
        $name = class_basename($this->repository->model());
        $return = [
            'success'       => $action,
            'message'       => "Ação realizada com sucesso"
        ];
        $return[strtolower($name)] = $data;
        return Response()->json($return);
    }

}
