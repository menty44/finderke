 <?php

         $con = mysql_connect("localhost","root","root");
         if (!$con)
           {
             die('Could not connect: ' . mysql_error());
           }

           mysql_select_db("document_finder", $con);

	
           $v1=$_REQUEST['licence_no'];
           $v2=$_REQUEST['name'];
           $v3=$_REQUEST['issue_date'];
	$v4=$_REQUEST['expiry_date'];
	$v5=$_REQUEST['date_lost'];
$v6=$_REQUEST['contact'];
	$v7=$_REQUEST['reward'];



              if($v1==NULL || $v2==NULL || $v3==NULL || $v4==NULL || $v5==NULL || $v6==NULL || $v7==NULL )
             {


                $r["re"]="Fill the all fields!!!";
                 print(json_encode($r));
                die('Could not connect: ' . mysql_error());
             }


            else
          {
           $i=mysql_query("select * from  where licence_no=$v1",$con);
           $check='';
                  while($row = mysql_fetch_array($i))
                    {
 
                          $check=$row['licence_no'];

                     }

          
                   if($check==NULL)
                  {

                        $q="insert into lost_drivinglicence values('$v1','$v2','$v3','$v4','$v5','$v6','$v7')";
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
