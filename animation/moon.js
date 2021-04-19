class Moon{
    constructor()
    {
    this.moonsizex=200;
    this.moonsizey=200;
    this.x;
    this.y;
    this.f;
    this.s;
    this.f2;
    this.s2;
    }
    returnobjects(nowhour)
    {
        var array=[];
        var starthour,endhour;
        if(nowhour>=19&&nowhour<=20)////////////////밤
        {
          starthour=19,endhour=20;
          this.f=0,this.s=displayHeight/5;
          this.f2=displayWidth,this.s2=displayWidth*4/5;
        }
        else if(nowhour>=21||nowhour<=3)////////////새벽
        {
          starthour=21,endhour=23;
          this.f=displayHeight/5,this.s=displayHeight/5;
          this.f2=displayWidth*4/5,this.s2=displayWidth*4/5;
          if(nowhour<=3)////////////////////////////새벽
          {
          starthour=0,endhour=3;
          this.f=displayHeight/5,this.s=displayHeight/5;
          this.f2=displayWidth*4/5,this.s2=displayWidth*4/5;
          }
        }
        else if(nowhour>=4&&nowhour<=6)/////////////동틀무렵
        { 
          starthour=4,endhour=6;
          this.f=displayHeight*4/5,this.s=displayHeight;
          this.f2=displayWidth*4/5,this.s2=displayWidth/5;
        }
        array[0]=starthour,array[1]=endhour;
        return array;

    }
    draw(nowminuit,totalminuit)
    {   
        this.x=map(nowminuit,0,totalminuit,this.f2,this.s2);
        this.y=map(nowminuit,0,totalminuit,this.f,this.s);
        this.drawmoon2();
    }
    drawmoon2()
    {
        push();
        translate(this.x,this.y);
        fill(255,240,280);
        noStroke();
        circle(0,0,this.moonsizex,this.moonsizey);
        pop();
    }
}