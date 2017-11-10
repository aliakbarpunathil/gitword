<?php
class Validation_Date extends Validation {
    protected $message;

    public function __construct($message = "") {
		//if(!empty($message))
		$this->message = RM_UI_Strings::get('FORM_ERR_INVALID_DATE');
	}

    public function isValid($value) {
        try {
            $date = new DateTime($value);
            return true;
        } catch(Exception $e) {
            return false;
        }
    }
}
