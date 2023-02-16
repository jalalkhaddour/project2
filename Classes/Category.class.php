<?php

class Category extends MysqliConnect{
    private $cateName , $cateLink;
    
    public function addSetInput($name , $link){
        $this->cateName = $this->esc($this->html($name));
        $this->cateLink = $this->esc($this->html($link));
        $this->cateLink = trim(str_replace(' ', '-', $this->cateLink));
    }
    
    private function checkAddInput(){
        if(empty($this->cateName)){
            Messages::setMsg('خطأ', "الرجاء ادخال اسم القسم الجديد", 'danger');
            echo Messages::getMsg();
        }else if(empty ($this->cateLink)){
            Messages::setMsg('خطأ', "الرجاء ادخال الاسم الفريد", 'danger');
            echo Messages::getMsg();
        }else if(!preg_match('/^[a-zA-Z]/', $this->cateLink)){
            Messages::setMsg('خطأ', "استخدم فقط اللغة الانجليزية في الاسم الفريد للرابط", 'danger');
            echo Messages::getMsg();
        }else if($this->checkcatLink()){
            Messages::setMsg('خطأ', "الاسم الفريد مسجل بالفعل قم بتسجيل اسم فريد آخر", 'danger');
            echo Messages::getMsg();
        }
        else{
            return TRUE;
        }
        return FALSE;
    }
    
    public function displayAddError(){
        if($this->checkAddInput()){
            if(!$this->InsertNewCategory()){
                Messages::setMsg('خطأ', "حدث خطأ غير متوقع في النظام", 'danger');
                echo Messages::getMsg();
            }
        }
    }
    private function InsertNewCategory(){
        $this->insert('category', "`category`, `link`", "'$this->cateName','$this->cateLink'");
        if($this->execute()){
            Messages::setMsg('خطأ',"تم اضافة القسم بنجاح", 'success');
            echo Messages::getMsg();
            return TRUE;
        }
        return FALSE;
    }
    
    private function checkcatLink(){
        $this->query('id', "category", "WHERE `link` = '$this->cateLink'");
        $this->execute();
        if($this->rowCount() > 0){
            return TRUE;
        }
        return FALSE;
    }
    
    public function DisplayCategory(){
        $this->query('*', "category" , "ORDER BY `id` DESC");
        $this->execute();
        while ($row = $this->fetch()){
            $rows[] = $row;
        }
        if(empty($rows))
            return NULL;
        return $rows;
    }
    
    public function deleteCategory($link){
        $this->cateLink = (int)$this->esc($link);
        $this->query('id', 'category', "WHERE `id` = '$this->cateLink'");
        $this->execute();
        if($this->rowCount() > 0){
            $this->delete('category', 'id', $this->cateLink);
            if($this->execute()){
                Messages::setMsg('تم', "حذف القسم بنجاح", 'success');
                echo Messages::getMsg();
            }else{
                Messages::setMsg('خطأ', "حدث خطأ غير متوقع", 'danger');
                echo Messages::getMsg();
            }
        }else{
            header("Location: category.php");
        }
    }
    
    public function getCategoryRow($id){
        $this->query('*', "category", "WHERE `id` = '{$id}'");
        $this->execute();
        if($this->rowCount() > 0){
            return $this->fetch();
        }else{
            header("Location: category.php");
        }
    }
    
    public function editSetInput($name , $link , $id){
        $link = str_replace(' ', '-', $link);
        $this->query('id', 'category', "WHERE `link` = '$link'");
        $this->execute();
        $rowid = $this->fetch();
        if($this->rowCount() > 0 and $rowid['id'] == $id){
            $this->update('category', "category = '{$name}'", 'id', $id);
            $this->execute();
            Messages::setMsg('تم', "تحديث القسم بنجاح", 'success');
            echo Messages::getMsg();
        }else if($this->rowCount() > 0){
            Messages::setMsg('خطأ', "الاسم الفريد مسجل بالفعل قم بتسجيل اسم فريد آخر", 'danger');
            echo Messages::getMsg();
        }      
        else{
            $this->update('category', "category = '{$name}' , link = '{$link}'", 'id', $id);
            $this->execute();
            Messages::setMsg('تم', "تحديث القسم بنجاح", 'success');
            echo Messages::getMsg();
        }
    }
    
    
    public function getCateNameById($id){
        $this->query('category', 'category', "WHERE `id` = '{$id}'");
        if($this->execute() and $this->rowCount() > 0){
            $catName = $this->fetch();
            return $catName['category'];
        }
        return FALSE;
    }
    public function getCateLinkById($id){
        $this->query('link', 'category', "WHERE `id` = '{$id}'");
        if($this->execute() and $this->rowCount() > 0){
            $catName = $this->fetch();
            return $catName['link'];
        }
        return FALSE;
    }
    
    public function getCateNameByLink($id){
        $id = $this->esc($this->html($id));
        $this->query('category', 'category', "WHERE `link` = '{$id}'");
        if($this->execute() and $this->rowCount() > 0){
            $catName = $this->fetch();
            return $catName['category'];
        }
        return FALSE;
    }
    
    public function checkCatgoryLink($id){
        $id = $this->esc($this->html($id));
        $this->query('id', 'category', "WHERE `link` = '$id'");
        if($this->execute() and $this->rowCount() > 0){
            $id = $this->fetch();
            return $id['id'];
        }else{
            header("Location: index.php");
        }
    }
}