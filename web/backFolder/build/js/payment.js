function paymentproposition(id)
{



$('#idpropositionpayment').val(id);

$.ajax({
                       dataType:"json",
                       url:'/prix-payment/'+id,
                       type:'POST',
                       
                       success:function (data,status,object)
                       {
                            $('.prixpaymentproposition').html(data.output.prix+' '+data.output.tarification);

                       }
                     });









            }






function paymentdemande(id)
{



$('#iddemandepayment').val(id);

$.ajax({
                       dataType:"json",
                       url:'/prix-payment/'+id,
                       type:'POST',
                       
                       success:function (data,status,object)
                       {
                            $('.prixdemandeproposition').html(data.output.prix+' '+data.output.tarification);

                       }
                     });









            }

 








Stripe.setPublishableKey('pk_test_xraiIwG4FXxldqFsGtg7VpN1');
	var $form=$('#paymentproposition-form');
	$form.submit(function(e){
       e.preventDefault();
       
       $form.find('.button').attr('disabled',true);
       Stripe.card.createToken($form,function(status,response){
            if(response.error){
            	$form.find('.message').remove();
    	$form.prepend('<div><span class="text-danger message">'+response.error.message+'</span></div>');
            }else{
            	var token=response.id;
            	console.log(token);
            	$form.append($('<input type="hidden" name="stripeToken" />').val(token));
            /*	$form.get(0).submit(function(e){
                 e.preventDefault();*/

               	$form.find('.message').remove();
                  var formpayment = document.getElementById("paymentproposition-form");
                  $.ajax({
                       dataType:"json",
                       url:$("#paymentproposition-form").attr('action'),
                       type:$("#paymentproposition-form").attr('method'),
                        data:new FormData(formpayment),
                       contentType:false,
                       processData:false,
                       cache:false,
                       success:function (data,status,object)
                       {

                       
                       var message=data.message;
                       if(data.success==true)
                          {


                         
                              
                             
                               
                          
                               
                              $('#paymentproposition-form')[0].reset();
                              $('#Paymentproposition').modal('hide');
                              viewtoutproposition.ajax.reload(null,true);
              

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




                        

                          }
                      }

                  

                      });


         


              }



     });


   });












