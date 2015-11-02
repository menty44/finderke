<?php

         $con = mysql_connect("localhost","root","root");
         if (!$con)
           {
             die('Could not connect: ' . mysql_error());
           }

           mysql_select_db("document_finder", $con);
           $v1=$_REQUEST['nhif_number'];
          if($v1==NULL)
            {


                $r["re"]="Enter the number!!!";
                 print(json_encode($r));
                die('Could not connect: ' . mysql_error());
          }

          else

            {


                $i=mysql_query("select * from found_nhif where nhif_number=$v1",$con);
               $check='';
               while($row = mysql_fetch_array($i))
                {
 
                  $r[]=$row;
                  $check=$row['nhif_number'];
                 }
                  if($check==NULL)
                   {           
                      $r["re"]="Record is not available";
                      print(json_encode($r));
                
                     }
                   else
                     {
                         $r["re"]="success";
                            print(json_encode($r));
                             
                       }



}

 mysql_close($con);
              
    ?> 
