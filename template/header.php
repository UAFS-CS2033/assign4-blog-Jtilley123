<?php
  if(isset($_SESSION['loggedin'])){
    $status="Logged In";
    $class="disabled";
  }else{
    $status="Login";
    $class="";
  }
?>

<header>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="controller.php?page=home">My Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="controller.php?page=home">Home</a>
                </li>
                <li class="nav-item">
                    <?php
                    if(isset($_SESSION['isAdmin'])){
                        echo "<a class=\"nav-link\" href=\"controller.php?page=list\">Admin</a>"; 
                    }
                    
                    
                    ?>
                </li>
                <li class="nav-item">
                <?php
                    if(isset($_SESSION['loggedin'])){
                        echo "<a class=\"nav-link\" href=\"controller.php?page=author\">Author</a>"; 
                    }
                    
                    
                    ?>
                    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="controller.php?page=about">About</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary <?php echo $class; ?>" href="controller.php?page=login"><?php echo $status; ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</header>