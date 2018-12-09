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
            ['name' => "Bachelor Appartement", 'street' => "Wochenendstrasse", 'housenumber' => "69", 'zipcode' => "4001", 'city' => "Basel", 'costpermonth' => "1200", 'status' => ""],
            ['name' => "The Happy Gipsy (Wohnung)", 'street' => "Fliederstrasse", 'housenumber' => "13", 'zipcode' => "4800", 'city' => "Zofingen", 'costpermonth' => "1400", 'status' => ""],
            ['name' => "Loft-Wohnung", 'street' => "Biergasse", 'housenumber' => "3", 'zipcode' => "8000", 'city' => "Zürich", 'costpermonth' => "2200", 'status' => ""],           
            ['name' => "Simpsons-Haus", 'street' => "Biergasse", 'housenumber' => "5", 'zipcode' => "8000", 'city' => "Zürich", 'costpermonth' => "2500", 'status' => ""]           
            ]);
        
        DB::table('usertypes')->insert([
            ['label' => "manager"],
            ['label' => "tenant"],
            ['label' => "groundkeeper"]
        ]);
        
        DB::table('invoicetypes')->insert([
            ['type' => "Miete"],
            ['type' => "Nebenkosten"],
            ['type' => "Heizkosten"]
        ]);
           
        DB::table('users')->insert([
            ['name' => "Waylon", 'givenname' => "Smithers", 'email' => "waylon.smithers@simpsons.com", 'password' => '$2y$10$S1Al624QOlNtTxeQuEXDd.glftmimVuf0NW/omyUI0OeA.jfPaF.y', 'usertype_id' => "2", 'created_at' => "2018-10-27 11:49:00", 'rentableobject_id' => "1"],
            ['name' => "Homer", 'givenname' => "Simpson", 'email' => "homer.simpson@simpsons.com", 'password' => '$2y$10$S1Al624QOlNtTxeQuEXDd.glftmimVuf0NW/omyUI0OeA.jfPaF.y', 'usertype_id' => "2", 'created_at' => "2018-10-27 11:49:00", 'rentableobject_id' => "2"],
            ['name' => "Ned", 'givenname' => "Flanders", 'email' => "ned.flanders@simpsons.com", 'password' => '$2y$10$S1Al624QOlNtTxeQuEXDd.glftmimVuf0NW/omyUI0OeA.jfPaF.y', 'usertype_id' => "2", 'created_at' => "2018-10-27 11:49:00", 'rentableobject_id' => "3"],
            ['name' => "Cletus", 'givenname' => "Spuckler", 'email' => "Cletus.Spuckler@simpsons.com", 'password' => '$2y$10$S1Al624QOlNtTxeQuEXDd.glftmimVuf0NW/omyUI0OeA.jfPaF.y', 'usertype_id' => "3", 'created_at' => "2018-10-27 11:49:00", 'rentableobject_id' => "1"],
            ['name' => "Lisa", 'givenname' => "Simpson", 'email' => "lisa.simpson@simpsons.com", 'password' => '$2y$10$S1Al624QOlNtTxeQuEXDd.glftmimVuf0NW/omyUI0OeA.jfPaF.y', 'usertype_id' => "1", 'created_at' => "2018-10-27 11:49:00", 'rentableobject_id' => "1"]
            
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
        
    
        
        
        DB::table('formcontents')->insert([
            ['firstname' => "Murat", 'givenname' => "Kellici", 'email' => "murat.k@evian.ch", 'subject' => "Anfrage", 'text' => "Hallo ich will das Haus mieten"],
            ['firstname' => "Max", 'givenname' => "Muster", 'email' => "muster@mail.com", 'subject' => "Test", 'text' => "Ich bin Max Muster"],
            ['firstname' => "Heiri", 'givenname' => "Sohn", 'email' => "h.sohn@gmail.com", 'subject' => "Anfrage", 'text' => "Give me the house pls"]
        ]);
        
        DB::table('invoices')->insert([
            ['amount' => "500", 'description' => "Monatsrechnung Januar", 'date' => '2018-07-27 11:10:00', 'filepath' => 'public/test.jpg', 'user_id' => 2, 'type_id' => 1],
            ['amount' => "400", 'description' => "Monatsrechnung Februar", 'date' => '2018-07-27 11:10:00', 'filepath' => 'public/test.jpg', 'user_id' => 2, 'type_id' => 1],
            ['amount' => "300", 'description' => "Monatsrechnung März", 'date' => '2018-07-27 11:10:00', 'filepath' => 'public/test.jpg', 'user_id' => 2, 'type_id' => 1]
        ]);
        
             DB::table('friends')->insert([
            ['user_id' => 1, 'friend_id' => 4],
            ['user_id' => 1, 'friend_id' => 5],
            ['user_id' => 2, 'friend_id' => 4],
            ['user_id' => 2, 'friend_id' => 5],
            ['user_id' => 3, 'friend_id' => 4],
            ['user_id' => 3, 'friend_id' => 5]
        ]);
         
        DB::table('chats')->insert([
            ['user_id' => 1, 'friend_id' => 2, 'chat' => 'Hallo das ist eine Testnachricht'],
            ['user_id' => 1, 'friend_id' => 3, 'chat' => 'Halljjo das ist eine Testnachricht'],
            ['user_id' => 1, 'friend_id' => 4, 'chat' => 'gfh das ist eine Testnachricht'],
            ['user_id' => 2, 'friend_id' => 1, 'chat' => 'Hallo das a eine Testnachricht'],
            ['user_id' => 2, 'friend_id' => 1, 'chat' => 'Hallo das asdf eine Testnachricht'],
            ['user_id' => 1, 'friend_id' => 2, 'chat' => 'Hallo das ist asdf Testnachricht'],
            ['user_id' => 3, 'friend_id' => 2, 'chat' => 'Hallo das asdf eine asdf'],
            ['user_id' => 1, 'friend_id' => 3, 'chat' => 'Hallghgfho das ist einfgh asdf'],
            ['user_id' => 1, 'friend_id' => 4, 'chat' => 'Hallo bvcx ist eine Testnachricht'],
            ['user_id' => 1, 'friend_id' => 2, 'chat' => 'Hallo xxcv ist eine Testnachricht']
            
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
