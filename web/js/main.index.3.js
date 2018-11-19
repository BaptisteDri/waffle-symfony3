$(document).ready(function(){

  // FullPage JS Init
    $('#fullpage').fullpage({
      sectionsColor: ['#805894', '#FFFFFF', '#000000', '#FD577C'],
      anchors: ['home', 'biography', 'store', 'contact'],
      menu: '#menu',
      scrollOverflow: true
    });
  //


  // Ajax for Ordering
    $('.msform-modal').submit(function(){
      $('.alert').css('display', 'none');
      $('.alert').css('z-index', '-1');
      $('.alert').css('display', 'block');
      $('.alert').css('z-index', '+999');
      ajaxOrdering();
      return false;
    });
  //


  // Ajax for contact
    $('.contact-form').submit(function(){
      $('.alert').css('display', 'none');
      $('.alert').css('z-index', '-1');
      $('.alert').css('display', 'block');
      $('.alert').css('z-index', '+999');
      ajaxContact();
      return false;
    });
  //

  // Show ordering modal on click
    $('.order-btn').click(function(e){
      $('.msform-modal').css({opacity: 0.0, display: "block"}).animate({opacity: 1.0});
      $('.order-btn').hide();
      if($(window).width() <= 700){
        $('.fp-controlArrow').css('display', 'none');
      }
    });
  //
  // Hide ordering modal on click
    $('#form-cancel').click(function(e){
      e.preventDefault();
      $('.msform-modal').css({display: "none"});
      $('.order-btn').fadeIn();
      if($(window).width() <= 700){
        $('.fp-controlArrow').fadeIn();
      }
    });
  //

  // Easteregg footer
    $('#easteregg').click(function(e){
      e.preventDefault();
      var mdp = prompt('Password ?');
      if(mdp == 'rainbowstaline' || mdp == 'rainbow staline' || mdp == 'perlimpinpin'){
        window.location = "http://psapin.github.io/rainbowstalin.html";
      }
    });
  //

  // Easteregg keyboard
    var total = 0;
    $(document).keypress(function(e){
      total += e.which;
      if (e.which == 119){
        total = 119;
      }
      if (total == 629){
        location.href="https://www.youtube.com/watch?v=eDU0CTDMk2g";
        total = 0;
      }
    });
  //

  $('.close').click(function(){
    $('.alert').css('z-index', '-1');
  })



  /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
  particlesJS.load('particles-js', '/ext/particles.json', function() {
    console.log('callback - particles.js config loaded');
  });


  // Arrow Down home
    $('.arrow-to-down').click(function(){
      $.fn.fullpage.moveSectionDown();
    });
  //

});
