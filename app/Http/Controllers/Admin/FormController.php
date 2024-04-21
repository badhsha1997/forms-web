<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendFormCreationEmail;
use App\Models\Element;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::latest()->paginate(10);

        return view('admin.pages.forms.index', compact('forms'));
    }

    public function create()
    {
        return view('admin.pages.forms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $form = new Form();
        $form->title = $request->input('title');
        $form->save();

        foreach ($request->input('elements') as $inputElement) {
            if(isset($inputElement['type']) && isset($inputElement['label'])) {
                $element = new Element();
                $element->form_id = $form->id;
                $element->type = $inputElement['type'];
                $element->label = $inputElement['label'];
                $element->options = $inputElement['options'];
                $element->save();
            }
        }

        SendFormCreationEmail::dispatch();

        return redirect(route('admin.forms.index'))->with('success', 'Form successfully created.');
    }

    public function edit(Form $form)
    {
        return view('admin.pages.forms.edit', compact('form'));
    }

    public function update(Form $form, Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $form->title = $request->input('title');
        $form->save();

        $form->elements()->delete();

        foreach ($request->input('elements') as $inputElement) {
            if(isset($inputElement['type']) && isset($inputElement['label'])) {
                $element = new Element();
                $element->form_id = $form->id;
                $element->type = $inputElement['type'];
                $element->label = $inputElement['label'];
                $element->options = $inputElement['options'];
                $element->save();
            }
        }

        return redirect(route('admin.forms.index'))->with('success', 'Form successfully updated.');
    }

    public function destroy(Form $form)
    {
        $form->elements()->delete();
        $form->delete();

        return redirect(route('admin.forms.index'))->with('success', 'Form successfully deleted.');
    }
}
