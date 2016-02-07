<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        $this->call('RoleTableSeeder');
        $this->call('AttachmentTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('CitiesTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('ProfileTableSeeder');
        $this->call('UserRolesTableSeeder');
        $this->call('ShopProfileTableSeeder');
        $this->call('ShopsTableSeeder');
        $this->call('NottifactionTypes');
        $this->call('AdTypeTableSeeder');
        $this->call('AdsTableSeeder');
        $this->call('FavoritesTableSeeder');
        $this->call('NavigationTableSeeder');
        $this->call('StaticPagesTableSeeder');
        $this->call('GalleryTableSeeder');

        $this->command->info('Tables seeded!');
	}

}
