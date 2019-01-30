$('.gallery').fotorama({
    width: '100%',
    maxwidth: '100%',
    allowfullscreen: true,
    nav: 'thumbs',
    swipe: true
});
$('.main-carousel').flickity({
    cellAlign: 'left',
    contain: true,
    pageDots: false,
    autoPlay: 5000
});
$('.rodape').flickity({
    cellAlign: 'left',
    contain: true,
    adaptiveHeight: true,
    pageDots: false,
    prevNextButtons: false,
    autoPlay: 5000,
    draggable: '<1'
});
$('.carousel').flickity({
    contain: true,
    pageDots: false,
    adaptiveHeight: true,
    groupCells: true
});
$('ul.hmm li a.nvm').click(function(event){
	event.preventDefault();
    var dest = $(this).attr('href');
    var dest = dest.split('#');
	$('ul li a').removeClass('active');
	$(this).addClass('active');
	$('html, body').animate({scrollTop: $('#'+dest[1]).offset().top - $('header .logo').height()-30}, 1000, 'easeInOutExpo', function(){
        if($(window).width()<768){
            $('header .menu').slideUp(400,'easeOutExpo');
        }
	});
});
$(document).ready(function(){
    initMap();
    setTimeout(()=>{
        $('.arts').flickity({
            cellAlign: 'left',
            pageDots: false,
            prevNextButtons: true,
            adaptiveHeight: true,
            autoPlay: 5000,
            draggable: false
        });
        $('.arts .carousel').flickity({
            cellAlign: 'left',
            prevNextButtons: false,
            adaptiveHeight: true
        });
    },1500)
    
});
$(window).resize(function(){
    if($(window).width()>768){
        $('header .menu').show();
    }
});
$(window).scroll(function() {
    if($(window).scrollTop() > 0){
        $('header').addClass('scr');
    }else{
        $('header').removeClass('scr');
    }
 });
 function shownav(){
    $('header .menu').stop().slideToggle(400,'easeOutExpo');
} 
var map;
function initMap() {
    var uluru = {lat: -22.5481951, lng: -47.3786262};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 16,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
}
function highlight_map_states(){
    if($(".states_section").length>0){
       $(".states_section .list_states .item .link").hover(function(){
         var a="#state_"+$(this).text().toLowerCase();
         $(a).attr("class","state hover")
       },function(){
         var a="#state_"+$(this).text().toLowerCase();
         $(a).attr("class","state")
       })
    }
}
$('select[name=estados]').on('change',function(){
    uf = $(this).val();
    $.request('onGetRepresentantes', {data: {uf: uf}})
});
$(document).on('change','input[name=filtro]',function(){
    var data = [];
    filtro = $('input[name=filtro]');
    var cat = filtro[0].dataset.cat;
    $(filtro).each(function( i ) {
        if(this.checked){
            data.push(this.value);
        }
    });
    filtro.promise().done($.request('onFiltro', {data: {filtro: data, cat: cat}}));   
});