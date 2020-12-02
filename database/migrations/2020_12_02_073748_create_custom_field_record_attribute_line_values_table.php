<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomFieldRecordAttributeLineValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_field_record_attribute_line_values', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text("value");
            $table->unsignedBigInteger("custom_field_record_id");
            $table->foreign("custom_field_record_id", "field_record_attribute_line_value_field_record_id_foreign")->references("id")->on("custom_field_records");
            $table->unsignedBigInteger("custom_field_attribute_line_id");
            $table->foreign("custom_field_attribute_line_id", "record_attribute_line_value_attribute_line_id_foreign")->references("id")->on("custom_field_attribute_lines");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_field_record_attribute_line_values');
    }
}
