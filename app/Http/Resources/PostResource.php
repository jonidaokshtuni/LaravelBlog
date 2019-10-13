<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'=> $this->id,
            'user_id'=> $this->user_id,
            'title' => $this->title,
            'subtitle'=> $this->subtitle,
            'slug' => $this->slug,
            'body' => $this->body,
            'image' => $this->image,
            'created_at' => (string)$this->created_at,
            'updated_at' => $this->updated_at,
            'user' => new UserResource($this->user),
        ];


        //return parent::toArray($request);
    }
}
