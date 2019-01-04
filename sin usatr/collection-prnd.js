var prendas;
var PrndCollecion= Backbone.Collection.extend(
    {
        model:Prnd
    }
)

prendas= new PrndCollecion(
[{ Prnd_femn_cod:"1",Prndt_femn_nmb:"1",Prnd_femn_img:"1",Prnd_femn_dscp:"1",Prnd_femn_cst:"1",Prnd_fem_tll:"1",Prnd_fem_clr:"1"
 },
 {
Prnd_femn_cod:"2",Prndt_femn_nmb:"2",Prnd_femn_img:"2",Prnd_femn_dscp:"2",Prnd_femn_cst:"2",Prnd_fem_tll:"2",Prnd_fem_clr:"2"
 },
 {
Prnd_femn_cod:"3",Prndt_femn_nmb:"3",Prnd_femn_img:"3",Prnd_femn_dscp:"3",Prnd_femn_cst:"3",Prnd_fem_tll:"3",Prnd_fem_clr:"3"
 }]
)
console.log(prendas.toJSON());