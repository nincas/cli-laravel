<?php

namespace Cli;

use Cli\Components\Database;

class Collection {
    function __construct() {
        load_components();
        (new Database)->setDB();
    }

    public function run() {
        exec_function();
    }
}