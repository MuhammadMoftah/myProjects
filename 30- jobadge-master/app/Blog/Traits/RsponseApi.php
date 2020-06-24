<?php
namespace App\Blog\Traits;
/**
 *  handle response json for Api
 */
trait RsponseApi
{
    // get basic information from pagnation
    private function getBasicInfoPagantion($pagantion)
    {
        $data = $pagantion->toArray();

        unset($data["data"]);

        foreach ($data as $key => $value)
        {
            $data[$key] = is_null($data[$key])?"":$data[$key];
        }
        return $data;
    }

    //get collection from pagantion
    private function getCollectionPagantion($pagantion)
    {
        return $pagantion->getCollection();
    }
    
    
    protected function errorResponse($validator)
    {
        
        foreach ((array)$validator->errors() as $key => $value){
            foreach ($value as $msg){
                return response()->json(['key' => '0' , 'msg' => $msg[0]]);
            }
        }
    }

    // resopnse sucess resource  collection 
    protected function SucessResponseResourceCollection($resourceCollection){
        return  $resourceCollection->additional(['key'=>'1','value'=>'1']);
    }

    protected function sucessResponsePagnation($pagnation){
        return response()->json([
            "key" =>1,
            "data"=>$this->getCollectionPagantion($pagnation),
            "meta"=>$this->getBasicInfoPagantion($pagnation),
        ]);
    }

    protected function errorResponseMessage($msg){
        return response()->json([
            "key" =>0,
            "msg"=>$msg,
        ]);
    }


    protected function sucessResponseMessage($msg){
        return response()->json([
            "key" =>1,
            "msg"=>$msg,
        ]);
    }

    protected function SucessResponseData($data){
        return response()->json([
            "key" =>1,
            "data"=>$data,
        ]);
    }
}

