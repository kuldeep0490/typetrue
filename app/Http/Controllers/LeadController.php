<?php

namespace App\Http\Controllers;

use App\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        return Lead::create([
            'age' => $request->age,
            'gender' => $request->gender,
            'diagnosedMonthsAgo' => $request->diagnosedMonthsAgo,
            'smoker' => $request->smoker,
            'heightInInches' => $request->heightInInches,
            'weightInPounds' => $request->weightInPounds,
            'a1c' => $request->a1c,
            'bmi' => $request->bmi,
            'rating' => $request->rating,
        ]);
    }

    public function update(Request $request) {
        $lead = Lead::findOrFail($request->lead_id);

        if ($request->filled('full_name')) {
            $name = explode(' ', $request->full_name);
            if (count($name) > 1) {
                $lead->last_name = array_pop($name);
                $lead->first_name = implode(' ', $name);
            } else {
                $lead->first_name = array_key_exists(0, $name) ? $name[0] : '';
            }
        }

        if ($request->filled('first_name')) {
            $lead->first_name = $request->first_name;
        }

        if ($request->filled('last_name')) {
            $lead->last_name = $request->last_name;
        }

        if ($request->filled('age')) {
            $lead->age = $request->age;
        }

        if ($request->filled('diagnosedMonthsAgo')) {
            $lead->diagnosedMonthsAgo = $request->diagnosedMonthsAgo;
        }

        if ($request->filled('smoker')) {
            $lead->smoker = $request->smoker;
        }

        if ($request->filled('heightInInches')) {
            $lead->heightInInches = $request->heightInInches;
        }

        if ($request->filled('weightInPounds')) {
            $lead->weightInPounds = $request->weightInPounds;
        }

        if ($request->filled('a1c')) {
            $lead->a1c = $request->a1c;
        }

        if ($request->filled('bmi')) {
            $lead->bmi = $request->bmi;
        }

        if ($request->filled('rating')) {
            $lead->rating = $request->rating;
        }

        if ($request->filled('email')) {
            $lead->email = $request->email;
        }

        if ($request->filled('phone')) {
            $lead->phone = $request->phone;
        }

        if ($request->filled('hasComplications')) {
            $lead->hasComplications = $request->hasComplications;
        }

        if ($request->filled('declined')) {
            $lead->declined = $request->declined;
        }

        if ($request->filled('declineReason')) {
            $lead->declineReason = $request->declineReason;
        }

        if ($request->filled('product')) {
            $lead->product = $request->product;
        }

        if ($request->filled('faceAmount')) {
            $lead->faceAmount = $request->faceAmount;
        }

        if ($request->filled('monthlyPremium')) {
            $lead->monthlyPremium = $request->monthlyPremium;
        }

        if ($request->filled('product2')) {
            $lead->product2 = $request->product2;
        }

        if ($request->filled('faceAmount2')) {
            $lead->faceAmount2 = $request->faceAmount2;
        }

        if ($request->filled('monthlyPremium2')) {
            $lead->monthlyPremium2 = $request->monthlyPremium2;
        }

        $lead->save();

        return $lead;
    }
}
