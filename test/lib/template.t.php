<?php
$BASE_PATH = '../../';

include_once ($BASE_PATH . 'lib/env.php');
$env = new Env($BASE_PATH);
include_once ($env->basedir . 'lib/test/unit_test_base.php');
include_once ($env->basedir . 'lib/template.php');

class UnitTest_Template extends UnitTestBase {
     public function test_construct() {
        return ($template = new Template('', ''));
     }
}

$unit_test_runner = new UnitTestRunner;
$unit_test_runner->run_tests(new UnitTest_Template($env));

?>
