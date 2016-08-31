<?php
include('functions.php');
    $json = file_get_contents('data.json'); // get json data from file
    
    $data = json_decode($json, true); // convert json data into array of data
    
    // sort tasks i.e. new task at top
    //the krsort() function to sort an associative array in descending order, according to the key.
    if(is_array($data)){
        krsort($data); // since here sorting is based on time stamp, latest time will have large value    
    }
    

    switch ($_GET[mode]) {

        // Restore implementation
        case 'status':
            // when stop button is clicked assign rewrite end date in data file
            $data[$_GET['id']]['status']=1;
            // then save data
            save($data);
     
        break;

         // Remove implementation
        case 'remove':
            // when stop button is clicked assign rewrite end date in data file
            $data[$_GET['id']]['status']=2;
            // then save data
            save($data);
     
        break;

        // implementation of stop functionality
        case 'stop':
            // when stop button is clicked assign rewrite end date in data file
            $data[$_GET['id']]['date_end']=time();
            // then save data
            save($data);
        
            
        break;
        
        // write data to file from input field
        case 'newtask':
            // first create array of data from input field
            // to make id unique take timestamp as id
            $time = time();
            $data[$time]['id'] = $time;
            
            $data[$time]['taskname'] = $_GET['task'];
            $data[$time]['date_start'] = $time;
            $data[$time]['date_end'] = "";
            $data[$time]['status'] = 1;
            
            // save data into data.json file using custom save function
            save($data);
        
        break;

        // calculate total time spent
        case 'totaltime':
            $count = 0;
            if(is_array($data)){
            foreach($data as $task){
                if($task['status']==1){
                    if($task['date_end']==""){
                        $task['date_end']= time();
                    }
                    $count = $count + ($task['date_end']-$task['date_start']);    
                }
                
            }}
            
            echo time_nicer($count);
            
        break;

        case 'buildrow':
            if(is_array($data)){
                foreach($data as $task){
                
                if($task['status']==1){
                ?>
                <!--each time print a new row using loop-->
                <tr>
                    <td> <!-- first col -->
                        <?php echo $task['taskname']; ?>
                    </td>
                    <td><!-- second col -->
                        <?php echo date_nicer($task['date_start']) ?>
                    </td>
                    <td><!-- third col -->
                        <?php 
                        if($task['date_end'] != ""){
                            echo date_nicer($task['date_end']);
                        }
                         ?>
            
                    </td>
                    <td> <!-- forth col -->
                        <?php
                        if($task['date_end']==""){
                            echo time_nicer(time()-$task['date_start']);
                        }else{
                            echo time_nicer($task['date_end']-$task['date_start']);
                        }
                        ?>
            
                    </td>
                    <!-- buttons -->
                    <td class="btn-size"><button data-id="<?php echo $task['id'] ?>" class="btn btn-info btn-stop" <?php echo ($task['date_end'] != "")? 'disabled': '' ?>><?php echo icon('stop'); ?></button></td>
                    <td class="btn-size"><button data-id="<?php echo $task['id'] ?>" class="btn btn-danger btn-remove"><?php echo icon('times') ?></button></td>
                    <!-- end of buttons -->
                </tr>
            <?php } }  }       
                    
        break;
        
        
        case 'restore':
            if(is_array($data)){
                foreach($data as $task){
                
                if($task['status']==2){
                ?>
                <!--each time print a new row using loop-->
                <tr>
                    <td> <!-- first col -->
                        <?php echo $task['taskname']; ?>
                    </td>
                    <td><!-- second col -->
                        <?php echo date_nicer($task['date_start']) ?>
                    </td>
                    <td><!-- third col -->
                        <?php 
                        if($task['date_end'] != ""){
                            echo date_nicer($task['date_end']);
                        }
                         ?>
            
                    </td>
                    <td> <!-- forth col -->
                        <?php
                        if($task['date_end']==""){
                            echo time_nicer(time()-$task['date_start']);
                        }else{
                            echo time_nicer($task['date_end']-$task['date_start']);
                        }
                        ?>
            
                    </td>
                    <!-- buttons -->
                    <td class="btn-size"></td>
                    <td class="btn-size"><button data-id="<?php echo $task['id'] ?>" class="btn btn-info btn-restore"><?php echo icon('refresh') ?></button></td>
                    <!-- end of buttons -->
                </tr>
            <?php } }  }       
                    
        break;
        
    }

?>