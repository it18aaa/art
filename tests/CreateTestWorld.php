<?php 
namespace Tests;

use Faker\Factory as Faker;
use App\Artwork;
use App\Artist;

class CreateTestWorld {

    
    public static function create() {
        echo "creating world\n";
        $faker = Faker::create();    

                
        $imgTestDir = base_path() . "/tests/data/img/";
        $imgDir = public_path() . "/img/";
        $imgTemp = base_path() . "/tests/data/backup/";
        
        
        // create some artwork
        for ($index = 0; $index < 40; $index++) 
        {            
            $tempart = factory(Artwork::class)->create();    
        }

        // create some artists
        for($index = 0; $index < 30; $index++) 
        {
            $artist = factory(Artist::class)->create();
        }

        // move the images around
        // for some reason this doesn't work in teardown method?
        rename($imgDir . "artist",  $imgTemp . "artist");
        rename($imgTestDir . "artist", $imgDir . "artist");
        
        rename($imgDir . "artwork",  $imgTemp . "artwork");
        rename($imgTestDir . "artwork", $imgDir . "artwork");
        
    }

    public static function destroy() {
        $imgTestDir;
        $imgDir;
        $imgTemp;

                
        $imgTestDir = base_path() . "/tests/data/img/";
        $imgDir = public_path() . "/img/";
        $imgTemp = base_path() . "/tests/data/backup/";

        echo "destroying world\n";
        rename($imgDir . "artist",  $imgTestDir . "artist");
        rename($imgTemp . "artist", $imgDir . "artist");
        
        rename($imgDir . "artwork",  $imgTestDir . "artwork");
        rename($imgTemp . "artwork", $imgDir . "artwork");

    }
}