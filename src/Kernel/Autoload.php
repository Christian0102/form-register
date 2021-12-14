<?php
/**
 * autoloader for application  function
 *
 * @param [type] $class_name
 * @return void
 */
 function classLoader($className)
 {
    
     $paths = array(
         '/src/Repository/',
         '/src/Components/',
         '/src/Controllers/',
     );
 
     
     foreach ($paths as $path) {
 
 
         $path = ROOT . $path . $className . '.php';
           if (is_file($path)) {
             include_once $path;
         }
     }
 }

  
spl_autoload_register('classLoader');
