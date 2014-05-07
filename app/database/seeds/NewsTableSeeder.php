<?php
class NewsTableSeeder extends Seeder {

    public function run() {
        DB::table('news')->delete();
        $user = User::all()->first();

        $news = new News();
        $news->title = "The first discount";
        $news->description = "Neque molestiae nobis ex sint incidunt animi. Ipsa eum repellat quisquam quasi dolorem sapiente porro repellat. Praesentium non enim quod corrupti maxime impedit illum. Minus ea quo labore et. Quas quia laudantium fuga est. Nihil exercitationem nam incidunt rerum animi repellat. Sit sapiente temporibus voluptate in. Rerum consequatur non sed delectus pariatur harum accusantium sint. Repellendus explicabo sapiente itaque ipsum. Saepe ipsum assumenda voluptatem aut. Ut rerum enim qui facere. Et quod ipsam id amet. Error id molestiae aut ut sit ducimus.";
        $news->save();

        $news = new News();
        $news->title = "The second discount";
        $news->description = "Neque molestiae nobis ex sint incidunt animi. Ipsa eum repellat quisquam quasi dolorem sapiente porro repellat. Praesentium non enim quod corrupti maxime impedit illum. Minus ea quo labore et. Quas quia laudantium fuga est. Nihil exercitationem nam incidunt rerum animi repellat. Sit sapiente temporibus voluptate in. Rerum consequatur non sed delectus pariatur harum accusantium sint. Repellendus explicabo sapiente itaque ipsum. Saepe ipsum assumenda voluptatem aut. Ut rerum enim qui facere. Et quod ipsam id amet. Error id molestiae aut ut sit ducimus.";
        $news->save();
    }       

}