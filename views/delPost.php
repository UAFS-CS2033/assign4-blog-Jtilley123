<div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Remove Post</h5>
                        <p class="card-text">Confirm Deletion of Post from the list.</p>
                        <form action="controller.php" method="POST">
                            <input type="hidden" name="page" value="delete">
                            <input type="hidden" name="postID" value="<?php echo $_GET['postID']; ?>">
                            <button class="btn btn-primary" type="submit" name="submit" value="CONFIRM" >Confirm</button> 
                            <button class="btn btn-primary" type="submit" name="submit" value="CANCEL" >Cancel</button>   
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>

