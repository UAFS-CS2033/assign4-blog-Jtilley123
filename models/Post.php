<?php
class Post {

    private $title;
    private $content;
    private $postID;
    private $userID;
    
    public function load($row){
        $this->setUserID($row['userID']);
        $this->setContent($row['content']);
        $this->setTitle($row["title"]);
        $this->setPostID($row["postID"]);
    
    }


    public function setPostID($postID){
        $this->postID=$postID;
        
    }

    public function getPostID(){
        return $this->postID;
    }
    public function setUserID($userID){
        $this->userID=$userID;
    }

    public function getUserID(){
        return $this->userID;
    }
    public function setContent($content){
        $this->content=$content;
    }

    public function getContent(){
        return $this->content;
    }
    public function setTitle($title){
        $this->title=$title;
    }

    public function getTitle(){
        return $this->title;
    }

}



?>