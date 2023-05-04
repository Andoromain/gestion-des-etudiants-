<?php
   /*if(isset($_GET['mention']) && isset($_GET['niveau'])){ 
        $data=array();
        
    $req=DB::table('emploisdutemps')->join('aproposet','emploisdutemps.aproposet','=','aproposet.id')->where('aproposet.niveau',$_GET['niveau'])->where('aproposet.mention',$_GET['mention'])->get();  
   // $req=DB::select("select *from emploisdutemps where aproposet=?",[$idapro]);  

    foreach($req as $row){
        $data[]=array(
            'id' => $row->id,
            'ap' => $row->aproposet,
            'title' => $row->matiere,
            'matiere' => $row->matiere,
            'heuredebut' => $row->heuredebut,
            'heurefin' => $row->heurefin,
            'date' => $row->date,
            'start' => $row->date.'T'.$row->heuredebut,
            'end' => $row->date.'T'.$row->heurefin,
        );
    }
    echo json_encode($data);
    }*/
    $data=array();
    $req=DB::table('emploisdutemps')->where('id_etab',$_GET['etab'])->where('id_frtion',$_GET['formation'])->get();  
    foreach($req as $row){
        $formation=DB::table('formations')->join('emploisdutemps','emploisdutemps.id_frtion','=','formations.id')->where('formations.id',$row->id_frtion)->get()->first();
        $formateur=DB::table('formateurs')->join('emploisdutemps','emploisdutemps.id_frteur','=','formateurs.id')->where('formateurs.id',$row->id_frteur)->get()->first();
        $parcours=DB::table('parcours')->join('emploisdutemps','emploisdutemps.id_parc','=','parcours.id')->where('parcours.id',$row->id_parc)->get()->first();
        $data[]=array(
            'id' => $row->id,
            'title' => $parcours->nomP,
            'couleur' => $row->couleur,
            'id_formateur' => $row->id_frteur,
            'id_etab' => $row->id_etab,
            'id_parc' => $row->id_parc,
            'id_frtion' => $row->id_frtion,
            'titre' => $formateur->titreF,
            'formateur' => $formateur->nomF,
            'backgroundColor' => $row->couleur,
            'heureDebut' => $row->heureDebut,
            'heureFin' => $row->heureFin,
            'date' => $row->jour,
            'start' => $row->jour.'T'.$row->heureDebut,
            'end' => $row->jour.'T'.$row->heureFin,
        );  
    }
    echo json_encode($data);
    ?>
