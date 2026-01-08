<?php
add_shortcode('doctor_calendar', function($atts){
    $atts = shortcode_atts(['id'=>''],$atts);
    if(!$atts['id']) return 'Doctor ID required';

    $schedule = get_post_meta($atts['id'],'_doctor_schedule',true);
    if(!$schedule) return 'No schedule';

    wp_enqueue_script('fullcalendar','https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js');
    
    $events = [];
    foreach($schedule as $day=>$data){
        if(empty($data['off']) && !empty($data['start'])){
            $events[] = [
                'title' => 'Available',
                'daysOfWeek' => [date('w',strtotime($day))],
                'startTime' => $data['start'],
                'endTime' => $data['end'],
                'color' => '#28a745'
            ];
        }
    }

    ob_start(); ?>
    <div id="doctor-calendar"></div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendar = new FullCalendar.Calendar(document.getElementById('doctor-calendar'), {
            initialView: 'timeGridWeek',
            events: <?php echo json_encode($events); ?>
        });
        calendar.render();
    });
    </script>
    <?php
    return ob_get_clean();
});
