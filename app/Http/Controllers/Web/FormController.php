<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Form;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::latest()->paginate(10);

        return view('web.pages.forms.index', compact('forms'));
    }

    public function show(Form $form)
    {
        return view('web.pages.forms.show', compact('form'));
    }
}
