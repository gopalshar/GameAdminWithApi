(function ($) {
    "use strict";
/*--
    Commons Variables
-----------------------------------*/
var $window = $(window);
var $body = $('body');

/*--
    Adomx Dropdown (Custom Dropdown)
-----------------------------------*/
if ($('.adomx-dropdown').length) {
    var $adomxDropdown = $('.adomx-dropdown'),
        $adomxDropdownMenu = $adomxDropdown.find('.adomx-dropdown-menu');

    $adomxDropdown.on('click', '.toggle', function(e){
        e.preventDefault();
        var $this = $(this);
        if(!$this.parent().hasClass('show')) {
            $adomxDropdown.removeClass('show');
            $adomxDropdownMenu.removeClass('show');
            $this.siblings('.adomx-dropdown-menu').addClass('show').parent().addClass('show');
        } else {
            $this.siblings('.adomx-dropdown-menu').removeClass('show').parent().removeClass('show');
        }
    });
    /*Close When Click Outside*/
    $body.on('click', function(e){
        var $target = e.target;
        if (!$($target).is('.adomx-dropdown') && !$($target).parents().is('.adomx-dropdown') && $adomxDropdown.hasClass('show')) {
            $adomxDropdown.removeClass('show');
            $adomxDropdownMenu.removeClass('show');
        }
    });
}

/*--
    Header Search Open/Close
-----------------------------------*/
var $headerSearchOpen = $('.header-search-open'),
    $headerSearchClose = $('.header-search-close'),
    $headerSearchForm = $('.header-search-form');
$headerSearchOpen.on('click', function(){
    $headerSearchForm.addClass('show');
});
$headerSearchClose.on('click', function(){
    $headerSearchForm.removeClass('show');
});

/*--
    Side Header
-----------------------------------*/
var $sideHeaderToggle = $('.side-header-toggle'),
    $sideHeaderClose = $('.side-header-close'),
    $sideHeader = $('.side-header');

/*Add/Remove Show/Hide Class On Depending on Viewport Width*/
function $sideHeaderClassToggle() {
    var $windowWidth = $window.width();
    if( $windowWidth >= 1200 ) {
        $sideHeader.removeClass('hide').addClass('show');
    } else {
        $sideHeader.removeClass('show').addClass('hide');
    }
}
$sideHeaderClassToggle();
/*Side Header Toggle*/
$sideHeaderToggle.on('click', function(){
    if($sideHeader.hasClass('show')){
        $sideHeader.removeClass('show').addClass('hide');
    } else {
        $sideHeader.removeClass('hide').addClass('show');
    }
});
/*Side Header Close (Visiable Only On Mobile)*/
$sideHeaderClose.on('click', function(){
    $sideHeader.removeClass('show').addClass('hide');
});
    
/*--
    Side Header Menu
-----------------------------------*/
var $sideHeaderNav = $('.side-header-menu'),
    $sideHeaderSubMenu = $sideHeaderNav.find('.side-header-sub-menu');

/*Add Toggle Button in Off Canvas Sub Menu*/
$sideHeaderSubMenu.siblings('a').append('<span class="menu-expand"><i class="zmdi zmdi-chevron-down"></i></span>');

/*Close Off Canvas Sub Menu*/
$sideHeaderSubMenu.slideUp();

/*Category Sub Menu Toggle*/
$sideHeaderNav.on('click', 'li a, li .menu-expand', function(e) {
    var $this = $(this);
    if ( $this.parent('li').hasClass('has-sub-menu') || ($this.attr('href') === '#' || $this.hasClass('menu-expand')) ) {
        e.preventDefault();
        if ($this.siblings('ul:visible').length){
            $this.parent('li').removeClass('active').children('ul').slideUp().siblings('a').find('.menu-expand i').removeClass('zmdi-chevron-up').addClass('zmdi-chevron-down');
            $this.parent('li').siblings('li').removeClass('active').find('ul:visible').slideUp().siblings('a').find('.menu-expand i').removeClass('zmdi-chevron-up').addClass('zmdi-chevron-down');
        } else {
            $this.parent('li').addClass('active').children('ul').slideDown().siblings('a').find('.menu-expand i').removeClass('zmdi-chevron-down').addClass('zmdi-chevron-up');
            $this.parent('li').siblings('li').removeClass('active').find('ul:visible').slideUp().siblings('a').find('.menu-expand i').removeClass('zmdi-chevron-up').addClass('zmdi-chevron-down');
        }
    }
});

// Adding active class to nav menu depending on page
var pageUrl = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
$('.side-header-menu a').each(function() {
    if ($(this).attr("href") === pageUrl || $(this).attr("href") === '') {
        $(this).closest('li').addClass("active").parents('li').addClass('active').children('ul').slideDown().siblings('a').find('.menu-expand i').removeClass('zmdi-chevron-down').addClass('zmdi-chevron-up');
    }
    else if (window.location.pathname === '/' || window.location.pathname === '/index.html') {
        $('.side-header-menu a[href="index.html"]').closest('li').addClass("active").parents('li').addClass('active').children('ul').slideDown().siblings('a').find('.menu-expand i').removeClass('zmdi-chevron-down').addClass('zmdi-chevron-up');
    }
})

/*--
    Tooltip, Popover & Tippy Tooltip
-----------------------------------*/
/*Bootstrap Tooltip*/
$('[data-toggle="tooltip"]').tooltip();
/*Bootstrap Popover*/
$('[data-toggle="popover"]').popover();
/*Tippy Tooltip*/
tippy('.tippy, [data-tippy-content], [data-tooltip]', {
    flipOnUpdate: true,
    boundary: 'window',
});

/*-- 
    Selectable Table
-----------------------------------*/
function tableSelectable() {
    var $tableSelectable = $('.table-selectable');
    $tableSelectable.find('tbody .selected').find('input[type="checkbox"]').prop('checked', true);
    $tableSelectable.on('click', 'input[type="checkbox"]', function(){
        var $this = $(this);
        if( $this.parent().parent().is('th')) {
            if( !$this.is(':checked') ) {
                $this.closest('table').find('tbody').children('tr').removeClass('selected').find('input[type="checkbox"]').prop('checked', false);
            } else {
                $this.closest('table').find('tbody').children('tr').addClass('selected').find('input[type="checkbox"]').prop('checked', true);
            }
        } else {
            if( !$this.is(':checked') ) {
                $this.closest('tr').removeClass('selected');
            } else {
                $this.closest('tr').addClass('selected');
            }
            if( $this.closest('tbody').children('.selected').length < $this.closest('tbody').children('tr').length ) {
                $this.closest('table').find('thead').find('input[type="checkbox"]').prop('checked', false);
            } else if( $this.closest('tbody').children('.selected').length === $this.closest('tbody').children('tr').length ) {
                $this.closest('table').find('thead').find('input[type="checkbox"]').prop('checked', true);
            }
        }
    });
}
tableSelectable();
    
/*-- 
    To Do List
-----------------------------------*/
function todoList() {
    // Variable
    var $todoList = $('.todo-list'),
        $todoListAddNew = $('.todo-list-add-new');
    //Todo List Check
    $todoList.find('.done').find('input[type="checkbox"]').prop('checked', true);
    $todoList.on('click', 'input[type="checkbox"]', function(){
        var $this = $(this);
        if( !$this.is(':checked') ) {
            $this.closest('li').removeClass('done');
        } else {
            $this.closest('li').addClass('done');
        }
    });
    //Todo List Status Stared
    $todoList.on('click', '.status', function() {
        var $this = $(this);
        if( !$this.hasClass('stared') ) {
            $this.addClass('stared').find('i').removeClass('zmdi-star-outline').addClass('zmdi-star');
        } else {
            $this.removeClass('stared').find('i').removeClass('zmdi-star').addClass('zmdi-star-outline');
        }
    });
    //Todo List Remove
    $todoList.on('click', '.remove', function() {
      $(this).closest('li').remove();
    });
    //Todo List Add New Status Stared
    $todoListAddNew.on('click', '.status input', function() {
        var $this = $(this);
        if( $this.prop('checked') === true ) {
            $this.siblings('.icon').removeClass('zmdi-star-outline').addClass('zmdi-star');
        } else {
            $this.siblings('.icon').removeClass('zmdi-star').addClass('zmdi-star-outline');
        }
    });
    //Todo List Add New
    $todoListAddNew.on("click", '.submit', function(e) {
        e.preventDefault();
        var $content = $(this).siblings('input.content').val(),
            $date = $(this).closest('.todo-list-add-new').data('date') === false ? 'd-none' : 'd-block',
            $status = $(this).siblings('.status').find('input'),
            $stared = $status.prop('checked') === true ? 'stared' : '',
            $staredIcon = $status.prop('checked') === true ? 'zmdi-star' : 'zmdi-star-outline';
        if ($content) {
            $todoList.prepend('<li> <div class="list-action"> <button class="status '+$stared+'"><i class="zmdi '+$staredIcon+'"></i></button> <label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label> </div> <div class="list-content"><p>' + $content + '</p> <span class="time '+$date+'">'+moment(moment.utc().toDate()).format('h:mm a (YYYY-MM-DD)')+'</span> </div> <div class="list-action right"> <button class="remove"><i class="zmdi zmdi-delete"></i></button> </div></li>');
            $(this).siblings('input.content').val("");
            $status.prop('checked', false).siblings('.icon').removeClass('zmdi-star').addClass('zmdi-star-outline');
        }
    });
}
todoList();
    
/*--
    Chat Contact
-----------------------------------*/
var $chatContactOpen = $('.chat-contacts-open'),
    $chatContactClose = $('.chat-contacts-close'),
    $chatContacts = $('.chat-contacts');
$chatContactOpen.on('click', function(){
    $chatContacts.addClass('show');
});
$chatContactClose.on('click', function(){
    $chatContacts.removeClass('show');
});


// Common Resize function
function resize() {
    $sideHeaderClassToggle();
}
// Resize Window Resize
$window.on('resize', function(){
    resize();
});
    
/*--
    Custom Scrollbar (Perfect Scrollbar)
-----------------------------------*/ 
$('.custom-scroll').each( function() {
    var ps = new PerfectScrollbar($(this)[0]);
});



/* custom add addon in add facility page */
 var formcount = 0;
          $('#add_addons').click(function(){

            // alert('hii');
            formcount++;
            // console.log(formcount);
            var form = '<div class="row custom_form_addon" id="forms'+formcount+'">'+
                                                '<div class="col-6 mb-20">'+
                                                    '<input type="text" placeholder="Addon Name" id="an'+formcount+'"  class="form-control" >'+
                                                '</div>'+
                                                '<div class="col-6 mb-20">'+
                                                    '<input type="text" placeholder="Addon Price" id="ap'+formcount+'"  class="form-control" >'+
                                                '</div>'+

                                                '<div class="col-6 mb-20">'+
                                                    '<input type="file" id="ai'+formcount+'"  class="form-control" >'+
                                                '</div>'+

                                                '<div class="col-6 mb-20">'+
                                                    '<input type="text" placeholder="Addon Max Person" id="amp'+formcount+'"  class="form-control">'+
                                                '</div>'+
                                                '<div class="col-6 mb-20">'+
                                                    '<button type="button" class="btn btn-primary btn_customize" id="add_addon '+formcount+'" >add addon</button>'+
                                                    '<button type="button" class="btn btn-secondary btn-customize2" id="erase_addon '+formcount+'">cancel</button>'+
                                                '</div>'+
                                            '</div>'
            $('#containers').append(form);

          })

           $(document).on("click",'.btn-customize2',function() {
               // alert('hii');
            // $(this).parent().remove();
            var id = $(this).attr('id');
           
            var number = id.split(" ")[1];
             // alert(number);
             $('#forms'+number).css({'display':'none'});

          }
          )


            $(document).on("click",'.btn_customize',function() {
            // $(this).parent().remove();
            var id = $(this).attr('id');
            var number = id.split(" ")[1];
            var addon_name = $('#an'+number).val();
            var addon_price = $('#ap'+number).val();
            var addon_max_price = $('#amp'+number).val();

            if(addon_name == '' || addon_price == '' || addon_max_price == ''){
              alert('all field are required');
              return false;
            }
            
           var formdata = new FormData();

            // formdata.append('adon_image',addon_image);
             formdata.append("addon_image", document.getElementById('ai'+number).files[0]);
             formdata.append("name", document.getElementById('an'+number).value);
             formdata.append("price", document.getElementById('ap'+number).value);
             formdata.append("quantity", document.getElementById('amp'+number).value);
             // console.log(formdata);

             $.ajax({
                 url: "addAddons",
           type: "POST",
           data:  formdata,
           contentType: false,
                 cache: false,
           processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
    // $("#err").fadeOut();
   },
   success: function(data)
      {
        // console.log(data);
        var readreasponse = JSON.parse(data);

        if(readreasponse.status == true){
          $('#formcount'+number).empty();
          var ids = $('#addons_id').val();

          if(ids == ''){
            ids = readreasponse.addon_id;
          }
          else
          {
           ids = ids+','+readreasponse.addon_id;
          }
          $('#addons_id').val(ids);

           // alert('#forms'+number);
          $('#forms'+number).html('<div class="alert alert-success" style="margin-top:5px;">addon added successfully</div>');        }
    }
  })

  });   



  $('#facility_numbers').keyup(function(){
            // alert('hi');
            var number = $(this).val();
            // alert(number);
            var innerOption = '';
            for(var i=1;i<=number;i++){
              innerOption = innerOption+'<div class="col-6 mb-20">'+
                                               '<label for="formLayoutUsername1">Name '+i+'</label>'+
                                               '<input type="text" id="formLayoutUsername1" name="facility_tables[]" class="form-control" >'+
                                            '</div>';
            }
            // console.log(innerOption);
            $('#boards').html(innerOption);
          })


          $('#append').click(function(){
            // alert('hi');
            // var number = $(this).val();
            // alert(number);
            var innerOption = $('#boards').html();
            var childrenCount = $('#boards .col-6').length+1;
            // alert(childrenCount);
            $('#facility_numbers').val(childrenCount);
            // console.log(childrenCount);
            // for(var i=1;i<=number;i++){
              innerOption = '<div class="col-6 mb-20">'+
                                               '<label for="formLayoutUsername1">Name '+childrenCount+'</label>'+
                                               '<input type="text" id="formLayoutUsername1" name="facility_table[]" class="form-control" >'+
                                            '</div>';

            // }
            
            $('#boards').append(innerOption);
          })

          $(document).on('click','.delete-confirm', function (event) {
              
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
})

var appendHoursAccordingDate = function(date){
 var weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
 var date = new Date(date);
 var day = weekday[date.getDay()];
    
    var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
  $.post(base_url+'Booking/getHoursBydate',   
            { day_name:day},
            function(data, status, jqXHR) {
             var res = JSON.parse(data);
             var innerHtml = '';
              for(var i=0;i<res.hours.length;i++){
               innerHtml = innerHtml+'<option>'+res.hours[i]+'</option>';
              }
              $('#hour').html(innerHtml);
             
            })

// getHoursBydate
}

var checkDateBlocked = function(date){
  var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
  $.post(base_url+'Booking/checkDateBlocked',   
            { date:date},
            function(data, status, jqXHR) {
             var res = JSON.parse(data);
             if(!res.blocked){
                 
                   $('#block_error').show(2000);
                   $('#disableme').attr('type','button');
                   return false;
             }
             else{
                $('#block_error').hide(2000);
                $('#disableme').attr('type','submit');  
                return true;
             }
             
            })
}

$('#datepicker_id').on('change',function(){
var today_date = $('#datepicker_id').val();
appendHoursAccordingDate(today_date);
checkDateBlocked(today_date);
})


$('#hour,#datepicker_id,#facility_id').on('change',function(){
               
            var today_date = $('#datepicker_id').val();

            
            var selected_hour = $('#hour').val();
            var selected_facility = $('#facility_id').val();
            var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
              // alert(base_url);
            $.post(base_url+'Booking/checkBooking',   
            { date:today_date,hour:selected_hour,game:selected_facility },
            function(data, status, jqXHR) {
             var res = JSON.parse(data);
              // console.log(res);

             if(res.validation)
             {
              $('#booking_error').show();
              $('#disableme').attr('disabled',true);
             }
             else
             {
               $('#booking_error').hide();
               $('#disableme').attr('disabled',false);
             }
            })

            
           }

            
           
           )


// var times = {}, re = /^\d+(?=:)/;

// for (var i = 13, n = 1; i < 24; i++, n++) {
//   times[i] = n < 10 ? "0" + n : n
// }

// document.getElementById("end-time")
// .onchange = function() {
//   var time = this
//   , value = time.value
//   , match = value.match(re)[0];
//   this.nextElementSibling.innerHTML =
//   (match && match >= 13 ? value.replace(re, times[match]) : value)
//   + (time.valueAsDate.getTime() < 43200000 ? " AM" : " PM")
// }

 $("#forget_form").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');
    var formdata = form.serializeArray();

    if(formdata[1].value !== formdata[2].value){
        $('#result').html('<div class="alert alert-danger">Confirm Password Not Matched</div>');
        $('#result').show(100)
        setTimeout(function(){$('#result').hide(2000);},2000);
        return false;
    }
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
                var response = JSON.parse(data);
                if(!response.validation){
                   $('#result').html('<div class="alert alert-danger">'+response.msg+'</div>');
                   $('#result').show(100)
                   setTimeout(function(){$('#result').hide(2000);},2000);
                   return false; 
                }
                else
                {
                   $('#result').html('<div class="alert alert-success">'+response.msg+'</div>');
                   $('#result').show(100)
                   setTimeout(function(){$('#result').hide(2000);},2000);
                   return false;  
                }
           }
         });

    
});  


var click = 0;
 $('.show_password').click(function(){
     click++;
      if(click%2== 0){
        $(this).siblings("input").attr('type','password');  
      }
      if(click%2 == 1){
      $(this).siblings("input").attr('type','');
  }
 })





    
})(jQuery);

