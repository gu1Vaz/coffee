let divBanner = document.getElementById("divBanner");
let i = 0;

let urlsBanners =  null;

let imgs = []

const getBanners = ()=>{
    //falta  implementar pegar urls banner via api
     urlsBanners = ["http://cofee.cefetvga.pro.br/storage/banners/banner2.png",
    "http://cofee.cefetvga.pro.br/storage/banners/fundo1.png",
    "http://cofee.cefetvga.pro.br/storage/banners/banner1.png",
    "http://cofee.cefetvga.pro.br/storage/banners/banner3.png",
    "http://cofee.cefetvga.pro.br/storage/banners/background.png"];
}
const downloadBanners= ()=>{
    let j= 0;
    urlsBanners.forEach(banner => {
        let image = new Image();

        image.className = "banner"
        image.src = urlsBanners[j]

        imgs.push(image);
        j++;
    });
    
}

const trocaBanner = ()=>{
    
    if (i >= urlsBanners.length) i = 0;

    divBanner.removeChild(divBanner.childNodes[0]);
    divBanner.appendChild(imgs[i]);
    
    i++;
}

getBanners()
downloadBanners()
trocaBanner();

setInterval(trocaBanner, 3600);

window.troca_banner = trocaBanner;
