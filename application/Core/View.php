<?php

namespace Core;

class View {

    protected $path;
    public $vars;

    public function __construct($path = null) {
        $this->path = $path;
    }

    public function render() {
        if(@count($this->vars)){
        extract($this->vars);
        }
        include __DIR__ . DIRECTORY_SEPARATOR . '..' .
                DIRECTORY_SEPARATOR . 'Template' . DIRECTORY_SEPARATOR . $this->path;
    }

    function set($name, $value) {
        $this->vars[$name] = $value;
    }

    function set_vars($vars, $clear = false) {
        if ($clear) {
            $this->vars = $vars;
        } else {
            if (is_array($vars))
                $this->vars = array_merge($this->vars, $vars);
        }
    }
    
    

}
