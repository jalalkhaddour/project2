<?php

class payments extends MysqliConnect{ 
    protected $id,$idProdu,$price,$category,$idUser,$link;
    
    public function setPostValue($idProduc , $price , $idUser,$link){
        $this->link         = trim($this->html($this->esc($link)));
        $this->price        =$price;
        $this->idProdu     = (int)$idProduc;
        $this->idUser      = $idUser;
    }
    
    private function checkAddInput(){
        if(empty($this->link)){
            Messages::setMsg('خطأ', "الرجاء ادخال رابط", 'danger');
            echo Messages::getMsg();
        }
        else{
            return TRUE;
        }
        return FALSE;
    }
    
    public function displayAddError(){
        if($this->checkAddInput()){
            if(!$this->InsertNewPayments()){
                Messages::setMsg('خطأ', "حدث خطأ غير متوقع في النظام", 'danger');
                echo Messages::getMsg();
            }
        }
    }
    
     private function InsertNewPayments(){
        $this->insert('payments', "`id-produ`, `link`, `id-user`, `price`", "'$this->idProdu','$this->link','$this->idUser','$this->price'");
        if($this->execute()){
            $this->update('post', "`is-paid`='1'", 'id', $this->idProdu);
            Messages::setMsg('رائع ',"تم اضافة الدفع بنجاح", 'success');
            echo Messages::getMsg();
            return TRUE;
        }
        return FALSE;
    }
    
    
    public function displayPayments($other = null){
        $this->query('*', 'payments' , $other);
        $this->execute();
        if($this->rowCount() > 0){
            while ($rows = $this->fetch()){
                 $post[] = $rows;   
            }
             if (empty($post)){
                return NULL;
            } else {
                return $post; 
            }
        }else{
            return NULL;
        }
    }
    public function displayPayments1($id){
        $this->query('*', 'payments' , "WHERE `id-produ` = '$id' ");
        $this->execute();
        if($this->rowCount() > 0){
            while ($rows = $this->fetch()){
                 $post[] = $rows;   
            }
             if (empty($post)){
                return NULL;
            } else {
                return $post; 
            }
        }else{
            return NULL;
        }
    }
    public function getDataPaymentsById($id){
        $this->query('*', 'payments' , "WHERE `id-user` = '$id' ");
        $this->execute();
        if($this->rowCount() > 0){
            while ($rows = $this->fetch()){
                 $post[] = $rows;   
            }
             if (empty($post)){
                return NULL;
            } else {
                return $post; 
            }
        }else{
            return NULL;
        }
    }
    
    public function getRowcountPaymentsById($id){
        $this->query('*', 'payments', "WHERE `id-user` = '$id'");
        if($this->execute() and $this->rowCount() > 0){
            $post = $this->fetch();
            return $this->rowCount();
        }
        return NULL;
    }
  
    public function deletePayments($id ){
        $this->query('id', 'payments', "WHERE `id-produ` = '{$id}'");
        if($this->execute() and $this->rowCount() > 0){
            $this->delete('payments', 'id-produ', $id);
            if($this->execute()){
               $this->update('post', "`is-paid`='0'", 'id', $id);
                  echo Messages::setMsg('تم', 'حذف الدفعة بنجاح', 'success') . Messages::getMsg(); 
            }
        }else{
           echo Messages::setMsg('خطأ ', 'حدث خطأ غير متوقع بالنظام', 'success') . Messages::getMsg();
        }
    }
    
    public function editEmail($email,$id){
            $this->update('payments', "`email`='$email'", 'id', $id);
            if($this->execute()){
                echo Messages::setMsg('تم', ' تحديث الايميل بنجاح', 'success') . Messages::getMsg();
            } else {
                 echo Messages::setMsg('خطأ', ' حدث خطأ غير متوقع بالنظام', 'danger') . Messages::getMsg();
            }
   
    
    }
    
     public function editStatus($status,$id){
            $this->update('payments', "`status`='$status'", 'id', $id);
            if($this->execute()){
                header("location: Waiting.php");
                echo Messages::setMsg('تم', ' م تحديث الحالة بنجاح', 'success') . Messages::getMsg();
            } else {
                 echo Messages::setMsg('خطأ', ' حدث خطأ غير متوقع بالنظام', 'danger') . Messages::getMsg();
            }
       
    }
}