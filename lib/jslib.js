
function textcolor()
{
   var now = new Date();	// 현재 날짜 및 시간
   var hours = now.getHours();	// 시간
   if(hours>=20||hours<=6)
   {   
         var a = document.getElementsByTagName('a');///신세계이다
         var div =document.getElementsByTagName('div');///배열형식이다 
         var tags=[a,div];
         for(var ii=0;ii<tags.length;ii++)/////////////2차원배열이 되는거다 그래서 이중포문 필요하다
         {
            for(var i = 0; i<tags[ii].length; i++) ///이건더더욱..모든 a태그길이만큼 이게되다니... 2021-04-22
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

      
