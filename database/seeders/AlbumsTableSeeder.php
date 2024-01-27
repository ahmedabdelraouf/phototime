<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('albums')->delete();
        
        \DB::table('albums')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'احتفال أهالي أشيقر بـ عيد الفطر المبارك 1444هـ',
                'short_desc' => '<h2 style="text-align: center;">احتفال أهالي أشيقر بـ عيد الفطر المبارك 1444هـ</h2>
<p style="text-align: center;">&nbsp;</p>
<div style="text-align: center;" align="center"><span style="background-color: rgb(53, 152, 219);"><strong>بـسـم الـلـه الـر<span style="color: rgb(0, 0, 0);">حـمـن الـرحـيـم</span></strong></span></div>
<div style="text-align: center;" align="center">&nbsp;</div>
<div style="text-align: center;" align="center">
<p style="text-align: center;"><strong>احتفال أهالي أشيقر</strong></p>
<p style="text-align: center;"><strong>بـ عيـد الفطر المبارك 1444هـ</strong></p>
<p style="text-align: center;"><strong>وذلك مساء يوم السبت 1444/10/2هـ - الموافق 22 أبريل 2023م</strong></p>
<p style="text-align: center;"><strong>وكـــل عـــام وأنتـــم بخيـــر</strong></p>
<p style="text-align: center;">&nbsp;</p>
</div>',
                'photo_date' => '2024-01-01',
                'photo_owner_name' => NULL,
                'photo_place' => NULL,
                'meta_title' => 'Phototime21 - Capturing Timeless Moments | About [Your Photography Studio Name] - Our Story and Mission | Wedding Photography Portfolio by Phototime21 | Landscape Photography - Explore Natures Beauty | Professional Portrait Photography Services - Phototime21 | Commercial Photography - Showcasing Your Brand with Phototime21 | Contact [Your Photography Studio Name] - Lets Capture Moments Together | Photography Blog - Insights and Tips by Phototime21 | Exclusive Photography Deals - Phototime21 | Client Testimonials - What Our Clients Say About Phototime21 | Photography FAQs - Common Questions Answered by Phototime21',
                'meta_description' => '*General Photography Website:Explore breathtaking photography showcasing moments of beauty, creativity, and emotion. Our portfolio includes stunning landscapes, captivating portraits, and unforgettable events. Discover the artistry of photography with our professional services.                                *Wedding Photography:Capturing timeless love and joy. Browse our wedding photography portfolio for enchanting moments, beautiful ceremonies, and unforgettable celebrations. Trust us to turn your special day into everlasting memories.                                *Landscape Photography:Immerse yourself in the beauty of nature. Our landscape photography transports you to scenic vistas, serene environments, and awe-inspiring natural wonders. Experience the world through our lens.                                *Portrait Photography Studio:Elevate your personal and professional image with our portrait photography services. Our studio specializes in capturing your unique essence, providing timeless portraits for individuals, families, and professionals.                                *Commercial Photography Services:Enhance your brand with high-quality commercial photography. From product shoots to corporate events, our photography services are tailored to showcase your business in the best light. Elevate your visual identity today.                                *Photography Blog:Stay updated with the latest trends, tips, and inspiration in the world of photography. Explore our photography blog for insightful articles, behind-the-scenes stories, and expert advice from our passionate team of photographers.',
                'meta_keywords' => 'photography,photographer,photo gallery,portrait photography,landscape photography,event photography,professional photographer,photography portfolio,creative photography,fine art photography,black and white photography,color photography,nature photography,wedding photography,commercial photography,artistic photography,photojournalism,travel photography,fashion photography,documentary photography,photography services,photo studio,photography blog,photo exhibition',
                'is_active' => 1,
                'created_at' => '2024-01-24 16:57:42',
                'updated_at' => '2024-01-24 17:29:28',
                'owner_phone' => NULL,
                'youtube_url' => NULL,
                'views_count' => 17,
                'is_featured' => 1,
                'is_blocked' => 0,
                'default_image' => 'albums/1/0M8A0436.JPG.jpg',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}