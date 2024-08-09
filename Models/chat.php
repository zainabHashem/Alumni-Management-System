<?php
    class Chat extends Subject {
        private $id;
        private $senderId;
        private $receiverId;
        private $message;
        private $observers;

        public function __construct() {
            $this->observers = new SplDoublyLinkedList(); // Initialize a new SplDoublyLinkedList object
        }
    
        public function getId() {
            return $this->id;
        }
    
        public function setId($id) {
            $this->id = $id;
        }
    
        public function getSenderId() {
            return $this->senderId;
        }
    
        public function setSenderId($senderId) {
            $this->senderId = $senderId;
        }
    
        public function getReceiverId() {
            return $this->receiverId;
        }
    
        public function setReceiverId($receiverId) {
            $this->receiverId = $receiverId;
        }
    
        public function getMessage() {
            return $this->message;
        }
    
        public function setMessage($message) {
            $this->message = $message;
        }
        public function getObservers() {
            return $this->observers;
        }
    
        public function setObservers($observers) {
            $this->observers = $observers;
        }
        public function subscribe(Observer $observer) {
            $this->observers->push($observer); //  push() method add an observer to end of list
        }
    
        public function unsubscribe(Observer $observer) {
            $this->observers->rewind(); // Set the current node to the first node of the list
            while ($this->observers->valid()) { // Loop through each node in the list
                if ($this->observers->current() === $observer) { // If the current node is the observer we want to remove
                    $this->observers->offsetUnset($this->observers->key()); // Use the offsetUnset() method to remove the current node from the list
                    break;
                }
                $this->observers->next(); // Move to the next node
            }
        }
    
        public function notifyAllSubscribers($message) {
            $this->observers->rewind(); // Set the current node to the first node of the list
            while ($this->observers->valid()) { // Loop through each node in the list
                $this->observers->current()->update($message); // Call the update() method on the current observer
                $this->observers->next(); // Move to the next node
            }
        }
    }
?>