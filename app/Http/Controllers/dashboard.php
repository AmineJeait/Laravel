<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\depot;
use Illuminate\Support\Facades\Auth;


class dashboard extends Controller
{
    protected $VL = 10; //Variable
    protected $op = 0; //Variable qui represente si une operation a ete faite pour afficher un message de confirmation ( 0 ou 1 )

    public function showDash(){
        $this->op = 0;
        $id = Auth::id();

        $depots = depot::where('users_id',$id)->get();
        $sumDepots = depot::sum('Montant');


        return view('dashboard',['VL'=> $this->VL,'op'=>$this->op,'depots'=>$depots,'somme'=>$sumDepots]);

}


    public function showForm(){
        $this->op = 0;
        $numbers = [
            1 => 1,
            10 => 10,
            50 => 50,
            100 => 100,
        ];

        return view('form',['VL'=> $this->VL,'numbers'=>$numbers]);
    }

    public function doForm(Request $request){


        
        

        $data = $request->montant;

        $total = $data*$this->VL;

        $id = Auth::id();

        Depot::create([
            'Montant' => $data,
            'users_id' => $id
        ]);

        $this->op = 1;
        // return redirect(to:'/dashboard');
        return view('dashboard',['op'=>$this->op]);
        
    }

    public function showretrait(){
        return view('retrait');
       
    }

    
}
