                <!-- START CONTENT FRAME -->
                <div class="content-frame">            
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2><span class="fa fa-calendar"></span> Calendar</h2>
                        </div>  
                        <div class="pull-right">
                            <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
                        </div>                                                                                
                    </div>
                    <!-- END CONTENT FRAME TOP -->
                    
                    <!-- START CONTENT FRAME LEFT -->
                    <div class="content-frame-left">
                        <h4>New Event</h4>
                        <div class="form-group">
                        <form method="post" action="<?php base_url(); ?>calendar/add_new_task">
                            <div class="input-group">
                                    <input type="text" name="tugas" class="form-control" id="new-event-text" placeholder="Event text..."/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" id="new-event">Add</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        <h4>External Events</h4>
                        <div class="list-group border-bottom" id="external-events">
                            <?php foreach($task as $key => $value) : ?>
                                <div style="position:relative;">
                                    <a class="list-group-item external-event"><?php echo $value['nama']; ?></a>
                                    <a href="<?php echo base_url(); ?>calendar/delete_task/<?php echo $value['id']; ?>" class="btn btn-danger" style="position:absolute;top:10px;right:10px;height:20px;font-size:10px;border-radius:5px;display:flex;justify-content:center;align-items:center;width:20px;"><span class="fa fa-trash-o" style="margin-left:5px;"></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="push-up-10">
                            <label class="check">
                                <input type="checkbox" class="icheckbox" id="drop-remove"/> Remove after drop
                            </label>
                        </div>     
                        
                        <div class="panel panel-default push-up-10">
                            <div class="panel-body padding-top-0">
                                <h4>Fullcalendar</h4>
                                <p>FullCalendar is a jQuery plugin that provides a full-sized, drag & drop event calendar like the one below. It uses AJAX to fetch events on-the-fly and is easily configured to use your own feed format. It is visually customizable with a rich API.</p>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT FRAME LEFT -->
                    
                    <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body padding-bottom-0">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div id="alert_holder"></div>
                                <div class="calendar">                             
                                    <div id="my-calendar"></div>                            
                                </div>
                            </div>
                        </div>
                        
                    </div>                    
                    <!-- END CONTENT FRAME BODY -->
                    
                </div>               
                <!-- END CONTENT FRAME -->      
                <!-- MY FORM ADD NEW-->
                <div id="my-form-background" style="position:fixed;top:0;left:0;bottom:0;right:0;z-index:10;background-color:rgba(0,0,0,0.5);width:100%;height:100%;display:none;">

                </div>
                <div id="my-form" class="row" style="position:fixed;top:15%;left:40%;z-index:11;display:none;">
                    <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title-box">
                                <h3>Add Data</h3>
                                <span>Drag and drop for schedule</span>
                            </div>
                        </div>
                        <div class="panel-body" style="padding-left:20px;padding-right:20px;">
                            <h2 id="my-title">Special title treatment</h2>
                            <form method="post" action="<?php base_url(); ?>calendar/add_new_assignment">
                                <div class="form-group">
                                    <input id="id_tugas" type="hidden" name="id_tugas">
                                    <label for="petugas">Pilih Petugas</label>
                                    <select class="form-control" id="id_petugas" name="id_petugas" required>
                                        <option value="">Pilih Nama Petugas</option>
                                        <?php foreach($worker as $key => $value) : ?>
                                            <option value="<?php echo $value["id"]; ?>"><?php echo $value['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="start">Waktu Mulai</label>
                                    <input type="datetime-local" class="form-control" id="waktu_mulai" name="waktu_mulai">
                                </div>
                                <div class="form-group">
                                    <label for="finish">Waktu Berakhir</label>
                                    <input type="datetime-local" class="form-control" id="waktu_berakhir" name="waktu_berakhir">
                                </div>
                                <button type="submit" class="btn btn-primary" style="float:right;">ADD</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- END MY FORM ADD NEW-->
                <!-- MY FORM UPDATE-->
                <div id="my-form-background-update" style="position:fixed;top:0;left:0;bottom:0;right:0;z-index:10;background-color:rgba(0,0,0,0.5);width:100%;height:100%;display:none;">

                </div>
                <div id="my-form-update" class="row" style="position:fixed;top:15%;left:40%;z-index:11;display:none;">
                    <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title-box">
                                <h3>Update Data</h3>
                                <span>Drag and drop for schedule</span>
                            </div>   
                        </div>
                        <div class="panel-body" style="padding-left:20px;padding-right:20px;">
                            <h2 id="my-title-update">Special title treatment</h2>
                            <form method="post" action="<?php base_url(); ?>calendar/update_pembagian_tugas">
                                <div class="form-group">
                                    <input id="id-update" type="hidden" name="id">
                                    <input id="id_tugas-update" type="hidden" name="id_tugas">
                                    <label for="petugas">Pilih Petugas</label>
                                    <select class="form-control" id="id_petugas-update" name="id_petugas">
                                        <option value="">Pilih Nama Petugas</option>
                                        <?php foreach($worker as $key => $value) : ?>
                                            <option value="<?php echo $value["id"]; ?>"><?php echo $value['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="start">Waktu Mulai</label>
                                    <input type="datetime-local" class="form-control" id="waktu_mulai-update" name="waktu_mulai">
                                </div>
                                <div class="form-group">
                                    <label for="finish">Waktu Berakhir</label>
                                    <input type="datetime-local" class="form-control" id="waktu_berakhir-update" name="waktu_berakhir">
                                </div>
                                <button type="submit" class="btn btn-primary" style="float:right;">UPDATE</button>
                                <div id="my-delete-button" class="btn btn-danger" style="float:right;margin-right:10px;">DELETE</div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- END MY FORM UPDATE-->        
                <script>
                    function postAjax(url, data, success) {
                        var params = typeof data == 'string' ? data : Object.keys(data).map(
                                function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
                        ).join('&');

                        var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
                        xhr.open('POST', url);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState>3 && xhr.status==200) { success(xhr.responseText); }
                        };
                        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.send(params);
                        return xhr;
                    }

                    function retrieveData(ajaxurl) { 
						var data;
						var xhttp = new XMLHttpRequest();
						xhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								data = JSON.parse(this.responseText);
							}
						};
						xhttp.open("GET", ajaxurl, false);
						xhttp.send();
						return data;
                    };

                    function getEll(param1, param2){
                        let data;
                        switch(param1){
                            case 'id' :
                                data = document.getElementById(param2);
                                break;
                            case 'query' :
                                data = document.querySelector(param2);
                                break;
                        }
                        return data;
                    }

                    function fixDateTime(param){
                        var date = new Date(param);
                        var myDate = date.getDate();
                        myDate = myDate.toString().length == 1 ? `0${myDate}` : myDate;
                        var myMonth = date.getMonth() + 1;
                        myMonth = myMonth.toString().length == 1 ? `0${myMonth}` : myMonth;
                        var myHours = date.getHours();
                        myHours = myHours.toString().length == 1 ? `0${myHours}` : myMonth;
                        var myMinutes = date.getMinutes();
                        myMinutes = parseInt(myMinutes);
                        myMinutes = myMinutes.toString().length == 1 ? `0${myMinutes}` : myMinutes;
                        // return date.getFullYear() + '-' + myMonth + '-' + myDate + 'T' + myHours + ':' + myMinutes;
                        return date.getFullYear() + '-' + myMonth + '-' + myDate + 'T00:00';
                    }

                    function fixDateTime1(param){
                        var date = new Date(param);
                        var myDate = date.getDate();
                        myDate = myDate + 1;
                        if(myDate == 32){
                            myDate = 1;
                        }
                        myDate = myDate.toString().length == 1 ? `0${myDate}` : myDate;
                        var myMonth = date.getMonth() + 1;
                        if(myDate == '01'){
                            myMonth = myMonth + 1;
                        }
                        myMonth = myMonth.toString().length == 1 ? `0${myMonth}` : myMonth;
                        var myHours = date.getHours();
                        myHours = myHours.toString().length == 1 ? `0${myHours}` : myMonth;
                        var myMinutes = date.getMinutes();
                        myMinutes = parseInt(myMinutes);
                        myMinutes = myMinutes.toString().length == 1 ? `0${myMinutes}` : myMinutes;
                        // return date.getFullYear() + '-' + myMonth + '-' + myDate + 'T' + myHours + ':' + myMinutes;
                        return date.getFullYear() + '-' + myMonth + '-' + myDate + 'T00:00';
                    }
                    
					document.addEventListener('DOMContentLoaded', function() {
                        getEll('id', 'my-form-background').addEventListener('click', function(e){
                            getEll('id', 'my-form-background').style.display = 'none';
                            getEll('id', 'my-form').style.display = 'none';
                        });

                        getEll('id', 'my-form-background-update').addEventListener('click', function(e){
                            getEll('id', 'my-form-background-update').style.display = 'none';
                            getEll('id', 'my-form-update').style.display = 'none';
                        });

                        var event = retrieveData('http://localhost/mydashboard/calendar/get_pembagian_tugas');
                        var task = retrieveData('http://localhost/mydashboard/calendar/get_tugas');

                        var calendarEl = document.getElementById('my-calendar');

                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            timeZone: 'local',
                            plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
                            header: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                            },
                            defaultDate: '2019-08-12',
                            navLinks: true, // can click day/week names to navigate views
                            businessHours: true, // display business hours
                            editable: true,
                            eventLimit: true,
                            views: {
                                timeGrid: {
                                eventLimit: 6 // adjust to 6 only for timeGridWeek/timeGridDay
                                }
                            },
                            eventResize: function(info) { // event ketika menambahkan durasai, atau me reszie panjang element event
                                alert(info.event.title + " end is now " + info.event.end.toISOString());

                                if (!confirm("is this okay?")) {
                                    info.revert();
                                }
                            },
                            eventDrop: function(info) { // event ketika memindahkan event ke tempat lain
                                alert(info.event.title + " was dropped on " + info.event.start.toISOString());

                                if (!confirm("Are you sure about this change?")) {
                                    info.revert();
                                }

                                var data = {
                                    id: info.event.id,
                                    id_petugas: info.event.extendedProps.id_petugas,
                                    id_tugas: info.event.extendedProps.id_tugas,
                                    waktu_mulai: fixDateTime1(info.event.start.toISOString().slice(0,16)),
                                    waktu_berakhir: fixDateTime(info.event._instance.range.end.toISOString().slice(0,16)),
                                }
                                
                                postAjax('http://localhost/mydashboard/calendar/update_pembagian_tugas', data, function(data){
                                    console.log(data);
                                });
                            },
                            eventClick: function(info) {
                                // alert('Event: ' + info.event.title);
                                // alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                                // alert('View: ' + info.view.type);

                                // // change the border color just for fun
                                // info.el.style.borderColor = 'red';

                                // if the task already inserted into db
                                if(info.event.id.length !== 0){
                                    getEll('id', 'my-form-background-update').style.display = 'block';
                                    getEll('id', 'my-form-update').style.display = 'block';
                                    getEll('id', 'my-title-update').innerText = info.event.title;
                                    var id = task.filter((obj, i) => obj.nama === info.event.title)[0].id;
                                    getEll('id', 'id_tugas-update').value = id;
                                    getEll('id', 'id_petugas-update').selectedIndex = info.event.extendedProps.id_petugas;
                                    getEll('id', 'id-update').value = info.event.id;
                                    // getEll('id', 'waktu_mulai-update').value = info.event.start.toISOString().slice(0,16);
                                    var newDate = new Date(info.event.start.toISOString().slice(0,11) + '00:00');
                                    newDate = newDate.getDate() + 1;
                                    var check = 0
                                    if(newDate == 32){
                                        newDate = 1;
                                        check = 1;
                                    }
                                    newDate = newDate.toString().length == 1 ? `0${newDate}` : newDate;
                                    var x = parseInt(info.event.start.toISOString().slice(5,7));
                                    x = x + 1;
                                    x = x.toString().length == 1 ? `0${x}` : x;
                                    newDate = !check ? info.event.start.toISOString().slice(0,8) + newDate + 'T00:00' : info.event.start.toISOString().slice(0,4) + "-" + x + '-' + newDate + 'T00:00';
                                    getEll('id', 'waktu_mulai-update').value = newDate;
                                    getEll('id', 'waktu_berakhir-update').value = info.event._instance.range.end.toISOString().slice(0,16);
                                    
                                    getEll('id', 'my-delete-button').addEventListener('click', function(e){
                                        window.location.href = `http://localhost/mydashboard/calendar/delete_pembagian_tugas/${info.event.id}`;
                                    });
                                }else{
                                    getEll('id', 'my-form-background').style.display = 'block';
                                    getEll('id', 'my-form').style.display = 'block';
                                    getEll('id', 'my-title').innerText = info.event.title;
                                    var id = task.filter((obj, i) => obj.nama === info.event.title)[0].id;
                                    getEll('id', 'id_tugas').value = id;
                                    // getEll('id', 'waktu_mulai').value = info.event.start.toISOString().slice(0,11) + '00:00';
                                    var newDate = new Date(info.event.start.toISOString().slice(0,11) + '00:00');
                                    newDate = newDate.getDate() + 1;
                                    var check = 0
                                    if(newDate == 32){
                                        newDate = 1;
                                        check = 1;
                                    }
                                    newDate = newDate.toString().length == 1 ? `0${newDate}` : newDate;
                                    var x = parseInt(info.event.start.toISOString().slice(5,7));
                                    x = x + 1;
                                    x = x.toString().length == 1 ? `0${x}` : x;
                                    newDate = !check ? info.event.start.toISOString().slice(0,8) + newDate + 'T00:00' : info.event.start.toISOString().slice(0,4) + "-" + x + '-' + newDate + 'T00:00';
                                    getEll('id', 'waktu_mulai').value = newDate;
                                    getEll('id', 'waktu_berakhir').value = info.event._instance.range.end.toISOString().slice(0,11) + '00:00';
                                    getEll('id', 'id_petugas').selectedIndex = 0;
                                }

                            },
                            eventMouseEnter: function(info){
                                // console.log(info.event.title);
                                // console.log(info.event.id);
                                // console.log(info.event);
                            },
                            events: event,
                            drop: function(arg) {
                                // is the "remove after drop" checkbox checked?
                                if (document.getElementById('drop-remove').checked) {
                                    // if so, remove the element from the "Draggable Events" list
                                    arg.draggedEl.parentNode.removeChild(arg.draggedEl);
                                }
                            },
                        });

                        var Draggable = FullCalendarInteraction.Draggable
                        var containerEl = document.getElementById('external-events');
                        new Draggable(containerEl, {
                            itemSelector: '.list-group-item',
                            eventData: function(eventEl) {
                                return {
                                    title: eventEl.innerText.trim()
                                }
                            }
                        });

                        calendar.render();
                    });
                </script>