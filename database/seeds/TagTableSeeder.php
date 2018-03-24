<?php
use App\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $a = new Tag();
        $a->name = "painting";
        $a->save();
        $a = new Tag();
        $a->name = "drawing";
        $a->save();
        $a = new Tag();
        $a->name = "sculpture";
        $a->save();


        $a = new Tag();
        $a->name = "large";
        $a->save();

        $a = new Tag();
        $a->name = "medium";
        $a->save();

        $a = new Tag();
        $a->name = "small";
        $a->save();
    }
}
