<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriberRequest;
use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Store a New Subscriber for a Website
     * 
     * @urlParam id integer required ID of the Website
     * @bodyParam subscriber_id integer ID of the Subscriber
     * 
     * @response {
     * 
     * }
     */
    public function store(SubscriberRequest $subscriberRequest, int $id)
    {
        $website = Website::findOrFail($id);
        $subscriber = Subscriber::find( $subscriberRequest['subscriber_id'] );
        
        $website->subscribers()->create([
            'name'  =>  $subscriber->name,
            'email' =>  $subscriber->email
        ]);
        
        return $this->sendResponse(
            'Subscription Success', 
            ['A New Subscriber has been added']
        );
    }
}
