$(document).on("ready",function(){
  
    //nombre de la coleccion
    
    let origen=$("#tmp-name-col").html();
    let plantilla=Handlebars.compile(origen);
    let content={namecol:"Placer a la Moda"}
    $("#view-name-col").html(plantilla(content))
    
    
    //prendas dentros de la coleccion
    
    let origen_a=$("#tmpl-prendas").html();
    let plantilla_a=Handlebars.compile(origen_a);
    
    let prnd_c=[
    {nombre_prnd:"Vestidos",img_prnd:'img/collec/img-prnd-c/DSC04212.jpg',enl_prnd:"coleccion-outfit-vestidos.html",alt_prnd:"Nymas Trend Vestidos"},
    {nombre_prnd:"Blusas",img_prnd:'img/collec/img-prnd-c/DSC04240.jpg',enl_prnd:"coleccion-outfit-blusas.html",alt_prnd:"Nymas Trend Vestidos"},
    {nombre_prnd:"Bragas",img_prnd:'img/collec/img-prnd-c/DSC04823.jpg',enl_prnd:"coleccion-outfit-bragas.html",alt_prnd:"Nymas Trend Vestidos"},
                  ]
    $("#view-prnd").html(plantilla_a(prnd_c))
  
    
    
    
    
})