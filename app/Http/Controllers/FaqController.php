<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::paginate(10);
        return view('new_dashboard.admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('new_dashboard.admin.faqs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string|max:1000|min:10',
            'answer'   => 'required|string|min:10',
        ],
            [
                'question.required' => 'El campo es requerido',
                'question.string'   => 'El campo debe ser de tipo texto',
                'question.max'      => 'El campo no debe ser mayor a 200 caracteres',
                'question.min'      => 'El campo debe tener minimo 20 caracteres',
                'answer.required'   => 'El campo es requerido',
                'answer.string'     => 'El campo debe ser de tipo texto',
                'answer.min'        => 'El campo debe tener minimo 100 caracteres',
            ]);

        Faq::create($data);
        return redirect()->route('faqs.index')->withSuccess('Pregunta Creada Exitosamente');
    }

    public function edit(Faq $faq)
    {
        return view('new_dashboard.admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $request->validate([
            'question' => 'required|string|max:200|min:20',
            'answer'   => 'required|string|min:100',
        ],
            [
                'question.required' => 'El campo es requerido',
                'question.string'   => 'El campo debe ser de tipo texto',
                'question.max'      => 'El campo no debe ser mayor a 200 caracteres',
                'question.min'      => 'El campo debe tener minimo 20 caracteres',
                'answer.required'   => 'El campo es requerido',
                'answer.string'     => 'El campo debe ser de tipo texto',
                'answer.min'        => 'El campo debe tener minimo 100 caracteres',
            ]);

        $faq->update($data);

        return redirect()->back()->withSuccess('FAQ Actualizada Correctamente');
    }

    public function destroy($id)
    {
        $faq = Faq::find($id);
        $faq->delete();
        return redirect()->back()->withSuccess('FAQ Eliminada');
    }
}
