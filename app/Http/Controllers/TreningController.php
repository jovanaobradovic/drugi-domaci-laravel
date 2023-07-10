<?php

namespace App\Http\Controllers;


use App\Http\Resources\TreningResurs as Resurs;
use App\Models\Trening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TreningController extends ResponseController
{
    public function index()
    {
        $podaci = Trening::all();
        return $this->success(Resurs::collection($podaci), 'Vraceni svi podaci o treninzima!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nazivTreninga' => 'required',
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $objekat = Trening::create($input);

        return $this->success(new Resurs($objekat), 'Novi Trening je napravljen.');
    }


    public function show($id)
    {
        $objekat = Trening::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }
        return $this->success(new Resurs($objekat), 'Objekat sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $objekat = Trening::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'nazivTreninga' => 'required',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $objekat->nazivTreninga = $input['nazivTreninga'];
        $objekat->save();

        return $this->success(new Resurs($objekat), 'Objekat je azuriran.');
    }

    public function destroy($id)
    {
        $objekat = Trening::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }

        $objekat->delete();
        return $this->success([], 'Objekat je obrisan.');
    }
}
