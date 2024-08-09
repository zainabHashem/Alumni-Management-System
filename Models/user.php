 <?php
 require_once 'observer.php';

     class User
    {
        private $userId;
        private $firstName;
        private $lastName;
        private $email;
        private $password;
        private $loginStatus;

        //public abstract function getRole();

        public function getUserId()
        {
            return $this->userId;
        }
        public function setUserId($id)
        {
            $this->userId = $id;
        }


        public function getEmail()
        {
            return $this->email;
        }
        public function setEmail($em)
        {
            $this->email = $em;
        }


        public function getPassword()
        {
            return $this->password;
        }
        public function setPassword($pass)
        {
            $this->password = $pass;
        }


        public function getFirstName()
        {
                return $this->firstName;
        }
        public function setFirstName($firstName)
        {
                $this->firstName = $firstName;
        }


        public function getLastName()
        {
                return $this->lastName;
        }
        public function setLastName($lastName)
        {
                $this->lastName = $lastName;
        }

    
        public function getLoginStatus()
        {
                return $this->loginStatus;
        }
        public function setLoginStatus($loginStatus)
        {
                $this->loginStatus = $loginStatus;
        }
    }

    ?>