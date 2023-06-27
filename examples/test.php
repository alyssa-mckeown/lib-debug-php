<?php
require_once("../vendor/autoload.php");

use lib_debug\Debug;

const DEBUG_LEVEL = 3;
const DEBUG_VERBOSITY = 1;

Debug::output(Debug::INFO, 1, "[Example] Foo", ['example']);