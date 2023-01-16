<?php

namespace App\Http\Controllers;

use App\Models\Chalet;
use App\Models\Season;
use Illuminate\Http\Request;

class ChaletsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    $TYPES = Chalet::TYPES;
      $SIZES = Chalet::SIZES;
      $seasons = Season::get();
      $chalets = Chalet::with('seasons')->get();
      return view('chalet.index',compact('TYPES', 'SIZES', 'chalets', 'seasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $TYPES = Chalet::TYPES;
      $SIZES = Chalet::SIZES;
      $seasons = Season::get();
      return view('chalet.create',compact('TYPES', 'SIZES', 'seasons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //   $data['pool'] = $request->input('pool')?1:0;
    //   $data['external_session'] = $request->input('external_session')?1:0;
    //   $chalet = Chalet::create($data);

    //   return redirect()->route('chalet.index')->with('success', __('messages.Chalet Created Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chalet  $chalet
     * @return \Illuminate\Http\Response
     */
    public function show(Chalet $chalet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chalet  $chalet
     * @return \Illuminate\Http\Response
     */
    public function edit(Chalet $chalet)
    {
        $TYPES = Chalet::TYPES;
        $SIZES = Chalet::SIZES;
        $seasons = Season::get();
        return view('chalet.edit',compact('TYPES', 'SIZES', 'seasons', 'chalet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chalet  $chalet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chalet $chalet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chalet  $chalet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chalet $chalet)
    {
        //
    }
}
