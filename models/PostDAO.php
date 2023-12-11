<?php
    include_once 'Post.php';

    class PostDAO {


        public function getConnection(){
            $mysqli = new mysqli("127.0.0.1", "bloguser", "blogpass", "blogDB");
            if ($mysqli->connect_errno) {
                $mysqli=null;
            }
            return $mysqli;
        }

        public function addPost($post){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("INSERT INTO posts (title, content, userid) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $post->getTitle(), $user->getContent(), $user->getUserID());
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function updatePost($post){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("UPDATE posts SET title=?, content=?, userid=? WHERE postID = ?;");
            $stmt->bind_param("ssii", $post->getTitle(), $post->getContent(), $post->getUserID(), $post->getPostID());
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function deletePost($postid){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM posts WHERE postID = ?");
            $stmt->bind_param("i", $postid);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function getPosts(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM posts;"); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $post = new Post();
                $post->load($row);
                $posts[]=$post;
            }    
            $stmt->close();
            $connection->close();
            return $posts;
        }

        public function getPost($postid){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM posts WHERE postID = ?;"); 
            $stmt->bind_param("i", $postid);
            $stmt->execute();
            $result = $stmt->get_result();
            if($row = $result->fetch_assoc()){
                $post = new Post();
                $post->load($row);
            }    
            $stmt->close();
            $connection->close();
            return $post;
        }

        



    }
?>
