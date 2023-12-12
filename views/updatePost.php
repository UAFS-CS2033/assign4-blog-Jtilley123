<?php 
    $postID = $_GET['postID'];
    if($postID!=null){
        $postDAO = new PostDAO();
        $post = $postDAO->getPost($postID);
    }else{
        $post = new Post();
    }
   
 ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Post List</h5>
                        <p class="card-text">Update a post to the list.</p>
                        <form action="controller.php" method="POST">
                            <input type="hidden" name="page" value="updatepost">
                            <input type="hidden" name="postID" value="<?php echo $post->getPostID(); ?>">
                            <input type="hidden" name="userID" value="<?php echo $post->getUserID(); ?>">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control mb-3" id="title" name="title" placeholder="Enter Title" 
                                value="<?php echo $post->getTitle(); ?>" required>
                            <label for="content" class="form-label">Content</label>
                            <input type="text" class="form-control mb-3" id="content" name="content" placeholder="Enter content"
                                value="<?php echo $post->getContent(); ?>" required>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>
