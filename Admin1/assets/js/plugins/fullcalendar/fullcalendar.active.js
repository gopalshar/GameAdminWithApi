  
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    selectable: true,
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    events: 'Calendar/fetchBlockDates',
    // events: [
    //             {
    //                 title: 'Date Blocked',
    //                 start: '2020-08-20',
                    
    //                 display: 'background',
    //                 backgroundColor : 'red'
    //             },
                
    //         ],



    dateClick: function(info) {
      // console.log(info);
      $("#myModal").modal('show');
      var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
              // alert(base_url);
            $.post(base_url+'Calendar/getBookingCountByDate',   
            { date:info.dateStr },
            function(data, status, jqXHR) {
              // console.log(data);
              // return false;
             var res = JSON.parse(data);

             
             var str='';
             if(res.isBlocked){
              str = 'YES';
             }
             else
             {
                 str = 'NO';
             }
             var booking = res.bookings.bookings;
             // console.log(booking);
             $('#tb').html(res.bookings.count);
             $("#ib").html(str);
             var table_content = '';
             var facility_array = [];
             if(booking.length > 0){
               for(var b=0;b<booking.length;b++){
                 table_content +='<tr>';
                 table_content += '<td>'+booking[b].Uname+'</td>';
                 table_content += '<td>'+booking[b].booking_hour+'</td>';
                 table_content += '<td>'+booking[b].facility_name+'</td>';
                 facility_array.push(booking[b].facility_name);
                 table_content +='</tr>';

               }

               // console.log()
               // facility_array = ['Ram','Ram','Rahul','Rahul','rajesh'];

               // console.log(facility_array);
              if(facility_array.length > 0){ 

              var count = {};
              facility_array.forEach(function(i) {  count[i] = (count[i]||0) + 1;});
              
              var facility_content ='';
              // for(var c=0;c<count.length)
              var arr1 = Object.keys(count);
              var arr2 = Object.values(count);
              for(var c=0;c<arr1.length;c++){
                facility_content += "<li>"+arr1[c]+' : '+arr2[c]+"</li>";
              }
              $('.facility_count').html(facility_content);   
              // facility_array=[];          
              }
              else{
                
               $('.facility_count').html('<p>not available<p>');              
              }
          
                
               $('#bookings').html(table_content);

             }
             else
             {

               $('#bookings').html('<p>Booking not available</p>'); 
               $('.facility_count').html('');
             }
         });

      $('#date').html(info.dateStr);

    },
    // select: function(info) {
    //   alert('selected ' + info.startStr + ' to ' + info.endStr);
    // }
  });

  calendar.render();
  

});


