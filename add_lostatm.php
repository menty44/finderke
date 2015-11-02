 <?php

         $con = mysql_connect("localhost","root","root");
         if (!$con)
           {
             die('Could not connect: ' . mysql_error());
           }

           mysql_select_db("document_finder", $con);

	
           $v1=$_REQUEST['bankname'];
           $v2=$_REQUEST['accountnumber'];
           $v3=$_REQUEST['name'];
	$v4=$_REQUEST['date_lost'];
	$v5=$_REQUEST['contact'];
	$v6=$_REQUEST['reward'];


               if($v1==NULL || $v2==NULL || $v3==NULL || $v4==NULL || $v5==NULL || $v6==NULL)
             {


                $r["re"]="Fill the all fields!!!";
                 print(json_encode($r));
                die('Could not connect: ' . mysql_error());
             }


            else
          {
           $i=mysql_query("select * from lost_atmcard where accountnumber=$v2",$con);
           $check='';
                  while($row = mysql_fetch_array($i))
                    {
 
                          $check=$row['accountnumber'];

                     }

          
                   if($check==NULL)
                  {

                        $q="insert into lost_atmcard values('$v1','$v2','$v3','$v4','$v5','$v6')";
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
