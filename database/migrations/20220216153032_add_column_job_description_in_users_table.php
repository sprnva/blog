<?php

/**
 * Always remember:
 * "up" is for run migration
 * "down" is for the rollback, reverse the migration
 * 
 */
$add_column_job_description_in_users_table = [
	"mode" => "CHANGE",
	"table"	=> "users",
	"primary_key" => "",
	"up" => [
		"job_desc" => "ADD COLUMN `job_desc` TEXT NOT NULL"
	],
	"down" => [
		"job_desc" => "DROP COLUMN `job_desc`"
	]
];
