class Sun{
    constructor()
    {
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

        if(nowhour>=6&&nowhour<=8)
        {
          starthour=6,endhour=8;
          this.f=displayHeight,this.s=displayHeight/5;
          this.f2=displayWidth,this.s2=displayWidth*3/4;
        }
        else if(nowhour>=9&&nowhour<=16)
        {
          starthour=9,endhour=16;
          this.f=displayHeight/5,this.s=displayHeight/5;
          this.f2=displayWidth*3/4,this.s2=displayWidth*2/4;
        }
        else if(nowhour>=17&&nowhour<=20)
        {
          starthour=17,endhour=20;
          this.f=displayHeight/5,this.s=displayHeight;
          this.f2=displayWidth*2/4,this.s2=displayWidth/4;
        }
        array[0]=starthour,array[1]=endhour;
        return array;
    }
    draw(nowminuit,totalminuit)
    {
        this.x=map(nowminuit,0,totalminuit,this.f2,this.s2);
        this.y=map(nowminuit,0,totalminuit,this.f,this.s);
        //console.log(this.x);
        this.drawsun2();
    }
    drawsun2()
    {
        push();
        fill(245, 187, 87);
        stroke(245, 187, 87);
        translate(this.x,this.y);
        rotate(radians(frameCount / 2));
        ellipse(0, 0, 60, 60);
        line(0, -60, 0, -40);
        line(0, 40, 0, 60);
        line(-45, -45, -30, -30);
        line(45, -45, 30, -30);
        line(-60, 0, -40, 0);
        line(40, 0, 60, 0);
        line(-45, 45, -30, 30);
        line(45, 45, 30, 30);
        pop();
        noFill();
    }
}