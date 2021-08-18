  $('#option-offre').on('change', function () {
             
                                 var categorie=$("#option-offre option:selected").val();
                                 
                                 if(categorie !==null)
                                 {
                                 $.ajax({

                         url:'/user/home/mission-option/'+categorie,
                       type:'GET',
                       success:function (data,status,object)
                       {
                       if(data.success==true)
                       {
                          $('#divmission').html(data.output);
                        

                       }

                      },error:function()
                      {
                      $('#divmission').html("");
                      }

                        });

                                 }else{
                                  $('#divmission').html("");
                                 }


                                 });

 

 







function editoffre(id=null)
{
  $('#divcompetence').html('');
	if(id)
	{






        $.ajax({
url:'/user/home/view-offre/'+id,
type:'GET',


success:function(data,status,object){
if(data.success==true)
{


 $('#id_offre').val(data.annance.id);
$('#edit-titre-offre').val(data.annance.titre);
 $('#edit-description-offre').val(data.annance.description);  
 $('#edit-prix-offre').val(data.annance.prix);
 $('#edit-option-offre').val(data.annance.option);

 

 

   var typetarification=data.annance.typetarif;
 
   var zone=data.annance.zone;

$('#divcompetence').html(data.annance.htmlcompetence);

$('#edit_typetarification option').each(function() {
    if($(this).val() == typetarification) {
        $(this).prop("selected", true);
    }
});



if(data.annance.afficher==true)
{
$('#affichercord-offre-edit').attr('checked', true);
}







$('#edit-zone-offre option').each(function() {
    if($(this).val() == zone) {
        $('#edit-zone-offre').val(zone).trigger('change');
    }
});



   $('#edit-autre-offre').val(data.annance.autres);







}	
else{





                     

                             toastr.error(data.message,'Error', {
                                      
                                      "closeButton": false,
                                       "debug": false,
                                        "newestOnTop": false,
                                        "progressBar": true,
                                        "positionClass": "toast-top-right",
                                         "preventDuplicates": false,
                                         "onclick": null,
                                          "showDuration": "300",
                                          "hideDuration": "1000",
                                           "timeOut": "5000",
                                           "extendedTimeOut": "1000",
                                           "showEasing": "swing",
                                           "hideEasing": "linear",
                                           "showMethod": "fadeIn",
                                        "hideMethod": "fadeOut"
                              


                               });






}
}


	});	
}
}


