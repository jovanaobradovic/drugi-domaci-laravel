<?php

namespace App\Http\Controllers;


use App\Http\Resources\RasporedResurs as Resurs;
use App\Models\Raspored;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RasporedController extends ResponseController
{
    public function index()
    {
        $podaci = Raspored::all();
        return $this->success(Resurs::collection($podaci), 'Vraceni svi podaci o rasporedima!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'danId' => 'required',
            'terminId' => 'required',
            'treningId' => 'required',
            'trener' => 'required',
            'napomena' => 'required',
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $objekat = Raspored::create($input);

        return $this->success(new Resurs($objekat), 'Novi raspored je napravljen.');
    }


    public function show($id)
    {
        $objekat = Raspored::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }
        return $this->success(new Resurs($objekat), 'Objekat sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $objekat = Raspored::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'danId' => 'required',
            'terminId' => 'required',
            'treningId' => 'required',
            'trener' => 'required',
            'napomena' => 'required',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $objekat->danId = $input['danId'];
        $objekat->terminId = $input['terminId'];
        $objekat->treningId = $input['treningId'];
        $objekat->trener = $input['trener'];
        $objekat->napomena = $input['napomena'];
        $objekat->save();

        return $this->success(new Resurs($objekat), 'Objekat je azuriran.');
    }

    public function destroy($id)
    {
        $objekat = Raspored::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }

        $objekat->delete();
        return $this->success([], 'Objekat je obrisan.');
    }
}
