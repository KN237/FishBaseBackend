<?php

namespace App\Http\Controllers;

use App\Models\Espece;

use Illuminate\Http\Request;

class EspeceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

          /**
     * @OA\Get(
     *      path="/especes",
     *      operationId="getAllespeces",
     * tags={"Espèce"},

     *      summary="Retourner la liste des especes",
     *      description="Retourner la liste des especes",
     *        @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */

    public function index()
    {
        $especes=Espece::all();
        return response()->json($especes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

        /**
     * @OA\Post(
     *      path="/especes",
     *      operationId="addespeces",
     *      tags={"Espèce"},
     *
     *      summary="Ajouter une espece",
     *      description="Ajouter une espece",
     *   
     *  @OA\RequestBody(
     *    description="Attribut de la classe espece",
     *    @OA\JsonContent(
     *       required={"nom"},
     *       @OA\Property(property="nom", type="string", example="XXXX"),
     *       @OA\Property(property="description", type="text", example="XXXX"),
     *       @OA\Property(property="illustration", type="string", example="XXXX"),
     *       @OA\Property(property="remarque", type="text", example="XXXX"),
     *       @OA\Property(property="category_id", type="int", example="XXXX"),
     * @OA\Property(property="famille_id", type="int", example="XXXX"),
     * @OA\Property(property="forme_id", type="int", example="XXXX"),
     *    ),
     * ),
     *    
     * @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */

    public function store(Request $request)
    {
        if($request->file('illustration')){

         $request->file('illustration')->storeAs('especes',$request->file('illustration')->getClientOriginalName(),'public');

           $espece=Espece::create([
            'nom'=> $request->nom,
            'description'=> $request->description,
            'remarque'=> $request->remarque,
            'category_id'=> $request->category_id,
            'famille_id'=> $request->famille_id,
            'forme_id'=> $request->forme_id,
            'illustration'=> $request->file('illustration')->getClientOriginalName(),
        ]);

    }

    else{

        $espece=Espece::create([
            'nom'=> $request->nom,
            'description'=> $request->description,
            'remarque'=> $request->remarque,
            'category_id'=> $request->category_id,
            'famille_id'=> $request->famille_id,
            'forme_id'=> $request->forme_id,
        ]);

    }

        return response()->json($espece,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

       /**
     * @OA\Get(
     *      path="/especes/{id}",
     *      operationId="getAllespece",
     *      tags={"Espèce"},
     *
     *      summary="Retourner une espece",
     *      description="Retourner une des especes",
     *      
     * @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * 
     * @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */


    public function show($id)
    {
        $espece=Espece::where('id',$id)->first();
        return response()->json($espece);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\Put(
     *      path="/especes/{id}",
     *      operationId="updateespece",
     *      tags={"Espèce"},
     *
     *      summary="Modifier une espece",
     *      description="Modifier une espece",
     *   
     * @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ), 
     *   @OA\RequestBody(
     *    description="Attribut de la classe espece",
     *    @OA\JsonContent(
     *       @OA\Property(property="nom", type="string", example="XXXX"),
     *       @OA\Property(property="description", type="text", example="XXXX"),
     *       @OA\Property(property="illustration", type="string", example="XXXX"),
     *       @OA\Property(property="remarque", type="text", example="XXXX"),
     *       @OA\Property(property="category_id", type="int", example="XXXX"),
     * @OA\Property(property="famille_id", type="int", example="XXXX"),
     * @OA\Property(property="forme_id", type="int", example="XXXX"),
     *    ),
     * ),
     *    
     * @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */

     
    public function update(Request $request, $id)
    {
        if($request->file('illustration')){
            
            $request->file('illustration')->storeAs('especes',$request->file('illustration')->getClientOriginalName(),'public');
   
              $espece=Espece::where('id',$id)->update([
               'nom'=> $request->nom,
               'description'=> $request->description,
               'remarque'=> $request->remarque,
               'category_id'=> $request->category_id,
               'famille_id'=> $request->famille_id,
               'forme_id'=> $request->forme_id,
               'illustration'=> $request->file('illustration')->getClientOriginalName()
           ]);
   
       }
   
       else{
   
           $espece=Espece::where('id',$id)->update([
               'nom'=> $request->nom,
               'description'=> $request->description,
               'remarque'=> $request->remarque,
               'category_id'=> $request->category_id,
               'famille_id'=> $request->famille_id,
               'forme_id'=> $request->forme_id,]);
   
       }
   
           return response()->json($espece,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

      /**
     * @OA\Delete(
     *      path="/especes/{id}",
     *      operationId="deleteespece",
     * tags={"Espèce"},

     *      summary="Supprimer une espece",
     *      description="Supprimer une des especes",
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),    
     * @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */


    public function destroy($id)
    {
        $espece=Espece::where('id',$id)->delete();
        return response()->json(null,204);
    }
}
