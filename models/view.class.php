<?php
  class View {

    public function render($name, $noInclude = false, $header = false) {
        if($noInclude == true) {
         require 'libs/views/'.$name.'.php';
        } else {
         require 'libs/views/header.php';
         require 'libs/views/'.$name.'.php';
         require 'libs/views/footer.php';
        }
      
     }
    }
   

  
