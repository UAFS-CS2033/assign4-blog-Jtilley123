<?php 
   $posts = $_REQUEST['posts'];
?>
    <div class="container">
        <div class="col">
            <form action="controller.php" method="GET">
            <button class="btn btn-primary" type="submit" name="page" value="addpost">Add Post</button>
            <button class="btn btn-primary" type="submit" name="page" value="updatepost">Update Post</button>
            <button class="btn btn-primary" type="submit" name="page" value="deletepost">Delete Post</button>
           
                    <?php

                        for($index=0;$index<count($posts);$index++){
                            echo "<br><tr><td><input type=\"radio\" name=\"postID\" value=\"".$posts[$index]->getPostID()."\"></td>";
                            echo "<div class=\"container mt-4\"><div class=\"card\"><div class=\"card-body\"><!-- Smaller Image, Left Justified --><img src=\"https://via.placeholder.com/400x200\" class=\"card-img-top float-start me-3\" alt=\"Post Image\" style=\"width: 200px;\"><h2 class=\"card-title\">Single Post Title</h2><p class=\"card-text\">This is the content of the single blog post.</p><p class=\"card-text\"></p></div></div></div></div>";
                        }
                    ?>
                
            </form>
        </div>
    </div>