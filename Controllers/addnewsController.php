<?php
require_once 'DBController.php';
 
 class addnewsController{
   protected $db;
    //select from database
   public function getallnews()
   {
    $this->db=new DBcontroller;
    if($this->db->Connection())
    {
       $query="SELECT news.id, news.newstitle,news.desc,news.newsimage,news.time  FROM news ";
       return $this->db->select($query);
    }
    else{
          echo"Error in Database Connection";
          return false;
    }

   }

   //insert into database
   public function addnews(News $news) {
      $this->db = new DBcontroller;
      if ($this->db->Connection()) {
            //$_SESSION["id"] = 1;
      $image = $news->getNewsImage();
      $description = $news->getDescription();
      $title = $news->getNewsTitle();
      $id = $news->getId();
          $query = "INSERT INTO news (newsimage, `desc`, newstitle,userid) VALUES ('$image', '$description','$title','$id')";
          return $this->db->insert($query);
      } else {
          echo "Error in Database Connection";
          return false;
      }
  }

  //delete from database
  public function deletenew(News $news)
  {
    $this->db = new DBcontroller;
    if ($this->db->Connection()) {
        $query="delete from news where id= ('{$news->getId()}')";
        return $this->db->delete($query);
    
    }else{
        echo "Error in Database Connection";
        return false;
    }
}


}
?>