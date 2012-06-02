<?php 
class Include_MyException extends Exception
{
    // Redefine the exception so message isn't optional
    public function __construct($message, $code = 0, Exception $previous = null) {
        // some code
    
        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }

    // custom string representation of object
    public function __toString() {
        //if show error or save in logfile
        $msg = "[{$this->code}]: {$this->message}\n";
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
        $config = new Config();
        if($config->logfile == true)
        {
            $logfile = new Logging();
            $logfile->lwrite($msg);
            return "";           
        }
        if($config->showerror == true)
        {
            return $msg;
        }        
    }
}

?>