<?php
add_action('add_meta_boxes', function () {
    add_meta_box('doctor_schedule','Doctor Weekly Schedule','doctor_schedule_cb','doctor');
});

function doctor_schedule_cb($post){
    $schedule = get_post_meta($post->ID,'_doctor_schedule',true) ?: [];
    $days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
    foreach($days as $day){
        $start = $schedule[$day]['start'] ?? '';
        $end = $schedule[$day]['end'] ?? '';
        $off = !empty($schedule[$day]['off']);
        echo "<p><strong>$day</strong><br>";
        echo "<label><input type='checkbox' name='schedule[$day][off]' ".checked($off,true,false)."> Not Available</label><br>";
        echo "Start <input type='time' name='schedule[$day][start]' value='$start'> ";
        echo "End <input type='time' name='schedule[$day][end]' value='$end'></p><hr>";
    }
}

add_action('save_post', function($post_id){
    if(isset($_POST['schedule'])){
        update_post_meta($post_id,'_doctor_schedule',$_POST['schedule']);
    }
});
