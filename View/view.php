<?php


class View extends Model{
    
    public function showUser($username){
        $currentUser = $this->getUser($username);
        return $currentUser;
    }

    public function showUsers(){
        
        $users = $this->getUsers();
        foreach($users as $user){
            echo $user['username'].'<br>';
        }
          
    }

    public function showCarOffers(){
        $cars = $this->getCarOffers();

        $cars_total = array();

        foreach($cars as $id => $car){
            $data = [
                'id' => $car['id'],
                'model_name' => $car['model_name'],
                'features' => $car['features'],
                'price_per_day' => $car['price_per_day'],
                'rent_length' => $car['rent_length']
            ];
            
            $cars_total[] = $data;
        }
        
        return $cars_total;
    }

    public function showBoatOffers(){
        $boats = $this->getBoatOffers();

        $boats_total = array();

        foreach($boats as $id => $boat){
            $data = [
                'id' => $boat['id'],
                'model_name' => $boat['model_name'],
                'features' => $boat['features'],
                'price_per_day' => $boat['price_per_day'],
                'rent_length' => $boat['rent_length']
            ];
            
            $boats_total[] = $data;
        }
        
        return $boats_total;

    }

    public function showOffers(){
        $offers = $this->getOffers();

        $offers_total = array();

        foreach($offers as $id => $offer){
            $data = [
                'id' => $offer['id'],
                'model_name' => $offer['model_name'],
                'features' => $offer['features'],
                'price_per_day' => $offer['price_per_day'],
                'rent_length' => $offer['rent_length'],
                'rent_type' => $offer['rent_type']
            ];
            
            $offers_total[] = $data;
        }
        
        return $offers_total;
    }

    public function getUniqueOffers(){
        $rents = $this->getRents();
        return $rents;
    }

    public function showUniqueOffers($id_offer, $id_user){
        $rentedOffers = $this->checkOffer($id_offer, $id_user);
        return $rentedOffers;
    }

    public function showUserRents($id_user){
        $userRents = $this->getUserRents($id_user);
        return $userRents;
    }
}

?>