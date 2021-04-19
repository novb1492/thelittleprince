var period=0,bool=0,month=0,day=0,checknumber=false;
function check(m,d,Period)
{
    //console.log(Period,"PERcheck");
    //console.log(m,"dreamcreatecheckm");
    //console.log(d,"ddreamcreatecheckm");
    bool=isEmpty(Period);////////비어있나검사
  if(bool)
  {
      period=0;//////비어있다면
      dreamcreate=0;
      console.log("check.js와서 mysql이랑 확인해봐");
  }
  else
  {
      period=Period;//////////아니라면
      month=m;
      day=d;
      checknumber=true;
  }
}
function isEmpty(period){
         
    if(typeof period == "undefined" || period == null || period == ""||period=="0")
        return true;
    else
        return false ;
}
