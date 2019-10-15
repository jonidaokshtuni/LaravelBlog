<?php

namespace App\Http\Controllers;
use App\Plan;
use Illuminate\Http\Request;
use Sentinel;

class PlanController extends Controller
{
    
    public function index()
    {
        $plans = Plan::all();
        return view('plans.index', compact('plans'));
    }

    public function show(Plan $plan, Request $request)
    {
        if(Sentinel::getUser()->subscribedToPlan($plan->stripe_plan, 'main')) {
            return redirect()->route('/')->with('success', 'You have already subscribed the plan');
        }
        return view('plans.show', compact('plan'));
    }
}
