
<!-- Featured Post -->
<div class="container mt-4">
    <div class="card mb-4">
        <img src="https://via.placeholder.com/1200x600" class="card-img-top" alt="Featured Image">
        <div class="card-body">
            <h2 class="card-title">Featured Post Title</h2>
            <p class="card-text">This is the featured blog post. Add your content here. It can be longer and more detailed.</p>
            <a href="controller.php?page=post" class="btn btn-primary">Read More</a>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container mt-4">
    <h3>Recent Posts</h3>
    <?php
    
    $posts = $PostDAO->getPosts();

for($index=0;$index<count($posts);$index++){
    echo "<div class=\"container mt-4\"><div class=\"card\"><div class=\"card-body\"><!-- Smaller Image, Left Justified --><img src=\"https://via.placeholder.com/400x200\" class=\"card-img-top float-start me-3\" alt=\"Post Image\" style=\"width: 200px;\"><h2 class=\"card-title\">Single Post Title</h2><p class=\"card-text\">This is the content of the single blog post.</p><p class=\"card-text\"></p></div></div></div></div>";
}
?>

    <!-- Sample Blog Posts using Bootstrap grid system -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://via.placeholder.com/800x400" class="card-img-top" alt="Sample Image">
                <div class="card-body">
                    <h5 class="card-title">Post Title 1</h5>
                    <p class="card-text">This is a sample blog post. Add your content here.</p>
                    <a href="controller.php?page=post" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://via.placeholder.com/800x400" class="card-img-top" alt="Sample Image">
                <div class="card-body">
                    <h5 class="card-title">Post Title 2</h5>
                    <p class="card-text">This is another sample blog post. Add your content here.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://via.placeholder.com/800x400" class="card-img-top" alt="Sample Image">
                <div class="card-body">
                    <h5 class="card-title">Post Title 3</h5>
                    <p class="card-text">This is a third sample blog post. Add your content here.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>

        <!-- Add more similar blocks for additional articles -->
    </div>
</div>
