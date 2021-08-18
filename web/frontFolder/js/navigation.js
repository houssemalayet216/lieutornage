$( document ).ready(function() {
  
$('#suivant1').click(function(){


$('#section_1').removeClass('stepshow');
$('#section_1').addClass('stephide');
$('#section_2').removeClass('stephide');	
$('#section_2').addClass('stepshow');
window.scrollTo(0, 0); 
});

$('.lieux_comun').click(function(){
 if($.trim(document.getElementById('data.typeLieux').textContent) !== "")

                                  {
                                    document.getElementById('data.typeLieux').textContent="";
                                  }
});

$('#suivant2').click(function(){

var type=$('#type-annonce').val();
var ville=$('#ville-annonce').val();
var adresse=$('#adresse-annonce').val();
var cp=$('#cp-annonce').val();
var surfaceTotale=$('#surfacetotal-annonce').val();
var surfacePiece=$('#surfacepiece-annonce').val();
var nbrpiece=$('#nbrpiece-annonce').val();
var nbrniveau=$('#nbrniveau-annonce').val();

var habitation=true;

 nbCaseCochees =   $("[name='cat[]']:checked").length ;

 if(nbCaseCochees< 1)
 {

 	habitation=false;
 	 document.getElementById('data.typeLieux').textContent="Vous devez choisir au moins un type de lieux ";
 }


console.log(habitation);

    
                  

                    if(type=="")
                  {
                       document.getElementById('data.type').textContent='Ce champ ne doit pas  vide ';
                    
                  }


                  


                 
                  

                    if(ville=="")
                  {
                       document.getElementById('data.adresse').textContent='Ce champ ne doit pas entre vide ';
                    
                  }


                  if(adresse=="")
                  {
                       document.getElementById('data.ville').textContent='Ce champ ne doit pas entre vide ';
                    
                  }
                  

                   if(cp=="")
                  {
                       document.getElementById('data.cp').textContent='Ce champ ne doit pas entre vide ';
                    
                  }


                   if(surfaceTotale=="")
                  {
                       document.getElementById('data.surfaceTotale').textContent='Ce champ ne doit pas entre vide ';
                    
                  }
                  


                   if(surfacePiece=="")
                  {
                       document.getElementById('data.surfacePiece').textContent='Ce champ ne doit pas entre vide ';
                    
                  }
                  


                   if(nbrpiece=="")
                  {
                       document.getElementById('data.nbrPiece').textContent='Ce champ ne doit pas entre vide ';
                    
                  }
                  


                   if(nbrniveau=="")
                  {
                       document.getElementById('data.nbrNiveau').textContent='Ce champ ne doit pas entre vide ';
                    
                  }
                  


                








                        $('#type-annonce').change(function(){
                  
                 if($.trim(document.getElementById('data.type').textContent) !== "")

                                  {
                                    document.getElementById('data.type').textContent="";
                                  }
                    
                                 });


                                 $('#ville-annonce').change(function(){
                  
                 if($.trim(document.getElementById('data.ville').textContent) !== "")

                                  {
                                    document.getElementById('data.ville').textContent="";
                                  }
                    
                                 });


                    
           



                     


                                 $('#adresse-annonce').change(function(){
                  
                 if($.trim(document.getElementById('data.adresse').textContent) !== "")

                                  {
                                    document.getElementById('data.adresse').textContent="";
                                  }
                    
                                 });

                      

          



                        $('#cp-annonce').change(function(){
                  
                 if($.trim(document.getElementById('data.cp').textContent) !== "")

                                  {
                                    document.getElementById('data.cp').textContent="";
                                  }
                    
                                 });





                     $('#surfacetotal-annonce').change(function(){
                  
                 if($.trim(document.getElementById('data.surfaceTotale').textContent) !== "")

                                  {
                                    document.getElementById('data.surfaceTotale').textContent="";
                                  }
                    
                                 });


                      $('#surfacepiece-annonce').change(function(){
                  
                 if($.trim(document.getElementById('data.surfacePiece').textContent) !== "")

                                  {
                                    document.getElementById('data.surfacePiece').textContent="";
                                  }
                    
                                 });


                       $('#nbrpiece-annonce').change(function(){
                  
                 if($.trim(document.getElementById('data.nbrPiece').textContent) !== "")

                                  {
                                    document.getElementById('data.nbrPiece').textContent="";
                                  }
                    
                                 });


                        $('#nbrniveau-annonce').change(function(){
                  
                 if($.trim(document.getElementById('data.nbrNiveau').textContent) !== "")

                                  {
                                    document.getElementById('data.nbrNiveau').textContent="";
                                  }
                    
                                 });



























if(habitation==true&&type !=null&&ville !=''&&adresse!=''&&cp!=''&&surfaceTotale!=null&&surfacePiece!=null&&nbrpiece!=null&&nbrniveau!='')
{

$('#section_2').removeClass('stepshow');
$('#section_2').addClass('stephide');
$('#section_3').removeClass('stephide');	
$('#section_3').addClass('stepshow');
window.scrollTo(0, 0);


}
 


});

$('#suivant3').click(function(){

var titre=$('#titre-annonce').val();
var description=$('#description-annonce').val();
var typetarification=$('#typetarification-annonce').val();
var tarif=$('#tarif-annonce').val();




                    if(titre=="")
                  {
                       document.getElementById('data.titre').textContent='Ce champ ne doit pas  vide ';
                    
                  }


                  


                 
                  

                    if(description=="")
                  {
                       document.getElementById('data.description').textContent='Ce champ ne doit pas entre vide ';
                    
                  }


                  if(typetarification=="")
                  {
                       document.getElementById('data.typeTarification').textContent='Ce champ ne doit pas entre vide ';
                    
                  }
                  

                   if(tarif=="")
                  {
                       document.getElementById('data.tarif').textContent='Ce champ ne doit pas entre vide ';
                    
                  }





       $('#titre-annonce').change(function(){
                  
                 if($.trim(document.getElementById('data.titre').textContent) !== "")

                                  {
                                    document.getElementById('data.titre').textContent="";
                                  }
                    
                                 });


                                 $('#description-annonce').change(function(){
                  
                 if($.trim(document.getElementById('data.description').textContent) !== "")

                                  {
                                    document.getElementById('data.description').textContent="";
                                  }
                    
                                 });


                    
           



                     


                                 $('#typetarification-annonce').change(function(){
                  
                 if($.trim(document.getElementById('data.typeTarification').textContent) !== "")

                                  {
                                    document.getElementById('data.typeTarification').textContent="";
                                  }
                    
                                 });

                      

          



                        $('#tarif-annonce').change(function(){
                  
                 if($.trim(document.getElementById('data.tarif').textContent) !== "")

                                  {
                                    document.getElementById('data.tarif').textContent="";
                                  }
                    
                                 });








if(titre !='' && description !=''&& tarif !='' && typetarification != null )
{
$('#section_3').removeClass('stepshow');
$('#section_3').addClass('stephide');
$('#section_4').removeClass('stephide');	
$('#section_4').addClass('stepshow');
window.scrollTo(0, 0); 

}



});



$('#valider').click(function(){

$('#section_4').removeClass('stepshow');
$('#section_4').addClass('stephide');
$('#section_final').removeClass('stephide');	
$('#section_final').addClass('stepshow');
window.scrollTo(0, 0); 


});




$('#precedent3').click(function(){

$('#section_4').removeClass('stepshow');
$('#section_4').addClass('stephide');
$('#section_3').removeClass('stephide');	
$('#section_3').addClass('stepshow');
window.scrollTo(0, 0); 
});

$('#precedent2').click(function(){

$('#section_3').removeClass('stepshow');
$('#section_3').addClass('stephide');
$('#section_2').removeClass('stephide');	
$('#section_2').addClass('stepshow');
window.scrollTo(0, 0); 
});

$('#precedent1').click(function(){

$('#section_2').removeClass('stepshow');
$('#section_2').addClass('stephide');
$('#section_1').removeClass('stephide');	
$('#section_1').addClass('stepshow');
window.scrollTo(0, 0); 

});








});