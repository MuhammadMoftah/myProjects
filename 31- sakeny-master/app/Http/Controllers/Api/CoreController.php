<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class CoreController extends BaseController
{
    protected $request;

    protected $perPage = 20;

    private $creatable_attributes = [];
    private $updatable_attributes = [];


    public function __construct()
    {
        parent::__construct();
        $this->request = request();
    }



    abstract protected function scoper();


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $rows = $this->scoper()->paginate($this->perPage);
        return $this->response($rows);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $this->ifMethodExistCallIt('onStore');
        $row = $this->scoper()->create($this->creatable_attributes);
        $this->ifMethodExistCallIt('isStored', $row);
        $row = $this->scoper()->find($row->id);
        return $this->response([
            'data' => $row,
            'message' => 'Added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $row = $this->scoper()->findOrFail($id);
        return $this->response($row);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $this->ifMethodExistCallIt('onUpdate');
        $row = $this->scoper()->find($id);
        if (!$row) {
            return $this->buildValidationMessage('id','Resource not found',422);
        }
        $row->update($this->updatable_attributes);
        $this->ifMethodExistCallIt('isUpdated', $row);

        $row = $this->scoper()->find($row->id);
        return $this->response([
            'data'=>$row,
            'message'=>'updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $row = $this->scoper()->find($id);
        if (!$row) {
            return $this->buildValidationMessage('id','Resource not found',422);
        }
        $this->ifMethodExistCallIt('onDestroy',$row);
        $row->delete();
        return $this->response(['message'=>'deleted successfully']);
    }



    /**
     * used for launch custom events like :
     * onStore,isStored
     * onUpdate,isUpdated
     * @param string $method [function name]
     * @param array $method [pass paramter to function]
     */
    public function ifMethodExistCallIt($method,$args = [])
    {
        if (method_exists($this, $method)) {
            $this->$method($args);
        }
    }


    protected function setCreatableAttibutes($attributes = [])
    {
        return $this->creatable_attributes = $attributes;
    }

    protected function setUpdatableAttributes($attributes = [])
    {
        return $this->updatable_attributes = $attributes;
    }




}
