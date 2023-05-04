$(document).ready(function(){
    //Date for the calendar events (dummy data)
    $document = $(document);

    $document.find('.tay').select2();
    
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    var calendar=$("#calendrier").fullCalendar({
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
            "<div style='' class='hr-line-solid-no-margin'><span style='font-size: 13px'><u>Etudiant affecté </u> :"+event.etudiant+"</span></div>");
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
            var nom=event.title;
            var jour=event.date;
            var debut=event.heureDebut;
            var fin=event.heureFin;
            var couleur=event.couleur;
           $('#modifEvt input[name="id"]').val(id);
           $('#modifEvt input[name="formation"]').val(event.formation);
           $('#modifEvt input[name="nom"]').val(nom);
           $('#modifEvt input[name="debut"]').val(debut);
           $('#modifEvt input[name="fin"]').val(fin);
           $('#modifEvt input[name="jour"]').val(jour);
           $('#modifEvt input[name="couleur"]').val(couleur);
           $('#modifEvt .deleteEvt').attr('href',"/evenement/"+id);
           $('#modifEvt .deleteEvt').attr('data-id',id);
           $("#modifEvt").modal('show');
        },
        select:function(start,end,allDay)
        {
          //alert();
            $('#ajoutEvt input[name="debut"]').val($.fullCalendar.formatDate(start,"HH:mm"));
            $("#ajoutEvt input[name='fin']").val($.fullCalendar.formatDate(end,"HH:mm"));
            $("#ajoutEvt input[name='jour']").val($.fullCalendar.formatDate(end, "YYYY-MM-DD"));
            $('#ajoutEvt').modal('show');
        },

    });
    liste();
});