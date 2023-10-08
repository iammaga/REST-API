<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotebookResource;
use App\Models\Notebook;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NotebookController extends Controller
{
    public function index()
    {
        $notebooks = Notebook::paginate(10);
        // return NotebookResource::collection(Notebook::all());
        return $notebooks;
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'full_name' => 'required',
            'company_name' => 'nullable',
            'phone' => ['required', Rule::unique('notebooks', 'phone')],
            'email' => ['required', 'email', Rule::unique('notebooks', 'email')],
            'birthday' => 'nullable',
            'photo' => 'nullable',
        ]);
        $data = Notebook::create($formFields);

        return new NotebookResource($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new NotebookResource(Notebook::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notebook $notebook)
    {
        $notebook->fill($request->all());
        $notebook->save();

        return $notebook;
    }

    public function destroy(Notebook $notebook)
    {
        if ($notebook->delete()) {
            return 'Notebook deleted successfully!';
        }
    }
}
