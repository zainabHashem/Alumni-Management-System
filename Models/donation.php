<?php
require_once 'alumni.php';
class Donation{
    private $id;
    private $amount;
    private $paymentmethod;

    private $phone;

    private $donorinfo;

    //setter_getter

    public function setId($id) {
        $this->id = $id;
      }
      public function getId() {
        return $this->id;
      }
    

      public function setAmount($amount) {
        $this->amount = $amount;
      }
      public function getAmount() {
        return $this->amount;
      }
      public function setPhone($phone) {
        $this->phone = $phone;
      }
      public function getPhone() {
        return $this->phone;
      }
    

      public function setPaymentMethod($paymentmethod) {
        $this->paymentmethod = $paymentmethod;
      }
      public function getPaymentMethod() {
        return $this->paymentmethod;
      }
    

      public function setDonorInfo(Alumni $donorinfo) {
        $this->donorinfo = $donorinfo;
      }
      public function getDonorInfo() {
        return $this->donorinfo;
      }

}
?>