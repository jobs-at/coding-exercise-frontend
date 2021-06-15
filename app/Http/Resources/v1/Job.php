<?php

namespace App\Http\Resources\v1;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Job extends JsonResource
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
            'company_id'  => $this->company_id,
            'title'       => $this->title,
            'description' => $this->description,
            'location'    => $this->location,
            'active'      => $this->active,
            'datetime'    =>  Carbon::parse($this->created_at)->format('Y-M-d HH:mm:ss'),
        ];
    }
}
