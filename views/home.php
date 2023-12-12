
<!-- Featured Post -->

<div class="container mt-4">
    <div class="card mb-4">
        <img src="https://via.placeholder.com/1200x600" class="card-img-top" alt="Featured Image">
        <div class="card-body">
            <h2 class="card-title">Admin Post 1</h2>
            <p class="card-text">Very first Post! Enjoy my blog.</p>
            <form action="controller.php" method="GET">
            <input type="hidden" name="postID" value="1">
            <button class="btn btn-primary" type="submit" name="page" value="posttemplate">Read More</button>
            <form>
            
        </div>
    </div>
</div>

<!-- Main Content -->
<?php

?>
<div class="container mt-4">
    <h3>Recent Posts</h3>
    <div class="row">
    <form action="controller.php" method="GET">
    <?php
    $PostDAO = new PostDAO();
    $posts = $PostDAO->getPosts();

for($index=0;$index<count($posts);$index++){
    
echo "<div class=\"col-md-4 mb-4\">
<div class=\"card\">
    <img src=\"https://via.placeholder.com/800x400\" class=\"card-img-top\" alt=\"Sample Image\">
    <div class=\"card-body\">
        <h5 class=\"card-title\">".$posts[$index]->getTitle()."</h5>
        <p class=\"card-text\">".$posts[$index]->getContent()."</p>
        <form action=\"controller.php\" method=\"GET\">
        
        <button class=\"btn btn-primary\" type=\"submit\" name=\"page\" value=\"posttemplate\">Read More</button>
        
    </div>
</div>
</div>";

}
?>
<form>

    <!-- Sample Blog Posts using Bootstrap grid system -->
    


        <!-- Add more similar blocks for additional articles -->
    </div>
</div>