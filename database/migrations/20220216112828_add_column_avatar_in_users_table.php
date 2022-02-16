<?php

/**
 * Always remember:
 * "up" is for run migration
 * "down" is for the rollback, reverse the migration
 * 
 */
$add_column_avatar_in_users_table = [
	"mode" => "CHANGE",
	"table"	=> "users",
	"primary_key" => "",
	"up" => [
		"avatar" => "ADD COLUMN `avatar` TEXT NOT NULL"
	],
	"down" => [
		"avatar" => "DROP COLUMN `avatar`"
	]
];
