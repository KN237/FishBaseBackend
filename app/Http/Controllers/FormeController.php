<?php

namespace App\Http\Controllers;

use App\Models\Forme;

use Illuminate\Http\Request;

class FormeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Get(
     *      path="/formes",
     *      operationId="getAllformes",
     *      tags={"Forme"},
     *
     *      summary="Retourner la liste des formes",
     *      description="Retourner la liste des formes",
     *       @OA\Response(
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
        $formes=Forme::all();
        return response()->json($formes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Post(
     *      path="/formes",
     *      operationId="addformes",
     *      tags={"Forme"},
     *
     *      summary="Ajouter une forme",
     *      description="Ajouter une forme",
     *   
     *  @OA\RequestBody(
     *    description="Attribut de la classe forme",
     *    @OA\JsonContent(
     *       required={"nom"},
     *       @OA\Property(property="nom", type="string", example="XXXX"),
     * @OA\Property(property="description", type="string", example="XXXX"),
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
           $forme=Forme::create([
            'nom'=> $request->nom,'description'=> $request->description ]);

        return response()->json($forme,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Get(
     *      path="/formes/{id}",
     *      operationId="getAllforme",
     *      tags={"Forme"},
     *
     *      summary="Retourner une forme",
     *      description="Retourner une des formes",
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
        $forme=Forme::where('id',$id)->first();
        return response()->json($forme);
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
     *      path="/formes/{id}",
     *      operationId="updateforme",
     *      tags={"Forme"},
     *
     *      summary="Modifier une forme",
     *      description="Modifier une forme",
     *   
     * @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ), 
     *  @OA\RequestBody(
     *    description="Attribut de la classe forme",
     *    @OA\JsonContent(
     *       required={"nom"},
     *       @OA\Property(property="nom", type="string", example="XXXX"),
     *       @OA\Property(property="description", type="string", example="XXXX"),
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
               $forme=Forme::where('id',$id)->update([
                'nom'=> $request->nom,'description'=> $request->description ]);
        return response()->json($forme,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Delete(
     *      path="/formes/{id}",
     *      operationId="deleteforme",
     * tags={"Forme"},

     *      summary="Supprimer une forme",
     *      description="Supprimer une des formes",
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
        $forme=Forme::where('id',$id)->delete();
        return response()->json(null,204);
    }
}
