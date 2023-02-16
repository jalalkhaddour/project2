<?php

class Contact extends MysqliConnect{
    private $email , $username , $message;
    public function getInput($email , $username , $message) {
        $this->email    = $this->esc($email);
        $this->username = $this->esc($this->html($username));
        $this->message  = $this->esc($this->html($message));
        
        $this->InsertMessage();
    }
    
    private function checkInput(){
        if(empty($this->email)){
            echo Messages::setMsg('خطأ', 'الرجاء ادخال بريدك الالكتروني', 'danger') . Messages::getMsg();
        }else if(empty ($this->username)){
            echo Messages::setMsg('خطأ', 'الرجاء ادخال اسمك الكامل', 'danger') . Messages::getMsg();
        }else if(empty ($this->message)){
            echo Messages::setMsg('خطأ', 'الرجاء ادخال الرسالة', 'danger') . Messages::getMsg();
        }else{
            return TRUE;
        }
        return FALSE;
    }
    
    private function InsertMessage(){
        if($this->checkInput()){
            $this->insert('messages', "`username`, `email`, `message`", "'$this->username','$this->email','$this->message'");
            if($this->execute()){
                echo Messages::setMsg('رائع', 'تم ارسال الرسالة بنجاح', 'success') . Messages::getMsg();
            }
        }
    }
    
    public function getMessageContant($other = null){
        $this->query('*', 'messages' , $other);
        if($this->execute() and $this->rowCount() > 0){
            while ($msg = $this->fetch()){
                $messages[] = $msg;
            }
            return $messages;
        }
        return NULL;
    }
    
    public function getcontantMessage($id){
        $this->query('*', "messages", "WHERE `id` = '$id'");
        if($this->execute() and $this->rowCount() > 0){
            $msg = $this->fetch();
            return $msg;
        }else{
            header("Location: index.php");
        }
    }
    
    public function deleteMessageContant($id){
        $this->query('*', "messages", "WHERE `id` = '$id'");
        if($this->execute() and $this->rowCount() > 0){
            $this->delete('messages', 'id', $id);
            if($this->execute()){
                echo Messages::setMsg('تم', 'حذف الرسالة بنجاح', 'success') . Messages::getMsg();
            }
        }else{
            header("Location: inbox.php");
        }
    }
}

