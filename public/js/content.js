

function slideFunction(){
  var $w = $(window).width();
    if($w<400){
        $('#slide').slick({
          slidesToShow: 3,
          slidesToScroll: 4,
          autoplay: true,
          autoplaySpeed: 2000,
        });
    }else if($w<800){
      $('#slide').slick({
        slidesToShow: 5,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 2000,
      });
    }
    else if($w<1500){
      $('#slide').slick({
        slidesToShow: 6,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 2000,
      });
    }

}
slideFunction();
  
   

 



 
 