function updateoffre()
{
 
 var formoffreedit=document.getElementById("form-edit-offre");

                         
         

   




$(document).on("submit", "#form-edit-offre", function(e){
 e.preventDefault();

$('#btn-edit-offre').prop('disabled',true);
$("#spin-edit-offre").addClass('fa fa-spinner fa-spin fa-register');

    var titre=$('#edit-titre-offre').val();
    var description=$('#edit-description-offre').val();
    var zone=$('#edit-zone-offre').val();
 
  
     var erroreArray=['titre-offre-edit','description-offre-edit','zone-offre-edit'];
    





    
                    if(titre=="")
                  {
                       document.getElementById('titre-offre-edit').textContent='Ce champ ne doit pas etre vide ';
                     $("#spin-edit-offre").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn-edit-offre').prop('disabled',false); 
                  }
                  

                    if(description=="")
                  {
                       document.getElementById('description-offre-edit').textContent='Ce champ ne doit pas entre vide ';
                     $("#spin-edit-offre").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn-edit-offre').prop('disabled',false); 
                  }


 















                   
                  

                    if(zone=="")
                  {
                       document.getElementById('zone-offre-edit').textContent='Ce champ ne doit pas entre vide ';
                     $("#spin-edit-offre").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn-edit-offre').prop('disabled',false); 
                  }


              
                  

                








                        $('#edit-titre-offre').change(function(){
                  
                 if($.trim(document.getElementById('titre-offre-edit').textContent) !== "")

                                  {
                                    document.getElementById('titre-offre-edit').textContent="";
                                  }
                    
                                 });


                                 $('#edit-description-offre').change(function(){
                  
                 if($.trim(document.getElementById('description-offre-edit').textContent) !== "")

                                  {
                                    document.getElementById('description-offre-edit').textContent="";
                                  }
                    
                                 });


                    
           



                    


                                 $('#edit-zone-offre').change(function(){
                  
                 if($.trim(document.getElementById('zone-offre-edit').textContent) !== "")

                                  {
                                    document.getElementById('zone-offre-edit').textContent="";
                                  }
                    
                                 });

                      

          



                    





var form=$(this);

if(titre!=="" &&description!=="" &&zone!=="")
{

$.ajax({
 dataType:"json",
url:$("#form-edit-offre").attr('action'),
type:$("#form-edit-offre").attr('method'),
data:new FormData(formoffreedit),
contentType:false,
processData:false,
cache:false,
success:function(data,status,object){
  var msg=data.message;
  if(data.success==true){
     
    erroreArray.forEach(function(error){
                                  if($.trim(document.getElementById(error).textContent) !== "")

                                  {
                                    document.getElementById(error).textContent="";
                                  }
                               });

       $("#spin-edit-offre").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn-edit-offre').prop('disabled',false);

       $('#myModalEditoffre').modal('hide');
       $('#divcompetence').html('');
      offre.ajax.reload(null,true);

       toastr.success(msg,'Success', {
                                      
                                      "closeButton": false,
                                       "debug": false,
                                        "newestOnTop": false,
                                        "progressBar": true,
                                        "maxOpened": 0,
                                        "positionClass": "toast-top-right",
                                         "preventDuplicates": false,
                                         "preventOpenDuplicates": false,
                                         "onclick": null,
                                          "showDuration": "300",
                                          "hideDuration": "1000",
                                           "timeOut": "5000",
                                           "extendedTimeOut": "1000",
                                           "showEasing": "swing",
                                           "hideEasing": "linear",
                                           "showMethod": "fadeIn",
                                        "hideMethod": "fadeOut"
                              


                               });





   
   
     
  }else{



              if(data.errors)
                            {
                              erroreArray.forEach(function(error){

                               if($.trim(document.getElementById(error).textContent) !== "")

                                  {
                                    document.getElementById(error).textContent="";
                                  }

                              });

                              data.errors.forEach(function(error)
                              {

                               document.getElementById(error.elementId).textContent=error.errorMessage;
                              });









    toastr.error(msg,'Error', {
                                      
                                      "closeButton": false,
                                       "debug": false,
                                        "newestOnTop": false,
                                        "progressBar": true,
                                        "positionClass": "toast-top-right",
                                         "preventDuplicates": false,
                                         "onclick": null,
                                          "showDuration": "300",
                                          "hideDuration": "1000",
                                           "timeOut": "5000",
                                           "extendedTimeOut": "1000",
                                           "showEasing": "swing",
                                           "hideEasing": "linear",
                                           "showMethod": "fadeIn",
                                        "hideMethod": "fadeOut"
                              


                               });

  $("#spin-edit-offre").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn-edit-offre').prop('disabled',false);

  }
}



    $("#spin-edit-offre").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn-edit-offre').prop('disabled',false);


},
error:function()
{
    $("#spin-edit-offre").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn-edit-offre').prop('disabled',false); 
}
});

}

//return false ;
});



}




$('#close-modale-edit').on("click",function(){
  $('#add-offre-form')[0].reset();
   var erroreArray=['titre-offre-edit','description-offre-edit','zone-offre-edit','option-offre-edit','horaire-offre-edit'];

  erroreArray.forEach(function(error){

                               if($.trim(document.getElementById(error).textContent) !== "")

                                  {
                                    document.getElementById(error).textContent="";
                                  }

                              });

$('#divcompetence').html('');

});





$('#close-up-edit-modale').on("click",function(){

    var erroreArray=['titre-offre-edit','description-offre-edit','zone-offre-edit','option-offre-edit','horaire-offre-edit'];

  erroreArray.forEach(function(error){

                               if($.trim(document.getElementById(error).textContent) !== "")

                                  {
                                    document.getElementById(error).textContent="";
                                  }

                              });
  $('#divcompetence').html('');
});