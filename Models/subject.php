<?php
abstract class Subject {
    public abstract function subscribe(Observer $observers);
    public abstract function unsubscribe(Observer $observers);
    public abstract function notifyAllSubscribers($message);
}
?>