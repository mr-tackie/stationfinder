<?php
    namespace App;

//class for frontend utilities.
    class Utils{
        public function saveFileContentsToDB($file, $region){
            $stations = file_get_contents($file);
            $stations = json_decode($stations, true);
    
            $stationObjects = array();
    
            foreach($stations as $station){
                $station['contact_number'] = $station['phone_number'];
                $station['region_code'] = $region;
                unset($station['phone_number']);
                $stationObjects[] = $station;
            }
    
            Station::insert($stationObjects);
        }
    }
?>