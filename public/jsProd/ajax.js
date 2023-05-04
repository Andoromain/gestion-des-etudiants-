$(document).ready(function(){
    
    $(document).on('click','.deleteEtab',function (e) {
        e.preventDefault();
        var token = $("meta[name='csrf-token']").attr("content");
        var id = $(this).data("id");
        var $a = $(this);
        var $url = $a.attr('href');
        var $tr = $a.parent().parent();
        Swal.fire({
            title: 'Etes vous sur de supprimer cet etablissement?',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, Supprime-le!'
          }).then((result) => {
            if (result.isConfirmed) {
                var jqxhr = $.ajax({
                    type: 'DELETE',
                    url: $url,
                    data: {
                        'id':id,
                        "_token": token,
                    },
                }).done(function (response, textStatus, jqXHR) {
                    $tr.fadeOut();
                    // Appel réussi : on réagit à la valeur de retour du code serveur
                    Swal.fire(('success','','success'));
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    Swal.fire(('error','','error!'));
                })
            }
    
          });
    });  

    $(document).on('click','.editEtab',function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var $a = $(this);
        $.ajax({
            type : 'GET',
            url : $a.attr('href'),
        }).done(function (data,text,jqxhr) {
            
            //console.log(jqxhr.responseText);
            
            $(document).find('.load-modal').html(jqxhr.responseText);
            //alert(jqxhr.responseText);
            $('#modifEtab').modal("show");
            //alert(''+jqxhr.responseText);
        }).fail(function(jqXHR, textStatus, errorThrown){
            alert('error');
        });
    });

    $(document).on('click','.deleteFormateur',function (e) {
        e.preventDefault();
        var token = $("meta[name='csrf-token']").attr("content");
        var id = $(this).data("id");
        var $a = $(this);
        var $url = $a.attr('href');
        var $tr = $a.parent().parent();
        Swal.fire({
            title: 'Etes vous sur de supprimer ce formateur?',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, Supprime-le!'
          }).then((result) => {
            if (result.isConfirmed) {
                var jqxhr = $.ajax({
                    type: 'DELETE',
                    url: $url,
                    data: {
                        'id':id,
                        "_token": token,
                    },
                }).done(function (response, textStatus, jqXHR) {
                    $tr.fadeOut();
                    // Appel réussi : on réagit à la valeur de retour du code serveur
                    Swal.fire(('success','','success'));
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    Swal.fire(('error','','error!'));
                })
            }
    
          });
    }); 

    $(document).on('click','.editFormateur',function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var $a = $(this);
        $.ajax({
            type : 'GET',
            url : $a.attr('href'),
        }).done(function (data,text,jqxhr) {
            
            $(document).find('.load-modal').html(jqxhr.responseText);
            //alert(jqxhr.responseText);
            $('#modifForm').modal("show");
            //alert(''+jqxhr.responseText);
        }).fail(function(jqXHR, textStatus, errorThrown){
            alert('error');
        });
    });

    $(document).on('click','.deleteUser',function (e) {
        e.preventDefault();
        var token = $("meta[name='csrf-token']").attr("content");
        var id = $(this).data("id");
        var $a = $(this);
        var $url = $a.attr('href');
        var $tr = $a.parent().parent();
        Swal.fire({
            title: 'Etes vous sur de supprimer cet utilisateur?',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, Supprime-le!'
          }).then((result) => {
            if (result.isConfirmed) {
                var jqxhr = $.ajax({
                    type: 'DELETE',
                    url: $url,
                    data: {
                        'id':id,
                        "_token": token,
                    },
                }).done(function (response, textStatus, jqXHR) {
                    $tr.fadeOut();
                    // Appel réussi : on réagit à la valeur de retour du code serveur
                    Swal.fire(('success','','success')).then((result)=>{document.location.reload()});
                }).fail(function (jqXHR, textStatus, errorThrown) {
                   
                    Swal.fire(('success','','success')).then((result)=>{document.location.reload()});
                })
            }
    
          });
    }); 

