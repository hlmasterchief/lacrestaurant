<?php
class UserTableSeeder extends Seeder {

    public function run() {
        $faker = Faker\Factory::create();

        DB::table('groups')->delete();
        DB::table('rooms')->delete();
        DB::table('users')->delete();

        $group = new Group;
        $group->name = "Admin";
        $group->permission = "1,2,3,4,5,6";
        $group->admin = true;
        $group->save();

        $group = new Group;
        $group->name = "Customer";
        $group->permission = "10";
        $group->admin = false;
        $group->save();

        for ($i = 1; $i < 10; $i++) {
            $room = new Room;
            $room->room_code = sprintf("%03dS", $i);
            $room->save();
        }

        $admin_group = Group::where('name', '=', 'Admin')->first();
        $customer_group = Group::where('name', '=', 'Customer')->first();

        $user = new User;
        $user->username = "admin";
        $user->password = Hash::make("passnhulon");
        $user->group_id = $admin_group->id;
        $user->realname = "Sairen Nguyen";
        $user->birthday = "1993-04-05";
        $user->email    = "t3ngcu00@students.oamk.fi";
        $user->save();

        for ($i = 1; $i < 10; $i++) {
            $user = new User;
            $user->username = sprintf("%03dS", $i);
            $user->password = Hash::make("passnhulon");
            $user->group_id = $customer_group->id;
            $user->room_id  = Room::all()->first()->id;
            $user->realname = $faker->name();
            $user->email    = $faker->email;
            $user->save();
        }
    }

}