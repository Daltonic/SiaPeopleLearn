"use strict";
(function() {
  var isWindows = navigator.platform.indexOf('Win') > -1 ? true : false;

  if (isWindows) {
    // if we are on windows OS we activate the perfectScrollbar function
    if (document.getElementsByClassName('main-content')[0]) {
      var mainpanel = document.querySelector('.main-content');
      var ps = new PerfectScrollbar(mainpanel);
    };

    if (document.getElementsByClassName('sidenav')[0]) {
      var sidebar = document.querySelector('.sidenav');
      var ps1 = new PerfectScrollbar(sidebar);
    };

    if (document.getElementsByClassName('navbar-collapse')[0]) {
      var fixedplugin = document.querySelector('.navbar-collapse');
      var ps2 = new PerfectScrollbar(fixedplugin);
    };

    if (document.getElementsByClassName('fixed-plugin')[0]) {
      var fixedplugin = document.querySelector('.fixed-plugin');
      var ps3 = new PerfectScrollbar(fixedplugin);
    };
  };
})();

// Verify navbar blur on scroll
navbarBlurOnScroll('navbarBlur');


// initialization of Tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

// Fixed Plugin

if (document.querySelector('.fixed-plugin')) {
  var fixedPlugin = document.querySelector('.fixed-plugin');
  var fixedPluginButton = document.querySelector('.fixed-plugin-button');
  var fixedPluginButtonNav = document.querySelector('.fixed-plugin-button-nav');
  var fixedPluginCard = document.querySelector('.fixed-plugin .card');
  var fixedPluginCloseButton = document.querySelectorAll('.fixed-plugin-close-button');
  var navbar = document.getElementById('navbarBlur');
  var buttonNavbarFixed = document.getElementById('navbarFixed');

  if (fixedPluginButton) {
    fixedPluginButton.onclick = function() {
      if (!fixedPlugin.classList.contains('show')) {
        fixedPlugin.classList.add('show');
      } else {
        fixedPlugin.classList.remove('show');
      }
    }
  }

  if (fixedPluginButtonNav) {
    fixedPluginButtonNav.onclick = function() {
      if (!fixedPlugin.classList.contains('show')) {
        fixedPlugin.classList.add('show');
      } else {
        fixedPlugin.classList.remove('show');
      }
    }
  }

  fixedPluginCloseButton.forEach(function(el) {
    el.onclick = function() {
      fixedPlugin.classList.remove('show');
    }
  })

  document.querySelector('body').onclick = function(e) {
    if (e.target != fixedPluginButton && e.target != fixedPluginButtonNav && e.target.closest('.fixed-plugin .card') != fixedPluginCard) {
      fixedPlugin.classList.remove('show');
    }
  }

  if (navbar) {
    if (navbar.getAttribute('navbar-scroll') == 'true') {
      buttonNavbarFixed.setAttribute("checked", "true");
    }
  }

}

// Tabs navigation

var total = document.querySelectorAll('.nav-pills');

total.forEach(function(item, i) {
  var moving_div = document.createElement('div');
  var first_li = item.querySelector('li:first-child .nav-link');
  var tab = first_li.cloneNode();
  tab.innerHTML = "-";

  moving_div.classList.add('moving-tab', 'position-absolute', 'nav-link');
  moving_div.appendChild(tab);
  item.appendChild(moving_div);

  var list_length = item.getElementsByTagName("li").length;

  moving_div.style.padding = '0px';
  moving_div.style.width = item.querySelector('li:nth-child(1)').offsetWidth + 'px';
  moving_div.style.transform = 'translate3d(0px, 0px, 0px)';
  moving_div.style.transition = '.5s ease';

  item.onmouseover = function(event) {
    let target = getEventTarget(event);
    let li = target.closest('li'); // get reference
    if (li) {
      let nodes = Array.from(li.closest('ul').children); // get array
      let index = nodes.indexOf(li) + 1;
      item.querySelector('li:nth-child(' + index + ') .nav-link').onclick = function() {
        moving_div = item.querySelector('.moving-tab');
        let sum = 0;
        if (item.classList.contains('flex-column')) {
          for (var j = 1; j <= nodes.indexOf(li); j++) {
            sum += item.querySelector('li:nth-child(' + j + ')').offsetHeight;
          }
          moving_div.style.transform = 'translate3d(0px,' + sum + 'px, 0px)';
          moving_div.style.height = item.querySelector('li:nth-child(' + j + ')').offsetHeight;
        } else {
          for (var j = 1; j <= nodes.indexOf(li); j++) {
            sum += item.querySelector('li:nth-child(' + j + ')').offsetWidth;
          }
          moving_div.style.transform = 'translate3d(' + sum + 'px, 0px, 0px)';
          moving_div.style.width = item.querySelector('li:nth-child(' + index + ')').offsetWidth + 'px';
        }
      }
    }
  }
});


