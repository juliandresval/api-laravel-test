<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRechargeRequest;
use App\Http\Requests\UpdateRechargeRequest;
use App\Http\Resources\RechargeResource;
use App\Models\Recharge;
use Illuminate\Http\Request;

class RechargeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->query('limit', 10);
        return RechargeResource::collection(Recharge::paginate($limit));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRechargeRequest $request)
    {
        $instance = Recharge::create($request->validated());
        return RechargeResource::make($instance);
    }

    /**
     * Display the specified resource.
     */
    public function show(Recharge $recharge)
    {
        return RechargeResource::make($recharge);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRechargeRequest $request, Recharge $recharge)
    {
        $recharge->update($request->validated());
        return RechargeResource::make($recharge);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recharge $recharge)
    {
        $recharge->delete();
        return response()->noContent();
    }
}
