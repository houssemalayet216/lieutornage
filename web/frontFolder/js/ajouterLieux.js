

$( document ).ready(function() {


 $('#btn-ajouter-lieux').click(function(e){
                  e.preventDefault();
                    $('#btn-ajouter-lieux').prop('disabled',true);
                  $("#spin-ajouter-lieux").addClass('fa fa-spinner fa-spin fa-register');


                  var formAnnonce=document.getElementById("ajouter-lieux-form");
var photos=$('#file-1')[0].files.length;
var max=false;
 var min= false;

 if(photos<8)
                  {
                       document.getElementById('data.image').textContent='Vous devez publier ou moins 8 photos  ';
                        var min= true;
                         $('#btn-ajouter-lieux').prop('disabled',false);
                  $("#spin-ajouter-lieux").removeClass('fa fa-spinner fa-spin fa-register');

                  }

                  if(photos >10 )
                  {

                    document.getElementById('data.image').textContent='Vous devez publier maximum 10 photos  ';
                        var min= true;
                         $('#btn-ajouter-lieux').prop('disabled',false);
                  $("#spin-ajouter-lieux").removeClass('fa fa-spinner fa-spin fa-register');
                  }




  $('#file-1').change(function(){
                  
                 if($.trim(document.getElementById('data.image').textContent) !== "")

                                  {
                                    document.getElementById('data.image').textContent="";
                                  }
                    
                                 });
 
 





if(min==false &&max==false)
{





                      $.ajax({
                       dataType:"json",
                       url:$("#ajouter-lieux-form").attr('action'),
                       type:$("#ajouter-lieux-form").attr('method'),
                        data:new FormData(formAnnonce),
                       contentType:false,
                       processData:false,
                       cache:false,
                       success:function (data,status,object)
                       {

                       
                       var message=data.message;
                       if(data.success==true)
                          {


                         
                              /* errorOffreArray.forEach(function(error){
                                  if($.trim(document.getElementById(error).textContent) !== "")

                                  {
                                    document.getElementById(error).textContent="";
                                  }
                               });*/
                             
                         
                              $('#ajouter-lieux-form')[0].reset();
                                

                            $('#section_4').removeClass('stepshow');
                            $('#section_4').addClass('stephide');
                            $('#section_final').removeClass('stephide');  
                            $('#section_final').addClass('stepshow');
                             window.scrollTo(0, 0); 

                             $("#success_message").text(message);

                         

                                 $("#spin-ajouter-lieux").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn-ajouter-lieux').prop('disabled',false); 
                            

                          }

                          else{

                             
                              
                            $('#section_4').removeClass('stepshow');
                            $('#section_4').addClass('stephide');
                            $('#section_2').removeClass('stephide');  
                            $('#section_2').addClass('stepshow');
                             window.scrollTo(0, 0);

                             $("#message_eureur").html('<div class="alert alert-danger">'+ message +'</div>');

                             


                                      $("#spin-ajouter-lieux").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn-ajouter-lieux').prop('disabled',false); 


                            if(data.errors)
                            {

                               $("#spin-ajouter-lieux").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn-ajouter-lieux').prop('disabled',false); 
                             
                          

                           /*   data.errors.forEach(function(error)
                              {

                               document.getElementById(error.elementId).textContent=error.errorMessage;
                              });*/


                              $("#spin-ajouter-lieux").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn-ajouter-lieux').prop('disabled',false); 

                            }

                          }
                                

                        
                        
                          
                          
                          }/*,
                          error:function (data,status,object)
                          {
                             

                          

                           $('#section_4').removeClass('stepshow');
                            $('#section_4').addClass('stephide');
                            $('#section_2').removeClass('stephide');  
                            $('#section_2').addClass('stepshow');
                             window.scrollTo(0, 0);

                              $("#message_eureur").html('<div class="alert alert-danger">'+ data.message +'</div>');


                         $("#spin-ajouter-lieux").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#btn-ajouter-lieux').prop('disabled',false); 
                          }
*/







                       });











                
















}





                  });



    });