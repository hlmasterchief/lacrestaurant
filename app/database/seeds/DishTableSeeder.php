<?php
class DishTableSeeder extends Seeder {

    public function run() {
    	DB::table('dish_categories')->delete();
        DB::table('dish_images')->delete();
        DB::table('dishes')->delete();

        $dishCategory = new DishCategory;
        $dishCategory->name = "category1";
        $dishCategory->save();

        $dish = new Dish;
        $dish->name = "item1";
        $dish->category_id = $dishCategory->id;
        $dish->price = 10;
        $dish->description = "this is item1 by country1";
        $dish->save();

        $dishImage = new DishImage;
        $dishImage->dish_id = $dish->id;
        $dishImage->link = "http://besthomechef.com.au/wp/wp-content/uploads/2012/11/hard-boiled-eggs.jpg";
        $dishImage->save();

        $dishImage = new DishImage;
        $dishImage->dish_id = $dish->id;
        $dishImage->link = "http://besthomechef.com.au/wp/wp-content/uploads/2012/11/hard-boiled-eggs.jpg";
        $dishImage->save();

        $dishCategory = new DishCategory;
        $dishCategory->name = "category2";
        $dishCategory->save();

        $dish = new Dish;
        $dish->name = "item2";
        $dish->category_id = $dishCategory->id;
        $dish->price = 20;
        $dish->description = "this is item2 by country2";
        $dish->save();

        $dishCategory = new DishCategory;
        $dishCategory->name = "category3";
        $dishCategory->save();

        $dish = new Dish;
        $dish->name = "item3";
        $dish->category_id = $dishCategory->id;
        $dish->price = 30;
        $dish->description = "this is item3 by country3";
        $dish->save();

        $dishImage = new DishImage;
        $dishImage->dish_id = $dish->id;
        $dishImage->link = "http://besthomechef.com.au/wp/wp-content/uploads/2012/11/hard-boiled-eggs.jpg";
        $dishImage->save();
        
    }

}