<?php

session_start(); 
?>
<div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Post List</h5>
                        <p class="card-text">Add a new post to the list.</p>
                        <form action="controller.php" method="POST">
                        
                            <input type="hidden" name="page" value="addpost">
                            <input type="hidden" name="userID" value="<?php echo $_SESSION['activeuserID']?>">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control mb-3" id="title" name="title" placeholder="title" required>
                            <label for="content" class="form-label">Content</label>
                            <input type="text" class="form-control mb-3" id="content" name="content" placeholder="Enter Content" required>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                      Select image to upload:
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Upload Image" name="submit">
                        </form>
                        
                    </div>
                </div>      
            </div>
        </div>
    </div>
