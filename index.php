<?php

		// Respaldator V1
	    include "MySQLDump.php";
	
		$host = "localhost";
		$user = "root";
		$pass = "";

		$connection = new Mysqli($host,$user,$pass);
		$result = $connection->query("SHOW DATABASES");
		$databases = array();
		$exclude = ["information_schema","mysql","modsec","cphulkd","eximstats","leechprotect""];
		
		while($row = mysqli_fetch_row($result)):
	        $excluded = false;
	        foreach ($exclude as $regex):
	        	if(preg_match("/^{$regex}/", $row[0])):
					$excluded = true;
					break;
				endif;
	        endforeach;
			if(!$excluded)
				$databases[] = $row[0];
	    endwhile;

	    try{
	    	foreach ($databases as $index => $db):

		    $dump = new MySQLDump($connection,$db);
		    $dir  = "database";
		    $file = "{$db}.sql.gz";
		    $dump->save("{$dir}/{$file}");
		    echo "{$index}: {$file} done\n";
		    // chmod("{$dir}/{$file}", 0777);


	    	endforeach;
	    }

	    catch(Exception $e){
	    	echo $e->getMessage(), "\n";
	    }
