<?php

/**
* 
*/
class MenuEntriesTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('menus')->delete();
		DB::insert("INSERT INTO `menus` VALUES (1, 'Blog', '1-blog', 'posts', NULL, '', 1, 1, '', 1, 1, 0, 0, 0, 'published', 0, 0, 'public', 0, NULL, NULL, NULL, '', '', '2014-11-14 03:40:06', '2014-11-14 03:40:06');");
		DB::insert("INSERT INTO `menus` VALUES (2, 'Contact Us', '1-contact-us', 'pages/contact', NULL, '', 1, 1, '', 1, 1, 0, 0, 0, 'published', 0, 0, 'public', 0, NULL, NULL, NULL, '', '', '2014-11-14 03:41:16', '2014-11-14 03:41:16');");
	}
}