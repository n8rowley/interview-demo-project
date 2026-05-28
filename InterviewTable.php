<?php 

class InterviewTable {

    private $connection; 

    public function __construct(){
        $this->connection = new PDO('sqlite:my_database.db');

        $this->connection->exec("CREATE TABLE IF NOT EXISTS interviews (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            applicant_name VARCHAR NOT NULL,
            applicant_email VARCHAR UNIQUE,
            interview_date DATE,
            notes TEXT,
            second_interview TINYINT DEFAULT 0
        )");
    }

    public function insert(array $values){
        $statementString = 'INSERT INTO interviews 
            (applicant_name, applicant_email, interview_date, notes, second_interview) 
            VALUES (:applicant_name, :applicant_email, :interview_date, :notes, :second_interview)';

        // bind values during execution
        return $this->connection
            ->prepare($statementString)
            ->execute($values);
    }
}
