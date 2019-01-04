function Quadcore(codcol_n)
 {
//---------------------------------seo carga dinamica por parametro-------------------------------------------------
//confirmo si los valores fueron resivido por la funcion
if(codcol_n!="")
{ 
   nuevacol(codcol_n); 
}//fin del condicional  
     
    function nuevacol(codcol_n){
            $.ajax({
					// la URL para la petición
					url :'backend/modulos/modulo_coll.php', 
					// la información a enviar,especifica si será una petición POST o GET
					type :'POST',
                    //parametro a pasar
                    data : {
                            op:codcol_n
                           },
                    //activar sincrono o asincrono
					async:true,			 
					// el tipo de información que se espera de respuesta
					dataType :'json',
					// código a ejecutar si la petición es satisfactoria;
					// la respuesta es pasada como argumento a la función
					success : function(data)
                    {	
                      
                        
                        if($.isEmptyObject(data)){
                            
                        }else{
                            let origen_a=$("#tmp-coll").html();
                            let plantilla_a=Handlebars.compile(origen_a); 
                            $("#view-coll").html(plantilla_a(data))
                            let cod_col=$("#id_col").attr("data-id")
                            
                                //al ejecutar esta funcion capto el valor de la colesccion
                     for (let coll of data)
                     {
                      captura(captura(cod_col);
                              console.log("hola")
                     }
                        }

					},				 
					// código a ejecutar si la petición falla;
					// son pasados como argumentos a la función
					// el objeto jqXHR (extensión de XMLHttpRequest), un texto con el estatus
					// de la petición y un texto con la descripción del error que haya dado el servidor
					error : function(jqXHR, status, error) 
					{
						alert("Error por favor uno:( !!!!")
					     	 
					},		 
						// código a ejecutar sin importar si la petición falló o no
					complete : function(jqXHR, status)
					{

					}					
				});
          }

                  
     function captura(cod)
     {    
       if(cod)
        {
            //var x = document.getElementById("id_col"); var align = x.getAttribute("data-id");
            let cod_r=cod.substr(3,3);
            let cod_num = parseInt(cod_r);
            let op="viewon";
            console.log(cod)
            if(cod_num!="" && _.isNumber(cod_num))
            {
             
                $.ajax({
					// la URL para la petición
					url :'backend/modulos/modulo_garments.php', 
					// la información a enviar,especifica si será una petición POST o GET
					type :'POST',
                    //parametro a pasar
                    data : {
                            op:op,
                            cod_nm:cod_num
                           },
                    //activar sincrono o asincrono
					async:true,			 
					// el tipo de información que se espera de respuesta
					dataType :'json',
					// código a ejecutar si la petición es satisfactoria;
					// la respuesta es pasada como argumento a la función
					success : function(data)
                    {	
                       console.log(data)
                       let origen_a=$("#tmpl-prnd").html();
                       let plantilla_a=Handlebars.compile(origen_a); 
				       $("#view-prnd").html(plantilla_a(data))
					},				 
					// código a ejecutar si la petición falla;
					// son pasados como argumentos a la función
					// el objeto jqXHR (extensión de XMLHttpRequest), un texto con el estatus
					// de la petición y un texto con la descripción del error que haya dado el servidor
					error : function(jqXHR, status, error) 
					{
						alert("Error por favor dos:( !!!!")
					     	 
					},		 
						// código a ejecutar sin importar si la petición falló o no
					complete : function(jqXHR, status)
					{

					}					
				});
                
            }else{
                 
            } 
        }
            
    }            
         
 }

 //  function isEmptyJSON(obj) 
                  //{
                    //    for(var i in obj) { return false; }
                      //  return true;
                //  }