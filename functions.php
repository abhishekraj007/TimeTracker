<?php

# function to get awesome icon:
    function icon($icon_code){
        $code = '<i class="fa fa-'.$icon_code.'"></i>';
        return $code;
    }

# function to make date looks nice:

function date_nicer($date){
    return date('M d Y  g:i A ', $date);
}

#function to make time looks nice: or convert seconds into hr and min:
function time_nicer($seconds){
    
    
    // $day = floor((($seconds/60)/60)/24);
    $hr = floor((($seconds/60)/60)); 
    $min = floor(($seconds/60) - ($hr *60));
    $days = floor($hr/24);
    $hr = floor((($seconds/60)/60) - ($days*24));
    return $days.' days '.$hr.' hrs: '.$min.' mins';
    
}

#function to save data to data.json file
function save($data){
    // first convert $data array to json
    $json = json_encode($data);
    // open file to in which you want to write json data
    $file = fopen('data.json', 'w');
    // write data
    fwrite($file, $json);
}

?>