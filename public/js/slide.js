function slideSlider()
{
    $("#slider-scroller").css({"left":"0%","transition":"all 0s linear"});
    $("#slider-scroller").css({"left": String(parseInt($("#slider-scroller").css("left")) - 500) + "px","transition":"all 5.1s linear"});
    setTimeout(function(){moveSliderItem()}, 2635);
  }
  
  function moveSliderItem(){
    $("#slider-scroller div").first().detach().appendTo($("#slider-scroller"));
    slideSlider();
  }
  
  slideSlider();
  
  function slideSlider_right(){
    $("#slider-right-scroller").css({"right":"0%","transition":"all 0s linear"});
    $("#slider-right-scroller").css({"right": String(parseInt($("#slider-right-scroller").css("right")) - 500) + "px","transition":"all 5.1s linear"});
    setTimeout(function(){moveSlider_rightItem()}, 2635);
  }
  
  function moveSlider_rightItem(){
    $("#slider-right-scroller div").last().detach().prependTo($("#slider-right-scroller"));
    slideSlider_right();
  }
  
  slideSlider_right();

  document.addEventListener("DOMContentLoaded", function() {
    const video = document.getElementById("video");
  
    video.addEventListener("ended", function() {
       video.currentTime = 0;  
       video.play();  
    }); 
  });  