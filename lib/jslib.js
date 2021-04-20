
function textcolor()
{
   var now = new Date();	// 현재 날짜 및 시간
   var hours = now.getHours();	// 시간
   if(hours>=20||hours<=6)
   {   
      var array=["box","box2","box3","box4","box5","box6","box7"];
      for(var i=0; array.length;i++)
      {
      var text = document.getElementById(array[i]);  
      text.style.color = "white"; 
      }
   }

}  
function fetchpage(name,area)///////싱글페이지
{
   fetch(name).then(function(response)
   {response.text().then(function(text)
   {document.querySelector(area).innerHTML=text;}
   )})

}
      
