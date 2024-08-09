<?php
require_once 'alumni.php';

 class Feedback {
  private $id;
  private $feedbackdesc;
  private $alumniInfo;

  //setter_getter

  public function setId($id) {
    $this->id = $id;
  }
  public function getId() {
    return $this->id;
  }

  public function setFeedbackDesc($feedbackdesc) {
    $this->feedbackdesc = $feedbackdesc;
  }
  public function getFeedbackdesc() {
    return $this->feedbackdesc;
  }

  
  public function setAlumniInfo(Alumni $alumniInfo) {
    $this->alumniInfo = $alumniInfo;
  }
  public function getAlumniInfo() {
    return $this->alumniInfo;
  }
}
?>