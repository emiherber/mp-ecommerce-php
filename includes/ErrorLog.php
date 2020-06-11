<?php
/**
 * Description of ErrorLog
 *
 * @author strossero
 */

Abstract class ErrorLog {
    
    public static function log($pNombreArchivo, $pTexto){
        $file=fopen($pNombreArchivo.".lmdsi","a");
        //contenido
        fputs($file,$pTexto."\r\n");
        fclose($file);
    }
}