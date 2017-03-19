/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function send(name)
{
    var content = document.getElementById("content");
    var text = content.value; 

    if(text=="" || text==null)
    {
         alert("请填写内容！");
         return false;
    }else
    {
    var url = "send.php?name="+name+"&text="+text;
    var data = {};
    $.get(url,data,function(res){
        if(res =="ok")
        {
            alert("发送失败！");
        }
        else
        {
            content.value="";
            
        }
        
    });
}
}



