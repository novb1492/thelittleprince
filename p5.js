//sheep objects
let sheep;
let spritesheet,spritedata;
let sheepspeed=0,sheepx,sheepysw=0,n,sheeppos=[];
let px,py;
//stars objects
let stars;
let totalstars=8;
let starsw=1;
let starsbundle=2;
let starsx,starsy;
//point objects
let points;
let pointbundle=2;
let pointsx,pointsy;
let pointsw=0;
let totalpoints=5; 
//hill objects
let hills,hillsw=1;
//cloud objects
let clouds;
let cloudsbundle=3,cloudsw=1,totalclouds=8;
let cloudsx,cloudsy,cloudssize;
//skycolor object
let sky;
//sun object
let sun;
//moon objet
let moon;
//time function and objects
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
function windowResized() {
  resizeCanvas(windowWidth, windowHeight);
}
function twodmakearray(row,colums)
{
  var array=new Array(row);
  for(var i=0;i<array.length;i++)
  {
    array[i]=new Array(colums);
  }
  return array
}
function preload()
{ 
  //call sheep image and position
  spritedata= loadJSON('../animation/an/sheeppos.json');
  spritesheet = loadImage('../animation/sheep.png');
}
var t;
var position;
function setup() 
{
  let canvas=createCanvas(displayWidth,windowHeight);
  canvas.parent('canvas');
  ////프레임설정
  var framerate=60;
  frameRate(framerate);
  ////현재시간까지 진행사항에 따른 양x좌표만들기
  var totaldayhour=24-6;////하루총 시간
  var totalmin=totaldayhour*60;
  var nowmin=(hour()-6)*60+minute();///최초접속시간
  var percent=nowmin/totalmin;////////현재까지 진행률 분으로 계산
  percent=percent.toFixed(3);
  var speed=displayWidth/4/(totaldayhour/4*60)/60/framerate;///4.5시간에 한줄씩
  sheepx=displayWidth-displayWidth*percent;////////////현재좌표 저장
  //양속도및 언덕속도 설정
  hillsspeed=1;
  speed=speed.toFixed(5);
  sheepspeed=parseFloat(speed);//문자열->실수
  ////초기설정확인용출력
  console.log(percent,"percent");
  console.log(speed,"sppeed");
  console.log(hillsspeed,"hillspeed");
  console.log(sheepspeed,"sheepspeed");
  console.log(sheepx,"startsheepx");
  //각객체별2차원배열생성해주기
  pointsx=twodmakearray(pointbundle,totalpoints);
  pointsy=twodmakearray(pointbundle,totalpoints);
  cloudsx=twodmakearray(cloudsbundle,totalclouds);
  cloudsy=twodmakearray(cloudsbundle,totalclouds);
  cloudssize=twodmakearray(cloudsbundle,totalclouds);
  starsx=twodmakearray(starsbundle,totalstars);
  starsy=twodmakearray(starsbundle,totalstars);
  console.log(pointsx,"arr");
  //console.log(month,"month");
  //make sky
  sky=new Sky();
  //make sun
  sun=new Sun();
  //make mooon
  moon= new Moon();
  //make cloud
  clouds=new cloud(totalclouds,cloudsbundle);
  //make stars
  stars=new star(totalstars,starsbundle);
  //make points
  points= new point(totalpoints);
  pointsx[0]=[0,displayWidth/4,displayWidth*2/4,displayWidth*3/4,displayWidth];//초기배열
  if(pointsx[0].length==totalpoints)
  {
    pointsy[0]=points.returny();
  }
  else
  {
    console.log('pointsx초기배열셋팅 고쳐');
  }
  //make hill
  var totalsteps=480;
  hills= new hill(totalpoints,totalsteps,pointbundle);
  //make sheep
  
  if(checknumber==true)
  { 
    var frames=[],animation=[];
    frames=spritedata.frames;
    for (var i = 0; i < frames.length; i++) {
      var pos = frames[i].position;
      var img = spritesheet.get(pos.x, pos.y, pos.w, pos.h);
      animation.push(img);
    }
      var about=[startframe=0,framspeed=10];
      sheep=new sprite(animation,about); 
  }
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
    position={
      returnxyz:function(sw,xarray,yarray,zarray,c)
      {
      switch (sw) {
        case 1:
          xarray[0]=c.returnx();
          yarray[0]=c.returny();
          if(zarray!=null)
          {
            zarray[0]=c.returnz();
          }
            //console.log('starsw1');   
              break;
        case 2:
          xarray[1]=c.returnx();
          yarray[1]=c.returny();
          if(zarray!=null)
          {
            zarray[1]=c.returnz();
          }
          // console.log('starsw2');   
              break;
        default:
          break;
      }
    }
    }
  
}
var nowhour;
function draw() 
{ 
  nowhour=hour();
  //draw sky
  choiceskycolor(nowhour);
  //draw sun
  if(nowhour>=6&&nowhour<=19)
  {
    t.skyobjects(nowhour,sun);
  }
  if(nowhour>=20||nowhour<=6)
  {
    t.skyobjects(nowhour,moon);
  }
  //draw cloud
  if(hour()>=6&&hour()<=19)
  {
    position.returnxyz(cloudsw,cloudsx,cloudsy,cloudssize,clouds);
    cloudsw=0;
    clouds.drawcloud2(cloudsx,cloudsy);
    movesystem(cloudsbundle,totalclouds,cloudsx,1);
    cloudsw=swsystem(cloudsw,cloudsx[0],cloudsx[1],350,350);
  }
  //draw  stars
  else if(hour()>=20||hour()<=4)
 {
  position.returnxyz(starsw,starsx,starsy,null,stars);
  starsw=0;
  stars.drawstar2(starsx,starsy);
  movesystem(starsbundle,totalstars,starsx,1);
  starsw=swsystem(starsw,starsx[0],starsx[1],350,350);
  }
   //draw points and hills
   switchpointsxy();
   //points.drawpoint(pointsx,pointsy);
   movesystem(pointbundle,totalpoints,pointsx,hillsspeed);
   pointsw=swsystem(pointsw,pointsx[0],pointsx[1],hillsspeed*2,hillsspeed*2);
   hills.drawhills(pointsx,pointsy);
   //draw sheep
   if(checknumber==true)
   {
   sheepxyz();
   sheep.draw(sheeppos);
   sheepx-=sheepspeed;
   //console.log(sheeppos[0]);
   }
  
}

