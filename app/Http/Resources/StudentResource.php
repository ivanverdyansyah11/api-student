<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    public $status;
    public $message;
    public $resource;
    public $code;

    /**
     * __construct
     *
     * @param  mixed $status
     * @param  mixed $message
     * @param  mixed $resource
     * @param  mixed $code
     * @return void
     */
    public function __construct($status, $message, $resource, $code)
    {
        parent::__construct($resource);
        $this->status  = $status;
        $this->message = $message;
        $this->code = $code;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'success'   => $this->status,
            'message'   => $this->message,
            'data'      => $this->resource,
            'code'   => $this->code,
        ];
    }
}
