 <?php

         $con = mysql_connect("localhost","root","root");
         if (!$con)
           {
             die('Could not connect: ' . mysql_error());
           }

           mysql_select_db("document_finder", $con);

	
           $v1=$_REQUEST['licence_number'];
           $v2=$_REQUEST['licence_name'];
           $v3=$_REQUEST['licence_issuedate'];
	$v4=$_REQUEST['licence_selectfounddate'];
	$v5=$_REQUEST['licence_placefound'];

	$v6=$_REQUEST['licence_findername'];
	$v7=$_REQUEST['licence_findercontact'];
	$v8=$_REQUEST['licence_placetocollect'];


               if($v1==NULL || $v2==NULL || $v3==NULL || $v4==NULL || $v5==NULL || $v6==NULL)
             {


                $r["re"]="Fill the all fields!!!";
                 print(json_encode($r));
                die('Could not connect: ' . mysql_error());
             }


            else
          {
           $i=mysql_query("select * from found_drivinglicence where licence_number=$v1",$con);
           $check='';
                  while($row = mysql_fetch_array($i))
                    {
 
                          $check=$row['licence_number'];

                     }

          
                   if($check==NULL)
                  {

                        $q="insert into found_drivinglicence values('$v1','$v2','$v3','$v4','$v5','$v6','$v7','$v8')";
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
