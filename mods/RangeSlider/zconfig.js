$(document).ready(function() {
    var slider = $("#range").data("ionRangeSlider"); //call rangeslider

    $('.buttons').on('click', '.button', function() 
    {
      if($(this).attr('name') == "Low")
      {
         $(this).addClass('is-selected is-light').siblings().attr('class','button is-small');
         slider.update({from:0});
      }
     
       if($(this).attr('name') == "Medium")
      {
        $(this).addClass('is-selected is-light').siblings().attr('class','button is-small');
          slider.update({from:1});
      }
     

      if($(this).attr('name') == "High")
      {
        $(this).addClass('is-selected is-light').siblings().attr('class','button is-small');
         slider.update({from:2});
      }
   });
});