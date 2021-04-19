class Sky{
    constructor(){
      this.sr;
      this.er;
      this.sg;
      this.eg;
      this.sb;
      this.eb;
    }
    returnobjects(nowhour)
    {
        var array=[];
        if(nowhour>=7&&nowhour<=16)///아침~낮 푸른하늘
        {
          this.sr=80, this.sg=180, this.sb=205;
          this.er=120,this.eg=187,this.eb=194;
          starthour=7,endhour=15; 
        }
        else if(nowhour>=17&&nowhour<=18)///낮~저녁 노을이지는
        {
        this.sr=120, this.sg=187, this.sb=194;
         this.er=242,this.eg=164,this.eb=102;
         starthour=16,endhour=18;
        }
        else if(nowhour>=19&&nowhour<20)////저녁~밤 약간 검정색
        {
          this.sr=242,this.sg=164,this.sb=102;
          this.er=50,this.eg=50,this.eb=50;
          starthour=19,endhour=20;
        }
        else if(nowhour>=20&&nowhour<=23)////밤~새벽 어둠
        {
          this.sr=50,this.sg=50,this.sb=50;
          this.er=10,this.eg=10,this.eb=10;
          starthour=20,endhour=24;
        }
        else if(nowhour>=0&&nowhour<=4)///새벽
        {
          this.sr=10,this.sg=10,this.sb=10;
          this.er=10,this.eg=10,this.eb=10;
          starthour=1;endhour=4;
        }
        else if(nowhour>=5&&nowhour<=6)////새벽~아침 해가뜨는
        {
          this.sr=10,this.sg=10,this.sb=10;
          this.er=80,this.eg=180,this.eb=205;
          starthour=5,endhour=6;
        }
        array[0]=starthour,array[1]=endhour;
        return array;
    }
    draw(nowminuit,totalminuit)
    {
      background(map(nowminuit,0,totalminuit,this.sr,this.er),map(nowminuit,0,totalminuit,this.sg,this.eg),map(nowminuit,0,totalminuit,this.sb,this.eb));
    }
}