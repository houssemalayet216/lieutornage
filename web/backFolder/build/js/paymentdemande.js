Stripe.setPublishableKey('pk_test_xraiIwG4FXxldqFsGtg7VpN1');
	var $form=$('#paymentdemande-form');
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
                  var formpayment = document.getElementById("paymentdemande-form");
                  $.ajax({
                       dataType:"json",
                       url:$("#paymentdemande-form").attr('action'),
                       type:$("#paymentdemande-form").attr('method'),
                        data:new FormData(formpayment),
                       contentType:false,
                       processData:false,
                       cache:false,
                       success:function (data,status,object)
                       {

                       
                       var message=data.message;
                       if(data.success==true)
                          {


                         
                              
                             
                               
                          
                               
                              $('#paymentdemande-form')[0].reset();
                              $('#Paymentmydemande').modal('hide');
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
