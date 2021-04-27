<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'favorites_count' => $this->favorites->count(),
            'created_at'=>$this->created_at->diffForHumans(),
            'user' => [
                'username' => $this->user->username,
            ]
        ];

    }
}
