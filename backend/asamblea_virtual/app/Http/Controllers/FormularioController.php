<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Formulario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Formulario::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        if (!is_array($request->all())) {
            return ['error' => 'request must be an array'];
        }
        // Creamos las reglas de validación
        $rules = [
            'persona_id' => 'required|integer',
            'temario_id' => 'required|integer',
            'opciones_id' => 'required|integer'
        ];
        try {
            // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
            // con los errores
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return [
                    'created' => false,
                    'errors'  => $validator->errors()->all()
                ];
            }
            // Si el validador pasa, almacenamos el usuario
            //Persona::create($request->all());
            $formulario = new Formulario();

            $formulario->persona_id = $request->persona_id;
            $formulario->temario_id = $request->temario_id;
            $formulario->opciones_id = $request->opciones_id;
            $formulario->save();
            return ['created' => true];
        } catch (Exception $e) {
            // Si algo sale mal devolvemos un error.
            return response()->json(['created' => false, 'error mensaje' => $e], 500);
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
        $formulario = Formulario::find($id);

        //return $request->all();
        if (!is_array($request->all())) {
            return ['error' => 'request must be an array'];
        }
        // Creamos las reglas de validación
        $rules = [
            'persona_id' => 'required|integer|max:255',
            'temario_id' => 'required|integer',
            'opciones_id' => 'required|integer',
        ];
        try {
            // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
            // con los errores
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return [
                    'updated' => false,
                    'errors'  => $validator->errors()->all()
                ];
            }

            $formulario->persona_id = $request->persona_id;
            $formulario->temario_id = $request->temario_id;
            $formulario->opciones_id = $request->opciones_id;
            $formulario->update();
            return ['updated' => true];
        } catch (Exception $e) {
            // Si algo sale mal devolvemos un error.
            return response()->json(['updated' => false, 'error mensaje' => $e], 500);
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
        try {
            if (is_numeric($id)) {
                $formulario = Formulario::find($id);
                if (is_null($formulario)) {
                    return response()->json(['error' => true, 'La formulario no existe!']);
                } else {
                    $formulario->delete();
                    return response()->json(['deleted' => true, 'eliminado!']);
                }
            } else {
                return response()->json(['deleted' => false, 'No eliminado!']);
            }
        } catch (Exception $e) {
            return response()->json(['deleted' => false, 'error mensaje' => $e], 500);
        }
    }
}
