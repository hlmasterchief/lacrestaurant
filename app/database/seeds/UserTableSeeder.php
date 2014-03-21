<?php
class UserTableSeeder extends Seeder {

    public function run() {
    	DB::table('groups')->delete();
        DB::table('rooms')->delete();
        DB::table('users')->delete();

        $group = new Group;
        $group->name = "Admin";
        $group->permission = "1,2,3,4";
        $group->admin = true;
        $group->save();

        $group = new Group;
        $group->name = "Staff";
        $group->permission = "1,2";
        $group->admin = true;
        $group->save();

        $group = new Group;
        $group->name = "Customer";
        $group->permission = "5";
        $group->admin = false;
        $group->save();

        for ($i = 1; $i < 10; $i++) {
            $room = new Room;
            $room->room_code = $i."S";
            $room->save();
        }

        $admin_group = Group::where('name', '=', 'Admin')->first();
        $staff_group = Group::where('name', '=', 'Staff')->first();
        $customer_group = Group::where('name', '=', 'Customer')->first();

        $user = new User;
        $user->username = "admin";
        $user->password = Hash::make("yami5493");
        $user->group_id = $admin_group->id;
        $user->save();

        $user = new User;
        $user->username = "staff";
        $user->password = Hash::make("yami5493");
        $user->group_id = $staff_group->id;
        $user->save();

        for ($i = 1; $i < 10; $i++) {
            $user = new User;
            $user->username = $i."S";
            $user->password = Hash::make("yami5493");
            $user->group_id = $customer_group->id;
            $user->room_id  = Room::all()->first()->id;
            $user->save();
        }
    }

}