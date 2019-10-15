<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use Sentinel;

class SubscriptionController extends Controller
{
 
    public function store(Request $request, Plan $plan)
    {
    
         if(Sentinel::getUser()->subscribedToPlan($plan->stripe_plan, 'main')) {
             return redirect()->route('/')->with('success', 'You have already subscribed the plan');
         }
         $plan = Plan::findOrFail($request->get('plan'));
        
         Sentinel::getUser()
             ->newSubscription('main', $plan->stripe_plan)
             ->create($request->stripeToken);
        
         return redirect()->route('/')->with('success', 'Your plan subscribed successfully');
    }
}
