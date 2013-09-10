<?php

	$base = mysql_connect ('localhost', 'root', '');    
    mysql_select_db ('agence', $base);       

     $sql1='SELECT id,prenom, description, photo FROM russes ORDER BY prenom ASC';
     $req1 = mysql_query($sql1) or die(mysql_error());
     //$data = mysql_fetch_array($req1);
     $i=0;

     while ($data = mysql_fetch_array($req1))
     	{
     		$russes_index[$i]=$i;
     		$russes_id[$i]=$data[0];
     		$russes_prenom[$i]=$data[1];
     		$russes_description[$i]=$data[2];
     		$russes_photo[$i]=$data[3];
     		//$client_rib[$i]=$data[4];
     		
     		$i++;
     	}

     mysql_close();

?>