<?php
class Template {
// version 2

    public function __construct($env, $filename) {
        $this->env = $env;
        $this->filename = $filename;
    }

    public function show($template_vars = array()) {
        foreach($template_vars as $template_var_name => $template_var_value)
        ${$template_var_name} = $template_var_value;
        include_once($this->env->basedir . 'templates/' . $this->filename);
    }
}
?>
