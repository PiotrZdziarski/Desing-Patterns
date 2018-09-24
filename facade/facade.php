<?php

namespace Facade;

class Database {

    public function getData($id) {
        return "data$id";
    }
}

class Template {

    private $id;
    private $data;

    public function __construct($id, $data)
    {
        $this->id = $id;
        $this->data = $data;
    }

    public function serve() {
        return $this->id.$this->data;
    }
}

class Logger {

    public function log($log) {
        echo $log;
    }
}

class PageFacade {

    public function createAndServe($msg="", $id) {

        $db = new Database();
        $data = $db->getData($id);

        $template = new Template($id, $data);
        $template->serve();

        $logger = new Logger();
        $logger->log($msg.$id);

    }
}
