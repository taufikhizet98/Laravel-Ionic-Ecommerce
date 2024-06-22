<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class AdminCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::all();

        return response()->json([
            'success' => 1,
            'data' => $coupons
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
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|unique:coupons,code',
            'isPercentage' => 'required|boolean',
            'description' => 'nullable|string',
            'isActive' => 'required|boolean',
            'expiryDate' => 'required|date',
            'discount' => 'required|integer|min:0',
            'minimumOrderAmount' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $coupon = Coupon::create($request->all());

        return response()->json([
            'success' => 1,
            'data' => $coupon], 
            201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coupon = Coupon::find($id);

        if (!$coupon) {
            return response()->json(['error' => 'Coupon not found'], 404);
        }
    
        return response()->json(['data' => $coupon]);
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
        $coupon = Coupon::find($id);
    
        if (!$coupon) {
            return response()->json(['error' => 'Coupon not found'], 404);
        }
    
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|unique:coupons,code,' . $id,
            'isPercentage' => 'required|boolean',
            'description' => 'nullable|string',
            'isActive' => 'required|boolean',
            'expiryDate' => 'required|date',
            'discount' => 'required|integer|min:0',
            'minimumOrderAmount' => 'required|numeric|min:0',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
    
        $coupon->update($request->all());
    
        return response()->json([
            'success' => 1,
            'data' => $coupon,
        ]);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon = Coupon::find($id);

        if($coupon->delete())
        {
            return response()->json(['success' => 1]);
        }

        return response()->json(['success' => 0]);
    }
}
