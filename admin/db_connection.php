<?php

	$connect = new mysqli("localhost", "root", "", "emb_lab5", 3307);
			
			if ($connect->connect_errno){
				
				die('Could not connect: ' . $connect->connect_errno);
			}
?>