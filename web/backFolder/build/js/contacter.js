 var proposition;
 


$(document).ready(function($){
 
 proposition=$("#tableproposition").DataTable({
     columnDefs: [
    {
        targets: -1,
        className: 'dt-body-left'
    }
  ],
  'destroy':true,
   
    'ajax':'/user/home/tout-propositions',
     'order': []
});


});







function annulero(id){

if(id){
  $("#annuler_operation").unbind('click').bind('click',function(){
   
     $('#annuler_operation').prop('disabled',true);
    $("#spin-annuler-operation").addClass('fa fa-spinner fa-spin fa-register');

       $.ajax({
                       
                       url:'/operation/annuler/'+id,
                       type:'POST',
                       success:function (data,status,object)
                       {

                        var message=data.message;
                       if(data.success==true)
                          {

                           $("#spin-annuler-operation").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#annuler_operation').prop('disabled',false);

                           $('#Modalannulermission').modal('hide');
                            
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

                              

                          }else{
                          
                             
                           $("#spin-annuler-operation").removeClass('fa fa-spinner fa-spin fa-register');
                          $('#annuler_operation').prop('disabled',false);
                             $('#Modalannuleroperation').modal('hide');

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

                           location.reload();


                          }

              

                       }



                       });



    });

    }
    }





function viewproposition(id=null)
{
  if(id)
  {






        $.ajax({
url:'/user/home/view-proposition-client/'+id,
type:'GET',


success:function(data,status,object){
if(data.success==true)
{




$('#divvoirpropositionclient').html(data.output);




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














function voirpropositionfournisseur(id=null)
{
  if(id)
  {






        $.ajax({
url:'/user/home/view-proposition-agent/'+id,
type:'GET',


success:function(data,status,object){
if(data.success==true)
{


$('#divvoirpropositionagent').html(data.output);



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


































function finmission(id=null)
{
  if(id)
  {
    
    $('#idproposition').val(id);   

  }
}