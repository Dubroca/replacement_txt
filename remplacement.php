<?php

$path = $_POST['path'];

function processFile( $path ) {

   $dir    = $path;
   $allFiles = scandir($dir);

   foreach($allFiles as $file) {

        if (!in_array($file,array(".","..")))
      { 
  
      $file = $dir.$file;
	  $filename = basename( $file );

       //read the entire string
       $str = file_get_contents( $file );

       // var_dump($str);

       // replace something in the file string
       if ( strpos( $filename, 'A500_' ) === 0 ) {

           $str = str_replace( 'TB', 'AM', $str );

       } else if ( strpos( $filename, 'A700_' ) === 0 ) {

           $str = str_replace( 'TB', 'JB', $str );

       } else if ( strpos( $filename, 'A900_' ) === 0 ) {

           $str = str_replace( 'TB', 'SP', $str );

       } else {
           // Return false if we don't know what to do with this file
           return false;
       }

       //write the entire string    
       $writeResult = file_put_contents( $file, $str );
    }
  }
}

processFile( $path ); 
	
echo "Remplacements effectués avec succès !";
?>