///sheepfunction
function sheepxyz()
{
  if(sheeppos=="next")
  {
    sheepysw=1;
  }
  else if(sheeppos=="reset")
  {
    sheepysw=0;
  }
  if(sheepysw==0)
  {
    px=pointsx[0],py=pointsy[0];
  }
  else if(sheepysw==1)
  {
    px=pointsx[1],py=pointsy[1];
  }
  sheeppos=hills.gety2(px,py);
}
//system function
function swsystem(swnum,xarray,xarray2,target1,target2)
{
  if(Math.floor(returnmin(xarray))==target1)
  {
    swnum=2;
  }
  if(Math.floor(returnmin(xarray2))==target2)
  {
    swnum=1;
  }
  return swnum;
}
function movesystem(objectbundle,totalcounts,xarray,speed)
{
 for(var ii=0;ii<objectbundle;ii++)
 {
    for(var i=0;i<totalcounts;i++)
    {
      xarray[ii][i]+=speed;
    }
  }
}
///skyfunction
function choiceskycolor(nowhour)
{
  t.skyobjects(nowhour,sky);
}
///pointfunction
function switchpointsxy() {
  let beforepointsx;
  switch (pointsw) {
    case 1:
      beforepointsx=returnmin(pointsx[1]);
      pointsx[0]=points.returnx(beforepointsx);
      pointsy[0]=points.returny();
        //console.log('point1');
          break;
    case 2:
      beforepointsx=returnmin(pointsx[0]);
      pointsx[1]=points.returnx(beforepointsx);
      pointsy[1]=points.returny();
        //console.log('poinposition');
          break;
    default:
      break;
  }
  pointsw=0;
}
