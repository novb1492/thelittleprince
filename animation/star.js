class star{
  constructor(totalstars,starsbundle){
    this.radius1=7.5;
    this.radius2=15;
    this.npoints=5;
    this.totalstars=totalstars;
    this.starsbundle=starsbundle;
  }
  returnx()
  {
    var x=[];
    for(var i=0; i<this.totalstars;i++)
    {
      x[i]=random(-500,0);
    }
    return x;
  }
  returny()
  {
    var y=[];
    for(var i=0; i<this.totalstars;i++)
    {
      y[i]=random(0,100);
    }
    return y;
  }
  drawstar2(starx,stary)
  {
    for(var ii=0;ii<this.starsbundle;ii++)
    {
      for(var i=0;i<this.totalstars;i++)
      {
        this.drawstar(starx[ii][i],stary[ii][i]);
      }
    }
  }
  drawstar(x,y)
  { 
    push();
    fill('yellow');
    stroke('yellow');
    translate(x,y);
    let angle = TWO_PI / this.npoints;
    let halfAngle = angle / 2.0;
    beginShape();
    for (let a = 0; a < TWO_PI; a += angle) {
      let sx = x + cos(a) * this.radius2;
      let sy = y + sin(a) * this.radius2;
      vertex(sx, sy);
      sx = x + cos(a + halfAngle) * this.radius1;
      sy = y + sin(a + halfAngle) * this.radius1;
      vertex(sx, sy);
    }
    endShape(CLOSE);
    pop();
  }

}