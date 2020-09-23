var ladate=new Date()
var h=ladate.getHours();
if (h<10) {h = "0" + h}
var m=ladate.getMinutes();
if (m<10) {m = "0" + m}
var s=ladate.getSeconds();
if (s<10) {s = "0" + s}
if(h > 7 && h < 19){
    document.getElementById('darkmode').className='bg-light';
}else if(h > 19){
    document.getElementById('darkmode').className='bg-dark';
}