<?php
class DishTableSeeder extends Seeder {

    public function run() {
    	DB::table('dish_categories')->delete();
        DB::table('dish_images')->delete();
        DB::table('dishes')->delete();

        $dishCategory = new DishCategory;
        $dishCategory->name = "category1";
        $dishCategory->save();

        $dishCategory = new DishCategory;
        $dishCategory->name = "category2";
        $dishCategory->save();

        $dishCategory = new DishCategory;
        $dishCategory->name = "category3";
        $dishCategory->save();

        $dish = new Dish;
        $dish->name = "item1";
        $dish->category_id = 1;
        $dish->price = 10;
        $dish->description = "this is item1 by country1";
        $dish->save();

        $dish = new Dish;
        $dish->name = "item2";
        $dish->category_id = 2;
        $dish->price = 20;
        $dish->description = "this is item2 by country2";
        $dish->save();

        $dish = new Dish;
        $dish->name = "item3";
        $dish->category_id = 3;
        $dish->price = 30;
        $dish->description = "this is item3 by country3";
        $dish->save();

        $dishImage = new DishImage;
        $dishImage->dish_id = 1;
        $dishImage->link = "img1.1";
        $dishImage->save();

        $dishImage = new DishImage;
        $dishImage->dish_id = 1;
        $dishImage->link = "img1.2";
        $dishImage->save();

        $dishImage = new DishImage;
        $dishImage->dish_id = 2;
        $dishImage->link = "img2.1";
        $dishImage->save();
        
    }

}