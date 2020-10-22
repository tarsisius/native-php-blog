<?php

/**
 *
 */
class Form {

    public function __construct() {
        
    }

    public function validate($data) {
        $nbr_error = 0;
        $sortie = false;
        $errors = array();
        
        $special_car ='d-';
        
        if(empty($data)) { return; }

        foreach ($data as $value) {
            $valuechamp = trim($value[1]);
            $libchamp = $value[2];
            $listecondition = $value[3];

            foreach ($listecondition as $condition) {
                $sortie = false;
                switch ($condition) {
                    case 0;
                        if (empty($valuechamp)) {
                            $sortie = true;
                        }
                        break;

                    case 1: /* Non vide */
                        if (empty($valuechamp)) {
                            $errors['msg'] = $libchamp . " should not be empty";
                            $errors['type'] = 'danger';
                            $nbr_error++;
                        }
                        break;

                    case 2: /* Lettres seulement accepté */
                        if (!preg_match("/^[a-zA-ZïÏâéèûàôç\ \']+$/", $valuechamp)) {
                            $errors['msg'] = "Letter only accepted for " . $libchamp;
                            $errors['type'] = 'danger';
                            $nbr_error++;
                        }
                        break;

                    case 3: /* Chiffres seulement accepté */
                        if (!preg_match("/^[0-9\ ]+$/", $valuechamp)) {
                            $errors['msg'] = "Number only accepted for " . $libchamp;
                            $errors['type'] = 'danger';
                            $nbr_error++;
                        }
                        break;

                    case 4: /* Adresse email */
                        if (!preg_match("/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/", $valuechamp)) {
                            $errors['msg'] = "Invalid email address";
                            $errors['type'] = 'danger';
                            $nbr_error++;
                        }
                        break;

                    case 5: /* Validité d'une date */
                        /* if (!preg_match("/^[0-3][0-9][-](0[1-9]|1[0-2])[-][0-9]{4}$/", $valuechamp)) { // version jj-mm-aaaa  */
                        if (!preg_match("/^[0-9]{4}[-](0[1-9]|1[0-2])[-][0-3][0-9]$/", $valuechamp)) {   // version aaaa-mm-jj 
                            $errors['msg'] = "" . $libchamp . " not valid";
                            $errors['type'] = 'danger';
                            $nbr_error++;
                        } else {
                            // list($day, $month, $year) = explode("-", $valuechamp); // version jj-mm-aaaa
                            list($year, $month, $day) = explode("-", $valuechamp);  // version aaaa-mm-jj 
                            if (!checkdate($month, $day, $year)) {
                                //$errors['msg'] = "La date ".$valuechamp." n'éxiste pas !";
                                $errors['msg'] = "The date " . $day . "/" . $month . "/" . $year . " does not exist !";
                                $errors['type'] = 'danger';
                                $nbr_error++;
                            }
                        }
                        break;

                    case 6: /* Longeur >= 4 caractéres */
                        if (strlen($valuechamp) < 4) {
                            $errors['msg'] = "The lenght of " . $libchamp . " must be > 2 characters";
                            $errors['type'] = 'danger';
                            $nbr_error++;
                        }
                        break;
                        
                    case 12: /* Longeur <= 200 caractéres */
                        if (strlen($valuechamp) > 200) {
                            $errors['msg'] = "The lenght of " . $libchamp . " must be < 200 characters";
                            $errors['type'] = 'danger';
                            $nbr_error++;
                        }
                        break;

                    case 7: /* Validité du téléphone */
                        if (!preg_match("/^0[0-9\ ]{8}+$/", $valuechamp)) {
                            $errors['msg'] = "Téléphone " . $valuechamp . " invalide";
                            $errors['type'] = 'danger';
                            $nbr_error++;
                        }
                        break;

                    case 8: /* Validité du mobile */
                        if (!preg_match("/^0[5-9\ ]{1}[0-9\ ]{8}+$/", $valuechamp)) {
                            $errors['msg'] = "Mobile " . $valuechamp . " invalid";
                            $errors['type'] = 'danger';
                            $nbr_error++;
                        }
                        break;

                    case 9: // No blank inside (username)
                        
                        break;

                    case 10: //  must containt this caracters (au debut) - username doctor
                        if (strlen($valuechamp) < 6) {
                            $errors['msg'] = "The lenght of " . $libchamp . " must be > 6 characters";
                            $errors['type'] = 'danger';
                            $nbr_error++;
                        }
                        else{
                            $d = substr($valuechamp, 0, 2);
                            $d = strtolower($d);
                            if($d != $special_car){
                                $errors['msg'] = "The " . $libchamp . " must must begin by : ".  strtoupper($special_car);
                                $errors['type'] = 'danger';
                                $nbr_error++;
                            }
                        }
                        break;

                    case 11: //  must not contain this caracters (au debut)
                        
                        break;
                }
                if (($nbr_error > 0) or ( $sortie == true)) {
                    break;
                }
            }
            if ($nbr_error > 0) {
                break;
            }
        }
        return $errors;
    }

