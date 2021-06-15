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
                        'company_id'   => $item->company_id ,
                        'title'        => $item->title ,
                        'description'  => $item->description ,
                        'location'     => $item->location ,
                        'active'       => $item->active ,
                        'published_at' => $item->published_at ,
                        'datetime'     => Carbon::parse($item->created_at)->format('Y-M-d HH:mm:ss') ,
                        'company'      => new Company($item->company)
                    ];
                })
            ];
        }
    }



