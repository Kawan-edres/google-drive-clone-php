<nav class="navbar navbar-expand-lg bg-success " >
  <div class="container-fluid">
   <div>
   <a class="navbar-brand text-white" href="?path=/">Home/</a>
    <?php 
    $path = $_GET['path'];
    $paths = explode('/',$path);
    $new_array = array_diff($paths, ['/']);
    $paths = array_filter($new_array);
    $tempPath='';

    foreach ($paths as $path) {
        $tempPath .=$path;
        echo '<a class="navbar-brand text-white" href="?path='. $tempPath.'">'.$tempPath.'</a>';
        $tempPath .="/";
    }
    
    ?>  
   </div>
  </div>
</nav> 