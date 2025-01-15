<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\depot;
use App\Models\action;
use App\Models\transaction;
use Illuminate\Support\Facades\Auth;


class dashboard extends Controller
{

    protected $op = 0; //Variable qui represente si une operation a ete faite pour afficher un message de confirmation ( 0 ou 1 )






    

    public function showDash(){

   

        $this->op = 0;  // il n'y a pas d'operation
        $VL  = action::distinct()->pluck('VL')->first();    // retourne la VL qui est la meme pour toute les actions

        $exp =  $VL+$VL*0.04;

        Action::whereNotNull('VL')
        ->update([
            'VL'=> $exp,
        ]);
      

        $depots = depot::where('users_id',Auth::id())->get(); // retourne les depots en fonction de l'utilisateur

        $sumDepots = $depots->sum('Montant');

        $sumDepotsFrais = $sumDepots - $sumDepots*0.02;


        return view('dashboard',['VL'=> $VL,'op'=>$this->op,'depots'=>$depots,'somme'=>$sumDepots,'apresfrais'=> $sumDepotsFrais]);

}


    public function showForm(){

        $this->op = 0;  // il n'y a pas d'operation

        $VL  = action::distinct()->pluck('VL')->first();    // retourne la VL qui est la meme pour toute les actions
        $numbers = [    // le choix du nombre des actions achetable
            1 => 1,
            10 => 10,
            50 => 50,
            100 => 100,
        ];

        return view('form',['VL'=> $VL,'numbers'=>$numbers]);
    }

    public function doForm(Request $request){


        
        $VL  = action::distinct()->pluck('VL')->first();    // retourne la VL qui est la meme pour toute les actions
        
        $id_action_dispo = action::where('statut','dispo')->pluck('id')->first();   // id de la derniere action dispo

        $data = $request->montant; // nombre d'actions: 1,10,50,100

        $total = $data*$VL; //montant total a payer

        $id = Auth::id();   // id de l'utilisateur connecté

        $frais = $total*0.02;

        $depot = Depot::create([     // creation du depot
            'Montant' => $total,
            'users_id' => $id,
            'frais' => $frais
        ]);


        Action::whereBetween('id',[$id_action_dispo,$id_action_dispo+$data-1]) // modification de champs de l'action pour qu'elle appartienne au dernier depot crée
                ->update([
                    'depots_id' => $depot->id,
                    'statut' => 'indispo'
                ]);

        Transaction::create([
            'users_id' =>$id,
            'montant' => $total,
            'type' => 'achat',
        ]);

            

        $this->op = 1;  // signal qu'une operation a ete realisé pour afficher un message de confirmation

        

        return view('dashboard',['op'=>$this->op,'id_action_dispo'=>$id_action_dispo]);
        
    }

    public function showretrait(){


        $VL  = action::distinct()->pluck('VL')->first();    // retourne la VL qui est la meme pour toute les actions

        $min_depot = depot::whereNotNull('montant')->min("montant");

        $depots = depot::where('users_id',Auth::id())->get(); // retourne les depots en fonction de l'utilisateur

        $sumDepots = $depots->sum('Montant');    //retourne la somme des depots


        

        return view('retrait',['VL'=> $VL,'depots'=>$depots]);
       
    }

    public function doRetrait(Request $request){
        
        $id = Auth::id();

        $depotId = $request->input('depot_id');

        $montant = $request->input('montant_apres_frais');

        action::where('depots_id',$depotId)
                ->update([
                    'depots_id' => NULL,
                    'statut' => 'dispo'
                ]);

        depot::where('id',$depotId)->delete();

        $this->op = 1;


        Transaction::create([
            'users_id' =>$id,
            'montant' => $montant,
            'type' => 'retrait',
        ]);

        return view('dashboard',['op'=>$this->op]);
    }

    public function showH(){

        $historiques = transaction::all();


        return view('historique',['historiques'=>$historiques]);
    }

    
}
