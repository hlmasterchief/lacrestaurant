<?php
class MenuTableSeeder extends Seeder {

    public function run() {
        DB::table('menus')->delete();
        DB::table('dish_menu')->delete();
        DB::table('recommendations')->delete();

        $menu = new Menu();
        $menu->menu_date = "2014-03-30";
        $menu->save();

        foreach (Dish::all() as $dish) {
            $menu->dishes()->save($dish);
        }

        $menu = new Menu();
        $menu->menu_date = "2014-04-23";
        $menu->save();

        foreach (Dish::all() as $dish) {
            $menu->dishes()->save($dish);
        }

        $recommendation = new Recommendation();
        $recommendation->menu_id = $menu->id;
        $recommendation->recommendation = "Today, we has abcxyz";
        $recommendation->save();
    }

}