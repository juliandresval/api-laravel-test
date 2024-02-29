<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RechargeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = $this->user()->getResults();
        $subscription = $this->subscription()->getResults();
        return [
            'id' => $this->id,
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
                'full_name' => $user->full_name,
                'email' => $user->email
            ],
            'subscription' => [
                'id' => $subscription->id,
                'name' => $subscription->name
            ],
            'value' => $this->value,
            'state' => $this->state,
            'created_at' => $this->created_at,
            'updated_at' => $this->created_at
        ];
    }
}
