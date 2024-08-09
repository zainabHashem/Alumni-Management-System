<?php
class News {
  private $id;
  private $newsImage;
  private $desc;
  private $newsTitle;
  
   //setter_getter
  public function setId($id) {
    $this->id = $id;
  }
  public function getId() {
    return $this->id;
  }


  public function setNewsImage($newsimage) {
    $this->newsImage = $newsimage;
  }
  public function getNewsImage() {
    return $this->newsImage;
  }


  public function setDescription($desc) {
    $this->desc = $desc;
  }
  public function getDescription() {
    return $this->desc;
  }


  public function setNewsTitle($newstitle) {
    $this->newsTitle = $newstitle;
  }
  public function getNewsTitle() {
    return $this->newsTitle;
  }
}
?>