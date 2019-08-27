<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $btn_show = '<center><a href="' . route('user.edit', $this->id) .'" class="btn btn-sm btn-info"><i class="fa fa-info-circle"></i></a></center>';
        $btn_edit = '<center><a href="' . route('user.edit', $this->id) .'" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a></center>';
        $btn_destroy = '<center><a href="' . route('user.edit', $this->id) .'" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></center>';
        return [
            'nama_lengkap'  => $this->name,
            'username'      => $this->username,
            'created_at'    => $this->created_at->format('d/m/y'),
            'updated_at'    => $this->updated_at->format('d/m/y'),
            'register_from' => $this->created_at->diffForHumans(),
            'show'          => $btn_show,
            'edit'          => $btn_edit,
            'delete'        => $btn_destroy


        ];
    }
    public $preserveKeys = true;
}
