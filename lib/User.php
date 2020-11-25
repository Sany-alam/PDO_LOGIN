<?php
include_once 'Session.php';
include 'Database.php';
class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function userRegistration($data){
        $name =$data ['name'];
        $username =$data ['username'];
        $email =$data ['email'];
        $password =md5 ($data ['password']); //md5 helps to encrypt the password
        $chk_email= $this->emailCheck($email);


        if($name == "" OR $username == "" OR $email == "" OR $password == ""){
            $msg = "<div class='alert alert-danger'>  
            <strong>ERROR!</strong>
            Field Must Not Be Empty!
            </div>";
            return $msg;
        }
//password validation
if(strlen($password)<5){
    $msg = "<div class='alert alert-danger'>
    <strong>ERROR!</strong>
    Password should be more than 5 characters.
    </div>";
    return $msg;
}
//userNAme validation        
        
        if(strlen($username)<4){
            $msg = "<div class='alert alert-danger'>
            <strong>ERROR!</strong>
            Username should be more than 4 characters.
            </div>";
            return $msg;
        }
        //Regex
        
       elseif(preg_match('/[^a-z_\-0-9]/i',$username)){
            $msg = "<div class='alert alert-danger'>
            <strong>ERROR!</strong>
           Username must contain alphaneumerical, dashes and underscore!
            </div>";
            return $msg;
        }
      
//email validation
        if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
            $msg = "<div class='alert alert-danger'>
            <strong>ERROR!</strong>
           Email is not valid!
            </div>";
            return $msg;
        }
        if($chk_email == true){
            $msg = "<div class='alert alert-danger'>
            <strong>ERROR!</strong>
           Email is already <i>Existed</i>!
            </div>";
            return $msg;
        }
        //insert data

        $sql = "INSERT INTO tbl_user (name, username, email, password) VALUES ( :name, :username, :email, :password)";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':name',$name); 
        $query->bindValue(':username',$username); //bind all the data  (value,name)
        $query->bindValue(':email',$email);
        $query->bindValue(':password',$password);
        $result = $query->execute();

        if($result){
            $msg = "<div class='alert alert-success'>
            <strong>Thankyou!</strong>
            You have been registered. please visit our website.
            </div>";
            return $msg;
        }
        else{
            $msg = "<div class='alert alert-danger'>
            <strong>Sorry!</strong>
           There is some problem in insertion! Please, Contact with admin.
            </div>";
            return $msg;
        }
    }
    //to check existing email
    public function emailCheck($email){
        $sql ="SELECT email FROM tbl_user WHERE email = :email"; //we can put ? or :email as name placeholder.
        $query = $this->db->pdo->prepare($sql); //prepare is a built in method to access DB
        $query->bindValue(':email',$email);
        $query->execute();

        //rowcount or column count, to find email
        if($query->rowCount() > 0){
            return true;
        }
        else {
            return false;
        }
    }
    
    
    //user login

    public function getLoginUser($email,$password){
        $sql ="SELECT * FROM tbl_user WHERE email = ':email' AND password = ':password' LIMIT 1"; // LIMIT 1 to execute once 

        $query = $this->db->pdo->prepare($sql); //prepare is a built in method to access DB
        $query->bindValue(':email',$email); //$email refers to which email is passed
        $query->bindValue(':password',$password);
        $query->execute();

        $result = $query->fetch(PDO::FETCH_OBJ);

        $conn = mysqli_connect("localhost","root" ,"","db_pdo");
        $sql2 ="SELECT * FROM tbl_user WHERE `email` = '$email' AND `password` = '$password' LIMIT 1";
        $res2 = mysqli_query($conn,$sql2);

        if (mysqli_num_rows($res2)==1) {
            return true;
        }else{
            return false;
        }
    } 

    public function userLogin($data){
        $email =$data ['email'];
        $password =md5($data ['password']); //md5 helps to encrypt the password
        $chk_email= $this->emailCheck($email);


        if($email == "" OR $password == ""){
            $msg = "<div class='alert alert-danger'>  
            <strong>ERROR!</strong>
            Field Must Not Be Empty!
            </div>";
            return $msg;
        }  

        //email validation
        if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
            $msg = "<div class='alert alert-danger'>
            <strong>ERROR!</strong>
           Email is not valid!
            </div>";
            return $msg;
        }
     if($chk_email == false){
            $msg = "<div class='alert alert-danger'>
            <strong>ERROR!</strong>
           Email is not  <i>existed!</i>!
            </div>";
            return $msg;
        }

        $result = $this->getLoginUser($email,$password); 
        
        if($result){
            Session::init (); //  :: refers to scope resulation operator for static methods
            Session::set("login",true);
            Session::set("id",$result->id);
            Session::set("name",$result->name);
            Session::set("username",$result->username);
            Session::set("loginmsg","<div class='alert alert-success'> <strong>Succesfully!</strong> You are logged in.</div>");
            header("Location: index.php");
        }
        else{
            $msg = "<div class='alert alert-danger'>
            <strong>ERROR!</strong>
           Credentials not matched!
            </div>";
            return $msg;
        }
    }

    //showing member and create profile
    public function getUserData(){
        $sql ="SELECT * FROM tbl_user ORDER BY id DESC"; 
        $query = $this->db->pdo->prepare($sql); 
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
}
