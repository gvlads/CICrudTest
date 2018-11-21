<?php

class MY_Controller extends CI_Controller {

    public $outputData = array();

    // Constructor
    function __construct() {
        parent::__construct();

        // Load CSS/JS
        $this->add_css([
        ]);

        $this->add_js([
        ]);

        return true;
    }

    /**
     * @param array $css
     */
    protected function add_css($css = []) {
        if (!is_array($css)) {
            $css = [$css];
        }

        foreach ($css as $k => $v) {
            $file = getcwd() . DIRECTORY_SEPARATOR . $v;
            if (file_exists($file)) {
                $css[$k] = $v . '?' . filemtime($file);
            }
        }

        if (array_key_exists('css', $this->outputData)) {
            if (is_array($css)) {
                $this->outputData['css'] = array_merge($this->outputData['css'], $css);
            } else {
                $this->outputData['css'][] = $css;
            }
        } else {
            if (is_array($css)) {
                $this->outputData['css'] = $css;
            } else {
                $this->outputData['css'] = [$css];
            }
        }
    }

    /**
     * @param array $js
     */
    protected function add_js($js = []) {
        if (!is_array($js)) {
            $js = [$js];
        }

        foreach ($js as $k => $v) {
            $file = getcwd() . DIRECTORY_SEPARATOR . $v;
            if (file_exists($file)) {
                $js[$k] = $v . '?' . filemtime($file);
            }
        }

        if (array_key_exists('js', $this->outputData)) {
            if (is_array($js)) {
                $this->outputData['js'] = array_merge($this->outputData['js'], $js);
            } else {
                $this->outputData['js'][] = $js;
            }
        } else {
            if (is_array($js)) {
                $this->outputData['js'] = $js;
            } else {
                $this->outputData['js'] = [$js];
            }
        }
    }

    protected function init_js($init) {
        if (!empty($init)) {
            $script = "";
            $init = is_array($init) ? $init : array($init);
            foreach ($init as $value) {
                $script .= "try{" . $value . "}catch(e){alert('Machinery Marketplace JS INIT ERROR: '+e)}\n";
            }
            $script = "jQuery(function () { $script });";
            $this->outputData['js_init'] = $script;
        }
    }
}
