<?php
class Avis {
    private $message;
    private $note;

    // Constructor
    public function __construct($message, $note) {
        $this->setMessage($message);
        $this->setNote($note);
    }

    // Getter for message
    public function getMessage() {
        return $this->message;
    }

    // Setter for message
    public function setMessage($message) {
        $this->message = $message;
    }

    // Getter for note
    public function getNote() {
        return $this->note;
    }

    // Setter for note
    public function setNote($note) {
        if (is_int($note) && $note >= 0 && $note <= 5) {
            $this->note = $note;
        } else {
            throw new Exception("Note must be an integer between 0 and 5.");
        }
    }
}
?>
