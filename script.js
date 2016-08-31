/* global $ */

// function to build table row after every new entry
function buildRow(mode){
     $('#log').load('log.php?mode='+mode);
     totalTime();
}

// function to load total time in header bar
function totalTime(){
      $('#totaltime').load('log.php?mode=totaltime');
}


$('document').ready(function(){
   
   buildRow('buildrow');
   
   // set interval to automatically data after certain seconds
   setInterval(function(){
       
       // get mode value
       var mode = $('#btn-mode').data('mode');
       if(mode == 'restore'){ // if value of button is restore it means we are in live mode
             buildRow('buildrow');
       }else{ // otherwise we are in restore mode
       
            // so build build row in restore mode after 1 min of interval
           buildRow('restore');
       }
       
       
       
       
   },60000);
   
   // restore mode event implementation
   $('#btn-mode').on('click', function(event){
      event.preventDefault(); // prevent reloading the page
      // get status of mode i.e. restore or live
      var mode = $(this).data('mode');
      
      if(mode =='restore'){
          buildRow('restore');// build all row showing restore tasks
          $(this).data('mode', 'live'); // change value of data-mode from 'restore' to 'live' 
          $('#lbl-mode').html('Live');
      }else{
          buildRow('buildrow');
          $(this).data('mode', 'restore');
          $('#lbl-mode').html("Restore")
      }
       
   });
   
   
   // target new-form id which is in form tag
   $('#new-form').submit(function(event){
       
       event.preventDefault(); // prevent submitting form and reloading page

        // refering ro form
        var form = $(this);

        var data = form.serialize();
        console.log("value of data: "+ data);
        
        if(data != 'task='+""){ 
            $.ajax({
               
               url: 'log.php?mode=newtask',
               data: data,
               // every time form is submitted add new row to table
               success: function(){
                   buildRow('buildrow');
               }
                
            });     
        }else{
            alert("First enter some task, Bruce! Don't just press enter without writing something. Mad. Huh!")
        }
  
        $('input').val(""); // clear input box
       
   });
   
  // remove task 
 $('#log').on('click', '.btn-remove', function(){
    
    var id = $(this).data('id');
    
    $.ajax({
       url: 'log.php?mode=remove&id='+id,
       success: function(){
           buildRow('buildrow');
       }
    });
     
 });
  
   
     // Restore task 
 $('#log').on('click', '.btn-restore', function(){
    
    var id = $(this).data('id');
    
    $.ajax({
       url: 'log.php?mode=status&id='+id,
       success: function(){
           buildRow('restore');
       }
    });
     
 });
   
 // stop task
 $('#log').on('click', '.btn-stop', function(){
    
    var id = $(this).data('id');
    
    $.ajax({
       url: 'log.php?mode=stop&id='+id,
       success: function(){
           buildRow('buildrow');
       }
    });
     
 });
  
    
});