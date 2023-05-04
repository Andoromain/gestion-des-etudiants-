$(document).ready(function(){
    //Date for the calendar events (dummy data)
    //alert();
    $document = $(document);

    $document.find('.tay').select2();

    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
      
    var calendar=$("#calendrierSyllabus").fullCalendar({
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
        defaultView:'agendaDay',
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
            "<div style='' class='hr-line-solid-no-margin'><span style='font-size: 13px'><u>Formateur</u> : " +event.formateur+"</span><br><span style='font-size: 13px'><u>Resumé du cours</u> : " +event.resume+"</span><br><span style='font-size: 13px'><u>Abscence</u> : " +event.absences+"</span></div>");
        },
        //on ne peut pas ajouter et clique sur l'evenement passer		
       
        eventClick:function(event)
        {
          var id=event.id;
          var formateur=event.id_formateur;
          var matiere=event.matiere;
          var date=event.date;
          var debut=event.heureDebut;
          var fin=event.heureFin;
          var resume=event.resume;
          $('#modifSyl select[name="formateur"] option[value="'+formateur+'"]').prop("selected",true);
          $('#modifSyl input[name="date"]').val(date);
          $('#modifSyl input[name="debut"]').val(debut);
          $('#modifSyl input[name="fin"]').val(fin);
          $('#modifSyl input[name="id"]').val(id);
          $('#modifSyl input[name="matiere"]').val(matiere);
          $('#modifSyl textarea[name="resume"]').val(resume);

          $('#modifSyl .deleteSyl').attr('href',"/syllabus/"+id);
          $('#modifSyl .deleteSyl').attr('data-id',id);

          $("#modifSyl").modal('show');  

        },
        select:function(start,end,allDay)
        {
          //alert();
            $('#ajoutSyl input[name="debut"]').val($.fullCalendar.formatDate(start,"HH:mm"));
            $("#ajoutSyl input[name='fin']").val($.fullCalendar.formatDate(end,"HH:mm"));
            $("#ajoutSyl input[name='date']").val($.fullCalendar.formatDate(end, "YYYY-MM-DD"));
            $('#ajoutSyl').modal('show');
        },

    });
    liste();
});