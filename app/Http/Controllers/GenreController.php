<?php

namespace App\Http\Controllers;

use App\Models\Genre;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  /**
     * @OA\Get(
     *      path="/genres",
     *      operationId="getAllgenres",
     *      tags={"Genre"},
     *
     *      summary="Retourner la liste des genres",
     *      description="Retourner la liste des genres",
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
        $genres = Genre::all();
        return response()->json($genres);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Post(
     *      path="/genres",
     *      operationId="addGenres",
     *      tags={"Genre"},
     *
     *      summary="Ajouter un genre",
     *      description="Ajouter un genre",
     *   
     *  @OA\RequestBody(
     *    description="Attribut de la classe genre",
     *    @OA\JsonContent(
     *       required={"nom"},
     *       @OA\Property(property="nom", type="string", example="XXXX"),
     *       @OA\Property(property="illustration", type="string", example="XXXX"),
     *       @OA\Property(property="famille_id", type="int", example="XXXX"),
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
        if ($request->file('illustration')) {

            $request->file('illustration')->storeAs('genres', $request->file('illustration')->getClientOriginalName() . '.' . $request->file('illustration')->getExtension(), 'public');

            $genre = Genre::create([
                'nom' => $request->nom,
                'famille_id' => $request->famille_id,
                'illustration' => $request->file('illustration')->getClientOriginalName() . '.' . $request->file('illustration')->getExtension(),
            ]);
        } else {

            $genre = Genre::create([
                'nom' => $request->nom,
                'famille_id' => $request->famille_id,
            ]);
        }

        return response()->json($genre, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Get(
     *      path="/genres/{id}",
     *      operationId="getAllgenre",
     *      tags={"Genre"},
     *
     *      summary="Retourner un genre",
     *      description="Retourner un des genres",
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
        $genre = Genre::where('id', $id)->first();
        return response()->json($genre);
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
     *      path="/genres/{id}",
     *      operationId="updategenre",
     *      tags={"Genre"},
     *
     *      summary="Modifier un genre",
     *      description="Modifier un genre",
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
     *    description="Attribut de la classe genre",
     *    @OA\JsonContent(
     *       @OA\Property(property="nom", type="string", example="XXXX"),
     *       @OA\Property(property="illustration", type="string", example="XXXX"),
     *       @OA\Property(property="famille_id", type="int", example="XXXX"),
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
        if ($request->file('illustration')) {

            $request->file('illustration')->storeAs('genres', $request->file('illustration')->getClientOriginalName() . '.' . $request->file('illustration')->getExtension(), 'public');

            $genre = Genre::where('id', $id)->update([
                'nom' => $request->nom,
                'famille_id' => $request->famille_id,
                'illustration' => $request->file('illustration')->getClientOriginalName() . '.' . $request->file('illustration')->getExtension(),
            ]);
        } else {

            $genre = Genre::where('id', $id)->update([
                'nom' => $request->nom,
                'famille_id' => $request->famille_id,
            ]);
        }

        return response()->json($genre, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Delete(
     *      path="/genres/{id}",
     *      operationId="deletegenre",
     *      tags={"Genre"},
     *
     *      summary="Supprimer un genre",
     *      description="Supprimer un des genres",
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
        $genre = Genre::where('id', $id)->delete();
        return response()->json(null, 204);
    }
}
