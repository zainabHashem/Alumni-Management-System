<?php
require_once 'alumni.php';
 class MentorForm{
    private $id;
    private $topic;
    private $days;
    private $time;
    private $validation;
    private $mentorinfo;
    private $DateFrom;
    private $DateTo;
   
    //setter_getter
    public function setDateFrom($DateFrom) {
      $this->DateFrom = $DateFrom;
    }
    public function getDateFrom() {
      return $this->DateFrom;
    }
    public function setDateTo($DateTo) {
      $this->DateTo = $DateTo;
    }
    public function getDateTo() {
      return $this->DateTo;
    }
    //isset($_POST['topic']) && isset($_POST['day']) && isset($_POST['time']) && isset($_POST['from']) && isset($_POST['to'])  
        public function setId($id) {
          $this->id = $id;
        }
        public function getId() {
          return $this->id;
        }
      
        public function setTopic($topic) {
          $this->topic = $topic;
        }
        public function getTopic() {
          return $this->topic;
        }
      
        public function setDays($days) {
          $this->days = $days;
        }
        public function getDays() {
          return $this->days;
        }
      
        public function setTime($time) {
          $this->time = $time;
        }   
        public function getTime() {
          return $this->time;
        }
      
        public function setValidation($validation) {
          $this->validation = $validation;
        }
        public function getValidation() {
          return $this->validation;
        }
      
        public function setMentorInfo(Alumni $mentorinfo) {
          $this->mentorinfo = $mentorinfo;
        }
        public function getMentorInfo() {
          return $this->mentorinfo;
        }
    }


?>