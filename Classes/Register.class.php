<?php

class Register extends MysqliConnect{
    protected $farstname , $lastname , $email , $password , $confirm;
    
    public function setInput($farstname , $lastname , $email , $password , $confirm){
        $this->farstname    = $this->esc($this->html($farstname));
        $this->lastname     = $this->esc($this->html($lastname));
        $this->email        = $this->esc($this->html($email));
        $this->password     = $this->esc($this->html($password));
        $this->confirm      = $this->esc($this->html($confirm));
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
        else if(empty($this->password)){
            Messages::setMsg('خطأ', 'الرجاء ادخال كلمة المرور', 'danger');
            echo Messages::getMsg();
        }
        else if($this->password != $this->confirm){
            Messages::setMsg('خطأ', 'كلمة المرور غير متطابقة', 'danger');
            echo Messages::getMsg();
        }     
        else{
            return true;
        }
        return FALSE;
    }
    
    public function DisplayError(){
        if($this->checkInput()){
            if($this->InsertNewMember()){
                header("Location: index.php");
            }else{
                Messages::setMsg('خطأ', 'حدث خطأ غير متوقع في النظام', 'danger');
                echo Messages::getMsg();
            }
        }
    }
    
    private function checkEmail(){
        $this->query('id', "users", "WHERE `email` = '$this->email'");
        $this->execute();
        if($this->rowCount() == 0){
            return TRUE;
        }
        return FALSE;
    }
    
    private function InsertNewMember(){
        $password = md5(sha1($this->password));
        $this->insert('users', "farstname , lastname , email , password",
                      "'$this->farstname','$this->lastname','$this->email','$password'"
                     );
        if($this->execute()){
            $_SESSION['is_logged'] = true;
            $_SESSION['user'] = [
                                'fname' => $this->farstname,
                                'lname' => $this->lastname,
                                'email' => $this->email,
                                'isAdmin' => FALSE
            ];
            return TRUE;
        }
        return FALSE;
    }
}

