<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Titel' => $this->Titel,
            'Priority' => $this->Priority,
            'Type' => $this->Type,
            'ColumnID' => $this->Column_id,
            'ColorTask' => $this->ColorTask
        ];
    }
}
