<?php 
session_start();
   $posts = $_REQUEST['posts'];
?>
    <div class="container">
        <div class="col">
            <form action="controller.php" method="GET">
            <button class="btn btn-primary" type="submit" name="page" value="addpost">Add Post</button>
            <button class="btn btn-primary" type="submit" name="page" value="updatepost">Update Post</button>
            <button class="btn btn-primary" type="submit" name="page" value="deletepost">Delete Post</button>
           
                    <?php
                    
                        if($_SESSION['isAdmin']=='TRUE'){
                            for($index=0;$index<count($posts);$index++){
                                
                                echo "<div class=\"container mt-4\"><div class=\"card\"><div class=\"card-body\"><!-- Smaller Image, Left Justified --><img src=\"https://via.placeholder.com/400x200\" class=\"card-img-top float-start me-3\" alt=\"Post Image\" style=\"width: 200px;\"><h2 class=\"card-title\">".$posts[$index]->getTitle()."</h2><p class=\"card-text\">".$posts[$index]->getContent()."</p><p class=\"card-text\"></p></div></div></div></div>";
                                    echo "<br><tr><td><input type=\"radio\" name=\"postID\" value=\"".$posts[$index]->getPostID()."\"></td>";                        
                                
                            }   
                        }else{
                        for($index=0;$index<count($posts);$index++){
                            if($posts[$index]->getUserID()==$_SESSION['activeuserID']){
                                
                            echo "<div class=\"container mt-4\"><div class=\"card\"><div class=\"card-body\"><!-- Smaller Image, Left Justified --><img src=\"https://via.placeholder.com/400x200\" class=\"card-img-top float-start me-3\" alt=\"Post Image\" style=\"width: 200px;\"><h2 class=\"card-title\">".$posts[$index]->getTitle()."</h2><p class=\"card-text\">".$posts[$index]->getContent()."</p><p class=\"card-text\"></p></div></div></div></div>";
                                echo "<br><tr><td><input type=\"radio\" name=\"postID\" value=\"".$posts[$index]->getPostID()."\"></td>";                        
                            }
                        }
                        }
                    ?>
                
            </form>
        </div>
    </div>