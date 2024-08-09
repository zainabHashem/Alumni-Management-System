<?php
require_once 'user.php';
abstract class InteractBehavior
{
    private $interactionID;
    private $interactor;
    private $interactionDescription;

    public function __construct($interactionID, User $interactor, $interactionDescription)
    {
        $this->setInteractionID($interactionID);
        $this->setInteractor($interactor);
        $this->setInteractionDescription($interactionDescription);
    }

    public abstract function getInteractionType();


    public function getInteractionDescription()
    {
        return $this->interactionDescription;
    }
    public function setInteractionDescription($interactionDescription)
    {
        $this->interactionDescription = $interactionDescription;
    }


    public function getInteractor()
    {
        return $this->interactor;
    }
    public function setInteractor($interactor)
    {
        $this->interactor = $interactor;
    }


    public function getInteractionID()
    {
        return $this->interactionID;
    }
    public function setInteractionID($interactionID)
    {
        $this->interactionID = $interactionID;
    }


}

?>