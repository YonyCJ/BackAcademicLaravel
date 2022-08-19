<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

use App\Models\Cursos;


class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['success' => true,'data' => Cursos::select(
            'cursos.id', 'cursos.nombre','cursos.credito', 'grados.nombre as grado_id', 'personas.nombres as persona_id')
            ->leftJoin('grados', 'cursos.grado_id', 'grados.id')
            ->leftJoin('personas', 'cursos.persona_id', 'personas.id')


            ->get(),'message' => 'Lista de cursos'], 200);
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
        $input = $request->all();

        $validator = Validator::make($input, [

            'nombre' => 'required',
            'credito' => 'required',
            'grado_id' => 'required',
            'persona_id' => 'required'

        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $cursos = Cursos::create($input);

        return response()->json(['success' => true,'data' => Cursos::all(),'message' => 'Lista de cursos'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cursos = Cursos::find($id);

        if (is_null($cursos)) {
            return $this->sendError('Curso no encontrado.');
        }

        return response()->json(['success' => true,'data' => $cursos,'message' => 'Lista de cursos'], 200);
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
        $input = $request->all();

        $validator = Validator::make($input, [
            'nombre' => 'required',
            'credito' => 'required',
            'grado_id' => 'required',
            'persona_id' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        Cursos::find($id)->update($request->all());



        return response()->json(['success' => true,'data' => Cursos::all(),'message' => 'Lista de cursos'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cursos::find($id)->delete();


        return response()->json(['success' => true,'data' => Cursos::all(),'message' => 'Lista de cursos'], 200);
    }
}
