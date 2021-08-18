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








    allPrecBtn.click(function(){

     var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          precStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;
          precStepWizard.removeClass('disable-me')
        precStepWizard.removeAttr('disabled').trigger('click');


  });





  
  $('#info-1-lettre').click(function(){

     var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;
          nextStepWizard.removeClass('disable-me')
        nextStepWizard.removeAttr('disabled').trigger('click');


  });





   $('#info-2-lettre').click(function(){

     var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;
          nextStepWizard.removeClass('disable-me')
        nextStepWizard.removeAttr('disabled').trigger('click');


  });








  $('#info-3-lettre').click(function(){

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