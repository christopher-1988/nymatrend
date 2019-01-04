var pndrView = Backbone.View.extend(
  {    
    initialize:function()
    {
        this.render()
    },
    render: function(eventname)
    {
        
       var source=$("#tmpl-vstd").html();
       var plantilla=Handlebars.compile(source);
       var html= plantilla(this.collection.toJSON());
       this.$el.html(html);
      
    }
  }
);



