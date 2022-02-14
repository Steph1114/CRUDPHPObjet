<?php

/**
 * Met à dispostion des controlleurs une classe abstraite qui leur permet d'utiliser les attributs et les méthodes définies
 * Elle est mise à disposition, afin de mettre en place ce qui est commun à tout les controlleurs 
 * ---
 * Les attributs sont mis protected pour qu'ils soient accessible uniquement dans cette classe et les enfants qui en héritent
 * En revanche ceux qui peuvent instancier les controlleurs, ont les méthodes getView et getData mis à leurs dispositions
 */
abstract class C_core 
{
    protected $data;
    protected $view;


    public function getView()
    {
        return $this->view;
    }

    
    public function getData() 
    {
        return $this->data;
    }


}