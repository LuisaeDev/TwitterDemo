<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TweetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return array(
            'uuid' => $this->uuid,
            'message' => $this->message,
            'email' => $this->email,
            'type' => $this->type,
            'ref' => $this->ref,
            'n_comments' => $this->n_comments,
            'n_retweets' => $this->n_retweets,
            'n_likes' => $this->n_likes,
            'created_at' => $this->created_at,
            'user' => [
                'uuid' => $this->user->uuid,
                'name' => $this->user->name,
                'at_username' => $this->user->username,
                'profile_url' => $this->user->profile_url,
                'profile_photo_path' => $this->user->profile_photo_path,
            ]
        );
    }
}
