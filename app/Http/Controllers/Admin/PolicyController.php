<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\PrivacyPolicy;

class PolicyController extends Controller
{
    public function index()
    {
        $policys = PrivacyPolicy::get();
        
        return view('admin.policy.index', compact('policys'));
    }

    public function create()
    {
        return view('admin.policy.create');
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

        $policy = PrivacyPolicy::create($fields);

        if ($policy)
        {
            Session::flash('flash_message', 'Se ha creado una nueva Política de Privacidad');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Hubo un error al crear Política de Privacidad');
            Session::flash('flash_message_type', 'success');
        }
        return redirect('admin/policy');
    }

    public function edit($id)
    {
        $policy = PrivacyPolicy::find($id);

        return view('admin.policy.edit',compact('policy'));
    }

    public function update(Request $request, $id)
    {
        $policy = PrivacyPolicy::find($id);
        $fields = $request->all();
        $v= Validator::make($request->all(),[
            'description' => 'required|string'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $policy->update($fields);

        Session::flash('flash_message', 'Se ha actualizado la Política de Privacidad');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/policy');
    }

    public function destroy($id)
    {
        $policy = PrivacyPolicy::findOrFail($id);
        if ($policy) {
            $policy->delete();
            Session::flash('flash_message', '¡Política de Privacidad eliminada!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'Política de Privacidad no pudo ser eliminada.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/policy');
    }
}
