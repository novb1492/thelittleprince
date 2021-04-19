//tree object
let tree;
let branch;
let treey;
//time function
let totalminuit=0,nowminuit=0,starthour,endhour;
function returntotalminuit(start,end)
{
  return (end-start)*60;
}
function makenowtotalminuit(nowhour,starthour,endhour)
{
  totalminuit=returntotalminuit(starthour,endhour);

  if(nowhour-starthour>1)/// 한시간 이하시 초과되는 현상때문에 조건을 나눔
  {
    nowminuit=(nowhour-starthour)*60+minute();
  }
  else
  {
    nowminuit=minute();
  }
}
function returnmin(array)
{
  return Math.min.apply(null,array);
}
//resizefunction
function windowResized() {
  resizeCanvas(windowWidth, displayHeight);
}
let sun,sky;
var t;
function setup()
{
    let canvas=createCanvas(windowWidth,displayHeight);
    canvas.parent('canvas2');
    treey=height;
    sun=new Sun();
    sky=new Sky();
    t={
      skyobjects:function(nowhour,c)
        {
          var catcharray=[];
          catcharray=c.returnobjects(nowhour);
          makenowtotalminuit(nowhour,catcharray[0],catcharray[1]);
          //console.log(nowminuit);
          c.draw(nowminuit,totalminuit);
        }
      }
}
let angle=0;
function draw()
{
  nowhour=hour();
  
  choiceskycolor(nowhour);

  if(nowhour>=6&&nowhour<=19)
  {
    t.skyobjects(nowhour,sun);
  }

    line(width/2,height,width/2,treey);
    if(treey>height*2/5)
    {
      treey-=2;
    }
  else 
  {
    if(angle<=0.6)
    {
      angle+=0.005;
    }
    translate(width/2,height);
    translate(0,-height*3/5);
    branchs(120);
  }
    

}
function choiceskycolor(nowhour)
{
  t.skyobjects(nowhour,sky);
}
///treefunction
function branchs(len)
{
  
  if (len > 4) 
  {
    push();   
    rotate(angle);  
    line(0, 0, 0, -len);  
    translate(0, -len); 
    branchs(len*0.67);      
    pop();    
    // 왼쪽
    push();
    rotate(-angle);
    line(0, 0, 0, -len);
    translate(0, -len);
    branchs(len*0.67);
    pop();
  }
}
