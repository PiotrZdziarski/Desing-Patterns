<?php

namespace Decorator;

/**
 * Component
 */
interface Logger {

    public function log($msg);
}

/**
 * Concrete Component
 */
class FileLogger implements Logger {

    /**
     * @param $msg
     * @method log
     */
    public function log($msg)
    {
        echo "Logging to a file: $msg";
    }
}

abstract class LoggerDecorator implements Logger {

    protected $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param $msg
     * @method log
     */
    public function log($msg)
    {
        $this->logger->log($msg);
    }
}


class EmailLogger extends LoggerDecorator {

    public function log($msg)
    {
        $this->logger->log($msg);
        echo ", email file";
    }
}

class SpaceLogger extends LoggerDecorator {

    public function log($msg)
    {
        $this->logger->log($msg);
        echo ", space file";
    }
}