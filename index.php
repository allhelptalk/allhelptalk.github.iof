<?php
    session_start();
    $name = $_SESSION['name'];
    
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./css/index.css"/>
        <script type="text/javascript" src="./js/index.js"></script>
        <script type="text/javascript" src="./js/jquery-1.9.1.min.js"></script>
        <script>
            $(function(){
             setInterval(aa,1000);
             var i=1;
             var str1=""; 
             function aa(){
                 $.getJSON("load.php",function(res){   
                     if(res==="")//如果返回值为空或者返回值为上一条一样的不执行
                     {
                         console.log("no masg!");
                     }else
                     {
                          jsonObj = res;                          
                          var str ="<div class='text_list'>"+"<p class='info'>"+jsonObj['name']+":("+jsonObj['time']+")"+"["+jsonObj['addr']+"]"+"</p>"+"<p class='content_body'>"+jsonObj['content']+"</p></div>";
                          if(str1==str)
                          {
                              
                          }
                          else
                          {
                            $("#aa").append(str);
                            str1=str;
                           console.log("get masg!"+(i++)+res);
                         }
                     }
                     
                 });
               
             }
            });
        </script>
        
        <script>
             function load(name){
                if(name==null || name=="")
                {
                    var theResponse = window.prompt("欢迎光临？","请输入您的聊天昵称。");
                    $.get("session.php?session="+theResponse);
                    document.getElementById('nike').innerHTML=theResponse+":";
                    <?php $name = $_SESSION['name'];?>
                     location.reload(true);
                }
                  
           }
        </script>
        
        <title></title>
    </head>
    
    
    <body onload="load('<?php echo $name;?>')">
        <u><h1>聊骚中心在线聊天室</h1></u>
        <div class="talk_window" id="aa">
                <?php
                     require_once 'mysql_conn.php';
                     $sql = "select * from chat_log";
                     $result = mysql_query($sql);
                     
                     while($row = mysql_fetch_array($result))
                     {
                         echo "<div class='text_list'>";
                         echo "<p class='info'>".$row['name'].":(".$row['time'].")"."[".$row['addr']."]"."</p>";
                         echo "<p class='content_body'>".$row['content']."</p>";  
                         echo "</div>";
                     
                     }
                     mysql_close($con);
                ?>
        </div>
        <center class="name"id="nike"> <?php  echo $name?>:</center><br>
        <textarea type="text" id="content" class="content" placeholder="在此输入内容"></textarea>
        <input type="button" name="send" class="send_btn" value="发 送" onclick="send('<?php  echo $name?>')"/>
    </body>
</html>
