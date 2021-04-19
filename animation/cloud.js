class cloud{
    constructor(totalclouds,cloudsbundle){
        this.cloudsize=1;
        this.totalclouds=totalclouds;
        this.cloudsbundle=cloudsbundle;
    }
    returnx()
    {
      var x=[];
      for(var i=0;i<this.totalclouds;i++)
      {
        x[i]=random(-500,0);
        //console.log(x[i],"x");
      }
      return x;
    }
    returny()
    {
      var y=[];
      for(var i=0;i<this.totalclouds;i++)
      {
        y[i]=random(20,100);
       // console.log(y[i],"y");
      }
      return y;
    }
    returnz()
    {
      var z=[];
      for(var i=0;i<this.totalclouds;i++)
      {
        z[i]=random(1,1.5);
        //console.log(z[i],"z");
      }
      return z;
    }
    drawcloud2(cloudsx,cloudsy)
    {
      console.log("draw");
      for(var ii=0;ii<this.cloudsbundle;ii++)
      {
        for(var i=0;i<this.totalclouds;i++)
        {
        clouds.drawcloud(cloudsx[ii][i],cloudsy[ii][i],cloudssize[ii][i]);
        }
      }
    }
    drawcloud(x,y,size)
    { push();
      fill('white');
      stroke('white');
      translate(x,y);
      fill(255, 255, 255);
      noStroke();
      arc(x, y, 25 * size, 20 * size, PI + TWO_PI, TWO_PI);
      arc(x + 10, y, 25 * size, 45 * size, PI + TWO_PI, TWO_PI);
      arc(x + 25, y, 25 * size, 35 * size, PI + TWO_PI, TWO_PI);
      arc(x + 40, y, 30 * size, 20 * size, PI + TWO_PI, TWO_PI);
      endShape(CLOSE);
      pop();
    }
  
  }