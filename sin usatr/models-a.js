var Articulo_coll=Backbone.Model.extend({
    
    //--------------------model----de-----prendas-----------------------------------
    defaults:{
        //---------------------prendas--por defacult---------------------
        id:"0",
        nombre:"Vc001",
        descripcion:"Sin data",
        material:"Sin data",
        imagen:"img/collec/img-art-c/DSC04214.jpg",
        talla:"S,M,L",
        costo:0
    },
    
    initialize: function(attr)
    {
        //cuando incializamos el modelo debemostener claro que si la instancia esta vacia dara error  
        console.log("el nombre es"+attr.nombre)
    },
    toString: function()
    {
        //metodo (funcion pra recupera valores)
        return "el nombre es"+ this.get("nombre");
    },
    onchange: function(model,options)
    {
        
    },
    
    //metodo para agregar articulos
    //Para obtener los atributos individuales de cada modelo podemos usar el método .get():
    addArticulos:function(new_nmb,new_dsp,new_mt,new_img,new_tll)
    {
        //Obtenemos los articulos del modelo, luego se lo asignamos a unas variables que creamos
        var Art_nombre = this.get('nombre');
        var Art_descrip = this.get('descripcion');
        var Art_material = this.get('material');
        var Art_img = this.get('imagen'); 
        var array_tallas = this.get('talla');
        
        //adicionamos los valores que recibimos por los parametros de la funcion addarticulos
        //la funcion PUSH agrega valores a un array al final del array
        Art_nombre.push('new_nmb');
        Art_descrip.push('new_dsp');
        Art_material.push('new_mt');
        Art_img.push('new_img'); 
        array_tallas.push('new_tll');

         // Redefinimos el atributo lenguajes
         this.set({lenguajes:array_lenguajes});
        //Podemos definir atributos aun después de creado el modelo a través del método .set():
        this.set({nombre:Art_nombre});
        this.set({descripcion:Art_descrip});
        this.set({material:Art_material});
        this.set({imagen:Art_img});
        this.set({talla:array_tallas});
    }
  
     
})