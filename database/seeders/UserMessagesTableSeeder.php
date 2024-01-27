<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserMessagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_messages')->delete();
        
        \DB::table('user_messages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type' => 'contact_us',
                'user_full_name' => 'VIOWwt.htbhmjb',
                'user_email' => 'VIOWwt.htbhmjb@bakling.click',
                'user_phone_number' => 'VIOWwt.htbhmjb',
                'subject' => 'Bradley Oliver',
                'message' => 'Bradley Oliver',
                'created_at' => '2023-12-23 13:48:28',
                'updated_at' => '2023-12-23 13:48:28',
            ),
            1 => 
            array (
                'id' => 2,
                'type' => 'contact_us',
                'user_full_name' => 'Robertchelt',
                'user_email' => 'lucido.leinteract@gmail.com',
                'user_phone_number' => '82364357796',
                'subject' => 'Hello, i am writing about   the price',
                'message' => 'Salam, qiymətinizi bilmək istədim.',
                'created_at' => '2023-12-24 15:34:52',
                'updated_at' => '2023-12-24 15:34:52',
            ),
            2 => 
            array (
                'id' => 3,
                'type' => 'contact_us',
                'user_full_name' => 'aaaa',
                'user_email' => 'aaaaa@a',
                'user_phone_number' => 'aaaa',
                'subject' => '1',
                'message' => '1',
                'created_at' => '2023-12-25 09:20:33',
                'updated_at' => '2023-12-25 09:20:33',
            ),
            3 => 
            array (
                'id' => 4,
                'type' => 'contact_us',
                'user_full_name' => 'jyhujn',
                'user_email' => 'ahmed@dc.com',
                'user_phone_number' => 'rfyu',
                'subject' => 'dhxjtgyhjn',
                'message' => 'trhyguhijo',
                'created_at' => '2023-12-27 10:09:09',
                'updated_at' => '2023-12-27 10:09:09',
            ),
            4 => 
            array (
                'id' => 5,
                'type' => 'contact_us',
                'user_full_name' => 'UzJJNE.djptjdp',
                'user_email' => 'UzJJNE.djptjdp@purline.top',
                'user_phone_number' => 'UzJJNE.djptjdp',
                'subject' => 'Gideon Whitaker',
                'message' => 'Gideon Whitaker',
                'created_at' => '2023-12-27 13:52:05',
                'updated_at' => '2023-12-27 13:52:05',
            ),
            5 => 
            array (
                'id' => 6,
                'type' => 'contact_us',
                'user_full_name' => 'Robertexcer',
                'user_email' => 'lucido.leinteract@gmail.com',
                'user_phone_number' => '89868812818',
                'subject' => 'Hello  i wrote about     prices',
                'message' => 'Hai, saya ingin tahu harga Anda.',
                'created_at' => '2023-12-27 14:14:39',
                'updated_at' => '2023-12-27 14:14:39',
            ),
            6 => 
            array (
                'id' => 7,
                'type' => 'contact_us',
                'user_full_name' => 'Robertchelt',
                'user_email' => 'lucido.leinteract@gmail.com',
                'user_phone_number' => '81443768146',
                'subject' => 'Aloha    write about   the price',
                'message' => 'Salut, ech wollt Äre Präis wëssen.',
                'created_at' => '2023-12-28 00:31:59',
                'updated_at' => '2023-12-28 00:31:59',
            ),
            7 => 
            array (
                'id' => 8,
                'type' => 'contact_us',
                'user_full_name' => 'ytvbyt',
                'user_email' => 'bytvjytv@hhh.com',
                'user_phone_number' => 'jtvujtvu',
                'subject' => 'tvutvutvu',
                'message' => 'trvujyh',
                'created_at' => '2024-01-24 16:49:10',
                'updated_at' => '2024-01-24 16:49:10',
            ),
        ));
        
        
    }
}