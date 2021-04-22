
function textcolor()
{
   var now = new Date();	// 현재 날짜 및 시간
   var hours = now.getHours();	// 시간
   if(hours>=19||hours<=6)
   {   
  
         var a = document.getElementsByTagName('a');///신세계이다
         var div =document.getElementsByTagName('div');
         var tags=[a,div];
         for(var ii=0;ii<tags.length;ii++)
         {
            for(var i = 0; i<a.length; i++) ///이건더더욱..모든 a태그길이만큼 이게되다니... 2021-04-22
            {
                  tags[ii][i].style.color = 'white';
            }
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

      
