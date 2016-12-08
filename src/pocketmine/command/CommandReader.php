<?php
/**
 * src/pocketmine/command/CommandReader.php
 *
 * @package default
 */




namespace pocketmine\command;

use pocketmine\Thread;

class CommandReader extends Thread
{
    private $readline;

    /** @var \Threaded */
    protected $buffer;
    private $shutdown = false;


    public function __construct()
    {
        $this->buffer = new \Threaded;
        $this->start();
    }




    public function shutdown()
    {
        $this->shutdown = true;
    }


    /**
     *
     * @return unknown
     */
    private function readline()
    {
        if (!$this->readline) {
            global $stdin;

            if (!is_resource($stdin)) {
                return "";
            }

            return trim(fgets($stdin));
        } else {
            $line = trim(readline("> "));
            if ($line != "") {
                readline_add_history($line);
            }

            return $line;
        }
    }


    /**
     * Reads a line from console, if available. Returns null if not available
     *
     * @return string|null
     */
    public function getLine()
    {
        if ($this->buffer->count() !== 0) {
            return $this->buffer->shift();
        }

        return null;
    }



    public function run()
    {
        /* readline permanentley disabled in spite of config - it has no timeout and blocks server shutdown
        old code -
            $opts = getopt("", ["disable-readline"]);
            if(extension_loaded("readline") and !isset($opts["disable-readline"])){
                $this->readline = true;
            }else{
        */
        global $stdin;
        $stdin = fopen("php://stdin", "r");
        stream_set_blocking($stdin, 0);
        $this->readline = false;

        $lastLine = microtime(true);
        while (!$this->shutdown) {
            if (($line = $this->readLine()) !== "") {
                $this->buffer[] = preg_replace("#\\x1b\\x5b([^\\x1b]*\\x7e|[\\x40-\\x50])#", "", $line);
            } elseif (!$this->shutdown and (microtime(true) - $lastLine) <= 0.1) { //Non blocking! Sleep to save CPU
                $this->synchronized(function () {
                        $this->wait(10000);
                    });
            }

            $lastLine = microtime(true);
        }
    }


    /**
     *
     * @return unknown
     */
    public function getThreadName()
    {
        return "Console";
    }
}