//select multiple
    $('.court').attr('disabled','');
    $('.long').attr('disabled','');
    if($('#court').is(':checked')){
        $('.court').css('display','');
        $('.court').removeAttr('disabled');
        $('.long').css('display','none');
        $('.long').attr('disabled','');
    }
    if($('#long').is(':checked')){
        $('.long').css('display','');
        $('.long').removeAttr('disabled');
        $('.court').css('display','none');
        $('.court').attr('disabled','');
    }
    

    $(document).on('click','#court',function(e){
        $('.court').css('display','');
        $('.court').removeAttr('disabled');
        $('.long').css('display','none');
        $('.long').attr('disabled','');
    });
    $(document).on('click','#long',function(e){
        $('.long').css('display','');
        $('.long').removeAttr('disabled');
        $('.court').css('display','none');
        $('.court').attr('disabled','');
    });

    $(document).on('click','.deleteEvt',function (e) {
        e.preventDefault();
        var token = $("meta[name='csrf-token']").attr("content");
        var id = $(this).data("id");
        var $a = $(this);
        var $url = $a.attr('href');
        Swal.fire({
            title: 'Etes vous sur de supprimer cet evenement?',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, Supprime-le!'
          }).then((result) => {
            if (result.isConfirmed) {
                var jqxhr = $.ajax({
                    type: 'DELETE',
                    url: $url,
                    data: {
                        'id':id,
                        "_token": token,
                    },
                }).done(function (response, textStatus, jqXHR) {
                    // Appel réussi : on réagit à la valeur de retour du code serveur
                    Swal.fire(('success','','success')).then((result)=>{document.location.reload();});
                }).fail(function (jqXHR, textStatus, errorThrown) {
                   
                    Swal.fire(('error','','error'));
                })
            }
    
          });
    }); 

    $(document).on('click','.deleteEt',function (e) {
        e.preventDefault();
        var token = $("meta[name='csrf-token']").attr("content");
        var id = $(this).data("id");
        var $a = $(this);
        var $url = $a.attr('href');
        Swal.fire({
            title: 'Etes vous sur de supprimer cet emplois du temps?',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, Supprime-le!'
          }).then((result) => {
            if (result.isConfirmed) {
                var jqxhr = $.ajax({
                    type: 'DELETE',
                    url: $url,
                    data: {
                        'id':id,
                        "_token": token,
                    },
                }).done(function (response, textStatus, jqXHR) {
                    // Appel réussi : on réagit à la valeur de retour du code serveur
                    Swal.fire(('success','','success')).then((result)=>{document.location.reload();});
                }).fail(function (jqXHR, textStatus, errorThrown) {
                   
                    Swal.fire(('error','','error'));
                })
            }
    
          });
    }); 

    $(document).on('click','.deleteSyl',function (e) {
        e.preventDefault();
        var token = $("meta[name='csrf-token']").attr("content");
        var id = $(this).data("id");
        var $a = $(this);
        var $url = $a.attr('href');
        Swal.fire({
            title: 'Etes vous sur de supprimer ce syllabus?',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, Supprime-le!'
          }).then((result) => {
            if (result.isConfirmed) {
                var jqxhr = $.ajax({
                    type: 'DELETE',
                    url: $url,
                    data: {
                        'id':id,
                        "_token": token,
                    },
                }).done(function (response, textStatus, jqXHR) {
                    // Appel réussi : on réagit à la valeur de retour du code serveur
                    Swal.fire(('success','','success')).then((result)=>{document.location.reload();});
                }).fail(function (jqXHR, textStatus, errorThrown) {
                   
                    Swal.fire(('error','','error'));
                })
            }
    
          });
    }); 

    $(document).on('click','.deleteFormation',function (e) {
        e.preventDefault();
        var token = $("meta[name='csrf-token']").attr("content");
        var id = $(this).data("id");
        var $a = $(this);
        var $url = $a.attr('href');
        var $tr = $a.parent().parent();
        Swal.fire({
            title: 'Etes vous sur de supprimer ce formateur?',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, Supprime-le!'
          }).then((result) => {
            if (result.isConfirmed) {
                var jqxhr = $.ajax({
                    type: 'DELETE',
                    url: $url,
                    data: {
                        'id':id,
                        "_token": token,
                    },
                }).done(function (response, textStatus, jqXHR) {
                    $tr.fadeOut();
                    // Appel réussi : on réagit à la valeur de retour du code serveur
                    Swal.fire(('success','','success'));
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    Swal.fire(('error','','error!'));
                })
            }
    
          });
    }); 

    $(document).on('click','.editFormation',function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var $a = $(this);
        //alert($a.attr('href')+" "+id);
        $.ajax({
            type : 'GET',
            url : $a.attr('href'),
        }).done(function (data,text,jqxhr) {
            //alert(jqxhr.responseText);
            $(document).find('.load-modal').html(jqxhr.responseText);
            //alert(jqxhr.responseText);
            $('#editForm').modal("show");
            //alert(''+jqxhr.responseText);
        }).fail(function(jqXHR, textStatus, errorThrown){
            alert('error');
        });
    });

    $(document).on('click','.deleteEtudiant',function (e) {
        e.preventDefault();
        var token = $("meta[name='csrf-token']").attr("content");
        var id = $(this).data("id");
        var $a = $(this);
        var $url = $a.attr('href');
        var $tr = $a.parent().parent();
        Swal.fire({
            title: 'Etes vous sur de supprimer cet etudiant?',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, Supprime-le!'
          }).then((result) => {
            if (result.isConfirmed) {
                var jqxhr = $.ajax({
                    type: 'DELETE',
                    url: $url,
                    data: {
                        'id':id,
                        "_token": token,
                    },
                }).done(function (response, textStatus, jqXHR) {
                    $tr.fadeOut();
                    // Appel réussi : on réagit à la valeur de retour du code serveur
                    Swal.fire(('success','','success')).then((result)=>{document.location.reload();});
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    Swal.fire(('success','','success')).then((result)=>{document.location.reload();});
                })
            }
    
          });
    });

    $(document).on('click','.genererPdfEvt',function(e){
        var moi1=$.fullCalendar.moment().startOf('week').month();
	var moi=$.fullCalendar.moment().endOf('week').month();
	var jour=$.fullCalendar.moment().endOf('week').date();
	var jour1=$.fullCalendar.moment().startOf('week').date();
	var annee=$.fullCalendar.moment().endOf('week').year();
        //alert(jour+" "+jour1);

        html2canvas($('#calendrier .fc-view-container'), {
            onrendered: function (canvas) {
                var img = canvas.toDataURL();
                    
                var docDefinition = {
                        
                        content:[
                        {
                            text: 'HAVILA School\n',
                            style: 'header'
                        },
                        {
                            image:img,
                            width:500,
                            margin: [0, 40]
                        }
                        ],
                        styles: {
                            header: {
                                fontSize: 12,
                                bold: true,
                                alignment:'center',
                            }
                        },
                };   
                pdfMake.createPdf(docDefinition).download("emploidutemps .pdf");
            }
        });

    });

    $(document).on('click','.genererPdfEt',function(e){
        var moi1=$.fullCalendar.moment().startOf('week').month();
	var moi=$.fullCalendar.moment().endOf('week').month();
	var jour=$.fullCalendar.moment().endOf('week').date();
	var jour1=$.fullCalendar.moment().startOf('week').date();
	var annee=$.fullCalendar.moment().endOf('week').year();
        //alert(jour+" "+jour1);

        html2canvas($('#calendrierEt .fc-view-container'), {
            onrendered: function (canvas) {
                var img = canvas.toDataURL();
                    
                var docDefinition = {
                        
                        content:[
                        {
                            text: 'HAVILA School\n',
                            style: 'header'
                        },
                        {
                            image:img,
                            width:500,
                            margin: [0, 40]
                        }
                        ],
                        styles: {
                            header: {
                                fontSize: 12,
                                bold: true,
                                alignment:'center',
                            }
                        },
                };   
                pdfMake.createPdf(docDefinition).download("emploidutemps .pdf");
            }
        });

    });

    $(document).on('click','.editUser',function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var $a = $(this);
        //alert($a.attr('href')+" "+id);
        $.ajax({
            type : 'GET',
            url : $a.attr('href'),
        }).done(function (data,text,jqxhr) {
            //alert(jqxhr.responseText);
            $(document).find('.load-modal').html(jqxhr.responseText);
            //alert(jqxhr.responseText);
            $('#modifForm').modal("show");
            //alert(''+jqxhr.responseText);
        }).fail(function(jqXHR, textStatus, errorThrown){
            alert('error');
        });
    });

});