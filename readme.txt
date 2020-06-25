

First, create the database on XAMPP/WAMP server using phpMyAdmin and give the database name is dbfiles and the table name is upfile. The table contains two fields:

id – int(11)
filename – VARCHAR(100)
id should be in Auto incremented(AI).

Explanation: The following are the explanation to create the PHP code which is the following:

The error_reporting(0) is for getting 0 error while php code is running.
$_files is work behind the scene. It is being used to upload files via the HTTP POST method and hold the attributes of files.
$filename is a name used to uniquely identify a computer file stored in a file system.
$tempname is used to copy the original name of the file which is uploaded to the database as the temp name where the file is stored after upload.
$folder defines the path of the uploaded file into the database to the folder where you want to be stored. The “uploadedfiles/” the folder name where the file is to be saved after the upload. And the .$filename is used for fetching or upload the file.
$db, the basic line for any of the PHP code for connecting to the database.
$sql used for the inserting the file into the database of table name upfile to the variable filename.
mysqli_query is the function to executing query of $db and $sql.
Now, let’s move the uploaded file into the folder which named as the file. The uploadedfiles named folder is saved into the WAMP or XAMPP server folder which is in C drive into the www folder.
$result function is used for the retrieve the image from the database.



SQL:


CREATE DATABASE dbfiles;
USE dbfiles;
CREATE TABLE `dbfiles`.`upfile` (
	`id` INT(11) NOT NULL AUTO_INCREMENT , 
	`filename` VARCHAR(100) NOT NULL , 
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;