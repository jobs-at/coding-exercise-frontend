<?php

    namespace App\Http\Resources\v1;

    use Carbon\Carbon;
    use Illuminate\Http\Resources\Json\ResourceCollection;

    class JobCollection extends ResourceCollection
    {

        /**
         * Transform the resource collection into an array.
         *
         * @param \Illuminate\Http\Request $request
         * @return array
         */
        public function toArray($request)
        {
            return [
                'data' => $this->collection->map(function($item) {
                    return [
                        'id'           => $item->id ,
                        'company_id'   => $item->company_id ,
                        'title'        => $item->title ,
                        'description'  => $item->description ,
                        'location'     => $item->location ,
                        'active'       => $item->active ,
                        'published_at' => Carbon::parse($item->published_at)->format('Y-m-d H:m:s') ,
                        'datetime'     => Carbon::parse($item->created_at)->format('Y-m-d H:m:s') ,
                        'company'      => $item->company->name
                    ];
                })
            ];
        }
    }



