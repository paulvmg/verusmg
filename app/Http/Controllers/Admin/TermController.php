<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Term;

class TermController extends Controller
{
    public function index()
    {
        $terms = Term::get();
        
        return view('admin.terms.index', compact('terms'));
    }

    public function create()
    {
        return view('admin.terms.create');
    }

    public function store(Request $request)
    {
        $fields = $request->all();
        $v= Validator::make($request->all(),[
            'description' => 'required|string'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $term = Term::create($fields);

        if ($term)
        {
            Session::flash('flash_message', 'Se ha creado un nuevo Término de Uso');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Hubo un error al crear el Término de Uso');
            Session::flash('flash_message_type', 'success');
        }
        return redirect('admin/terms');
    }

    public function edit($id)
    {
        $term = Term::find($id);

        return view('admin.terms.edit',compact('term'));
    }

    public function update(Request $request, $id)
    {
        $term = Term::find($id);
        $fields = $request->all();
        $v= Validator::make($request->all(),[
            'description' => 'required|string'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $term->update($fields);

        Session::flash('flash_message', 'Se ha actualizado el Término de Uso');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/terms');
    }

    public function destroy($id)
    {
        $term = Term::findOrFail($id);
        if ($term) {
            $term->delete();
            Session::flash('flash_message', '¡Término de uso Eliminado!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'Término de uso no pudo ser eliminado.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/terms');
    }
}
