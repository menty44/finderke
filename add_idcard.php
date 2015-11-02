 <?php

         $con = mysql_connect("localhost","root","root");
         if (!$con)
           {
             die('Could not connect: ' . mysql_error());
           }

           mysql_select_db("document_finder", $con);

	
           $v1=$_REQUEST['id_number'];
           $v2=$_REQUEST['name'];
           //$v3=$_REQUEST['date_lost'];
	$v4=$_REQUEST['dob'];
$v5=$_REQUEST['contact'];
	$v6=$_REQUEST['reward'];


              if($v1==NULL || $v2==NULL || $v4==NULL || $v5==NULL)
             {


                $r["re"]="Fill the all fields!!!";
                 print(json_encode($r));
                die('Could not connect: ' . mysql_error());
             }


            else
          {
           $i=mysql_query("select * from id_card where id_number=$v1",$con);
           $check='';
                  while($row = mysql_fetch_array($i))
                    {
 
                          $check=$row['id_number'];

                     }

          
                   if($check==NULL)
                  {

                        $q="insert into id_card values(null,'$v1','$v2','$v4','$v5','$v6')";
                        $s= mysql_query($q);
                        if(!$s)
                          {
                                $r["re"]="Inserting problem in database";
                 
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
