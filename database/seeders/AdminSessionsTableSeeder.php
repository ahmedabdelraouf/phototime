<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSessionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_sessions')->delete();
        
        \DB::table('admin_sessions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'token' => 'JDJ5JDEwJHpYLjgwd0JtNm9NUkpMbTV1QlBwN3VSVGJWSEQ5UWNkdXBTb01qZlNHQXVNYW1WbmNzRnZh',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2023-12-16 20:39:08',
                'updated_at' => '2023-12-16 20:39:08',
            ),
            1 => 
            array (
                'id' => 2,
                'token' => 'JDJ5JDEwJFhVMnJGT0g4RFJ2QkQva24wcDlMUC44YS9oYm43NUl2UXFZMkFiVlQ5UXlGZHFOV0FRTE4u',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 0,
                'is_expired' => 0,
                'created_at' => '2023-12-16 22:18:38',
                'updated_at' => '2023-12-16 22:18:38',
            ),
            2 => 
            array (
                'id' => 3,
                'token' => 'JDJ5JDEwJFJPRXNCRS5CWEwwS0tmQUhMZkRJOU8wby80Y1I1MjZEbUpzZm5jVlYveVdDTGloSGx4SDMu',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2023-12-22 00:49:08',
                'updated_at' => '2023-12-22 00:49:08',
            ),
            3 => 
            array (
                'id' => 4,
                'token' => 'JDJ5JDEwJHBtVEYzUEZmMWFGbjNGM1VZNWZpM2VGZU9abS5TMXBOakE5d2RVRXdwMHMweU9PeDMzN0RX',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2023-12-24 22:55:12',
                'updated_at' => '2023-12-24 22:55:12',
            ),
            4 => 
            array (
                'id' => 5,
                'token' => 'JDJ5JDEwJHdLcHRsL0I2QW9DME5idm5LY1MuSU85aVZRcW5JcXJ6U3ZWVTJKU2ZaOWhtWi9vRC90RGtP',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2023-12-25 09:09:24',
                'updated_at' => '2023-12-25 09:09:24',
            ),
            5 => 
            array (
                'id' => 6,
                'token' => 'JDJ5JDEwJElEZUREbHM3alJ0N0lHWGNQU0pXY09hY3hiaHM2a1BYMW1sT2x2R0dsVDhCQW9UbzlNQW5H',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Linux; Android 11; SAMSUNG SM-G973U) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/14.2 Chrome/87.0.4280.141 Mobile Safari/537.36',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2023-12-25 09:39:18',
                'updated_at' => '2023-12-25 09:39:18',
            ),
            6 => 
            array (
                'id' => 7,
                'token' => 'JDJ5JDEwJHdwTGZMaEY4cVlIUFNGblUud013eC4xR0xvZHNqY2g5ZmthZFhnbU5WUWVTUGxYVVdnM1Rl',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0',
                'will_expire' => 0,
                'is_expired' => 0,
                'created_at' => '2023-12-25 09:50:52',
                'updated_at' => '2023-12-25 09:50:52',
            ),
            7 => 
            array (
                'id' => 8,
                'token' => 'JDJ5JDEwJFN4VGJ1dWRDZkpTTC9teHYvTUY1ci5FZmREU2JmL2JhN3dZU1RqVnlSbzdidGRuNUJZcVQy',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2023-12-25 09:57:05',
                'updated_at' => '2023-12-25 09:57:05',
            ),
            8 => 
            array (
                'id' => 9,
                'token' => 'JDJ5JDEwJFd2MGI5ZVFQbndRWWZnWXduN1kzS3VnYnJybjUyLmVtTDhNNnVDdksyMnRPRzRGQ3hDc0su',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 0,
                'is_expired' => 0,
                'created_at' => '2023-12-27 10:11:01',
                'updated_at' => '2023-12-27 10:11:01',
            ),
            9 => 
            array (
                'id' => 10,
                'token' => 'JDJ5JDEwJGh0LmNKbUcyQnBzU1ZoZVRINTBCcnVSYWk3bWJVWnltR1NTcHZseGFOaWxack9xeWdXRllh',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 0,
                'is_expired' => 0,
                'created_at' => '2023-12-28 22:25:40',
                'updated_at' => '2023-12-28 22:25:40',
            ),
            10 => 
            array (
                'id' => 11,
                'token' => 'JDJ5JDEwJEdQRGVjY2RMQ0tWUmVOaWw2SWhiQi5ESUxPTksxejg5Q3BFYlVKSnBUNXo4RkZtaUJvNkk2',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2023-12-29 11:29:26',
                'updated_at' => '2023-12-29 11:29:26',
            ),
            11 => 
            array (
                'id' => 12,
                'token' => 'JDJ5JDEwJG5XZ0RhUFBiR2FuYXdEVkNMbUZVRS5XNVlkWTZkZjk1U3RQYy56bXNyNDFYLnpPMzVEcGhH',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2023-12-29 15:41:23',
                'updated_at' => '2023-12-29 15:41:23',
            ),
            12 => 
            array (
                'id' => 13,
                'token' => 'JDJ5JDEwJEs3bkNmSTlwRDJZNkFJV3Jxdjg1aS44VERHd2c3VFlTSXRBQkN3L1hncmhML0ZyL1pTaWhp',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2023-12-29 18:33:24',
                'updated_at' => '2023-12-29 18:33:24',
            ),
            13 => 
            array (
                'id' => 14,
                'token' => 'JDJ5JDEwJDJBY2VrWWx3dFVPOWxkV1VnbGJZQ3VIZ1lUcjRxU3dyekFmNVh3bkg1c0I5dVdYYy5PTmdX',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2023-12-29 19:51:28',
                'updated_at' => '2023-12-29 19:51:28',
            ),
            14 => 
            array (
                'id' => 15,
                'token' => 'JDJ5JDEwJGVDdjB2WDRqOHdQMU5pV0tYNHNLQmUzaWZ2Y1JzcXR6dUprcVhZV0prVkxDbThIZlp0THZX',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2023-12-30 10:45:01',
                'updated_at' => '2023-12-30 10:45:01',
            ),
            15 => 
            array (
                'id' => 16,
                'token' => 'JDJ5JDEwJG5KSG4xWWpTUlpOWlZ2ZVhGdnVKRi5EMWJHL0VKdWI0QXdlbmoyVkFwRlg3TjZSQ1luaUR1',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 0,
                'is_expired' => 0,
                'created_at' => '2023-12-30 13:39:13',
                'updated_at' => '2023-12-30 13:39:13',
            ),
            16 => 
            array (
                'id' => 17,
                'token' => 'JDJ5JDEwJDlZb1JWT0JJckdqaVZWLzREdHVOb085RGd2dDIuTDB4c3F0NzNpeW1nc0ltcER3VXNnc0d1',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2023-12-30 17:46:08',
                'updated_at' => '2023-12-30 17:46:08',
            ),
            17 => 
            array (
                'id' => 18,
                'token' => 'JDJ5JDEwJGhNeVdiWC94U0FIMTdEZ0ZrTWJLci5JeVIzb1JGYVN4dFFORXg4RXlRWGt6ejhjWTBuQUQ2',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2024-01-20 19:51:30',
                'updated_at' => '2024-01-20 19:51:30',
            ),
            18 => 
            array (
                'id' => 19,
                'token' => 'JDJ5JDEwJFp0U0JELmlvTEk2ZldIbXBWTDQ1WHVtTmVTU3JBUEd4LmZHVVhINTFzSkQwQ0xOcUpmeDJP',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2024-01-23 21:05:04',
                'updated_at' => '2024-01-23 21:05:04',
            ),
            19 => 
            array (
                'id' => 20,
                'token' => 'JDJ5JDEwJGtQdDliaW1HaXNNd2ZNNUdubktWT2UvaGt2UVpNcHQ1cS5BTGg4OXNYZ0Niek9teEJYVEw2',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2024-01-23 22:43:53',
                'updated_at' => '2024-01-23 22:43:53',
            ),
            20 => 
            array (
                'id' => 21,
                'token' => 'JDJ5JDEwJEtuR3lXTzNpTjgwM3JzNUc1UmNMUS5nemZYUlZVdE9Ec3IzVVFlY3IuVEMzbFMzZHB3bVlT',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2024-01-23 22:43:59',
                'updated_at' => '2024-01-23 22:43:59',
            ),
            21 => 
            array (
                'id' => 22,
                'token' => 'JDJ5JDEwJDJOTUZxN2FORjkzMjBRdzF3ZkpkWWVTb0VVTUhBblhLbFBpRTNoSnBmdVpNTUdvaTNBcVUy',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2024-01-24 11:27:38',
                'updated_at' => '2024-01-24 11:27:38',
            ),
            22 => 
            array (
                'id' => 23,
                'token' => 'JDJ5JDEwJC5Dcjh1T2pXanF5UGdKY04zSmVGbHVBWTBtc0o4YkJvQkU2N1dKd29VZ2lER0ZYcW1vLnB1',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2024-01-24 12:43:15',
                'updated_at' => '2024-01-24 12:43:15',
            ),
            23 => 
            array (
                'id' => 24,
                'token' => 'JDJ5JDEwJFVKNGdCTGN0NUpiZlpLYkE3eHlQMC56N0Q0UzdkRXJvaVM0enQxMVoyaHkzSjdnTkxidTVp',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2024-01-26 15:04:47',
                'updated_at' => '2024-01-26 15:04:47',
            ),
            24 => 
            array (
                'id' => 25,
                'token' => 'JDJ5JDEwJFpFaHhJMXl3YmNLLjBFY1BKbHNPdy5nY2ZVNzUubm82VzczZTRHOHprWlBxMU1QckVBV282',
                'admin_id' => 1,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'will_expire' => 1,
                'is_expired' => 0,
                'created_at' => '2024-01-26 21:47:37',
                'updated_at' => '2024-01-26 21:47:37',
            ),
        ));
        
        
    }
}