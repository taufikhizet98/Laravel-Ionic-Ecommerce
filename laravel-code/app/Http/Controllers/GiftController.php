<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gift;
use Validator;
use Config;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $gifts = Gift::where('status', 1);

        $query = $request->get('query');
        if(isset($query)) {
            $gifts = $gifts->where(function ($qry) use ($query) {
                return $qry->where('name', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%');
            });
        }
        $gifts = $gifts->get();

        $server = config('app.server');

        return response()->json([
            'data' => $gifts,
            'server_base_url' => $server,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $gift = Gift::find($id);
        $server = config('app.server');

        return response()->json([
            'data' => $gift,
            'server_base_url' => $server,
        ]);
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

    public function bulkInsert(Request $request)
    {
        // 
    }
}
