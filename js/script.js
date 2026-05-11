// ALTERNAR

function alternar(arti,web){
    let imag=document.getElementById("articulo"+arti);
    let botn=document.getElementById("contador"+arti);
    let carp="";
    if(web==0){ carp="img"; }else if(web==1){ carp="../img"; }
    if(botn.value=="0"){
        imag.src=carp+"/0/"+arti+"/0.jpg";
        botn.value++;     
    }else if (botn.value=="1"){
        imag.src=carp+"/0/"+arti+"/1.jpg";
        botn.value="0";
    }
}