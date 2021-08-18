function refuserdemande(id){

if(id){
  $("#refuser_demande").unbind('click').bind('click',function(){
   
     $('#refuser_demande').prop('disabled',true);
    $("#spin_refuser_demande").addClass('fa fa-spinner fa-spin fa-register');

       $.ajax({
                       
                       url:'/user/home/refuser-demande/'+id,
                       type:'POST',
                       success:function (data,status,object)
                       {

                        var message=data.message;
                       if(data.success==true)
                          {

                           $("#spin_refuser_demande").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#refuser_demande').prop('disabled',false);

                           $('#ModalRefuser').modal('hide');
                             viewdemanderecu.ajax.reload(null,false);

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

                             

                          }else{
                          
                             
                           $("#spin_refuser_demande").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#refuser_demande').prop('disabled',false);

                           $('#ModalRefuser').modal('hide');

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




                          }

              

                       }



                       });



    });

    }
    }



















































function annulerdemande(id)
{


if(id){
  $("#annuler_demande").unbind('click').bind('click',function(){
   
     $('#annuler_demande').prop('disabled',true);
    $("#spin-annuler-demande").addClass('fa fa-spinner fa-spin fa-register');

       $.ajax({
                       
                       url:'/operation/annuler-demande/'+id,
                       type:'POST',
                       success:function (data,status,object)
                       {

                        var message=data.message;
                       if(data.success==true)
                          {

                           $("#spin-annuler-demande").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#annuler_demande').prop('disabled',false);

                           $('#Modalannulerdemande').modal('hide');
                            
                                viewdemandeclient.ajax.reload(null,true);
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

                              

                          }else{
                          
                             
                           $("#spin-annuler-demande").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#annuler_demande').prop('disabled',false);
                             $('#Modalannulerdemande').modal('hide');

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

                


                          }

              

                       }



                       });



    });

    }


}



function findemande(id)
{

  if(id)
  {
    
    $('#idpropositiondemande').val(id);   

  }

}


  $('#descriptioneureurdemanderecu').hide();
 
     $('input[type=radio][name=optcompletedemande]').change(function(){      
if($('input[name=optcompletedemande]:checked').val()=='eureur')
{

 $('#descriptioneureurdemanderecu').show();
}else{
  $('#descriptioneureurdemanderecu').hide();
}

});







  $('#fin_mission_demande').click(function(e){
                  e.preventDefault();
                    $('#fin_mission_demande').prop('disabled',true);
                  $("#spin_fin_mission_demande").addClass('fa fa-spinner fa-spin fa-register');


                    var form_cloture  = document.getElementById("form_cloture_demande");








                      $.ajax({
                       dataType:"json",
                       url:$("#form_cloture_demande").attr('action'),
                       type:$("#form_cloture_demande").attr('method'),
                        data:new FormData(form_cloture),
                       contentType:false,
                       processData:false,
                       cache:false,
                       success:function (data,status,object)
                       {

                      
                       var message=data.message;
                       if(data.success==true)
                          {


                         
                             
                             
                               
                            $('#Modalfindemande').modal('hide');
                                viewdemanderecu.ajax.reload(null,true);
                              $('#form_cloture_demande')[0].reset();

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

                          
                              $("#spin_fin_mission_demande").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#fin_mission_demande').prop('disabled',false);

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



                             $("#spin_fin_mission_demande").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#fin_mission_demande').prop('disabled',false);
                            

                          }
                                

                        
                         $("#spin_fin_mission_demande").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#fin_mission_demande').prop('disabled',false);
                          
                          
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




                          $("#spin_fin_mission_demande").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#fin_mission_demande').prop('disabled',false); 
                          }


                       });


                




                  });




