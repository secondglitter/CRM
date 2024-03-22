<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Http\Requests\StoreContactoRequest;
use App\Http\Requests\UpdateContactoRequest;
use PhpParser\Node\Stmt\Return_;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacto = Contacto::all();

        return view('mostrar_contactos', compact('contacto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crear_contacto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactoRequest $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string',
            'correo_electronico' => 'required|email|unique:contactos,correo_electronico',
            'telefono' => 'required|integer',
            'empresa' => 'required|string',
        ]);

        $contacto = Contacto::create($validatedData);

        return redirect()->route('contacto.index')->with('exitoso', 'Contacto creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contacto = Contacto::find($id);
        return view('editar-contacto', compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactoRequest $request,  $id)
    {
        $contacto = Contacto::find($id);
        $contacto->update($request->all());

        return redirect()->route('contacto.index')->with('edit',
        'Contacto modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contacto $contacto)
    {
        $contacto->delete();

        return redirect()->route('contacto.index')->with('delete', 'Contacto eliminado exitosamente');
    }
}
