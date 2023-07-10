<?php

namespace App\Http\Controllers;


use App\Http\Resources\TerminResurs as Resurs;
use App\Models\Termin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TerminController extends ResponseController
{
    public function index()
    {
        $podaci = Termin::all();
        return $this->success(Resurs::collection($podaci), 'Vraceni svi podaci o terminima!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nazivTermina' => 'required',
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $objekat = Termin::create($input);

        return $this->success(new Resurs($objekat), 'Novi termin je napravljen.');
    }


    public function show($id)
    {
        $objekat = Termin::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }
        return $this->success(new Resurs($objekat), 'Objekat sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $objekat = Termin::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'nazivTermina' => 'required',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $objekat->nazivTermina = $input['nazivTermina'];
        $objekat->save();

        return $this->success(new Resurs($objekat), 'Objekat je azuriran.');
    }

    public function destroy($id)
    {
        $objekat = Termin::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }

        $objekat->delete();
        return $this->success([], 'Objekat je obrisan.');
    }
}
