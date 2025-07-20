<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AngResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public $status, $message;
    public function __construct($status, $message, $resource,$id=null,$session = null,$token = null)
    {
        parent::__construct($resource);
        $this->status  = $status;
        $this->message = $message;
        $this->id  = $id;
        $this->session  = $session;
        $this->token  = $token;
    }
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "success"=> $this->status,
            "message"=> $this->message,
            "session"=> $this->session,
            "id"=> $this->id,
            "data"=> $this->resource,
            "token"=> $this->token
        ];
    }
}