// Tabs navigation resize

window.addEventListener('resize', function(event) {
  total.forEach(function(item, i) {
    item.querySelector('.moving-tab').remove();
    var moving_div = document.createElement('div');
    var tab = item.querySelector(".nav-link.active").cloneNode();
    tab.innerHTML = "-";

    moving_div.classList.add('moving-tab', 'position-absolute', 'nav-link');
    moving_div.appendChild(tab);

    item.appendChild(moving_div);

    moving_div.style.padding = '0px';
    moving_div.style.transition = '.5s ease';

    let li = item.querySelector(".nav-link.active").parentElement;

    if (li) {
      let nodes = Array.from(li.closest('ul').children); // get array
      let index = nodes.indexOf(li) + 1;

      let sum = 0;
      if (item.classList.contains('flex-column')) {
        for (var j = 1; j <= nodes.indexOf(li); j++) {
          sum += item.querySelector('li:nth-child(' + j + ')').offsetHeight;
        }
        moving_div.style.transform = 'translate3d(0px,' + sum + 'px, 0px)';
        moving_div.style.width = item.querySelector('li:nth-child(' + index + ')').offsetWidth + 'px';
        moving_div.style.height = item.querySelector('li:nth-child(' + j + ')').offsetHeight;
      } else {
        for (var j = 1; j <= nodes.indexOf(li); j++) {
          sum += item.querySelector('li:nth-child(' + j + ')').offsetWidth;
        }
        moving_div.style.transform = 'translate3d(' + sum + 'px, 0px, 0px)';
        moving_div.style.width = item.querySelector('li:nth-child(' + index + ')').offsetWidth + 'px';

      }
    }
  });

  if (window.innerWidth < 991) {
    total.forEach(function(item, i) {
      if (!item.classList.contains('flex-column')) {
        item.classList.add('flex-column', 'on-resize');
      }
    });
  } else {
    total.forEach(function(item, i) {
      if (item.classList.contains('on-resize')) {
        item.classList.remove('flex-column', 'on-resize');
      }
    })
  }
});


function getEventTarget(e) {
  e = e || window.event;
  return e.target || e.srcElement;
}

// End tabs navigation


//Set Sidebar Color
function sidebarColor(a) {
  var parent = a.parentElement.children;
  var color = a.getAttribute("data-color");

  for (var i = 0; i < parent.length; i++) {
    parent[i].classList.remove('active');
  }

  if (!a.classList.contains('active')) {
    a.classList.add('active');
  } else {
    a.classList.remove('active');
  }

  var sidebar = document.querySelector('.sidenav');
  sidebar.setAttribute("data-color", color);

  var sidenavCard = document.querySelector('#sidenavCard');
  let sidenavCardClasses = ['card', 'card-background', 'shadow-none', 'card-background-mask-' + color];
  sidenavCard.className = '';
  sidenavCard.classList.add(...sidenavCardClasses);

  var sidenavCardIcon = document.querySelector('#sidenavCardIcon');
  let sidenavCardIconClasses = ['ni', 'ni-diamond', 'text-gradient', 'text-lg', 'top-0', 'text-' + color];
  sidenavCardIcon.className = '';
  sidenavCardIcon.classList.add(...sidenavCardIconClasses);

}

