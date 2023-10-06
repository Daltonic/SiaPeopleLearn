$(document).ready(function () {
  $('.owl-one').owlCarousel({
    loop: true,
    // margin:10,
    nav: true,
    navText: false,
    dots: false,
    autoPlay: false,
    stopOnHover: true,
    autoplayHoverPause: true,
    autoplayTimeout: 9000,
    smartSpeed: 250,
    items: 4,
    mouseDrag: true,
    margin: 5,
    padding: 5,
    stagePadding: 5,
    responsive: {
      0: {
        items: 1,
        dots: false,
      },
      485: {
        items: 1,
        dots: false,
      },
      720: {
        items: 2,
        dots: false,
      },
      960: {
        items: 3,
        dots: false,
      },
      1200: {
        items: 4,
        //dots: true
      },
    },
  })
  $('.owl-two').owlCarousel({
    loop: true,
    // margin:10,
    nav: true,
    navText: false,
    dots: false,
    autoPlay: false,
    stopOnHover: true,
    autoplayHoverPause: true,
    autoplayTimeout: 900,
    smartSpeed: 250,
    items: 4,
    mouseDrag: true,
    margin: 20,
    padding: 5,
    stagePadding: 5,
    responsive: {
      0: {
        items: 1,
        dots: false,
      },
      485: {
        items: 1,
        dots: false,
      },
      720: {
        items: 2,
        dots: false,
      },
      960: {
        items: 3,
        dots: false,
      },
      1200: {
        items: 4,
        //dots: true
      },
    },
  })
  $('.owl-three').owlCarousel({
    loop: true,
    // margin:10,
    nav: true,
    navText: false,
    dots: false,
    autoPlay: false,
    stopOnHover: true,
    autoplayHoverPause: true,
    autoplayTimeout: 9000,
    smartSpeed: 250,
    items: 1,
    mouseDrag: true,
    margin: 20,
    padding: 5,
    stagePadding: 5,
    responsive: {
      0: {
        items: 1,
        dots: false,
      },
      485: {
        items: 1,
        dots: false,
      },
      720: {
        items: 2,
        dots: false,
      },
      960: {
        items: 3,
        dots: false,
      },
      1200: {
        items: 4,
        //dots: true
      },
    },
  })
})

$('.owl-next').click(function () {
  $('.owl-one').trigger('next.owl.carousel')
})
$('.owl-prev').click(function () {
  $('.owl-one').trigger('prev.owl.carousel')
})
$('.owl-nexts').click(function () {
  $('.owl-two').trigger('next.owl.carousel')
})
$('.owl-prevs').click(function () {
  $('.owl-two').trigger('prev.owl.carousel')
})
$('.owl-nextss').click(function () {
  $('.owl-three').trigger('next.owl.carousel')
})
$('.owl-prevss').click(function () {
  $('.owl-three').trigger('prev.owl.carousel')
})

function ranking(x, cid, sid) {
  let burl = $('#burl').val()
  let url = burl + 'courses/section_ranking'
  $.post(
    url,
    {
      rank: x,
      cid: cid,
      sid: sid,
    },
    function (data) {
      $('#courseSections').html(data)
    }
  )
}
