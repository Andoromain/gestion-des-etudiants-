$(document).ready(function(){
    //Date for the calendar events (dummy data)
    
    
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    var calendar=$("#calendrierEt").fullCalendar({
        locale:'fr',
        header:
        {
          left:'prev,next,today',
          center:'title',
          right:'agendaWeek,agendaDay,list',
      },
      buttonText :{
      today:    'Aujourd\'hui',
      month:    'Mois',
      week:     'Semaine',
      day:      'Jour',
      list:     'Liste'
      },
      columnFormat:'dddd D MMMM',
        defaultView:'agendaWeek',
        selectable:true,
        weekly:true,
        selectHelper:true,
        minTime:'06:00:00',
        maxTime:'18:30:00',
        allDaySlot:false,
        navLinks:true,
        editable:false,
        eventBackgroundColor:'black',
        eventTextColor :'white',
        eventBorderColor:"#ccc",
        slotLabelFormat:"HH:mm",
        disableDragging: false,
        disableResizing:false,
        selectOverlap:false,
        eventRender:function(event,element,view){
          element.find('.fc-title').append(
            "<div style='' class='hr-line-solid-no-margin'><span style='font-size: 13px'><u>Enseignée par :</u> "+event.titre+" "+event.formateur+"</span></div>");
        },
        //on ne peut pas ajouter et clique sur l'evenement passer		
        selectConstraint:
        {
        start:$.fullCalendar.moment().subtract(0,'days'),
        end:$.fullCalendar.moment().startOf('month').add(6,'month')
        }, 
        eventClick:function(event)
        {
          var id=event.id;
          var formateur=event.id_formateur;
          var etab=event.id_etab;
          var formation=event.id_frtion;
          var matiere=event.id_parc;
          var date=event.date;
          var debut=event.heureDebut;
          var fin=event.heureFin;
          var matiere=event.id_parc;
          $('#modifEt select[name="formateur"] option[value="'+formateur+'"]').prop("selected",true);
          $('#modifEt select[name="matiere"] option[value="'+matiere+'"]').prop("selected",true);
          $('#modifEt input[name="jour"]').val(date);
          $('#modifEt input[name="debut"]').val(debut);
          $('#modifEt input[name="fin"]').val(fin);
          $('#modifEt input[name="id"]').val(id);
          $('#modifEt input[name="formation"]').val(formation);

          $('#modifEt .deleteEt').attr('href',"/emploisdutemps/"+id);
          $('#modifEt .deleteEt').attr('data-id',id);
          $("#modifEt").modal('show');  
        },
        select:function(start,end,allDay)
        {
          //alert();
            $('#ajoutEt input[name="debut"]').val($.fullCalendar.formatDate(start,"HH:mm"));
            $("#ajoutEt input[name='fin']").val($.fullCalendar.formatDate(end,"HH:mm"));
            $("#ajoutEt input[name='jour']").val($.fullCalendar.formatDate(end, "YYYY-MM-DD"));
            $('#ajoutEt').modal('show');
        },

    });
    liste();
});