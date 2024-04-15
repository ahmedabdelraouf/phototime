<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(AdminSessionsTableSeeder::class);
        $this->call(AlbumsTableSeeder::class);
        $this->call(AlbumCategoriesTableSeeder::class);
        $this->call(AlbumImagesTableSeeder::class);
        $this->call(BlogsTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
//        $this->call(PagesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PersonalAccessTokensTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(SliderBannersTableSeeder::class);
        $this->call(SlugAliasesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(SocialMediaLinksTableSeeder::class);
        $this->call(SuccessPartnersTableSeeder::class);
        $this->call(TopMenusTableSeeder::class);
        $this->call(UserMessagesTableSeeder::class);
        $this->call(YoutubeChannelsTableSeeder::class);
//        $this->call(NewsTableSeeder::class);
//        $this->call(NewsviewsTableSeeder::class);
//        $this->call(NewsCmtTableSeeder::class);
    }
}
