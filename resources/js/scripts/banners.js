var banner = document.getElementById("banner");
var i = 0;

const host = window.location.href;
const urlsBanners = ["/storage/banners/banner2.png","/storage/banners/fundo1.png","/storage/banners/banner1.png","/storage/banners/banner3.png","/storage/banners/background.png"];



const getBanners = ()=>{
    //implementar pegar urls banner via api
}

const trocaBanner =()=>{
    
    if (i >= urlsBanners.length) i = 0;
    banner.src = host+urlsBanners[i];
    i++;
}
trocaBanner();
setInterval(trocaBanner, 3600);