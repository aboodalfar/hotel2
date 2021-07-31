<?php

namespace Core;

class ProjectConfig {

    protected static $instance;
    protected $data;

    public static function createInstance($data) {
        if (isset(self::$instance) === false) {
            self::$instance = new self($data);
        }

        return self::$instance;
    }

    public static function getInstance() {
        return self::$instance;
    }

    public function get($k, $namespase = 'env') {
        if (isset($this->data[$namespase][$k]) === true) {
            return $this->data[$namespase][$k];
        } else {
            $this->logError($namespase . ' : ' . $k . ' configuration is not found');
            return null;
        }
    }

    public function set($k, $val) {
        if (isset($this->data['env'][$k]) === true) {
            $this->logError($k . ' configuration key is already stored and cannot be overriden');
        } else {
            $this->data['env'][$k] = $val;
        }
    }

    public function getNamespaseHolder($namespace) {
        if (isset($this->data[$namespace]) === true) {
            return $this->data[$namespace];
        } else {
            return null;
        }
    }

    protected function __construct($data) {
        $this->data = $data;
    }

    protected function logError($error, $level = 'ERROR') {
        //TODO: implement based on Monolog
        trigger_error($error);
    }

}
