 <?php

         $con = mysql_connect("localhost","root","root");
         if (!$con)
           {
             die('Could not connect: ' . mysql_error());
           }

           mysql_select_db("document_finder", $con);

	
           $v1=$_REQUEST['document_title'];
           $v2=$_REQUEST['document_description'];
           $v3=$_REQUEST['document_datefound'];
	$v4=$_REQUEST['document_placefound'];
	$v5=$_REQUEST['document_findername'];

	$v6=$_REQUEST['document_contact'];
	$v7=$_REQUEST['document_placetocollect'];
	//$v8=$_REQUEST['nssf_placetocollect'];


               if($v1==NULL || $v2==NULL || $v3==NULL || $v4==NULL || $v5==NULL || $v6==NULL)
             {


                $r["re"]="Fill the all fields!!!";
                 print(json_encode($r));
                die('Could not connect: ' . mysql_error());
             }


            else
          {
           $i=mysql_query("select * from found_other where document_title=$v1",$con);
           $check='';
                  while($row = mysql_fetch_array($i))
                    {
 
                          $check=$row['document_title'];

                     }

          
                   if($check==NULL)
                  {

                        $q="insert into found_other values('$v1','$v2','$v3','$v4','$v5','$v6','$v7')";
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
