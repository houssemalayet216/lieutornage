 $('#option_demande').on('change', function () {
             
                                 var categorie=$("#option_demande option:selected").val();
                                 
                                 if(categorie !==null)
                                 {
                                 $.ajax({

                         url:'/user/home/mission-demande/'+categorie,
                       type:'GET',
                       success:function (data,status,object)
                       {
                       if(data.success==true)
                       {
                          $('#missiondemande').html(data.output);
                        

                       }

                      },error:function()
                      {
                      $('#missiondemande').html("");
                      }

                        });

                                 }else{
                                  $('#missiondemande').html("");
                                 }


                                 });

 


$('#service_demande').on('change', function () {
             
                                 var service=$("#service_demande option:selected").val();
                                 
                                 if(service !==null)
                                 {
                                 $.ajax({

                         url:'/user/home/produit-demande/'+service,
                       type:'GET',
                       success:function (data,status,object)
                       {
                       if(data.success==true)
                       {
                          $('#listedesproduits').html(data.output);
                        

                       }

                      },error:function()
                      {
                      $('#listedesproduits').html("");
                      }

                        });

                                 }else{
                                  $('#listedesproduits').html("");
                                 }


                                 });



                    $('#option_demande').on('change', function () {
             
                                 var categorie=$("#option_demande option:selected").val();
                                 
                                 if(categorie !==null)
                                 {
                                 $.ajax({

                         url:'/user/home/deplacement-demande/'+categorie,
                       type:'GET',
                       success:function (data,status,object)
                       {
                       if(data.success==true)
                       {
                          $('#divdeplacement').html(data.output);
                        

                       }

                      },error:function()
                      {
                      $('#divdeplacement').html("");
                      }

                        });

                                 }else{
                                  $('#divdeplacement').html("");
                                 }


                                 });































$('select[multiple]').multiSelect();
 $('#datenaissance').datepicker({
            format: 'yyyy-mm-dd'
        });





$("#ville-membre").select2({
                
                   minimumInputLength: 3,
                placeholder:'Ville ',
                allowClear: true,
                 theme: "bootstrap"
              
            });



$("#edit_ville_membre").select2({
                
                   minimumInputLength: 3,
                placeholder:'Ville ',
                allowClear: true,
                 theme: "bootstrap"
              
            });

