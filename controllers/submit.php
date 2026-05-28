<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $interviewTable = new Interviewtable();

    $data = array_filter(
        $_POST, 
        function($key) {
            return in_array($key, [
                'applicant_name',
                'applicant_email',
                'interview_date',
                'notes',
                'second_interview',
            ]);
        }, 
        ARRAY_FILTER_USE_KEY
    );

    $data['second_interview'] = (int)(isset($_POST['second_interview']));

    $interviewTable->insert($data);
    
} else {
    http_response_code(405);
    require "views/405.html";
    die();
}
