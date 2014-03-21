<?php
class UserTableSeeder extends Seeder {

    public function run()
    {
    	DB::table('groups')->delete();
        DB::table('rooms')->delete();
        DB::table('users')->delete();

        $group = new Group;
        $group->name = "Admin";
        $group->features = "1,2,3,4";
        $group->admin = true;
        $group->save();

        $group = new Group;
        $group->name = "Staff";
        $group->features = "1,2";
        $group->admin = true;
        $group->save();

        $group = new Group;
        $group->name = "Customer";
        $group->features = "5";
        $group->admin = false;
        $group->save();

        for ($i = 1; $i < 10; $i++) {
            $room = new Room;
            $room->room_code = $i."S";
            $room->save()
        }

        $user = new User;
        $user->username = "admin";
        $user->password = "yami5493";
        $user->group_id = $group->id;
        $user->save();

        for ($i = 1; $i < 10; $i++) {
            $user = new User;
            $user->email = "cuongnt.hn@gmail.com";
            $user->password = "Yami050493";
            $user->group_id = $group->id;
            $user->save();
        }
    }

}