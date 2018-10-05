<?php 

namespace Cli\Queries; 

use Cli\Models\TournamentTemplate;

trait Test {
    public function test() {
        dump(TournamentTemplate::where('id', 47)->get()->toArray());
    }
}