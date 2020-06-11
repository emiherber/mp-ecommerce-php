<?php
/**
 * Description of ErrorLog
 *
 * @author strossero
 */

Abstract class ErrorLog {
    
    public static function log($pNombreArchivo, $pTexto, $pSQL='', $pValores=array(), $pEx=null){
        $file=fopen($pNombreArchivo.date("YmdHis").".lmdsi","a");
        //contenido
        fputs($file,"Error: ");
        fputs($file,$pTexto."\r\n");
        fputs($file,"Fecha y hora:".date('d/m/Y H:i:s')."\r\n");
        //opcionales
        if(trim($pSQL)!=''){fputs($file,"\r\nConsulta:".$pSQL."\r\n");}
        if(is_array($pValores) && count($pValores)>0){
            ob_start();
            var_dump($pValores);
            fputs($file,"\r\nValores:".ob_get_contents()."\r\n");
            ob_end_clean();
        }
        if($pEx instanceof Exception){fputs($file,"\r\nException: (".$pEx->getCode().") ".$pEx->getMessage()."\r\ntrace:\r\n".$pEx->getTraceAsString()."\r\n");}

        fclose($file);
    }
}