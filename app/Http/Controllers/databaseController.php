<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;



class databaseController extends Controller
{
    //

    public function  index(){

        if (!Schema::hasColumn('servicesses', 'type')) {  // Check if the column does not already exist
            Schema::table('servicesses', function (Blueprint $table) {
                $table->string('type')->nullable(); // Add the new column
            });
           
        }

        if (!Schema::hasColumn('servicesses', 'slug')) {  // Check if the column does not already exist
            Schema::table('servicesses', function (Blueprint $table) {
                $table->text('slug')->nullable(); // Add the new column
            });
           
        }



        if (!Schema::hasTable('testimonies')) {
            Schema::create('testimonies', function (Blueprint $table) {
                $table->id();   
                $table->string('title')->nullable();                     // Primary key ID
                $table->text('body');              // Product name
                $table->string('image')->nullable();              // Product name
                $table->string('publish')->default('No');      // Product price
                $table->timestamps();                // created_at and updated_at timestamps
            });

           
        }

        return response()->json(['message' => 'Age column added successfully.']);
    }
}
