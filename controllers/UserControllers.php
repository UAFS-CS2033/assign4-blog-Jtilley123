<?php
    //include "ControllerAction.php";
    //include "model/ContactDAO.php";
    include "PostDAO.php";

    class UserList implements ControllerAction{

        function processGET(){
            $userDAO = new UserDAO();
            $users = $userDAO->getUsers();
            $_REQUEST['users']=$users;
            return "views/listUsers.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }
    class PostList implements ControllerAction{

        function processGET(){
            $postDAO = new PostDAO();
            $posts = $postDAO->getPosts();
            $_REQUEST['posts']=$posts;
            return "views/listPosts.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }

    class UserAdd implements ControllerAction{

        function processGET(){
            return "views/addUser.php";
        }

        function processPOST(){
            $username=$_POST['username'];
            $lastname=$_POST['lastname'];
            $firstname=$_POST['firstname'];
            $email=$_POST['email'];
            $passwd=$_POST['passwd'];
            $urole=$_POST['urole'];
            $user = new User();
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPasswd($passwd);
            $user->setLastname($lastname);
            $user->setFirstname($firstname);
            $user->setUrole($urole);
            $userDAO = new UserDAO();
            $userDAO->addUser($user);
            header("Location: controller.php?page=list");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }      

    }
    class PostAdd implements ControllerAction{

        function processGET(){
            return "views/addPost.php";
        }

        function processPOST(){
            $title=$_POST['title'];
            $content=$_POST['content'];
            $userid=$_POST['userID'];
           
            $post = new Post();
            $post->setTitle($title);
            $post->setContent($content);
            $post->setUserID($userid);
           
           
            $postDAO = new PostDAO();
            $postDAO->addPost($post);
            header("Location: controller.php?page=author");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }      

    }


    class UserUpdate implements ControllerAction{

        function processGET(){
            return "views/userForm.php";
        }

        function processPOST(){
            $userID=intval($_POST["userID"]);
            $username=$_POST['username'];
            $lastname=$_POST['lastname'];
            $firstname=$_POST['firstname'];
            $email=$_POST['email'];
            $passwd=$_POST['passwd'];
            $urole=$_POST['urole'];
            $user = new User();
            $user->setUserID($userID);
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPasswd($passwd);
            $user->setLastname($lastname);
            $user->setFirstname($firstname);
            $user->setUrole($urole);
            $userDAO = new UserDAO();
            $userDAO->updateUser($user);
            header("Location: controller.php?page=list");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }      

    }
    class PostUpdate implements ControllerAction{

        function processGET(){
            return "views/updatePost.php";
        }

        function processPOST(){
            $postID=intval($_POST["postID"]);
            $title=$_POST['title'];
            $content=$_POST['content'];
            $userID=$_POST['userID'];
            
            $post = new Post();
            $post->setTitle($title);
            $post->setContent($content);
            $post->setUserID($userid);
            $postDAO = new PostDAO();
            $postDAO->updatePost($post);
            header("Location: controller.php?page=author");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }      

    }

    class UserDelete implements ControllerAction{

        function processGET(){
            $userID = $_GET['userID'];
            return 'views/delUser.php';

        }

        function processPOST(){
            $userid=$_POST['userID'];
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $userDAO = new UserDAO();
                $userDAO->deleteUser($userid);
            }
            header("Location: controller.php?page=list");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }
    class PostDelete implements ControllerAction{

        function processGET(){
            $postID = $_GET['postID'];
            return 'views/delPost.php';

        }

        function processPOST(){
            $postid=$_POST['postID'];
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $postDAO = new PostDAO();
                $postDAO->deletePost($postid);
            }
            header("Location: controller.php?page=author");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }

    class Login implements ControllerAction{

        function processGET(){
            return "views/login.php";
        }

        function processPOST(){
            $username=$_POST['username'];
            $passwd=$_POST['passwd'];
            $userDAO = new UserDAO();
            $found=$userDAO->authenticate($username,$passwd);
            if($found==null){
                $nextView="Location: controller.php?page=login";
            }else{
                $nextView="Location: controller.php?page=list";
                $_SESSION['loggedin']='TRUE';
            }
            header($nextView);
            exit;       
        }
        function getAccess(){
            return "PUBLIC";
        }

    }

    class Home implements ControllerAction{

        function processGET(){
            return "views/home.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PUBLIC";
        }

    }

    class About implements ControllerAction{

        function processGET(){
            return "views/about.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PUBLIC";
        }
    }


    
?>