// Set Navbar Fixed
function navbarFixed(el) {
  let classes = ['position-sticky', 'blur', 'shadow-blur', 'mt-4', 'left-auto', 'top-1', 'z-index-sticky'];
  const navbar = document.getElementById('navbarBlur');

  if (!el.getAttribute("checked")) {
    navbar.classList.add(...classes);
    navbar.setAttribute('navbar-scroll', 'true');
    navbarBlurOnScroll('navbarBlur');
    el.setAttribute("checked", "true");
  } else {
    navbar.classList.remove(...classes);
    navbar.setAttribute('navbar-scroll', 'false');
    navbarBlurOnScroll('navbarBlur');
    el.removeAttribute("checked");
  }
};

// Navbar blur on scroll
function navbarBlurOnScroll(id) {
  const navbar = document.getElementById(id);
  let navbarScrollActive = navbar ? navbar.getAttribute("navbar-scroll") : false;
  let scrollDistance = 5;
  let classes = ['position-sticky', 'blur', 'shadow-blur', 'mt-4', 'left-auto', 'top-1', 'z-index-sticky'];
  let toggleClasses = ['shadow-none'];

  if (navbarScrollActive == 'true') {
    window.onscroll = debounce(function() {
      if (window.scrollY > scrollDistance) {
        blurNavbar();
      } else {
        transparentNavbar();
      }
    }, 10);
  } else {
    window.onscroll = debounce(function() {
      transparentNavbar();
    }, 10);
  }

  function blurNavbar() {
    navbar.classList.add(...classes)
    navbar.classList.remove(...toggleClasses)

    toggleNavLinksColor('blur');
  }

  function transparentNavbar() {
    navbar.classList.remove(...classes)
    navbar.classList.add(...toggleClasses)

    toggleNavLinksColor('transparent');
  }

  function toggleNavLinksColor(type) {
    let navLinks = document.querySelectorAll('.navbar-main .nav-link')
    let navLinksToggler = document.querySelectorAll('.navbar-main .sidenav-toggler-line')

    if (type === "blur") {
      navLinks.forEach(element => {
        element.classList.remove('text-body')
      });

      navLinksToggler.forEach(element => {
        element.classList.add('bg-dark')
      });
    } else if (type === "transparent") {
      navLinks.forEach(element => {
        element.classList.add('text-body')
      });

      navLinksToggler.forEach(element => {
        element.classList.remove('bg-dark')
      });
    }
  }
}

