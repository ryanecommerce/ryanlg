<?php

namespace App\Http\Controllers;

use App\Dschedule;
use Illuminate\Http\Request;

class DscheduleController extends Controller
{
    public $rules = [
        'name' => 'required|min:3',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Dschedule::all();
        return $items;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, $this->rules);

        $item = new Dschedule();
        $item->name = $request->name;
        $item->status = $request->status;
        $item->save();

        return response()->json($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules);

        $item = Dschedule::findOrFail($id);
        $item->name = $request->name;
        $item->status = $request->status;
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();

        return response()->json($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Dschedule::findOrFail($id);
        $item->delete();

        return response()->json($item);
    }
}