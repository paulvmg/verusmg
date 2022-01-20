<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::get();
        
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $fields = $request->all();
        $v= Validator::make($request->all(),[
            'question' => 'required|string',
            'answer' => 'required|string'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $faq = Faq::create($fields);

        if ($faq)
        {
            Session::flash('flash_message', 'Se ha creado una nueva FAQ');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Hubo un error al crear FAQ');
            Session::flash('flash_message_type', 'success');
        }
        return redirect('admin/faqs');
    }

    public function edit($id)
    {
        $faq = Faq::find($id);

        return view('admin.faqs.edit',compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::find($id);
        $fields = $request->all();
        $v= Validator::make($request->all(),[
            'question' => 'required|string',
            'answer' => 'required|string'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $faq->update($fields);

        Session::flash('flash_message', 'Se ha actualizado la FAQ');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/faqs');
    }

    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        if ($faq) {
            $faq->delete();
            Session::flash('flash_message', '¡FAQ eliminada!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'FAQ no pudo ser eliminada.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/faqs');
    }
}
