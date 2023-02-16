<?php

class Login extends MysqliConnect{
    private $email , $password , $md5;
    
    public function setInput($email , $password){
        $this->email = $this->esc($this->html($email));
        $this->password = $this->esc($this->html($password));
        $this->md5  = md5(sha1($this->password));
    }
    
    private function checkInput(){
        if(empty($this->email)){
            Messages::setMsg('خطأ', 'الرجاء ادخال بريدك الإلكتروني', 'danger');
            echo Messages::getMsg();
        }else if(empty ($this->password)){
            Messages::setMsg('خطأ', 'الرجاء ادخال كلمة المرور', 'danger');
            echo Messages::getMsg();
        }else if(!$this->checkUser()){
            Messages::setMsg('خطأ', 'البيانات المدخلة غير صحيحة', 'danger');
            echo Messages::getMsg();
        }
        else{
            return TRUE;
        }
        return FALSE;
    }
    
    private function checkUser(){
        $this->query('id', 'users', "WHERE `email` = '$this->email' AND `password` = '$this->md5'");
        $this->execute();
        if($this->rowCount() > 0){
            return TRUE;
        }
        return FALSE;
    }
    
    private function makeUserLogged(){
        if($this->checkUser()){
            $this->query('*', 'users', "WHERE `email` = '$this->email' AND `password` = '$this->md5'");
            $this->execute();
            $user = $this->fetch();
            $admin = ($user['isAdmin'] == 1 ? TRUE : FALSE);
            $_SESSION['is_logged'] = true;
            $_SESSION['user'] = [
                                'id' => $user['id'],
                                'fname' => $user['farstname'],
                                'lname' => $user['lastname'],
                                'email' => $user['email'],
                                'isAdmin' => $admin
            ];
            return TRUE;
        }
        return FALSE;
    }

    public function DisplayError(){
        if($this->checkInput()){
            if($this->makeUserLogged()){
                header("Location: index.php");
            }else{
                Messages::setMsg('خطأ', 'حدث خطأ غير متوقع في النظام', 'danger');
                echo Messages::getMsg();
            }
        }
    }
    
    public function setEditProfile($fname , $lname , $email , $password , $confirm){
        $this->fname    = $this->esc($this->html($fname));
        $this->lname    = $this->esc($this->html($lname));
        $this->email    = $this->esc($this->html($email));
        $this->password = $this->esc($this->html($password));
        $this->confirm  = $this->esc($this->html($confirm));
    }
    
    private function checkEditProfile(){
        if(!empty($this->password) or !empty($this->confirm)){
            echo "ياا ليه كدا ليه";
        }
    }
    public function dl(){
        if($this->checkEditProfile()){
            echo 'eww';
        }
    }
}

