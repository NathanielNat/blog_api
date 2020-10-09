<?php


namespace App\Traits;
use Illuminate\Http\Response;

trait ApiResponser{

     /*
    * Build success reponse 
    * @param sting|array $data
    * @param int $code
    * @return Illumninate\Http\JsonResponse
    */

    public function successResponse($data,$code=Response::HTTP_OK){
        return response()->json(['data' => $data], $code);
    }

    /*
    * Build error reponse 
    * @param sting|array $data
    * @param int $code
    * @return Illumninate\Http\JsonResponse
    */
    public function errorResponse($message,$code){
        return \response()->json(['error'=>$message,'code' => $code],$code);
    }

}


?>