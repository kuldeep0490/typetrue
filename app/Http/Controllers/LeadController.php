<?php

namespace App\Http\Controllers;

use App\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        return Lead::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'age' => $request->age,
            'gender' => $request->gender,
            'diagnosedMonthsAgo' => $request->diagnosedMonthsAgo,
            'smoker' => $request->smoker,
            'heightInInches' => $request->heightInInches,
            'weightInPounds' => $request->weightInPounds,
            'a1c' => $request->a1c,
            'hasComplications' => $request->hasComplications,
            'bmi' => $request->bmi,
            'rating' => $request->rating,
        ]);
    }

    public function update(Request $request) {
        $lead = Lead::findOrFail($request->lead_id);
        $lead->product = $request->product;
        $lead->faceAmount = $request->faceAmount;
        $lead->monthlyPremium = $request->monthlyPremium;
        $lead->save();

        return $lead;
    }
}
