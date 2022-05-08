<?php

namespace DuRoom\Testing;

use DuRoom\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

return Migration::createTable('testing_table', function (Blueprint $table) {
    $table->string('id', 100)->primary();
});