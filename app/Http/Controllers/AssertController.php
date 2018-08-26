<?php

namespace App\Http\Controllers;

use App\Assert;
use Illuminate\Http\Request;

class AssertController extends Controller
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
        $items = Assert::all();
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

        $item = new Assert();
        $item->category = $request->category;
        $item->name = $request->name;
        $item->account_number = $request->account_number;
        $item->blance = $request->blance;
        $item->save();

        return response()->json($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules);

        $item = Assert::findOrFail($id);
        $item->category = $request->category;
        $item->name = $request->name;
        $item->account_number = $request->account_number;
        $item->blance = $request->blance;
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();

        return response()->json($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Assert::findOrFail($id);
        $item->delete();

        return response()->json($item);
    }
}
