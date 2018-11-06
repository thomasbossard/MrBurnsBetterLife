<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertDataIntoTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('rentableobjects')->insert([
            ['name' => "Wochenendwohnung", 'street' => "Wochenendstrasse", 'housenumber' => "69", 'zipcode' => "4001", 'city' => "Basel", 'costpermonth' => "1200", 'status' => ""],
            ['name' => "Apartement", 'street' => "Fliederstrasse", 'housenumber' => "13", 'zipcode' => "4800", 'city' => "Zofingen", 'costpermonth' => "1400", 'status' => ""],
            ['name' => "Loft-Wohnung", 'street' => "Biergasse", 'housenumber' => "3", 'zipcode' => "8000", 'city' => "Zürich", 'costpermonth' => "2200", 'status' => ""]           
        ]);
        
        DB::table('usertypes')->insert([
            ['label' => "manager"],
            ['label' => "tenant"],
            ['label' => "groundkeeper"]
        ]);
        
           DB::table('invoices')->insert([
            ['openrentalamount' => "500", 'heatingexpensessettle' => "200", 'utilitybills' => "100"],
            ['openrentalamount' => "400", 'heatingexpensessettle' => "200", 'utilitybills' => "100"],
            ['openrentalamount' => "300", 'heatingexpensessettle' => "200", 'utilitybills' => "50"]
        ]);
           
        DB::table('users')->insert([
            ['name' => "Lukas", 'givenname' => "Kunz", 'email' => "lukas.kunz@zuehlke.com", 'password' => '$2y$10$S1Al624QOlNtTxeQuEXDd.glftmimVuf0NW/omyUI0OeA.jfPaF.y', 'usertype_id' => "2", 'created_at' => "2018-10-27 11:49:00", 'rentableobject_id' => "1", 'invoice_id' => "1"],
            ['name' => "Thomas", 'givenname' => "Bossard", 'email' => "thomasbossard93@gmail.com", 'password' => '$2y$10$S1Al624QOlNtTxeQuEXDd.glftmimVuf0NW/omyUI0OeA.jfPaF.y', 'usertype_id' => "2", 'created_at' => "2018-10-27 11:49:00", 'rentableobject_id' => "2", 'invoice_id' => "2"],
            ['name' => "Cyrill", 'givenname' => "Füglister", 'email' => "cyrill.fueglister@students.fhnw.ch", 'password' => '$2y$10$S1Al624QOlNtTxeQuEXDd.glftmimVuf0NW/omyUI0OeA.jfPaF.y', 'usertype_id' => "2", 'created_at' => "2018-10-27 11:49:00", 'rentableobject_id' => "3", 'invoice_id' => "3"],
            ['name' => "Cletus", 'givenname' => "Spuckler", 'email' => "Cletus.Spuckler@students.fhnw.ch", 'password' => '$2y$10$S1Al624QOlNtTxeQuEXDd.glftmimVuf0NW/omyUI0OeA.jfPaF.y', 'usertype_id' => "3", 'created_at' => "2018-10-27 11:49:00", 'rentableobject_id' => "1", 'invoice_id' => "1"],
            ['name' => "Lisa", 'givenname' => "Simpson", 'email' => "lisa.simpson@students.fhnw.ch", 'password' => '$2y$10$S1Al624QOlNtTxeQuEXDd.glftmimVuf0NW/omyUI0OeA.jfPaF.y', 'usertype_id' => "1", 'created_at' => "2018-10-27 11:49:00", 'rentableobject_id' => "1", 'invoice_id' => "1"]
            
        ]);
        
        DB::table('pushmessages')->insert([
            ['text' => 'Hallo das ist die erste Testnachricht', 'date' => '2018-10-27 11:49:00', 'subject' => 'Testnachricht 1', 'rentableobject_id' => '1'],
            ['text' => 'Hallo das ist die zweite Testnachricht', 'date' => '2018-10-27 11:50:00', 'subject' => 'Testnachricht 2', 'rentableobject_id' => '1'],
            ['text' => 'Hallo das ist die dritte Testnachricht', 'date' => '2018-10-27 11:51:00', 'subject' => 'Testnachricht 3', 'rentableobject_id' => '2'],
            ['text' => 'Hallo das ist die vierte Testnachricht', 'date' => '2018-10-27 11:52:00', 'subject' => 'Testnachricht 4', 'rentableobject_id' => '3'],
        ]);
        
        DB::table('payments')->insert([
            ['amount' => '1200', 'date' => '2018-07-27 11:10:00' , 'user_id' => 1],
            ['amount' => '2000', 'date' => '2018-10-27 11:11:00' , 'user_id' => 2],
            ['amount' => '500', 'date' => '2018-10-27 11:12:00' , 'user_id' => 3],
            ['amount' => '500', 'date' => '2018-08-28 11:12:00' , 'user_id' => 1],
            ['amount' => '600', 'date' => '2018-10-10 11:12:00' , 'user_id' => 1],
            ['amount' => '1800', 'date' => '2018-09-30 11:12:00' , 'user_id' => 1],
        ]);
        
        DB::table('messages')->insert([
            ['user_id1' => 1, 'user_id2' => 2, 'message' => 'Hallo das ist eine Testnachricht', 'date' => '2018-10-27 11:49:00'],
            ['user_id1' => 2, 'user_id2' => 1, 'message' => 'Hallo das ist eine Testnachricht', 'date' => '2018-10-27 11:50:00'],
            ['user_id1' => 3, 'user_id2' => 1, 'message' => 'Hallo das ist eine Testnachricht', 'date' => '2018-10-27 11:51:00']
        ]);
        
        
        DB::table('formcontents')->insert([
            ['firstname' => "Murat", 'givenname' => "Kellici", 'email' => "murat.k@evian.ch", 'subject' => "Anfrage", 'text' => "Hallo ich will das Haus mieten", 'status' => ""],
            ['firstname' => "Max", 'givenname' => "Muster", 'email' => "muster@mail.com", 'subject' => "Test", 'text' => "Ich bin Max Muster", 'status' => ""],
            ['firstname' => "Heiri", 'givenname' => "Sohn", 'email' => "h.sohn@gmail.com", 'subject' => "Anfrage", 'text' => "Give me the house pls", 'status' => ""]
        ]);
        
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
