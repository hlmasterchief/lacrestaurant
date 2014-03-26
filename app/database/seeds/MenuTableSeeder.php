<?php
class MenuTableSeeder extends Seeder {

    public function run() {
        DB::table('menus')->delete();
        DB::table('dish_menu')->delete();

        $menu = new Menu();
        $menu->menu_date = "2014-03-30";
        $menu->save();

        foreach (Dish::all() as $dish) {
            $menu->dishes()->save($dish);
        }
    }

}