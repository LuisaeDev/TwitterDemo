<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FollowResource extends JsonResource
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
            'name' => $this->name,
            'at_username' => $this->username,
            'profile_url' => $this->profile_url,
            'profile_photo_path' => $this->profile_photo_path,
        );
    }
}
