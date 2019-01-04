var Prnd =Backbone.Model.extend(
    {
        //valor por defecto del modelo
        prueba:"dddd",
        defaults:{
            Prnd_femn_cod:"1",
            Prndt_femn_nmb:"BLusas",
            Prnd_femn_img:"img/collec/img-art-c/DSC04823.jpg",
            Prnd_femn_dscp:"0",
            Prnd_femn_cst:"0",
            Prnd_fem_tll:"",
            Prnd_fem_clr:""
        },
        initialize: function(attr,optts){
        
        //cuando incializamos el modelo debemostener claro que si la instancia esta vacia dara error  
        this.set({Art_femn_cod:"016",Art_femn_nmb:"Vestido casual",Art_femn_img:"img/collec/img-prnd-c/DSC05029.jpg",Art_femn_cst:"0",Art_fem_tll:"",Art_fem_clr:"S-M-L",Art_femn_dscp:"Vestido corto blanco estampados de figuras azules, manga corta, cuello en u de superficie lisa,  fresco",Art_mtrl:""})
        },
        
        toString: function()
        {
            //metodo (funcion pra recupera valores)
            return "el nombre es"+ this.get("Prnd_femn_nmb");
        },
        
        onchange: function(model,options)
        {

        }
        
});