// Debounce Function
// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.
function debounce(func, wait, immediate) {
  var timeout;
  return function() {
    var context = this,
      args = arguments;
    var later = function() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
};

//Set Sidebar Type
function sidebarType(a) {
  var parent = a.parentElement.children;
  var color = a.getAttribute("data-class");

  for (var i = 0; i < parent.length; i++) {
    parent[i].classList.remove('active');
  }

  if (!a.classList.contains('active')) {
    a.classList.add('active');
  } else {
    a.classList.remove('active');
  }

  var sidebar = document.querySelector('.sidenav');
  sidebar.classList.remove('bg-transparent');
  sidebar.classList.remove('bg-white');

  sidebar.classList.add(color);
}


// Toggle Sidenav
const iconNavbarSidenav = document.getElementById('iconNavbarSidenav');
const iconSidenav = document.getElementById('iconSidenav');
const sidenav = document.getElementById('sidenav-main');
let body = document.getElementsByTagName('body')[0];
let className = 'g-sidenav-pinned';

if (iconNavbarSidenav) {
  iconNavbarSidenav.addEventListener("click", toggleSidenav);
}

if (iconSidenav) {
  iconSidenav.addEventListener("click", toggleSidenav);
}

function toggleSidenav() {
  if (body.classList.contains(className)) {
    body.classList.remove(className);
    setTimeout(function() {
      sidenav.classList.remove('bg-white');
    }, 100);
    sidenav.classList.remove('bg-transparent');

  } else {
    body.classList.add(className);
    sidenav.classList.add('bg-white');
    sidenav.classList.remove('bg-transparent');
    iconSidenav.classList.remove('d-none');
  }
}

// Resize navbar color depends on configurator active type of sidenav

let referenceButtons = document.querySelector('[data-class]');

window.addEventListener("resize", navbarColorOnResize);

function navbarColorOnResize() {
  if (window.innerWidth > 1200) {
    if (referenceButtons.classList.contains('active') && referenceButtons.getAttribute('data-class') === 'bg-transparent') {
      sidenav.classList.remove('bg-white');
    } else {
      sidenav.classList.add('bg-white');
    }
  } else {
   
    sidenav.classList.add('bg-white');
    sidenav.classList.remove('bg-transparent');
  }
}

// Deactivate sidenav type buttons on resize and small screens
window.addEventListener("resize", sidenavTypeOnResize);
window.addEventListener("load", sidenavTypeOnResize);

function sidenavTypeOnResize() {
  let elements = document.querySelectorAll('[onclick="sidebarType(this)"]');
  if (window.innerWidth < 1200) {
    elements.forEach(function(el) {
      el.classList.add('disabled');
    });
  } else {
    elements.forEach(function(el) {
      el.classList.remove('disabled');
    });
  }
}
var mainWidth=$('#cropperWrapper').width();
var subWidth=mainWidth-50;
var $image_crop = $('#image_demo').croppie({
  enableExif: true,
  viewport: {
    width:subWidth,
    height:subWidth,
    type:'square' //circle
  },
  boundary:{
    width:mainWidth,
    height:mainWidth,
  }
});

$('#upload_image').on('change', function(){
  var reader = new FileReader();
  reader.onload = function (event) {
    $image_crop.croppie('bind', {
      url: event.target.result
    }).then(function(){
      console.log('jQuery bind complete');
    });
  }
  reader.readAsDataURL(this.files[0]);
  //$('#uploadimageModal').modal('show');
});

var $image_blog_crop = $('#image_blog_demo').croppie({
  enableExif: true,
  viewport: {
    width:subWidth,
    height:subWidth*0.6,
    type:'square' //circle
  },
  boundary:{
    width:mainWidth,
    height:mainWidth*0.6,
  }
});

$('#upload_blog_image').on('change', function(){
  var reader = new FileReader();
  reader.onload = function (event) {
    $image_blog_crop.croppie('bind', {
      url: event.target.result
    }).then(function(){
      console.log('jQuery bind complete');
    });
  }
  reader.readAsDataURL(this.files[0]);
  //$('#uploadimageModal').modal('show');
});

       
                               



$('.crop_image').click(function(event){
  $("#loading").removeClass('d-none');
  var burl=$('#burl').val();
  var pcode=$('#pcode').val();
  var isAdmin=$('#isAdmin').val();
  
  $image_crop.croppie('result', {
    type: 'canvas',
    size: '1000,1000'
  }).then(function(response){
      response=response.split(";");
      response=response[1];
      response=response.split(",");
      response=response[1];
    $.ajax({
      url:(burl+"properties/upload_image"),
      type: "POST",
      data:{
          "image": response,
          "pcode": pcode
      },
      success:function(data)
      {
        if(isAdmin==1){
          window.location.assign(burl+"properties/management");
        }else{
          window.location.assign(burl+"properties/mine");
        }
      }
    });
  })
});

$('.crop_more').click(function(event){
   $("#loading").removeClass('d-none');
  var burl=$('#burl').val();
  var pcode=$('#pcode').val();
  
  $image_crop.croppie('result', {
    type: 'canvas',
    size: '1000,1000'
  }).then(function(response){
      response=response.split(";");
      response=response[1];
      response=response.split(",");
      response=response[1];
    $.ajax({
      url:(burl+"properties/more_image"),
      type: "POST",
      data:{
          "image": response,
          "pcode": pcode
      },
      success:function(data)
      {
        window.location.assign(burl+"properties/add_photos/"+pcode);
      }
    });
  })
});


$('.crop_blog_image').click(function(event){
  $("#loading").removeClass('d-none');
  var burl=$('#burl').val();
  var pcode=$('#pcode').val();
  
  $image_blog_crop.croppie('result', {
    type: 'canvas',
    size: '1000,600'
  }).then(function(response){
      response=response.split(";");
      response=response[1];
      response=response.split(",");
      response=response[1];
    $.ajax({
      url:(burl+"blogs/upload_image"),
      type: "POST",
      data:{
          "image": response,
          "pcode": pcode
      },
      success:function(data)
      {
        window.location.assign(burl+"blogs/management");
      }
    });
  })
});

$('.crop_jobs_image').click(function(event){
  $("#loading").removeClass('d-none');
  var burl=$('#burl').val();
  var jcode=$('#jcode').val();
  var isAdmin=$('#isAdmin').val();
  
  $image_blog_crop.croppie('result', {
    type: 'canvas',
    size: '1000,600'
  }).then(function(response){
      response=response.split(";");
      response=response[1];
      response=response.split(",");
      response=response[1];
    $.ajax({
      url:(burl+"jobs/upload_image"),
      type: "POST",
      data:{
          "image": response,
          "jcode": jcode
      },
      success:function(data)
      {
        if(isAdmin==1){
          window.location.assign(burl+"jobs/management");
        }else{
          window.location.assign(burl+"jobs");
        }
      }
    });
  })
});


$('.crop_advisor_image').click(function(event){
  
  var burl=$('#burl').val();
  var advisorName=$('#advisorName').val();
  var advisorExpertise=$('#advisorExpertise').val();
  var advisorExperience=$('#advisorExperience').val();
  var advisorPhone=$('#advisorPhone').val();
  var advisorEmail=$('#advisorEmail').val();
  var advisorLocation=$('#advisorLocation').val();
  if(advisorPhone!="" || advisorName!="" || advisorExpertise!="" || advisorEmail!="" || advisorExperience!=""){
    $("#loading").removeClass('d-none');
    $image_crop.croppie('result', {
      type: 'canvas',
      size: '1000,1000'
    }).then(function(response){
        response=response.split(";");
        response=response[1];
        response=response.split(",");
        response=response[1];
      $.ajax({
        url:(burl+"index/advisor_mgt_action"),
        type: "POST",
        data:{
            "image": response,
            "advisorName":advisorName,
            "advisorExpertise":advisorExpertise,
            "advisorExperience":advisorExperience,
            "advisorPhone":advisorPhone,
            "advisorEmail":advisorEmail,
            "advisorLocation":advisorLocation,
        },
        success:function(data)
        {
          window.location.assign(burl+"index/advisor_mgt");
        }
      });
    })
  }else{
    alert("all form field are compulsary");
  }
});

$('.crop_advisor_edit_image').click(function(event){
  var burl=$('#burl').val();
  var advisorName=$('#advisorName').val();
  var advisorExpertise=$('#advisorExpertise').val();
  var advisorExperience=$('#advisorExperience').val();
  var advisorPhone=$('#advisorPhone').val();
  var advisorEmail=$('#advisorEmail').val();
  var advisorLocation=$('#advisorLocation').val();
  var aid=$("#aid").val();
  if(advisorPhone!="" || advisorName!="" || advisorExpertise!="" || advisorEmail!="" || advisorExperience!=""){
    $("#loading").removeClass('d-none');
    $image_crop.croppie('result', {
      type: 'canvas',
      size: '1000,1000'
    }).then(function(response){
        response=response.split(";");
        response=response[1];
        response=response.split(",");
        response=response[1];
      $.ajax({
        url:(burl+"index/advisor_edit_action"),
        type: "POST",
        data:{
            "image": response,
            "advisorName":advisorName,
            "advisorExpertise":advisorExpertise,
            "advisorExperience":advisorExperience,
            "advisorPhone":advisorPhone,
            "advisorEmail":advisorEmail,
            "advisorLocation":advisorLocation,
            "updatePhoto":1,
            "aid":aid
        },
        success:function(data)
        {
          window.location.assign(burl+"index/advisor_mgt");
        }
      });
    })
  }else{
    alert("all form field are compulsary");
  }
});

$('.crop_advisor_edit_info_image').click(function(event){
  
  var burl=$('#burl').val();
  var advisorName=$('#advisorName').val();
  var advisorExpertise=$('#advisorExpertise').val();
  var advisorExperience=$('#advisorExperience').val();
  var advisorPhone=$('#advisorPhone').val();
  var advisorEmail=$('#advisorEmail').val();
  var advisorLocation=$('#advisorLocation').val();
  var aid=$("#aid").val();
  if(advisorPhone!="" || advisorName!="" || advisorExpertise!="" || advisorEmail!="" || advisorExperience!=""){
    $("#loading").removeClass('d-none');
    $image_crop.croppie('result', {
      type: 'canvas',
      size: '1000,1000'
    }).then(function(response){
        response=response.split(";");
        response=response[1];
        response=response.split(",");
        response=response[1];
      $.ajax({
        url:(burl+"index/advisor_edit_action"),
        type: "POST",
        data:{
            "image": response,
            "advisorName":advisorName,
            "advisorExpertise":advisorExpertise,
            "advisorExperience":advisorExperience,
            "advisorPhone":advisorPhone,
            "advisorEmail":advisorEmail,
            "advisorLocation":advisorLocation,
            "updatePhoto":0,
            "aid":aid
        },
        success:function(data)
        {
          window.location.assign(burl+"index/advisor_mgt");
        }
      });
    })
  }else{
    alert("all form field are compulsary");
  }
});

function deleteMoreImage(iid,pcode){
  var burl=$('#burl').val();
  var elem="#littleimg"+iid;
  $.ajax({
    url:(burl+"properties/delete_more_images"),
    type: "POST",
    data:{
        "iid": iid,
        "pcode": pcode
    },
    success:function(data){
      $(elem).fadeOut('slow');
    }
  });
}

$('.crop_investment_image').click(function(event){
  $("#loading").removeClass('d-none');
  var burl=$('#burl').val();
  var pcode=$('#pcode').val();
  $image_crop.croppie('result', {
    type: 'canvas',
    size: '1000,1000'
  }).then(function(response){
      response=response.split(";");
      response=response[1];
      response=response.split(",");
      response=response[1];
    $.ajax({
      url:(burl+"investments/upload_image"),
      type: "POST",
      data:{
          "image": response,
          "pcode": pcode
      },
      success:function(data)
      {
        window.location.assign(burl+"investments/admin");
      }
    });
  })
});

$('.crop_profile_image').click(function(event){
  $("#loading").removeClass('d-none');
  var burl=$('#burl').val();
  $image_crop.croppie('result', {
    type: 'canvas',
    size: '1000,1000'
  }).then(function(response){
      response=response.split(";");
      response=response[1];
      response=response.split(",");
      response=response[1];
    $.ajax({
      url:(burl+"profile/upload_image"),
      type: "POST",
      data:{
          "image": response,
      },
      success:function(data)
      {
        window.location.assign(burl+"dashboard");
      }
    });
  })
});

$("#province").on('change',function(){
  let province = $("#province").val();
  let burl=$('#burl').val();
  let ourLga=lga.filter(lg=>(lg.state===province))
  ourLga=ourLga[0].lgas
  let data=`<option value="">select city</option>`
  console.log(data)

  ourLga.forEach(item => {
     data+= `<option>${item}</option>`
  });
  $( "#city" ).html( data );
})

function getPromoCost(fee, cur){
  var days=$('#promoDays').val();
  $('#promoCost').html("Total Cost: "+cur+" "+(fee * days));


}


$("#propertySearch").on('input',function(){
  let query = $("#propertySearch").val();
  let burl=$('#burl').val();
  $("#loading").removeClass('d-none');
  $.ajax({
    url:(burl+"properties/search"),
    type: "POST",
    data:{
        "query": query,
    },
    success:function(data){
      $("#loading").addClass('d-none');
      $("#propertyBox").html(data);
    }
  })
})

$("#userSearch").on('input',function(){
  let query = $("#userSearch").val();
  let burl=$('#burl').val();
  $("#loading").removeClass('d-none');
  $.ajax({
    url:(burl+"users/search"),
    type: "POST",
    data:{
        "query": query,
    },
    success:function(data){
      $("#loading").addClass('d-none');
      $("#userBox").html(data);
    }
  })
})





