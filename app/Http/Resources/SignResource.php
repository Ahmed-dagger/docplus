<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>(int)$this->id,
            'name'=>$this->getTranslation('name', session_lang()),
            'is_checked'=>$this->is_checked,
        ];
    }
}
