$(document).ready(function(){

    $('[data-toggle="offcanvas"]').on('click', function () {
        $('.offcanvas-collapse').toggleClass('open')
    });

    $('.owl-carousel-1').owlCarousel({
        loop:true,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:2
            }
        }
    });

    $('.achivement1').owlCarousel({
        loop:true,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });

    $("#bloodDOnarDIvision").change(function(){

        var val = $(this).val();

        if (val == "Dhaka") {

            $("#bloodDonarDistrict").html("<option value='DhakaDistrict1'>Dhaka District 1</option><option value='DhakaDistrict2'>Dhaka District 2</option>");
        
        } else if (val == "Rajshahi") {
            
            $("#bloodDonarDistrict").html("<option value='raj1'>Raj 1</option><option value='raj2'>Raj 2</option>");
        
        } else if (val == "khulna") {
            
            $("#bloodDonarDistrict").html("<option value='khulna1'>khul 1</option><option value='khulna2'>khul 2</option>");
        
        } else if (val == "Barisal") {
            
            $("#bloodDonarDistrict").html("<option value='Bari1'>Bari 1</option><option value='Bari2'>bari 2</option>");
        
        }
    });


});