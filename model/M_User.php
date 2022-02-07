<?php
    class User
    {

        private $id;

        private $name;
    
        private $firstname;
    
        private $age;
    
        private $telephone;
    
        private $email;
    
        private $country;

        private $comment;

        private $job;
    
        private $url;

        /**
         * Get the value of url
         */
        public function getUrl()
        {
            return $this->url;
        }

        /**
         * Set the value of url
         *
         * @return  self
         */
        public function setUrl($url)
        {
            $this->url = $url;

            return $this;
        }

        /**
         * Get the value of job
         */
        public function getJob()
        {
            return $this->job;
        }

        /**
         * Set the value of job
         *
         * @return  self
         */
        public function setJob($job)
        {
            $this->job = $job;

            return $this;
        }

        /**
         * Get the value of comment
         */
        public function getComment()
        {
            return $this->comment;
        }

        /**
         * Set the value of comment
         *
         * @return  self
         */
        public function setComment($comment)
        {
            $this->comment = $comment;

            return $this;
        }

        /**
         * Get the value of country
         */
        public function getCountry()
        {
            return $this->country;
        }

        /**
         * Set the value of country
         *
         * @return  self
         */
        public function setCountry($country)
        {
            $this->country = $country;

            return $this;
        }

        /**
         * Get the value of email
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */
        public function setEmail($email)
        {
            $this->email = $email;

            return $this;
        }

        /**
         * Get the value of telephone
         */
        public function getTelephone()
        {
            return $this->telephone;
        }

        /**
         * Set the value of telephone
         *
         * @return  self
         */
        public function setTelephone($telephone)
        {
            $this->telephone = $telephone;

            return $this;
        }

        /**
         * Get the value of age
         */
        public function getAge()
        {
            return $this->age;
        }

        /**
         * Set the value of age
         *
         * @return  self
         */
        public function setAge($age)
        {
            $this->age = $age;

            return $this;
        }

        /**
         * Get the value of firstname
         */
        public function getFirstname()
        {
            return $this->firstname;
        }

        /**
         * Set the value of firstname
         *
         * @return  self
         */
        public function setFirstname($firstname)
        {
            $this->firstname = $firstname;

            return $this;
        }

        /**
         * Get the value of name
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */
        public function setName($name)
        {
            $this->name = $name;

            return $this;
        }


        /**
         * Get the value of id
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */
        public function setId($id)
        {
            $this->id = $id;

            return $this;
        }

    }

?>