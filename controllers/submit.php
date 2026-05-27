<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new PDO('sqlite:my_database.db');
    
    $values = [
        ":applicant_name" => $_POST['applicant_name'],
        ":applicant_email" => $_POST['applicant_email'],
        ":interview_date" => $_POST['interview_date'],
        ":notes" => $_POST['notes'],
        ":second_interview" => $_POST['second_interview'],
    ];
    
    $statement = $db->prepare(
        'INSERT INTO interviews (applicant_name, applicant_email, interview_date, notes, second_interview) 
        VALUES (:applicant_name, :applicant_email, :interview_date, :notes, :second_interview)');

    $result = $statement->execute($values);
} else {
    echo "Method not allowed";
    http_response_code(405);
}
