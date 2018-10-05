<?php

namespace Cli\Queries;

use Cli\Models\TournamentTemplate;

trait Sample {
    public function sample() {
        dd(TournamentTemplate::find('47'));
    }
}