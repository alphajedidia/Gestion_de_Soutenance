<?php
function inputSelect($optionValues){
    foreach($optionValues as $option){
        echo "<option value='" . $option["id_prof"] . "'>". $option["civilite"] ." ". $option["nom_prof"]." ". $option["prenom_prof"]." </option>";
    }
}
?>