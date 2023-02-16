<?php

class Users extends MysqliConnect{
    protected $farstname , $lastname , $email , $password , $confirm , $id , $admin;
    
    public function setInput($farstname , $lastname , $email , $password , $confirm , $id = null , $admin = null){
        $this->farstname    = $this->esc($this->html($farstname));
        $this->lastname     = $this->esc($this->html($lastname));
        $this->email        = $this->esc($this->html($email));
        $this->password     = $this->esc($this->html($password));
        $this->confirm      = $this->esc($this->html($confirm));
        $this->id           = $id;
        $this->admin        = $admin;
    }
    
    public function checkUserProfile($id){
        if($_SESSION['user']['id'] != $id){
            if($_SESSION['user']['isAdmin'] == TRUE){
                return $this->getUserData($id);
            }
            header("Location: index.php");
        }else{
            return $this->getUserData($id);
        }
    }
    
    private function getUserData($id){
        $this->query('id,farstname , lastname , email , isAdmin', 'users', "WHERE `id` = '{$id}'");
        $this->execute();
        if($this->rowCount() > 0){
            $user = $this->fetch();
            return $user;
        }else{
            header("Location: index.php");
        }
    }


    public function checkInput(){
        if(empty($this->farstname)){
            Messages::setMsg('خطأ', 'الرجاء ادخال اسمك الأول', 'danger');
            echo Messages::getMsg();
        }else if(empty($this->lastname)){
            Messages::setMsg('خطأ', 'الرجاء ادخال اسمك الأخير', 'danger');
            echo Messages::getMsg();
        }
        else if(empty($this->email)){
            Messages::setMsg('خطأ', 'الرجاء ادخال بريدك الالكتروني', 'danger');
            echo Messages::getMsg();
        }else if(!$this->checkEmail()){
            Messages::setMsg('خطأ', 'البريد الالكتروني مسجل بالفعل', 'danger');
            echo Messages::getMsg();
        }
        else if(!empty($this->password) or !empty ($this->confirm)){
            if($this->password !== $this->confirm){
                Messages::setMsg('خطأ', 'كلمة المرور غير متطابقة', 'danger');
                echo Messages::getMsg();
            }
            return TRUE;
        }   
        else{
            return true;
        }
        return FALSE;
    }
    
    private function checkEmail(){
        if($this->email != $_SESSION['user']['email']){
            $this->query('id , email', "users", "WHERE `email` = '$this->email'");
            $this->execute();
            if($this->rowCount() > 0){
                $user = $this->fetch();
                if($user['email'] == $this->email and $user['id'] == $this->id){
                    return TRUE;
                }
                return FALSE;
            }
            return TRUE;
        }
        return TRUE;
    }
    
    public function DisplayError(){
        if($this->checkInput()){
            $this->updateUser();
        }
    }
    
    private function updateUser(){
        $admin = ($this->admin != NULL and $this->admin == 1 ? 1 : 0);
        if($this->password != NULL){
        $password = md5(sha1($this->password));
            $data = "`farstname`='$this->farstname',`lastname`='$this->lastname',`email`='$this->email',`password`='$password' , `isAdmin` = '$admin'";
        }else{
            $data = "`farstname`='$this->farstname',`lastname`='$this->lastname',`email`='$this->email', `isAdmin` = '$admin'";
        }
        if($this->id == NULL){
            $id = $_SESSION['user']['id'];
        }else{
            $id = $this->id;
        }
        $this->update('users', $data, 'id', $id);
        if($this->execute()){
            if($this->id == NULL || $this->id == $_SESSION['user']['id']){
            unset($_SESSION['user']['fname']);
            unset($_SESSION['user']['lname']);
            unset($_SESSION['user']['email']);
            
            $_SESSION['user']['fname'] = $this->farstname;
            $_SESSION['user']['lname'] = $this->lastname;
            $_SESSION['user']['email'] = $this->email;
            }
            echo Messages::setMsg('تم', 'تحديث البيانات بنجاح', 'success') . Messages::getMsg();
        }
    }
    
    public function getAllUsers($other = null){
        $this->query('id , farstname , lastname , email , isAdmin', "users" , $other);
        if($this->execute() and $this->rowCount() > 0){
            while ($users = $this->fetch()){
                $user[] = $users;
            }
            return $user;
        }
        return NULL;
    }
    
    public function deleteUser($id){
        $this->query('id', 'users', "WHERE `id` = '{$id}'");
        if($this->execute() and $this->rowCount() > 0){
            $this->delete('users', 'id', $id);
            if($this->execute()){
                echo Messages::setMsg('تم', 'حذف العضو بنجاح', 'success') . Messages::getMsg();
            }
        }else{
            header("location: users.php");
        }
    }
    
    public function usersCount(){
        $this->query('id', 'users');
        $this->execute();
        return $this->rowCount();
    }
}