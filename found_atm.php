 <?php

         $con = mysql_connect("localhost","root","root");
         if (!$con)
           {
             die('Could not connect: ' . mysql_error());
           }

           mysql_select_db("document_finder", $con);

	
           $v1=$_REQUEST['atm_number'];
           $v2=$_REQUEST['atm_bank'];
           $v3=$_REQUEST['name'];
	$v4=$_REQUEST['date_found'];
	$v5=$_REQUEST['place_found'];

	$v6=$_REQUEST['finder_name'];
	$v7=$_REQUEST['finder_contact'];
	$v8=$_REQUEST['place_to_collect'];


               if($v1==NULL || $v2==NULL || $v3==NULL || $v4==NULL || $v5==NULL || $v6==NULL)
             {


                $r["re"]="Fill the all fields!!!";
                 print(json_encode($r));
                die('Could not connect: ' . mysql_error());
             }


            else
          {
           $i=mysql_query("select * from found_atm where atm_number=$v1",$con);
           $check='';
                  while($row = mysql_fetch_array($i))
                    {
 
                          $check=$row['atm_number'];

                     }

          
                   if($check==NULL)
                  {

                        $q="insert into found_atm values('$v1','$v2','$v3','$v4','$v5','$v6','$v7','$v8')";
                        $s= mysql_query($q);
                        if(!$s)
                          {
                                $r["re"]="Inserting problem in batabase";
                 
                               print(json_encode($r));
                           }
                         else
                          {
                             $r["re"]="Record inserted successfully";
                              print(json_encode($r));
                           }
             }
            else
             {
               $r["re"]="Record is repeated";
                 print(json_encode($r));
     
              }
}
 mysql_close($con);
              
    ?>  
