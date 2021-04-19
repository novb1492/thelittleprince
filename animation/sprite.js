class sprite{
  constructor(animation,about){
  this.about=about;
  this.animation=animation
  }
  frameup()
  {
    this.about[1]++;
    if(this.about[1]%5==0)
    {
      this.about[0]++;
      this.about[1]=0;
    }
    if(this.about[0]==7)
    {
      this.about[0]=0;
    }
  }
  draw(tempxy)
  {
    this.frameup();
    translate(tempxy[0],tempxy[1]);
    rotate(tempxy[2]+(90*TWO_PI/180));
    imageMode(CENTER);
    image(this.animation[this.about[0]],0,-20,80,80);
  }
  
}