<?php

/**
 * Always remember:
 * "up" is for run migration
 * "down" is for the rollback, reverse the migration
 * 
 */
$add_column_url_in_blog_table = [
	"mode" => "CHANGE",
	"table"	=> "blog",
	"primary_key" => "",
	"up" => [
		"url" => "ADD COLUMN `url` TEXT NOT NULL"
	],
	"down" => [
		"url" => "DROP COLUMN `url`"
	]
];
