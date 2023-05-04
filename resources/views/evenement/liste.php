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
    $req=DB::table('evenements')->where('id_etab',$_GET['etab'])->where('id_formation',$_GET['formation'])->get();  
    foreach($req as $row){
        $etudiants=DB::table('etudiants')->join('obtenirs','obtenirs.id_etudiant','=','etudiants.id')->where('obtenirs.id_evt',$row->id)->get();
        $tout='';
        foreach($etudiants as $etudiant){
            $tout=$tout.'<br>-'.$etudiant->nomEt.' '.$etudiant->prenomEt;
        }
        $data[]=array(
            'id' => $row->id,
            'title' => $row->nomEvt,
            'couleur' => $row->couleur,
            'etudiant' => $tout,
            'formation' => $row->id_formation,
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