    /*
     *  Validation File Upload
     *  $data_file = array('signature', $_FILES['signature'], "Signature", $condition)
     *  $_FILES['signature'] : data of file named signature
     *  $condition : array contain all condition about file uploaded
     *  $condition = array(1, 200, array('jpg', 'png'), array(600, 400));
     *  0 or 1 : 0->optional, 1->required
     *  200 : size max accepted on Kb
     *  array(600, 400) 600 : mean image width
     *  400 : mean image height
     */

    public function validate_file($data_file) {
        $nbr_error = 0;
        $sortie = false;
        $errors = array();

        $MAX_FILE_UPLOAD = 2048; // 2M

        foreach ($data_file as $value) {
            $property_file = $value[1]; // array
            $libchamp = $value[2];   //  string Libele file
            $listecondition = $value[3]; // array condition

            $file_name = $property_file['name'];     // nom dorigine du fichier

            if (($listecondition[0] == 0)and ( !empty($file_name))) {
                //optional but not empty => check it
                $result = $this->check_file($property_file, $listecondition, $libchamp);
                if (!empty($result)) {
                    $errors['msg'] = $result['msg'];
                    $errors['type'] = $result['type'];
                    $nbr_error++;
                }
            } elseif ($listecondition[0] == 1) {
                if (!empty($file_name)) {
                    //check file
                    $result = $this->check_file($property_file, $listecondition, $libchamp);
                    if (!empty($result)) {
                        $errors['msg'] = $result['msg'];
                        $errors['type'] = $result['type'];
                        $nbr_error++;
                    }
                } else {
                    $errors['msg'] = $libchamp . " file should not be empty";
                    $errors['type'] = 'danger';
                    $nbr_error++;
                }
            }
            if ($nbr_error > 0) {
                break;
            }
        }
        return $errors;
    }

    public function check_file($property_file, $listecondition, $libchamp) {
        $reponse = array();

        $max_file_accepted = $listecondition[1]; // on Kb
        $array_extensions = $listecondition[2];

        $width_height_image = isset($listecondition[3]) ? $listecondition[3] : NULL;

        $file_name = $property_file['name'];     // nom dorigine du fichier
        $file_type = $property_file["type"];
        $file_size = $property_file["size"];       // byte
        $file_size_kb = $property_file["size"] / 1024;  // KB
        $tmp_file = $property_file['tmp_name'];
        $file_error = $property_file["error"];

        $upload_max_filesize = $this->convertBytes(ini_get('upload_max_filesize'));

        if ($file_error == 4) {  // le fichier uploadé a une taille nulle. 
            $reponse['msg'] = 'The file is NULL';
            $reponse['type'] = 'danger';
            return $reponse;
        } elseif ($file_error > 0) {
            $reponse['msg'] = "The file $libchamp exceeds the upload_max_filesize directive in php.ini";
            $reponse['type'] = 'danger';
        } elseif (($file_size > $upload_max_filesize)) {
            $reponse['msg'] = "The file size of $libchamp is too large than filesize in Server Config !";
            $reponse['type'] = 'danger';
        } elseif (!$this->valid_extension($file_name, $array_extensions)) { //On vérifie maintenant l'extension	
            $reponse['msg'] = "File type of $libchamp not allowed !";
            $reponse['type'] = 'danger';
        } elseif ($file_size_kb > $max_file_accepted) {  //Vérification de la taille du fichier
            $reponse['msg'] = "The file size of $libchamp is too large than " . $max_file_accepted . "Kb";
            $reponse['type'] = 'danger';
        } elseif (!empty($width_height_image)) {
            $size = getimagesize($tmp_file);
            $img_width = $size[0];
            $img_height = $size[1];

            $img_width_accepted = $width_height_image[0];
            $img_height_accepted = $width_height_image[1];

            if (($img_width < $img_width_accepted) || ($img_height < $img_height_accepted )) {
                $reponse['msg'] = "The image of $libchamp is too small : $img_width_accepted * $img_height_accepted";
                $reponse['type'] = 'danger';
            }
        }
        return $reponse;
    }

    /* =================================================================================== */
    /* récupérer l'extention du fichier 
      /*=================================================================================== */

    function get_extension_file($file) {
        $str = explode(".", $file);
        $str = strtolower(end($str));
        return $str;
    }

    /* =================================================================================== */
    /* vérifier l'extention dun fichier 
      /*=================================================================================== */

    function valid_extension($file, $array_extensions) {
        $extensionFichier = $this->get_extension_file($file); // récupérer l'extention du fichier
        if (in_array($extensionFichier, $array_extensions)) {
            return true;
        }
        return false;
    }

    /* =================================================================================== */
    /*
      /*=================================================================================== */

    function convertBytes($value) {
        if (is_numeric($value)) {
            return $value;
        } else {
            $value_length = strlen($value);
            $qty = substr($value, 0, $value_length - 1);
            $unit = strtolower(substr($value, $value_length - 1));
            switch ($unit) {
                case 'k':
                    $qty *= 1024;
                    break;
                case 'm':
                    $qty *= 1048576;
                    break;
                case 'g':
                    $qty *= 1073741824;
                    break;
            }
            return $qty;
        }
    }

}
