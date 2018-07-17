<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Validator;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // http://127.0.0.1:8000/api/items
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    /*
        $this->validate($request, [
            'text' => 'required'
        ]);
    */
        $validator = Validator::make($request->all(), [
            'text' => 'required'
        ]);

        if($validator->fails()) {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;

        } else {
            $item = new Item;
            $item->text = $request->input('text');
            $item->body = $request->input('body');
            $item->save();

            return response()->json($item);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // http://127.0.0.1:8000/api/items/1
    public function show($id)
    {
        $item = Item::find($id);
        return response()->json($item);
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
        $validator = Validator::make($request->all(), [
            'text' => 'required'
        ]);

        if($validator->fails()) {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;

        } else {
            $item = Item::find($id);
            $item->text = $request->input('text');
            $item->body = $request->input('body');
            $item->save();

            return response()->json($item);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        $response = array('response' => 'Item deleted', 'success' => true);
        return $response;
    }
}
