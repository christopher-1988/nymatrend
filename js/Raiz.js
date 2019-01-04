$(document).on("ready",function(){
    let origen=$("#tmpl-tlf").html();
    let plantilla=Handlebars.compile(origen); 
    let content={st_tlf:"+58 426-6557670",st_correo:"Nymastrend@gmail.com"};
    $("#view-tlf").html(plantilla(content))
    
});

