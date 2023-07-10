<?php

namespace App\Http\Controllers;


use App\Http\Resources\DanResurs as Resurs;
use App\Models\Dan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DanController extends ResponseController
{
    public function index()
    {
        $podaci = Dan::all();
        return $this->success(Resurs::collection($podaci), 'Vraceni svi podaci o danima!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nazivDana' => 'required',
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $objekat = Dan::create($input);

        return $this->success(new Resurs($objekat), 'Novi dan je napravljen.');
    }


    public function show($id)
    {
        $objekat = Dan::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }
        return $this->success(new Resurs($objekat), 'Objekat sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $objekat = Dan::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'nazivDana' => 'required',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $objekat->nazivDana = $input['nazivDana'];
        $objekat->save();

        return $this->success(new Resurs($objekat), 'Objekat je azuriran.');
    }

    public function destroy($id)
    {
        $objekat = Dan::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }

        $objekat->delete();
        return $this->success([], 'Objekat je obrisan.');
    }
}
