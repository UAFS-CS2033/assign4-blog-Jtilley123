<?php 
    $postID = $_GET['postID'];
    
        $postDAO = new PostDAO();
        $post = $postDAO->getPost($postID);
    
 ?>
<div class="container mt-4">
    <div class="card">
      
        <div class="card-body">
              <!-- Smaller Image, Left Justified -->
        <img src="https://via.placeholder.com/400x200" class="card-img-top float-start me-3" alt="Post Image" style="width: 200px;">

            <h2 class="card-title"><?php echo $post->getTitle(); ?></h2>
            <p class="card-text"><?php echo $post->getContent(); ?></p>
              </div>
    </div>

 
    </div>
</div>
