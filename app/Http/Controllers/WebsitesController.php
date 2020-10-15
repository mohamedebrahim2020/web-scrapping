<?php

namespace App\Http\Controllers;

use App\Website;
use Illuminate\Http\Request;

class WebsitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $websites = Website::orderBy('id', 'DESC')->paginate(10);

        return view('dashboard.website.index', ['websites' => $websites]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.website.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required',

        ]);

        $website = new Website;

        $website->Website_name = $request->input('title');

        $website->Website_link = $request->input('url');

        $website->save();

        return redirect()->route('websites.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $website = Website::find($id);

        return view('dashboard.website.edit', ['website' => $website]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required'
        ]);

        $website = Website::find($id);

        $website->Website_name = $request->input('title');

        $website->Website_link = $request->input('url');

        $website->save();

        return redirect()->route('websites.index');
    }
}
