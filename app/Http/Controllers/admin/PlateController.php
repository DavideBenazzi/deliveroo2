<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Plate;
use App\User;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plates = Plate::where('user_id', Auth::id())->get();
        return view('admin.plate.index' , compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //acquisisci dati dalla form(create)
        $data = $request->all();

        //validazione
        $request->validate($this->ruleValidation());

        //get active user
        $data['user_id']=Auth::id();

        //controllo salvataggio photo
        if(!empty($data['photo'])){
            $data['photo'] = Storage::disk('public')->put('photo' , $data['photo']);
        }


        //
        $newPlate = new Plate();
        $newPlate->fill($data);

        $saved = $newPlate->save();

        if($saved){
            return redirect()->route('admin.plate.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //da lavorare con lo slug in futuro
        $plate = Plate::find($id);

        return view('admin.plate.show' , compact('plate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $plate = Plate::find($id);

        //controolo errore utente pag 404 da creare
        // if(empty($plate)){
        //     abort(404);
        // }

        return view('admin.plate.edit' , compact('plate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $request->validate($this->ruleValidation());

        $plate = Plate::find($id);

        //verifica img
        if(!empty($data['photo'])){

            //cancella l'immagine precedente
            if(!empty($plate->photo)){
                Storage::disk('public')->delete($plate->photo);
            }

            $data['photo'] = Storage::disk('public')->put('photo' , $data['photo']);
        }

        $update = $plate->update($data);

        if($update){
            return redirect()->route('admin.plate.show', $plate->id);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        //referenza file da eliminare
        $name = $plate->name;

        //controllo cancellazione
        $delete =$plate->delete();

        if($delete){
            //cancellazione immagine da db
            if(!empty($plate->photo)){
                Storage::disk('public')->delete($plate->photo);
            }
            //ritorno ad index menu dopo cancellazione
            return redirect()->route('admin.plate.index')->with('plate.deleted' , $name);
        }
    }
    private function ruleValidation(){
        return [
            'name' => 'required',
            'description' => '',
            'ingredients' => 'required',
            'allergenic' => 'required',
            'visibility'=>'required',
            'price' => 'required',
            'photo' => 'mimes:jpg,jpeg,png,bmp,psd',
        ];
    }
}
