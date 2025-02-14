<?php
     include '../models/feedback.php';


     class FeedbackController{
        private $feedbackModel;
    
        public function __construct() {
            $db = (new Database())->getConnection();
            $this->feedbackModel = new Avis($db);
        }
        

        public function sendfeedback(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $sender = $_POST[''];
                $receiver = $_POST[''];
                $trajet = $_POST[''];
                $message = $_POST[''];
                $note = $_POST[''];


            }
        }

        

    }



?>