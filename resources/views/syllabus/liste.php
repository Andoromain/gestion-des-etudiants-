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
    $req=DB::table('syllabus')->where('id_etab',$_GET['etab'])->where('type',$_GET['formation'])->get();  
    foreach($req as $row){
        $formateur=DB::table('formateurs')->join('syllabus','syllabus.id_frteur','=','formateurs.id')->where('formateurs.id',$row->id_frteur)->get()->first();
        $etudiants=DB::table('etudiants')->join('absences','absences.id_etudiant','=','etudiants.id')->where('absences.id_syllabus',$row->id)->get();
        $tout='';
        foreach($etudiants as $etudiant){
            $tout=$tout.'<br>-'.$etudiant->matricule.' '.$etudiant->nomEt.' '.$etudiant->prenomEt;
        }
        $data[]=array(
            'id' => $row->id,
            'title' => ' ',
            'id_formateur' => $row->id_frteur,
            'matiere' => $row->matiere,
            'formateur' => $formateur->titreF.' '.$formateur->nomF.' '.$formateur->prenomF,
            'heureDebut' => $row->heureDebut,
            'heureFin' => $row->heureFin,
            'date' => $row->jour,
            'resume' => $row->resume,
            'absences'=>$tout,
            'start' => $row->jour.'T'.$row->heureDebut,
            'end' => $row->jour.'T'.$row->heureFin,
        );  
    }
    echo json_encode($data);
    ?>