$('#edit_naissance_membre').datepicker({
            format: 'dd/mm/yyyy'
        });


  $('#service_demande').on('change', function () {
             
                                 var service=$("#service_demande option:selected").val();
                                 console.log(service);
                                 if(service !==null)
                                 {
                                 $.ajax({

                         url:'/user/home/service-option/'+service,
                       type:'GET',
                       success:function (data,status,object)
                       {
                       if(data.success==true)
                       {
                          $('#option_demande').html(data.output);
                        

                       }

                      },error:function()
                      {
                      $('#option_demande').html("");
                      }

                        });

                                 }else{
                                 	$('#option_demande').html("");
                                 }


                                 });








  $('#btn_membre').click(function(e){


 e.preventDefault();

       var membresv=$('#selectmembres option:selected').length;

             if(!membresv)
        {
         document.getElementById('data.membres').textContent='Ce champ ne doit pas etre vide ';       
        }


         $('#selectmembres').change(function(){
                  
                 if($.trim(document.getElementById('data.membres').textContent) !== "")

                                  {
                                    document.getElementById('data.membres').textContent="";
                                  }
                    
                                 });

                                 if(membresv)
                                 {

















                 
                    $('#btn_membre').prop('disabled',true);
                  $("#spin-add-annonce").addClass('fa fa-spinner fa-spin fa-register');
                   var formannonce = document.getElementById("add-annonce-form");

                 

                      $.ajax({
                       dataType:"json",
                       url:$("#add-annonce-form").attr('action'),
                       type:$("#add-annonce-form").attr('method'),
                        data:new FormData(formannonce),
                       contentType:false,
                       processData:false,
                       cache:false,
                       success:function (data,status,object)
                       {

                       
                       var message=data.message;
                       if(data.success==true)
                          {


                         
                              
                             
                               
                          
                               
                              $('#add-annonce-form')[0].reset();
                              $('#divdeplacement').html("");
                               $('#listedesproduits').html("");
                                 $('#missiondemande').html("");

              $('#list_membre').removeClass('active active_tab1');
           $('#list_membre').removeAttr('href data-toggle');
           $('#membre').removeClass('active');
           $('#list_membre').addClass('inactive_tab1');
           $('#list_demande').removeClass('inactive_tab1');
             $('#list_demande').addClass('active active_tab1');
             $('#list_demande').attr('href','#demande');
             $('#list_demande').attr('data-toggle','tab');
               $('#demande').addClass('active in');
               $('#missiondemande').html('');

                            toastr.success(message,'Success', {
                                      
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

                          else{

                             toastr.error(message,'Error', {
                                      
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




                            if(data.errors)
                            {
                             


                              $("#spin-add-annonce").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn_confirmation').prop('disabled',false); 

                            }

                          }
                                
                            $("#spin-add-annonce").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn_confirmation').prop('disabled',false); 
                        
                         
                          
                          
                          },
                          error:function (data,status,object)
                          {
                             console.log(data.message);

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




                         $("#spin-add-membre").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn-add-membre').prop('disabled',false); 
                          }








                       });
}

                  });



function editmembre(id=null)
{
  if(id)
  {






        $.ajax({
url:'/user/home/view-member-edit/'+id,
type:'GET',


success:function(data,status,object){
if(data.success==true)
{


 $('#id_edit_membre').val(data.member.id);
 console.log( $('#id_edit_membre').val());
$('#edit_nom_membre').val(data.member.nom);
 $('#edit_prenom_membre').val(data.member.prenom);  
 $('#edit_telephone_membre').val(data.member.telephone);
  $('#edit_naissance_membre').val(data.member.naissance);
 $('#edit_telephoneII_membre').val(data.member.telephoneII);
  $('#edit_fix_membre').val(data.member.fix);
 $('#edit_adresse_membre').val(data.member.adresse);
 $('#edit_cp_membre').val(data.member.cp);
var datenaissance=data.member.naissance;
  var relation=data.member.relation;
  var ville=data.member.ville;
  var civilite=data.member.civilite;
  console.log(data.member.datenaissance);
 
$('#edit_naissance_membre').datepicker({
            setDate:datenaissance
        });


$('#edit_relation_membre option').each(function() {
    if($(this).val() == relation) {
        $(this).prop("selected", true);
    }
});

$('#edit_ville_membre option').each(function() {
    if($(this).val() == ville) {
       $('#edit_ville_membre').val(ville).trigger('change');
    }
});



$('#edit_civilite_membre option').each(function() {
    if($(this).val() == civilite) {
        $(this).prop("selected", true);
    }
});







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



$('#close_modale_edit_membre').on("click",function(){
  $('#edit_membre_form')[0].reset();
   var erroremerray=['editcivilite','editnom','editprenom','editrelation','editville','editadresse','editcp','edittelephone'];

  erroreArray.forEach(function(error){

                               if($.trim(document.getElementById(error).textContent) !== "")

                                  {
                                    document.getElementById(error).textContent="";
                                  }

                              });



});





$('#close_up_edit_membre_modale').on("click",function(){
     $('#edit_membre_form')[0].reset();
   var erroremerray=['editcivilite','editnom','editprenom','editrelation','editville','editadresse','editcp','edittelephone'];

  erroreArray.forEach(function(error){

                               if($.trim(document.getElementById(error).textContent) !== "")

                                  {
                                    document.getElementById(error).textContent="";
                                  }

                              });
});

 var formannonceedit=document.getElementById("edit_membre_form");
$(document).on("submit", "#edit_membre_form", function(e){
 e.preventDefault();

$('#btn_edit_membre').prop('disabled',true);
$("#spin_edit_membre").addClass('fa fa-spinner fa-spin fa-register');

    var civilite=$('#edit_civilite_membre').val();
    var nom=$('#edit_nom_membre').val();
    var prenom=$('#edit_prenom_membre').val();
    var relation=$('#edit_relation_membre').val();
    var ville=$('#edit_ville_membre').val();
    var adresse= $('#edit_adresse_membre').val();
    var cp= $('#edit_cp_membre').val();
    var telephone= $('#edit_telephone_membre').val();
    
    var erroremerray=['editcivilite','editnom','editprenom','editrelation','editville','editadresse','editcp','edittelephone'];




    
                    if(civilite=="")
                  {
                       document.getElementById('editcivilite').textContent='Ce champ ne doit pas etre vide ';
                     $("#spin_edit_membre").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn_edit_membre').prop('disabled',false); 
                  }
                  

                    if(nom=="")
                  {
                       document.getElementById('editnom').textContent='Ce champ ne doit pas entre vide ';
                       $("#spin_edit_membre").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn_edit_membre').prop('disabled',false); 
                  }



                    if(prenom=="")
                  {
                       document.getElementById('editprenom').textContent='Ce champ ne doit pas entre vide ';
                      $("#spin_edit_membre").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn_edit_membre').prop('disabled',false); 
                  }
                  

                    if(relation=="")
                  {
                       document.getElementById('editrelation').textContent='Ce champ ne doit pas entre vide ';
                   $("#spin_edit_membre").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn_edit_membre').prop('disabled',false); 
                  }


                  if(ville=="")
                  {
                       document.getElementById('editville').textContent='Ce champ ne doit pas entre vide ';
                          $("#spin_edit_membre").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn_edit_membre').prop('disabled',false);  
                  }
                  

                    if(adresse=="")
                  {
                       document.getElementById('editadresse').textContent='Ce champ ne doit pas entre vide ';
                            $("#spin_edit_membre").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn_edit_membre').prop('disabled',false); 
                  }

                  
                 


                     if(cp=="")
                  {
                       document.getElementById('editcp').textContent='Ce champ ne doit pas entre vide ';
                          $("#spin_edit_membre").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn_edit_membre').prop('disabled',false); 
                  }

                     if(telephone=="")
                  {
                       document.getElementById('edittelephone').textContent='Ce champ ne doit pas entre vide ';
                          $("#spin_edit_membre").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn_edit_membre').prop('disabled',false); 
                  }






                        $('#edit_civilite_membre').change(function(){
                  
                 if($.trim(document.getElementById('editcivilite').textContent) !== "")

                                  {
                                    document.getElementById('editcivilite').textContent="";
                                  }
                    
                                 });


                                 $('#edit_nom_membre').change(function(){
                  
                 if($.trim(document.getElementById('editnom').textContent) !== "")

                                  {
                                    document.getElementById('editnom').textContent="";
                                  }
                    
                                 });


                    
           



                        $('#edit_prenom_membre').change(function(){
                  
                 if($.trim(document.getElementById('editprenom').textContent) !== "")

                                  {
                                    document.getElementById('editprenom').textContent="";
                                  }
                    
                                 });


                                 $('#edit_relation_membre').change(function(){
                  
                 if($.trim(document.getElementById('editrelation').textContent) !== "")

                                  {
                                    document.getElementById('editrelation').textContent="";
                                  }
                    
                                 });

                      

          



                        $('#edit_ville_membre').change(function(){
                  
                 if($.trim(document.getElementById('editville').textContent) !== "")

                                  {
                                    document.getElementById('editville').textContent="";
                                  }
                    
                                 });


                                 $('#edit_adresse_membre').change(function(){
                  
                 if($.trim(document.getElementById('editadresse').textContent) !== "")

                                  {
                                    document.getElementById('editadresse').textContent="";
                                  }
                    
                                 });

                     

                                          $('#edit_cp_membre').change(function(){
                  
                 if($.trim(document.getElementById('editcp').textContent) !== "")

                                  {
                                    document.getElementById('editcp').textContent="";
                                  }
                    
                                 });



                                          $('#edit_telephone_membre').change(function(){
                  
                 if($.trim(document.getElementById('edittelephone').textContent) !== "")

                                  {
                                    document.getElementById('edittelephone').textContent="";
                                  }
                    
                                 });

                      



var form=$(this);

if(civilite!=="" &&nom!=="" &&prenom!==""&&relation!==""&&ville!==""&&adresse!==""&&cp!==""&&telephone!=="")
{

$.ajax({
 dataType:"json",
url:$("#edit_membre_form").attr('action'),
type:$("#edit_membre_form").attr('method'),
data:new FormData(formannonceedit),
contentType:false,
processData:false,
cache:false,
success:function(data,status,object){
  var msg=data.message;
  if(data.success==true){
     
    erroremerray.forEach(function(error){
                                  if($.trim(document.getElementById(error).textContent) !== "")

                                  {
                                    document.getElementById(error).textContent="";
                                  }
                               });

      $("#spin_edit_membre").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn_edit_membre').prop('disabled',false);

       $('#myModalmembreedit').modal('hide');
      mem.ajax.reload(null,true);

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

 $("#spin_edit_membre").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn_edit_membre').prop('disabled',false);

  }
}



  $("#spin_edit_membre").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn_edit_membre').prop('disabled',false);


},
error:function()
{
  

toastr.error(' Une eureur se produit !','Error', {
                                      
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
});

}

//return false ;
});