function  viewdemande(id=null)
{
	  if(id)
  {






        $.ajax({
url:'/user/home/view-demande-client/'+id,
type:'GET',


success:function(data,status,object){
if(data.success==true)
{

$('#divviewdemande').html(data.output);


}else{





                     

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






function  voiragent(id=null)
{
    if(id)
  {






        $.ajax({
url:'/user/home/view-demande-agent/'+id,
type:'GET',


success:function(data,status,object){
if(data.success==true)
{

$('#divviewdemanderecus').html(data.output);


}else{





                     

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

function test()
{
  alert('test');
}
function proposerprixvoirfunction()
{





  $(document).on("submit", "#formproposerprix", function(e){


                  e.preventDefault();

                   $('#Proposervoir').prop('disabled',true);
                  $("#spin-proposer-prix").addClass('fa fa-spinner fa-spin fa-register');

                    var prix=$('#prixproposervoir').val();
    var tarification=$('#typetarificationdemande').val();


           if(prix=="")
                  {
                       document.getElementById('eureurprixproposervoir').textContent='Ce champ ne doit pas etre vide ';
                    
                              $("#spin-proposer-prix").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#Proposervoir').prop('disabled',false); 
                  }
                  

                    if(tarification=="")
                  {
                       document.getElementById('eureurtypetarification').textContent='Ce champ ne doit pas entre vide ';
                    
                              $("#spin-proposer-prix").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#Proposervoir').prop('disabled',false);
                  }



                   

                       $('#prixproposervoir').change(function(){
                  
                 if($.trim(document.getElementById('eureurprixproposervoir').textContent) !== "")

                                  {
                                    document.getElementById('eureurprixproposervoir').textContent="";
                                  }
                    
                                 });


                                 $('#typetarificationdemande').change(function(){
                  
                 if($.trim(document.getElementById('eureurtypetarification').textContent) !== "")

                                  {
                                    document.getElementById('eureurtypetarification').textContent="";
                                  }
                    
                                 }); 









                   


                    var form_proposer_voir  = document.getElementById("formproposerprix");




if(prix!==""&& tarification !=="" )
{


                      $.ajax({
                       dataType:"json",
                       url:$("#formproposerprix").attr('action'),
                       type:$("#formproposerprix").attr('method'),
                        data:new FormData(form_proposer_voir),
                       contentType:false,
                       processData:false,
                       cache:false,
                       success:function (data,status,object)
                       {

                      
                       var message=data.message;
                       if(data.success==true)
                          {


                         
                             
                             
                               
                            $('#Modalsuividemanderecu').modal('hide');
                               
                              $('#formproposerprix')[0].reset();
                                 viewdemanderecu.ajax.reload(null,true);
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

                          
                              $("#spin-proposer-prix").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#Proposervoir').prop('disabled',false);

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



                            
                              $("#spin-proposer-prix").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#Proposervoir').prop('disabled',false);
                            

                          }
                                

                        
                         
                              $("#spin-proposer-prix").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#Proposervoir').prop('disabled',false);
                          
                          
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




                          
                              $("#spin-proposer-prix").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#Proposervoir').prop('disabled',false); 
                          }


                       });


                


}

                  });





}


function proposerprix(id)
{


$('#idproposerprix').val(id);

$(document).on("submit", "#proposerprixform", function(e){


                  e.preventDefault();

                   $('#Proposer').prop('disabled',true);
                  $("#spin-proposer-prix-modal").addClass('fa fa-spinner fa-spin fa-register');

                    var prix=$('#prixproposer').val();
    var tarification=$('#typetarificationprix').val();


           if(prix=="")
                  {
                       document.getElementById('eureurproposer').textContent='Ce champ ne doit pas etre vide ';
                    
                              $("#spin-proposer-prix-modal").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#Proposer').prop('disabled',false); 
                  }
                  

                    if(tarification=="")
                  {
                       document.getElementById('eureurtypetarificationprix').textContent='Ce champ ne doit pas entre vide ';
                    
                              $("#spin-proposer-prix-modal").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#Proposer').prop('disabled',false);
                  }



                   

                       $('#prixproposer').change(function(){
                  
                 if($.trim(document.getElementById('eureurproposer').textContent) !== "")

                                  {
                                    document.getElementById('eureurproposer').textContent="";
                                  }
                    
                                 });


                                 $('#typetarificationprix').change(function(){
                  
                 if($.trim(document.getElementById('eureurtypetarificationprix').textContent) !== "")

                                  {
                                    document.getElementById('eureurtypetarificationprix').textContent="";
                                  }
                    
                                 }); 









                   


                    var form_proposer_voir  = document.getElementById("proposerprixform");




if(prix!==""&& tarification !=="" )
{


                      $.ajax({
                       dataType:"json",
                       url:$("#proposerprixform").attr('action'),
                       type:$("#proposerprixform").attr('method'),
                        data:new FormData(form_proposer_voir),
                       contentType:false,
                       processData:false,
                       cache:false,
                       success:function (data,status,object)
                       {

                      
                       var message=data.message;
                       if(data.success==true)
                          {


                         
                             
                             
                               
                            $('#Modalproposerprix').modal('hide');
                               
                              $('#proposerprixform')[0].reset();
                                 viewdemanderecu.ajax.reload(null,true);
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

                          
                              $("#spin-proposer-prix-modal").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#Proposer').prop('disabled',false);

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



                            
                              $("#spin-proposer-prix-modal").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#Proposer').prop('disabled',false);
                            

                          }
                                

                        
                         
                              $("#spin-proposer-prix-modal").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#Proposer').prop('disabled',false);
                          
                          
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




                          
                              $("#spin-proposer-prix-modal").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#Proposer').prop('disabled',false); 
                          }


                       });


                


}

                  });



















































}