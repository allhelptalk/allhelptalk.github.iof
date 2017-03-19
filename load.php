 <?php
                     require 'mysql_conn.php';
                     $sql = "select * from chat_log where IsNew=1 LIMIT 1";
                     
                     $result = mysql_query($sql,$con)or die(mysql_error());
                     if(mysql_num_rows($result)==0)
                     {
                         echo "";
                     
                     }
                     else
                     {
                        
                           
                            /* echo "<div class='text_list'>";
                            echo "<p class='info'>".$row['name'].":(".$row['time'].")"."[".$row['addr']."]"."</p>";
                            echo "<p class='content_body'>".$row['content']."</p>";  
                            echo "</div>";*/
                            $row = mysql_fetch_array($result);
                            $rows['name']=$row['name'];
                            $rows['time']=$row['time'];
                            $rows['addr']=$row['addr'];
                            $rows['content']=$row['content']; 
                            $rows['id']=$row['id'];

                            echo json_encode($rows, JSON_UNESCAPED_UNICODE);
                            
                           
                     }
                     
                     mysql_close($con);
                    
                    
                
                ?>

