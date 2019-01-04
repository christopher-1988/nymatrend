function colecciones(control){
  
switch (control) {
        
case "vestido": 
        
//prendas dentros de la coleccion
let origen_a=$("#tmpl-vstd").html();
let plantilla_a=Handlebars.compile(origen_a);
    
 let pndr_a=[
{Art_femn_cod:"001",Art_femn_nmb:"Vestido casual",Art_femn_img:"img/collec/img-prnd-c/DSC04212.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Vestido corto grisáceo, manga corta con escote en forma de ojal anterior y posterior.",Art_mtrl:"algodón"},
{Art_femn_cod:"002",Art_femn_nmb:"Vestido casual",Art_femn_img:"img/collec/img-prnd-c/DSC04278.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Vestido corto multicolor estampado tipo off shoulder  tirantes spaghetti, escote en u. ligero y suave.",Art_mtrl:""},
{Art_femn_cod:"003",Art_femn_nmb:"Vestido casual",Art_femn_img:"img/collec/img-prnd-c/DSC04336.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Vestido corto color rojo y negro estampado tipo off shoulder escote posterior en u y tirante espagueti en cuello.",Art_mtrl:""},
{Art_femn_cod:"004",Art_femn_nmb:"Vestido casual",Art_femn_img:"img/collec/img-prnd-c/DSC04411.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Vestido corto multicolor  horizontal tipo off shoulder con escote posterior recto y tirantes sobres los hombros.",Art_mtrl:""},
{Art_femn_cod:"005",Art_femn_nmb:"Vestido casual",Art_femn_img:"img/collec/img-prnd-c/DSC04445.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Vestido corto blanco y azul estampado, manga corta, cuello en v de superficie lisa, ligero y suave.",Art_mtrl:""},
{Art_femn_cod:"006",Art_femn_nmb:"Vestido casual",Art_femn_img:"img/collec/img-prnd-c/DSC04473.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Vestido corto blanco y azul cinetico, manga corta, cuello en u de superficie aspera, ligero y suave.",Art_mtrl:""},
{Art_femn_cod:"007",Art_femn_nmb:"Vestido casual",Art_femn_img:"img/collec/img-prnd-c/DSC04505.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Vestido corto color rosado claro melon, manga larga de escote de  hombros descubiertos, cuello en u de superficie lisa, ligero y suave.",Art_mtrl:""},
{Art_femn_cod:"008",Art_femn_nmb:"Vestido casual",Art_femn_img:"img/collec/img-prnd-c/DSC04578.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Vestido corto negro y blanco estampado, manga corta, cuello en u de superficie lisa, falda en corte A, ligero y fresco.",Art_mtrl:""},
{Art_femn_cod:"009",Art_femn_nmb:"Vestido casual",Art_femn_img:"img/collec/img-prnd-c/DSC04617.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Vestido corto azul estampado, manga corta, off sholuder,  cuello en u de superficie lisa, ligero y ergonomico.",Art_mtrl:""},
{Art_femn_cod:"010",Art_femn_nmb:"Vestido casual",Art_femn_img:"img/collec/img-prnd-c/DSC04637.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Vestido corto negro y blanco alfabetico estampado, manga corta, cuello en u y tras en espagueti de superficie lisa, falda en corte A, ligero y fresco.",Art_mtrl:""},
{Art_femn_cod:"011",Art_femn_nmb:"Vestido casual",Art_femn_img:"img/collec/img-prnd-c/DSC04663.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Vestido corto negro y letras rojas alfabetico estampado, manga corta, cuello en u de superficie lisa, falda en corte A, ligero y fresco.",Art_mtrl:""},
{Art_femn_cod:"012",Art_femn_nmb:"Vestido casual",Art_femn_img:"img/collec/img-prnd-c/DSC04683.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Vestido corto rojo y negro estampado, manga corta, con tiras en cuello de superficie lisa, ligero y fresco..",Art_mtrl:""},
{Art_femn_cod:"013",Art_femn_nmb:"Vestido casual",Art_femn_img:"img/collec/img-prnd-c/DSC04648.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Vestido corto negro y círculos blancos, manga larga, cuello en u de superficie lisa, falda en corte A.",Art_mtrl:""},
{Art_femn_cod:"014",Art_femn_nmb:"Vestido casual",Art_femn_img:"img/collec/img-prnd-c/DSC04888.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Vestido corto negro con hilos dorados semitransparente con forro interno visible, manga corta, cuello en V de superficie lisa, falda en corte A, ligero y fresco.",Art_mtrl:""},
{Art_femn_cod:"015",Art_femn_nmb:"Vestido casual",Art_femn_img:"img/collec/img-prnd-c/DSC04938.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Vestido corto en tres tonos azul, blanco y amarillo estampado, manga corta, cuello en u de superficie lisa, ligero y fresco.",Art_mtrl:""},
{Art_femn_cod:"016",Art_femn_nmb:"Vestido casual",Art_femn_img:"img/collec/img-prnd-c/DSC05029.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Vestido corto blanco estampados de figuras azules, manga corta, cuello en u de superficie lisa,  fresco",Art_mtrl:""},
{Art_femn_cod:"017",Art_femn_nmb:"Vestido casual",Art_femn_img:"img/collec/img-prnd-c/DSC04920.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Vestido corto gris con rayas negras verticales, manga corta, cuello en u de superficie lisa.",Art_mtrl:""}]
    $("#view-prnd-vstd").html(plantilla_a(pndr_a))
    console.log(pndr_a);
                
  break;
        
        
        
case "braga":
        
        //prendas dentros de la coleccion
let origen_b=$("#tmpl-brg").html();
let plantilla_b=Handlebars.compile(origen_b);
    
 let pndr_b=[
{Art_femn_cod:"Brl001",Art_femn_nmb:"Braga casual",Art_femn_img:"img/collec/img-prnd-c/DSC04795.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Braga larga negra elegante, manga corta, cuello redondo y botones, superficie lisa, elástico en la cintura. Con bolsillos bilaterales.",Art_mtrl:""},
{Art_femn_cod:"Brl002",Art_femn_nmb:"Braga casual",Art_femn_img:"img/collec/img-prnd-c/DSC04823.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Braga larga roja elegante, manga corta, cuello en V cruzado de superficie lisa, Con bolsillos bilaterales.",Art_mtrl:""},
{Art_femn_cod:"Brc001",Art_femn_nmb:"Braga casual",Art_femn_img:"img/collec/img-prnd-c/DSC04748.jpg",Art_femn_cst:"0",Art_fem_tll:"Braga corta negra corta elegante, manga corta, cuello en V de superficie lisa, elástico en la cintura. Con bolsillos bilaterales.",Art_fem_clr:"S-M-L",Art_femn_dscp:"",Art_mtrl:""},
{Art_femn_cod:"Brc002",Art_femn_nmb:"Braga casual",Art_femn_img:"img/collec/img-prnd-c/DSC04951.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Braga corta con flores y fondo blanco estampado, manga corta, cuello redondo de superficie lisa, elástico en la cintura con escote en ojal.",Art_mtrl:""},
{Art_femn_cod:"Brl003",Art_femn_nmb:"Braga casual",Art_femn_img:"img/collec/img-prnd-c/DSC05019.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Braga corta con flores y fondo negro estampado, off shoulder, escotado, de superficie lisa, elástico en la cintura y cinturón.",Art_mtrl:""},
{Art_femn_cod:"Brl004",Art_femn_nmb:"Braga casual",Art_femn_img:"img/collec/img-prnd-c/DSC04719.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Braga corta multicolor cinetico rojo, negro y blanco estampado, manga larga, cuello en U de superficie corrugada, cinturón",Art_mtrl:""}]
    $("#view-prnd-brg").html(plantilla_b(pndr_b));
        
break;

case "blusas":
        
        //prendas dentros de la coleccion
let origen_c=$("#tmpl-bll").html();
let plantilla_c=Handlebars.compile(origen_c);
console.log(origen_c)
    
 let pndr_c=[
{Art_femn_cod:"Bll001",Art_femn_nmb:"Blusa casual",Art_femn_img:"img/collec/img-prnd-c/DSC05211.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Blusa roja en chifon con hilos dorados semi transparente con cuello redondo, manga larga.",Art_mtrl:""},
{Art_femn_cod:"Blc001",Art_femn_nmb:"Blusa casual",Art_femn_img:"img/collec/img-prnd-c/DSC05205.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Blusa animal print color marron y negro, manga corta , cuello compuesto en V semi transparente en chifon.",Art_mtrl:""},
{Art_femn_cod:"Blc002",Art_femn_nmb:"Blusa casual",Art_femn_img:"img/collec/img-prnd-c/DSC05196.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Blusa acuarela color Azul, blanco y negro en degradacion, off shoulder , cuello con tira espaguetti redondo con escote en u, semi transparente en chifon.",Art_mtrl:""},
{Art_femn_cod:"Blc003",Art_femn_nmb:"Blusa casual",Art_femn_img:"img/collec/img-prnd-c/DSC05189.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Blusa crop top color Azul, blanco y amarillo, off shoulder cinético.",Art_mtrl:""},
{Art_femn_cod:"Blc004",Art_femn_nmb:"Blusa casual",Art_femn_img:"img/collec/img-prnd-c/DSC05164.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Blusa crop top color Azul, blanco y fuscia, off shoulder cinético de línea horizontal.",Art_mtrl:""},
{Art_femn_cod:"Blc005",Art_femn_nmb:"Blusa casual",Art_femn_img:"img/collec/img-prnd-c/DSC05148.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Blusa crop top color gris, off shoulder.",Art_mtrl:""},
{Art_femn_cod:"Blc006",Art_femn_nmb:"Blusa casual",Art_femn_img:"img/collec/img-prnd-c/DSC05125.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Blusa estampada colores rojo, azul y amarillo en chifon semitransparente, manga corta, cuello en U, off shoulder.",Art_mtrl:""}

 ]
$("#view-prnd-bll").html(plantilla_c(pndr_c));
        
break;

    }
}