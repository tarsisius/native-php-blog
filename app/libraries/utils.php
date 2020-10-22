<?php

class Utils {
    
    /*
     * for displaying array data
     */
    public static function print_r($array) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
    
    /*
     * * exp : 10 % => 10
     * $ 150 => 150
     * $ 23,500.14 => 23500.14
     */
    public static function value_treatment($value) {
        $value = str_replace(array('%', '$', ','), '', $value);
        $value = trim($value);
        return $value;
    }
    
    
    /*
     * get the file extension
     */
    public static function extension_file($file_name) {
        $extension = strtolower(end((explode(".", $file_name)))); 
        return $extension;
    }
    
}
