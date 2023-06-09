<?php

namespace App\Http\Resources;

use App\Http\Hateoas\Objeto as HateoasObjeto;
use Illuminate\Http\Resources\Json\JsonResource;

class ObjetoResource extends JsonResource
{
    // static public $wrap = "";

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id"            => $this->id,
            "nome"          => $this->nome,
            "descricao"     => $this->descricao,
            "entregue"      => $this->entregue,
            "data_cadastro" => substr($this->created_at, 0, 10),
            "imagem"        => $this->imagem_objeto ? (config("app.url") . $this->imagem_objeto) : null,
            "links"         => (new HateoasObjeto)->links($this->resource)
        ];
    }
}
