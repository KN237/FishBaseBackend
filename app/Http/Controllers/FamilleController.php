<?php

namespace App\Http\Controllers;

use App\Models\Famille;

use Illuminate\Http\Request;

class FamilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

          /**
     * @OA\Get(
     *      path="/familles",
     *      operationId="getAllfamilles",
     * tags={"Famille"},

     *      summary="Retourner la liste des familles",
     *      description="Retourner la liste des familles",
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
        $familles=Famille::all();
        return response()->json($familles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

        /**
     * @OA\Post(
     *      path="/familles",
     *      operationId="addfamilles",
     *      tags={"Famille"},
     *
     *      summary="Ajouter une famille",
     *      description="Ajouter une famille",
     *   
     *  @OA\RequestBody(
     *    description="Attribut de la classe famille",
     *    @OA\JsonContent(
     *       required={"nom"},
     *       @OA\Property(property="nom", type="string", example="XXXX"),
     *       @OA\Property(property="description", type="text", example="XXXX"),
     *       @OA\Property(property="taille_max", type="text", example="XXXX"),
     *       @OA\Property(property="coloration", type="text", example="XXXX"),
     *       @OA\Property(property="distribution_naturelle", type="text", example="XXXX"),
     *       @OA\Property(property="introduction_bg", type="text", example="XXXX"),
     *       @OA\Property(property="illustration", type="string", example="XXXX"),
     *       @OA\Property(property="remarque", type="text", example="XXXX"),
     *       @OA\Property(property="nomcommun", type="text", example="XXXX"),
     *       @OA\Property(property="forme_id", type="int", example="XXXX"),
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

         $request->file('illustration')->storeAs('familles',$request->file('illustration')->getClientOriginalName().'.'.$request->file('illustration')->getExtension(),'public');

           $famille=Famille::create([
            'nom'=> $request->nom,
            'description'=> $request->description,
            'taille_max'=> $request->taille_max,
            'coloration'=> $request->coloration,
            'distribution_naturelle'=> $request->distribution_naturelle,
            'introduction_bg'=> $request->introduction_bg,
            'remarque'=> $request->remarque,
            'nomcommun'=> $request->nomcommun,
            'forme_id'=> $request->forme_id,
            'illustration'=> $request->file('illustration')->getClientOriginalName().'.'.$request->file('illustration')->getExtension(),
        ]);

    }

    else{

        $famille=Famille::create([
            'nom'=> $request->nom,
            'description'=> $request->description,
            'taille_max'=> $request->taille_max,
            'coloration'=> $request->coloration,
            'distribution_naturelle'=> $request->distribution_naturelle,
            'introduction_bg'=> $request->introduction_bg,
            'remarque'=> $request->remarque,
            'nomcommun'=> $request->nomcommun,
            'forme_id'=> $request->forme_id,]);

    }

        return response()->json($famille,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

       /**
     * @OA\Get(
     *      path="/familles/{id}",
     *      operationId="getAllfamille",
     *      tags={"Famille"},
     *
     *      summary="Retourner une famille",
     *      description="Retourner une des familles",
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
        $famille=Famille::where('id',$id)->first();
        return response()->json($famille);
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
     *      path="/familles/{id}",
     *      operationId="updatefamille",
     *      tags={"Famille"},
     *
     *      summary="Modifier une famille",
     *      description="Modifier une famille",
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
     *    description="Attribut de la classe famille",
     *    @OA\JsonContent(
     *       @OA\Property(property="nom", type="string", example="XXXX"),
     *       @OA\Property(property="description", type="text", example="XXXX"),
     *       @OA\Property(property="taille_max", type="text", example="XXXX"),
     *       @OA\Property(property="coloration", type="text", example="XXXX"),
     *       @OA\Property(property="distribution_naturelle", type="text", example="XXXX"),
     *       @OA\Property(property="introduction_bg", type="text", example="XXXX"),
     *       @OA\Property(property="illustration", type="string", example="XXXX"),
     *       @OA\Property(property="remarque", type="text", example="XXXX"),
     *       @OA\Property(property="nomcommun", type="text", example="XXXX"),
     *       @OA\Property(property="forme_id", type="int", example="XXXX"),
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

            $request->file('illustration')->storeAs('familles',$request->file('illustration')->getClientOriginalName().'.'.$request->file('illustration')->getExtension(),'public');
   
              $famille=Famille::where('id',$id)->update([
               'nom'=> $request->nom,
               'description'=> $request->description,
               'taille_max'=> $request->taille_max,
               'coloration'=> $request->coloration,
               'distribution_naturelle'=> $request->distribution_naturelle,
               'introduction_bg'=> $request->introduction_bg,
               'remarque'=> $request->remarque,
               'nomcommun'=> $request->nomcommun,
               'forme_id'=> $request->forme_id,
               'illustration'=> $request->file('illustration')->getClientOriginalName().'.'.$request->file('illustration')->getExtension(),
           ]);
   
       }
   
       else{
   
           $famille=Famille::create([
               'nom'=> $request->nom,
               'description'=> $request->description,
               'taille_max'=> $request->taille_max,
               'coloration'=> $request->coloration,
               'distribution_naturelle'=> $request->distribution_naturelle,
               'introduction_bg'=> $request->introduction_bg,
               'remarque'=> $request->remarque,
               'nomcommun'=> $request->nomcommun,
               'forme_id'=> $request->forme_id,]);
   
       }
   
           return response()->json($famille,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

      /**
     * @OA\Delete(
     *      path="/familles/{id}",
     *      operationId="deletefamille",
     * tags={"Famille"},

     *      summary="Supprimer une famille",
     *      description="Supprimer une des familles",
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
        $famille=Famille::where('id',$id)->delete();
        return response()->json(null,204);
    }
}
