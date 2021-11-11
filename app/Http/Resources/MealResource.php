<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "calories"=>$this->calories,
            "carbs"=>$this->carbs,
            "fat"=>$this->fat,
            "protein"=>$this->protein,
            "sodium"=>$this->sodium,
            "sugar"=>$this->sugar,
            "meal_type"=>$this->meal_type,
            "date"=>$this->date,
        ];
    }
}
