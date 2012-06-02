<?php 
class Include_LogFile {
    // define default log file
    private $log_file = '/tmp/logfile.log';
    // define default newline character
    private $nl = "\n";
    // define file pointer
    private $fp = null;
    // set log file (path and name)
    public function lfile($path) {
        $this->log_file = $path;
    }
    
    //function not write
    public function lread()
    {
        
    }
    
    // write message to the log file
    public function lwrite($message) {
        // if file pointer doesn't exist, then open log file
        if (!$this->fp) {
            $this->lopen();
        }
        // define script name
        $script_name = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
        // define current time
        $time = date('H:i:s');
        // write current time, script name and message to the log file
        fwrite($this->fp, "$time ($script_name) $message". $this->nl);
    }
    // close log file (it's always a good idea to close a file when you're done with it)
    public function lclose() {
        fclose($this->fp);
    }
    
    // open log file
    private function lopen() {
        // define log file path and name
        $lfile = $this->log_file;
        // set newline character to "\r\n" if script is used on Windows
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $this->nl = "\r\n";
        }
        // define the current date (it will be appended to the log file name)
        $today = date('Y-m-d');
        // open log file for writing only; place the file pointer at the end of the file
        // if the file does not exist, attempt to create it
        $this->fp = fopen($lfile . '_' . $today, 'a') or exit("Can't open $lfile!");
    }
}
?>