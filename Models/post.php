<?php
require_once 'interact bahavior.php';

abstract class Post
{
    private $postId;
    private $postDescription;
    private $uploadedlink;
    private $uploadedFile;
    private $uploadedImage;
    private $postUrl;
    private $postComments=array(); // [comment id] = comment description
    private $postReacts=array(); // [react id] = react description
    private $validation;




    public function __construct($postId,$postDescription,$uploadedImage,$uploadedlink,$uploadedFile)
    {
        $this->setPostId($postId);
        $this->setPostDescription($postDescription);
        $this->setUploadedImage($uploadedImage);
        $this->setUploadedlink($uploadedlink);
        $this->setUploadedFile($uploadedFile);
    }

    
    public function setpostvalidation($validation)
    {
        $this->validation = $validation;
    }
    public function getpostvalidation()
    {
        return $this->validation;
    }

    public abstract function getPostType();

    public function addInterction(InteractBehavior $interactBehavior)
    {
        if($interactBehavior->getInteractionType()=="comment")
        {
            $this->postComments[$interactBehavior->getInteractionID()]=$interactBehavior->getInteractionDescription();
        }
        else $this->postReacts[$interactBehavior->getInteractionID()]=$interactBehavior->getInteractionDescription();
    }

 
    public function getComments()
    {
        foreach($this->postComments as $key => $value)echo "{$key} : {$value} <br>";
    }


    public function getReacts()
    {
        foreach($this->postReacts as $key => $value)echo "{$key} : {$value} <br>";
    } 

    public function getPostId()
    {
        return $this->postId;
    }
    public function setPostId($postId)
    {
        $this->postId = $postId;
    }

    public function getPostUrl()
    {
        return $this->postUrl;
    }
    public function setPostUrl($postUrl)
    {
        $this->postUrl = $postUrl;
    }


    public function getPostDescription()
    {
        return $this->postDescription;
    }
    public function setPostDescription($postDescription)
    {
        $this->postDescription = $postDescription;
    }

 
    public function getUploadedlink()
    {
        return $this->uploadedlink;
    }
    public function setUploadedlink($uploadedlink)
    {
        $this->uploadedlink = $uploadedlink;
    }


    public function getUploadedFile()
    {
        return $this->uploadedFile;
    }
    public function setUploadedFile($uploadedFile)
    {
        $this->uploadedFile = $uploadedFile;
    }


    public function getUploadedImage()
    {
        return $this->uploadedImage;
    }
    public function setUploadedImage($uploadedImage)
    {
        $this->uploadedImage = $uploadedImage;
    }
}
?>