<?php 
namespace App\Table; 

/**
 * [Description Produit] Class liée a la page list
 * Doit être ajoutée au fetch(PDO::FETCH_CLASS, $class_name)
 */
class Produit{  

    /**
     * @return [string URL] 
     * Donne l'URL de navigation vers la page détail du produit. 
     * Prend l'ID du produit en $_GET
     */
    public function getURL(){
        return 'details.php?pro_id=' . $this->pro_id; 
    }

    /**
     * @return [sting/file path]
     * Donne le chemin vers l'image liée au produit. 
     * Nomenclature : pro_id.extension. 
     * Si aucune img disponible pour le produit, renvoie l'img par defaut. 
     */
    public function getIMG(){
        $img = scandir('./../pages/img'); 

        if (in_array( $this->pro_id . '.' . $this->pro_photo, $img)){
            return 'img/' . $this->pro_id . '.' . $this->pro_photo;;
        } else return 'img/no-img.jpg';
    }

    /**
     * @return [string/HTML]
     * Retourne le badge blocked si produit bloqué en BDD.
     */
    public function isBlocked(){
        if ($this->pro_bloque == 1) {
            return '<span class="badge bg-danger">Bloqué</span>'; 
        } 
        return ''; 
    }

    /**
     * @param bool $readonly Ajoute l'attribut disabled pour empecher l'écriture. 
     * @return [string/HTML]
     * Retourne les radios OUI/NON checked si pro_bloque == 1; 
     */
    public function radioBlocked($readonly = true){

        $disable = $readonly ? 'disabled="disabled"' : ''; 

        if ($this->pro_bloque == 1) {
            return '
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="prod_blo" id="prod_blo_oui" value="1" checked '.$disable.'>
                <label class="form-check-label" for="prod_blo_oui">Oui</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="prod_blo" id="prod_blo_non" value="0" '.$disable.'>
                <label class="form-check-label" for="prod_blo_non">Non</label>
            </div>'; 
        } 
        return '
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="prod_blo" id="prod_blo_oui" value="1" '.$disable.'>
                <label class="form-check-label" for="prod_blo_oui">Oui</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="prod_blo" id="prod_blo_non" value="0" checked '.$disable.'>
                <label class="form-check-label" for="prod_blo_non">Non</label>
            </div>';  
    }

    /**
     * @return [date]
     * Retourne la date d'aujourd'hui
     */
    public function getDate(){
        return date("Y-m-d H:i:s");
    }
}
