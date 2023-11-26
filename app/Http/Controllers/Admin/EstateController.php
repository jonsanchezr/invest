<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estate;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estates = Estate::latest()->get();
        return view('admin.estates', [
            'estates' => $estates
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        return view('admin.estates-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Estate::create([
            'title' => $request->get('title'),
            'address' => $request->get('address'),
            'state' => $request->get('state'),
            'amount' => $request->get('amount'),
        ]);

        return redirect('/admin/estates');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $estate = Estate::where('id', $id)->first();
        return view('admin.estates-edit', [
            'estate' => $estate
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $estate = Estate::where('id', $id)->first();
        $estate->update([
            'title' => $request->get('title'),
            'address' => $request->get('address'),
            'state' => $request->get('state'),
            'amount' => $request->get('amount'),
        ]);

        return redirect('/admin/estates');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estate = Estate::where('id', $id)->first();
        $estate->delete();

        return redirect('/admin/estates');
    }
}
