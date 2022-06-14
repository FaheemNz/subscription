<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Jobs\SubscriptionMailJob;
use App\Mail\SubscriptionMail;
use App\Models\Post;
use App\Models\Website;

class PostController extends Controller
{
    /**
     * Create a New Post
     * 
     * @urlParam website integer required ID of the Website
     * @bodyParam title string Title of the Post
     * @bodyParam description string Description of the Post
     * 
     * @response {
     *       "success": true,
     *       "message": "New Post created successfully",
     *       "data": {
     *           "title": "Post 1",
     *           "description": "Description of Post 1",
     *           "website_id": 1,
     *           "updated_at": "2022-06-14T20:40:51.000000Z",
     *           "created_at": "2022-06-14T20:40:51.000000Z",
     *           "id": 2
     *       }
     *  }
     */
    public function store(PostRequest $postRequest, Website $website)
    {
        $postData = $postRequest->validated();
        
        $thePost = $website->posts()->create([
            'title'         =>  $postData['title'],
            'description'   =>  $postData['description'],
        ]);
        
        foreach( $website->subscribers as $subscriber ){
            dispatch( 
                new SubscriptionMailJob($subscriber, $thePost)
            );
        }
        
        return $this->sendResponse(
            'New Post created successfully', 
            $thePost->toArray()
        );
    }
}
