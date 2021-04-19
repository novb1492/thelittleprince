class hill{
  constructor(totalpoints,totalsteps,pointbundle)
  {
    this.totalpoints=totalpoints;
    this.secondx=200;
    this.secondy=200;
    this.totalsteps=totalsteps;
    this.pointbundle=pointbundle;
  }
  gety(sheepx,pointx,pointy,pointx2,pointy2)
  {
    let xyz=[];
    for(var i=0;i<this.totalsteps;i++)
    {
      let t=i/this.totalsteps;
      xyz[0]=this.getposvalue(pointx,pointx-this.secondx,pointx2+this.secondx,pointx2,t);
      if(xyz[0]<=sheepx)
      {
        xyz[1]=this.getposvalue(pointy,pointy-this.secondy,pointy2+this.secondy,pointy2,t);
        //곡선의x에대한y좌표가져오는것 x와 동일하나 변수만pointy를 넣으면됨
        let tx = this.gettangentvalue(pointx,pointx-this.secondx,pointx2+this.secondx,pointx2,t);
        let ty = this.gettangentvalue(pointy,pointy-this.secondy,pointy2+this.secondy,pointy2,t);
        let a = atan2(ty,tx);///곡선의 기울기 구하는공식
        xyz[2]=a;
        return xyz;
      }
    }
    return false;     
  }
  gety2(px,py)
  {
    var check=[];
    var n=this.totalpoints-1;
    while(n>0)
    {
        check=this.gety(sheepx,px[n],py[n],px[n-1],py[n-1]);
        if(check!=false)
        {
          //console.log('hillsw','=',sheepysw,'=',n);
          return check;
        }
        n--;
    } 
    if(sheepysw==0)
    {
      return "next";
    }
    else if(sheepysw==1)
    {
      return "reset";
    } 
  }
  getposvalue(p0,p1,p2,p3,t)//곡선좌표
  {
    return Math.pow((1-t),3)*p0+3*Math.pow((1-t),2)*t*p1+3*(1-t)*Math.pow(t,2)*p2+Math.pow(t,3)*p3;
  }
  gettangentvalue(p0,p1,p2,p3,t)///곡선탄젠트
  {
    return -3*Math.pow((1-t),2) * p0 + 3*Math.pow((1-t),2) * p1 - 6*t*(1-t) * p1 - 3*Math.pow(t,2) * p2 + 6*t*(1-t) * p2 + 3*Math.pow(t,2) * p3 
  }
  drawhills(pointx,pointy)
  {
    let first=this.totalpoints-1;
    noFill();
    stroke('pink');
    for(var ii=0;ii<pointbundle;ii++)
    { 
      for(var i=first;i>0;i--)
      {
      bezier(pointx[ii][i-1],pointy[ii][i-1],pointx[ii][i-1]+this.secondx,pointy[ii][i-1]+this.secondy,pointx[ii][i]-this.secondx,pointy[ii][i]-this.secondy,pointx[ii][i],pointy[ii][i]);
      }
    }
  }

}