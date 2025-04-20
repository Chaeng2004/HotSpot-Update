<?php
class Bus {
    private $conn;
    private $table = "Bus";
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function getAvailableBuses($bus_id ,$bus_template_number, $location, $destination, $departure_time, $arrival_time, $bus_type, $price) {
        $query = "SELECT * FROM " . $this->table . " WHERE 1=1";
        $params = [];

        if ($bus_id) {
            $query .= " AND bus_id = bus_id";
            $params[':bus_id'] = $bus_id;
        }
        
        if ($bus_template_number) {
            $query .= " AND bus_template_number = bus_template_number";
            $params[':bus_template_number'] = $bus_template_number;
        }
        
        if ($location) {
            $query .= " AND location = :location";
            $params[':location'] = $location;
        }
        
        if ($destination) {
            $query .= " AND destination = :destination";
            $params[':destination'] = $destination;
        }
        
        if ($departure_time) {
            $query .= " AND departure_time = :departure_time";
            $params[':departure_time'] = $departure_time;
        }
        
        if ($arrival_time) {
            $query .= " AND arrival_time = :arrival_time";
            $params[':arrival_time'] = $arrival_time;
        }
        
        if ($bus_type) {
            $query .= " AND bus_type = :bus_type";
            $params[':bus_type'] = $bus_type;
        }
        
        if ($price) {
            $query .= " AND price = :price";
            $params[':price'] = $price;
        }
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>