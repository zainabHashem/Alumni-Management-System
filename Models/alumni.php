<?php
include_once 'user.php';
class Alumni extends User
{
    private $bio;
    private $resume;
    private $profilePicture;
    private $education;
    private $experience;
    private $location;
    private $skills;
    private $volunteering;
    private $gmailAccount;
    private $GithubAccount;
    private $linkedinAccount;
    private $TwitterAccount;
    private $FacebookAccount;
    private $graduateYear;
    private $department;
    private $nationalid;
    private $gender;
    
    public function getRole()
    {
        return "alumni";
    }

 
    public function getBio()
    {
        return $this->bio;
    }
    public function setBio($bio)
    {
        $this->bio = $bio;
    }


    public function getResume()
    {
        return $this->resume;
    }
    public function setResume($resume)
    {
        $this->resume = $resume;
    }


    public function getProfilePicture()
    {
        return $this->profilePicture;
    } 
    public function setProfilePicture($profilePicture)
    {
        $this->profilePicture = $profilePicture;
    }


    public function getEducation()
    {
        return $this->education;
    }
    public function setEducation($education)
    {
        $this->education = $education;
    }


    public function getExperience()
    {
        return $this->experience;
    }
    public function setExperience($experience)
    {
        $this->experience = $experience;
    }


    public function getLocation()
    {
        return $this->location;
    } 
    public function setLocation($location)
    {
        $this->location = $location;
    }


    public function getSkills()
    {
        return $this->skills;
    }
    public function setSkills($skills)
    {
        $this->skills = $skills;
    }


    public function getVolunteering()
    {
        return $this->volunteering;
    }
    public function setVolunteering($volunteering)
    {
        $this->volunteering = $volunteering;
    }


    public function getGmailAccount()
    {
        return $this->gmailAccount;
    }
    public function setGmailAccount($gmailAccount)
    {
        $this->gmailAccount = $gmailAccount;
    }


    public function getGithubAccount()
    {
        return $this->GithubAccount;
    }
    public function setGithubAccount($GithubAccount)
    {
        $this->GithubAccount = $GithubAccount;
    }


    public function getLinkedinAccount()
    {
        return $this->linkedinAccount;
    }
    public function setLinkedinAccount($linkedinAccount)
    {
        $this->linkedinAccount = $linkedinAccount;
    }


    public function getTwitterAccount()
    {
        return $this->TwitterAccount;
    }


    public function setTwitterAccount($TwitterAccount)
    {
        $this->TwitterAccount = $TwitterAccount;
    }


    public function getFacebookAccount()
    {
        return $this->FacebookAccount;
    }


    public function setFacebookAccount($FacebookAccount)
    {
        $this->FacebookAccount = $FacebookAccount;
    }


    public function getGraduateYear()
    {
        return $this->graduateYear;
    }
    public function setGraduateYear($graduateYear)
    {
        $this->graduateYear = $graduateYear;
    }


    public function getDepartment()
    {
        return $this->department;
    }

    public function setDepartment($department)
    {
        $this->department = $department;
    }

    public function getnationalid()
    {
        return $this->nationalid;
    }

    public function setnationalid($nationalid)
    {
        $this->nationalid = $nationalid;
    }

    public function getgender()
    {
        return $this->gender;
    }
    public function setgender($gender)
    {
        $this->gender = $gender;
    }
}

?>