<?php

/**
 * Always remember:
 * "up" is for run migration
 * "down" is for the rollback, reverse the migration
 * 
 */
$create_blog_table = [
	"mode" => "NEW",
	"table"	=> "blog",
	"primary_key" => "id",
	"up" => [
		"id" => "INT(11) unsigned NOT NULL AUTO_INCREMENT",
		"title" => "varchar(150) NOT NULL DEFAULT ''",
		"content" => "text NOT NULL",
		"thumbnail" => "text NOT NULL",
		"user_id" => "INT(11) NOT NULL",
		"updated_at" => "datetime DEFAULT NULL",
		"created_at" => "datetime DEFAULT NULL",
	],
	"down" => [
		"" => ""
	]
];
