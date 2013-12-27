<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tracer
 *
 * @author nadeeth
 */
class tracer {
    
    public function __construct() {
        
        $this->log();
        
        //$im = imagecreate(70, 16);
        $im = imagecreatetruecolor(1, 1);

        imagecolorallocatealpha($im, 255, 255, 255, 127);
        
        //$textcolor = imagecolorallocate($im, 0, 80, 180);
        //imagestring($im, 5, 0, 0, "Hello World..!!", $textcolor);
        
        imagealphablending( $im, false );
        imagesavealpha( $im, true );

        // Output the image
        header('Content-type: image/png');

        imagepng($im);
        imagedestroy($im);
    }
    
    protected function log() {
        
        $myFile = "log.txt";
        
        $fh = fopen($myFile, 'a') or die("can't open file");
        $stringData = "UserAgent: ".$_SERVER['HTTP_USER_AGENT']." | UserIp: ".$_SERVER['REMOTE_ADDR']." | Time: ".date("c")."\n";
        
        fwrite($fh, $stringData);

        fclose($fh);
    }
}

new tracer();
?>
