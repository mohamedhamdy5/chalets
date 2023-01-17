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

}
