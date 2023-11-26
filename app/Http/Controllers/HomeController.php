<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estates = Estate::latest()->take(6)->get();
        $randoms = Estate::inRandomOrder()->take(4)->get();
        return view('home', [
            'estates' => $estates,
            'randoms' => $randoms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Display a listing of the resource.
     */
    public function categories()
    {
        $estates = Estate::latest()->get();
        return view('categories', [
            'estates' => $estates
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function details($id)
    {
        $estate = Estate::where('id', $id)->first();
        return view('details', [
            'estate' => $estate
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function aboutUs()
    {
        return view('aboutUs');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $estates = Estate::latest()->get();
        return view('clients-dashboard', [
            'estates' => $estates
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
