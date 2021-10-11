<?php 

class Model extends DB{
    // only the model interacts with the Database


    protected function getUsers(){
        
        $sql = "SELECT * FROM users";
        $statement = $this->connect()->prepare($sql);
        $statement->execute();

        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
        
    }

    // check
    protected function getUser($username){
        $sql = "SELECT username, password, id FROM users WHERE username = :username";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(':username', $username);
        $statement->execute();

        $user = $statement->fetchAll(PDO::FETCH_ASSOC);

       // if($user[0] === null){$user = 'NULL';}
        return $user;
    }

    // register
    protected function registerUser($username, $password, $role){
        
        $sql = "INSERT INTO users(username, password, role) 
                VALUES(:username, :password, :role)";
        
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(':username', (string)$username);
        $statement->bindValue(':password', (string)$password);
        $statement->bindValue(':role', (string)$role);

        $statement->execute();

    }

    // get car offers
    protected function getCarOffers(){
        $car = 'car';
        $sql = "SELECT * FROM offers WHERE rent_type = :car";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(':car', $car);
        $statement->execute();

        $cars = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $cars;
    }

    // get boat offers
    protected function getBoatOffers(){
        $boat = 'boat';
        $sql = "SELECT * FROM offers WHERE rent_type = :boat";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(':boat', $boat);
        $statement->execute();

        $boats = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $boats;
    }


    // get all offers
    protected function getOffers(){
        
        $sql = "SELECT * FROM offers";
        $statement = $this->connect()->prepare($sql);
        $statement->execute();

        $offers = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $offers;
    }

    protected function rent($user, $offer){
        $sql = "INSERT INTO rents(id_user, id_offer) VALUES(:id_user, :id_offer)";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue('id_user', $user);
        $statement->bindValue('id_offer', $offer);
        $statement->execute();
    }

    protected function getRents(){
        $sql = "SELECT * FROM rents";
        $statement = $this->connect()->prepare($sql);
        $statement->execute();

        $rents = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rents;
    }

    protected function getUserRents($id_user){
        // TODO: show total rentals of a user and total price for rental length
        $sql = "SELECT rents.id, users.PPD, users.username, offers.model_name, offers.rent_length, offers.price_per_day FROM rents INNER JOIN users on rents.id_user = users.id INNER JOIN offers ON rents.id_offer = offers.id WHERE rents.id_user = :id_user;";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(':id_user', $id_user);
        $statement->execute();

        $userRents = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $userRents;
    }

    protected function checkOffer($id_offer, $id_user){
        // SELECT offers.* FROM offers INNER JOIN rents ON rents.id_offer INNER JOIN users ON rents.id_user WHERE offers.id LIKE rents.id_offer AND users.id LIKE rents.id_user
        $sql = "SELECT offers.* FROM offers INNER JOIN rents ON rents.id_offer = offers.id INNER JOIN users ON rents.id_user = users.id WHERE offers.id = :id_offer AND users.id = :id_user";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(':id_offer', $id_offer);
        $statement->bindValue(':id_user', $id_user);
        $statement->execute();

        $rentedOffers = $statement->fetchAll(PDO::FETCH_ASSOC);
        if(empty($rentedOffers)){
            return NULL;
        }
        return $rentedOffers;
    }

    protected function getPPD($id_user){
        $sql = "SELECT rent_number, PPD FROM users WHERE users.id = :id_user";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(':id_user', $id_user);
        $statement->execute();

        $total = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $total;
    }
    // update price per day for a user after renting
    protected function ppd($id_user, $ppd){
       
        $total = $this->getPPD($id_user);
        $rent_number = $total[0]['rent_number'];
        $current_ppd = $total[0]['PPD'];

        $sql = "UPDATE users SET users.rent_number = :rent_number, users.PPD = :PPD WHERE users.id = :id_user";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(':id_user', $id_user);
        $statement->bindValue(':rent_number', $rent_number + 1);
        $statement->bindValue(':PPD', $current_ppd + $ppd);
        $statement->execute();
    }


    protected function cancelRent($id_rent, $id_user){
        // TODO : subtract from current PPD, decrement rent_number for a specific user, update rents TABLE
        $sql = "DELETE rents.* FROM rents WHERE rents.id = :id_rent AND rents.id_user = :id_user";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(':id_rent', $id_rent);
        $statement->bindValue(':id_user', $id_user);
        $statement->execute();
    }

    protected function updatePPD($ppd, $id_user){
        $sql = "UPDATE users SET users.PPD = :ppd WHERE users.id = :id_user";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(':ppd', $ppd);
        $statement->bindValue(':id_user', $id_user);
        $statement->execute();
    }
}

?>