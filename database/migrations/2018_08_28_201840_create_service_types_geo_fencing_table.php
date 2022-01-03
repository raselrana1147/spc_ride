<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTypesGeoFencingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_types_geo_fencings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('geo_fencing_id');
            $table->integer('service_type_id');
            $table->double('distance', 8, 2);
            $table->double('price', 8, 2);
            $table->double('minute', 8, 2);
            $table->integer('hour')->nullable();
            $table->double('non_geo_price', 8, 2);
            $table->double('city_limits', 8, 2);
            $table->double('fixed', 8, 2);
            $table->double('old_ranges_price', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_types_geo_fencings');
    }
}
