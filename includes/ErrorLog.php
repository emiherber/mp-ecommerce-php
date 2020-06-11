<?php
/**
 * Description of ErrorLog
 *
 * @author strossero
 */

Abstract class ErrorLog {
    
    public static function log($pNombreArchivo, $pTexto, $pSQL='', $pValores=array(), $pEx=null){
        $file=fopen($pNombreArchivo.".lmdsi","a");
        //contenido
        fputs($file,$pTexto."\r\n");
        fputs($file, json_encode($pValores)."\r\n");
        //opcionales
        if(trim($pSQL)!=''){fputs($file,"\r\nConsulta:".$pSQL."\r\n");}
        
        if($pEx instanceof Exception){fputs($file,"\r\nException: (".$pEx->getCode().") ".$pEx->getMessage()."\r\ntrace:\r\n".$pEx->getTraceAsString()."\r\n");}

        fclose($file);
    }
}