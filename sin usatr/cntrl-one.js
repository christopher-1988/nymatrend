$(document).on("ready",function(){
   catalg(); 
});

function catalg()
{
    let obj={}; //n defino como let la varible para que funcione a nivel local
    //con esta linea me encargo de que el obejto pueda resivir y enviar eventos
    _.extend(obj,Backbone.Events);
    //el obejto puedo aceder a los metodos
    obj.on("alerta",function(msg){
     
    });
    //para lanzar el evento uso el metodo trigger, el primer parametro es el nomre del evento, el segundo el parametro que se va a pasar
    
    
    //trabajando events de jquery
 
    
    $("#event_capt").on("click","a",function(e){
        e.preventDefault();//evito que la etiqueta a funciones con los comportamientos por defecto
        obj.trigger("alerta","hola");
    })
}
