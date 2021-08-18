$(document).ready(function () {






var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');
          allPrecBtn=$('.prec');

            allWells.hide();





  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
           navListItems.addClass('disable-me');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
         
      }
  });






  $('#info-1').click(function(){

    


     var type_contrat= $('#vous_etes_contrat').val();
      var denomination=$('#denomination_contrat').val(); 
      var constitution=$('#constitution_contrat').val();
      var investissement=$('#inverstissement_contrat').val();
       var residente=$('#residence_contrat').val();
       var capital=$('#capital_contrat').val();
        var activite=$('#activite_contrat').val();
      var forme=$('#form_juridique_contrat').val();

      console.log(type_contrat);



           if(type_contrat==null)
        {
         document.getElementById('vous_etes_eureur').textContent='Ce champ ne doit pas etre vide ';       
        }

            if(denomination==''&&type_contrat=='Sociète')
        {
         document.getElementById('denomination_eureur').textContent='Ce champ ne doit pas etre vide ';       
        }


            if(constitution==null&& type_contrat=='Sociète')
        {
         document.getElementById('constitution_eureur').textContent='Ce champ ne doit pas etre vide ';       
        }

        

            if(investissement==null && type_contrat=='Sociète')
        {
         document.getElementById('investissement_eureur').textContent='Ce champ ne doit pas etre vide ';       
        }


            if(residente==null && type_contrat=='Sociète')
        {
         document.getElementById('residente_eureur').textContent='Ce champ ne doit pas etre vide ';       
        }



              if(capital=='' && type_contrat=='Sociète')
        {
         document.getElementById('capital_eureur').textContent='Ce champ ne doit pas etre vide ';       
        }


               if(activite==null && type_contrat=='Sociète')
        {
         document.getElementById('activite_eureur').textContent='Ce champ ne doit pas etre vide ';       
        }

               if(forme==null && type_contrat=='Sociète')
        {
         document.getElementById('form_juridique_eureur').textContent='Ce champ ne doit pas etre vide ';       
        }


               $('#vous_etes_contrat').change(function(){
                  
                 if($.trim(document.getElementById('vous_etes_eureur').textContent) !== "")

                                  {
                                    document.getElementById('vous_etes_eureur').textContent="";
                                  }
                    
                                 });



                $('#denomination_contrat').change(function(){
                  
                 if($.trim(document.getElementById('denomination_eureur').textContent) !== "")

                                  {
                                    document.getElementById('denomination_eureur').textContent="";
                                  }
                    
                                 });


              $('#constitution_contrat').change(function(){
                  
                 if($.trim(document.getElementById('constitution_eureur').textContent) !== "")

                                  {
                                    document.getElementById('constitution_eureur').textContent="";
                                  }
                    
                                 });



                $('#inverstissement_contrat').change(function(){
                  
                 if($.trim(document.getElementById('investissement_eureur').textContent) !== "")

                                  {
                                    document.getElementById('investissement_eureur').textContent="";
                                  }
                    
                                 });


                  $('#residence_contrat').change(function(){
                  
                 if($.trim(document.getElementById('residente_eureur').textContent) !== "")

                                  {
                                    document.getElementById('residente_eureur').textContent="";
                                  }
                    
                                 });


                    $('#capital_contrat').change(function(){
                  
                 if($.trim(document.getElementById('capital_eureur').textContent) !== "")

                                  {
                                    document.getElementById('capital_eureur').textContent="";
                                  }
                    
                                 });

                      $('#activite_contrat').change(function(){
                  
                 if($.trim(document.getElementById('activite_eureur').textContent) !== "")

                                  {
                                    document.getElementById('activite_eureur').textContent="";
                                  }
                    
                                 });

                        $('#form_juridique_contrat').change(function(){
                  
                 if($.trim(document.getElementById('form_juridique_eureur').textContent) !== "")

                                  {
                                    document.getElementById('form_juridique_eureur').textContent="";
                                  }
                    
                                 });




          





 if(type_contrat=='Sociète'&&denomination!==''&&constitution!==null&&investissement!==null&&residente!==null&&capital!==''&&activite!==null&&forme!==null)
{

     var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;
          nextStepWizard.removeClass('disable-me')
        nextStepWizard.removeAttr('disabled').trigger('click');
}




if(type_contrat=='Personne physique'&&activite!==null)
{

  var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;
          nextStepWizard.removeClass('disable-me')
        nextStepWizard.removeAttr('disabled').trigger('click');

}

  });


    allPrecBtn.click(function(){

     var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          precStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;
          precStepWizard.removeClass('disable-me')
        precStepWizard.removeAttr('disabled').trigger('click');


  });





  
  $('#info-2').click(function(){

     var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;
          nextStepWizard.removeClass('disable-me')
        nextStepWizard.removeAttr('disabled').trigger('click');


  });





   $('#info-2').click(function(){

     var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;
          nextStepWizard.removeClass('disable-me')
        nextStepWizard.removeAttr('disabled').trigger('click');


  });








  $('#info-3').click(function(){

     var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;
          nextStepWizard.removeClass('disable-me')
        nextStepWizard.removeAttr('disabled').trigger('click');


  });

  







  $('div.setup-panel div a.btn-primary').trigger('click');




















});