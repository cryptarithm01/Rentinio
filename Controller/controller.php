<?php

class Controller extends Model{
// here we update the database.. changes/insert.. etc.

    public function register($username, $password, $role){
        $this->registerUser($username, $password, $role);
    }

    public function login($username){
       
       $user =  $this->getUser($username);
       
       $password = md5($_POST['password']);


       if($user[0]['username'] === $username && $user[0]['password'] === $password){
            session_start();
            $_SESSION['username'] = $username;   
            return true;
            
       }else{
            return false;
       }
    
    }

    /* user renting - update users' table PPD, insert into rents table, prevent duplicates */
    public function renting($id_offer, $username, $ppd){
        $rents = $this->getRents();
        $user = $this->getUser($username);
        $id_user = $user[0]['id'];
        $counter = 0;
        
        if(empty($rents)){
            $this->rent($id_user, $id_offer);
            $this->ppd($id_user, $ppd);
            

        }else{
            foreach($rents as $index => $rent){
                
                if($rent['id_user'] === $id_user && $rent['id_offer'] === $id_offer){
                   $counter++;
                
                }
            }

            if(!$counter){
                $this->rent($id_user, $id_offer);
                // echo "<br>". "Counter: $counter";
                $this->ppd($id_user, $ppd);
             
            }
        }

    }

    public function updateUserPPD($ppd, $id_user){
        $this->updatePPD($ppd, $id_user);
    }

    public function cancelUserRent($id_rent, $id_user){
        $this->cancelRent($id_rent, $id_user);
    }

    


}

?>