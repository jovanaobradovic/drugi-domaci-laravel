<?php

namespace App\Http\Resources;

use App\Models\Dan;
use App\Models\Termin;
use App\Models\Trening;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RasporedResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $dan = Dan::find($this->danId);
        $termin = Termin::find($this->terminId);
        $trening = Trening::find($this->treningId);

        return [
            'id' => $this->id,
            'dan' => $dan->nazivDana,
            'termin' => $termin->nazivTermina,
            'trening' => $trening->nazivTreninga,
            'trener' => $this->trener,
            'napomena' => $this->napomena
        ];
    }
}
