<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Call a function to import data after creating the table

//        Schema::create('blog_images', function (Blueprint $table) {
//            $table->id();
//            $table->string('path');
//            $table->integer('blog_id')->nullable();
//            $table->integer('order')->default(0);
//        });
        $this->importData();
//        dd("check table now");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_images');
    }

    protected function importData()
    {
//        $file = database_path('seeds/blog_images.csv');
        $file = public_path('blog_images.csv');

        if (!file_exists($file)) {
            print_r('CSV file not found: ' . $file);
            return;
        }
        print_r('Start process at '.now());

        $data = array_map('str_getcsv', file($file));

        foreach ($data as $index => $row) {
            if ($index == 0)
                continue;
            // Assuming the CSV columns are in the order: id, path, blog_id, order
            DB::table('blog_images')->insert([
                'id' => $row[0],
                'path' => $row[1],
                'blog_id' => $row[2],
                'order' => $row[3]
            ]);
            if ($index % 5000 == 0) {
                $count = DB::table('blog_images')->count();
                print_r('Data imported successfully till now latest count is => ' . $count);

            }
        }
        print_r('Data imported successfully from CSV file.');
        print_r('finished process at '.now());

    }

}
