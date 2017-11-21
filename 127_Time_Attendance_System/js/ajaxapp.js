/**
 * Created by Mizan on 9/19/2016.
 */
//start: default ajax funciton
var request = {
    method   : 'GET',
    route    : '',
    action   : '',
    data     : '',
    sync     : false
};
/*
 * retreiving status
 *
 * Alive when connected with server
 * true - connected (retriving from server)
 * false - not connected (not retriving from server)
 * */
ajaxappConnectionStatus = false;

var ajaxapp = {
    /*
    * Project base url
    *
    * @type string
    * */
    baseUrl  : HTTP_SERVER, //HTTP_SERVER
    /*
    * Status bar which indicate status for your connection, login, retrive queue in browser window
    *
    * @type string
    * */
    StatusBar  : "enable",//enable,disabled
    /*
    * Status bar position in browser window
    *01 = top left
    *02 = top mid
    *03 = top right
    *04 = right top
    *05 = right mid
    *06 = right bottom
    *07 = bottom right
    *08 = bottom mid
    *09 = bottom left
    *10 = left bottom
    *11 = left mid
    *12 = left top
    *
    *  @type number
    *  @12 positions
    * */
    StatusBarPosition : 5,
    /*
    * If login enable is false then login status indicator in browser window will not show
    * Also login notification will not show
    *
    * @type boolean
    * */
    loginEnable : true,
    /*
    * System login and connection check interval time
    *
    * @type number
    * @value 1000 = 1 second
    * */
    LogConCheckInterval : 30000,

    /*
    * Notification parameters popup text notification in browser window and audio notification
    * */
Notification : {
        'Text'  : {//this is for text notification
            status : "enable",
            position : "top left",
            //1 = top left
            //2 = top mid
            //3 = top right
            //4 = right mid
            //5 = bottom right
            //6 = bottom mid
            //7 = bottom left
            //8 = left mid
            max    : 3,
            style  : "vertical",
            //1 = vertical
            //1 = Horizontal
            time : 2000,
            // Notification hang on the screen for...
            fade_out_speed : 1000
            // how fast the notices fade out

        },
        'Audio' : {//this is for audio (sound) notification
            status : "disable",//enable/disable
            volume : "50%"
        }
    },
    color: "red",
    progress_style:1,
    /*
    * Request to the server
    *
    * evalString1 - when request success
    * evalString2 - when request failed
    * */
    request: function (evalString1 = null, evalString2 = null)
    {

        var return_data;
        /*
         var protocol = window.location.protocol;
         var host     = window.location.hostname;
         var path     = window.location.pathname;
         var url      = protocol+"//"+host+path;
         */
        request.token = (ajaxapp.checkCookie('token')) ? ajaxapp.getCookie('token') : '' ;//add token in data object

        ajaxapp.retrive.status.set("start");

        ajaxapp.route = ajaxapp.urlClear(ajaxapp.baseUrl+'/'+request.route);
        $.ajax({

            //start for progress bar and percentage
            xhr: function(){
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", progressHandler, false);//this is main function for progress bar
                return xhr;
            },
            type     : request.method,
            url      : ajaxapp.route,
            data     : {route:request.route, action:request.action, _token:request.data['_token'], data:request.data},
            dataType : "html",
            processData: true,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            async    : request.sync,//false = stop other event until ajax request completed
            success: function(data)
            {
                ajaxapp.retrive.status.set("end");
                /*
                if(($("#login_status").hasClass("logout")))
                {
                    ajaxapp.login.status.set("enable");
                    ajaxapp.notify.text('Now You have login');
                }
                */
                if($("#conn_status").hasClass("disconnect"))
                {
                    ajaxapp.connection.status.set("enable");
                    ajaxapp.notify.text('Great! Server Reconnected');
                }

                //var res= JSON.parse(data);
                var res = jQuery.parseJSON(data);

                if(res['Message']!=null && res['Message']!='')
                {
                    var x,i=1;
                    for(x in res['Message'].text)
                    {
                        ajaxapp.notify.text(res['Message'].text[x]);
                    }
                }

                if(res['LoginStatus']==1)
                {
                    ajaxapp.login.status.set("enable");
                   //ajaxapp.login.status.get();
                }//not login and not success
                else
                {
                    ajaxapp.login.status.set("disable");
                }//login and success

                if(res['SuccessStatus']==1)
                {
                    return_data = res['ResponseData'] ;
                    eval(evalString1);
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                ajaxapp.retrive.status.set("end");
                ajaxapp.login.status.set("disable");
                //notify_message('Status : '+XMLHttpRequest.status+', Error : '+XMLHttpRequest.statusText);
                ajaxapp.notify.text('Status : '+XMLHttpRequest.status+', Error : '+XMLHttpRequest.statusText);

                if(XMLHttpRequest.status >= 200 && XMLHttpRequest.status < 304) {//no error

                    ajaxapp.connection.status.set("enable");
                    //notify_message("Warning: Connected with Internet but created few problems. Please Notify the developer=+8801818842431");
                    ajaxapp.notify.text("Warning: Connected with Internet but created few problems. Please Notify the developer=+8801818842431");
                    //notify_play('4');
                }
                else if(XMLHttpRequest.status==404)
                {

                    ajaxapp.connection.status.set("enable");
                    //notify_message('File ('+baseUrl+') removed from server! Please Notify developer=+8801818842431');
                    ajaxapp.notify.text('File ('+ajaxapp.route+') removed from server! Please Notify developer=+8801818842431');
                    //notify_play("4");

                }else{

                    ajaxapp.connection.status.set("disable");
                    //notify_message('Warning: Maybe Server Disconnected (Internet Disconnected)! <br>Please connect with Server (Internet)');
                    ajaxapp.notify.text('Warning : Maybe Server Disconnected (Internet Disconnected)! <br>Please connect with server (Internet)');
                    setTimeout(function(){ ajaxapp.connection.status.get() }, ajaxapp.LogConCheckInterval); //for connection check after 3 seconds
                }
                eval(evalString2);
            }
        });

        return return_data;
    },
    /*
    * Multi slashing url clear
    * */
    urlClear : function (url){return url.replace(/([^:]\/)\/+/g, "$1")},
    setCookie : function (cname, cvalue, exdays){
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    },
    getCookie : function(cname){
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i=0; i<ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1);
            if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
        }
        return "";
    },
    checkCookie : function (cname){
        if(this.getCookie(cname) == null) {
            return true;
        } else {
            return false;
        }
    },
    /*
    * Notification bar content, which will added to html in site loading time
    * */
    html :
        '<div class="nofification-sound">' +
        '<audio controls  id="notifysou_success">' +
        '<source src="view/notification_sound/success.mp3" type="audio/mpeg">' +
        '<source src="view/notification_sound/success.ogg" type="audio/ogg">' +
        '<embed height="50" width="100" src="view/notification_sound/success.mp3">' +
        '</audio>' +
        '<audio controls  id="notifysou_attention">' +
        '<source src="view/notification_sound/attention.mp3" type="audio/mpeg">' +
        '<source src="view/notification_sound/attention.ogg" type="audio/ogg">' +
        '<embed height="50" width="100" src="view/notification_sound/attention.mp3">' +
        '</audio>' +
        '<audio controls  id="notifysou_warning">' +
        '<source src="view/notification_sound/warning.mp3" type="audio/mpeg">' +
        '<source src="view/notification_sound/warning.ogg" type="audio/ogg">' +
        '<embed height="50" width="100" src="view/notification_sound/warning.mp3">' +
        '</audio>' +
        '<audio controls  id="notifysou_wellcome">' +
        '<source src="view/notification_sound/wellcome.mp3" type="audio/mpeg">' +
        '<source src="view/notification_sound/wellcome.ogg" type="audio/ogg">' +
        '<embed height="50" width="100" src="view/notification_sound/wellcome.mp3">' +
        '</audio>' +
        '</div>' +

        '<div class="notification-con"></div>' +

        '<div class="s-sid-pos-con-m right-mid three-link">' +
        '<div class="s-sid-con-main">' +
        '<a class="every login-status-con" href="#">' +
        '<div id="login_status" class="icon" title="Login"></div>' +
        '<div class="text">Login Status</div>' +
        '</a>' +
        '<a class="every conn-status-con" href="#">' +
        '<div id="conn_status" class="icon" title="Connected"></div>' +
        '<div class="text">Connection Status</div>' +
        '</a>' +
        '<a class="every retriving-status-con" href="#">' +
        '<div id="retriving_status" class="icon retriving_status stop" title="Retriving..."><div id="retriving_queue_number" class="retriving-queue-number">0</div></div>' +
        '<div class="text">Retriving Status</div>' +
        '</a>' +
        '</div>' +
        '</div>' +
        '<img style="display:none" src="view/image/refreshing_start.gif">',
    /*
    * Text and Audio notifier
    * */
    notify : {
        text : function(text,title,image){
            $.gritter.add({
                title: title,
                text: text,
                sticky: false,
                image: image,//"assets/img/user-4.jpg",
                before_open: function() {
                    if ($(".gritter-item-wrapper").length >= 3) {
                        $(".gritter-item-wrapper:first-child").hide(1000, function(){
                            $(".gritter-item-wrapper:first-child").remove();
                        });
                        return true
                    }
                }
            });
        },
        audio : function(mode){
            var audio = new Array();
            var alength=document.getElementsByTagName("audio").length;
            for (i = 0; i < alength; i++) {
                audio[i] = document.getElementsByTagName("audio")[i];
                audio[i].pause();
                audio[i].currentTime = 0;
            }

            if     (mode==1)  {document.getElementById('notifysou_success').play();}
            else if(mode==2)  {document.getElementById('notifysou_attention').play();}
            else if(mode==3)  {document.getElementById('notifysou_warning').play();}
            else if(mode==4)  {document.getElementById('notifysou_wellcome').play();}
            else{}

        }
    },

    login : {
        status : {
            set : function(status){
                if(status=="disable"){$("#login_status").addClass("logout");$("#login_status").attr("title","Login Expired");}
                else{$("#login_status").removeClass("logout");$("#login_status").attr("title","Login");}
            },
            lcs : 0,// 0=login check not running,  1=login check already running
            get : function(){
                if(ajaxapp.login.status.lcs==0){//if other login checking system running then refuse it

                    ajaxapp.login.status.lcs=1;

                    request.method   = "GET"          ;
                    request.route    = 'login/status' ;
                    request.action   = ''             ;
                    request.data     = ''             ;
                    request.sync     = false          ;
                    ajaxapp.request();

                    setTimeout(function(){ ajaxapp.login.status.lcs=0; }, ajaxapp.LogConCheckInterval);//xx second wait
                }
            }
        }
    },
    connection : {
        status : {
            set : function(status){

                if(status=="disable"){$("#conn_status").addClass("disconnect");$("#conn_status").attr("title","Disconnected");}
                else{$("#conn_status").removeClass("disconnect");$("#conn_status").attr("title","Connected");}
            },
            ccs : 0,// 0=connection check not running,  1=connection check already running
            get : function(){
                if(ajaxapp.connection.status.ccs==0){//if other login checking system running then refuse it

                    ajaxapp.connection.status.ccs=1;
                    setTimeout(function(){  ajaxapp.connection.status.ccs=0; }, ajaxapp.LogConCheckInterval);//xx second wait

                    request.method   = "GET"                    ;
                    request.route    = 'connection/status';
                    request.action   = ''                       ;
                    request.data     = ''                       ;
                    request.sync     = false                    ;

                    ajaxapp.request();
                }
            }
        }
    },
    retrive : {
        status : {
            rqc:0,//retriving_queue_count
            set : function()
            {
                var rqc = ajaxapp.retrive.status.rqc;

                if(status=="start")
                {
                    if(rqc==0)
                    {
                        $("#retriving_status").removeClass("stop");
                        $("#retriving_status").addClass("start");
                    }
                    ajaxapp.retrive.status.rqc++;
                    $("#retriving_queue_number").html(ajaxapp.retrive.status.rqc);
                }
                else if(status=="end")
                {
                    ajaxapp.retrive.status.rqc--;
                    $("#retriving_queue_number").html(ajaxapp.retrive.status.rqc);
                    if(ajaxapp.retrive.status.rqc==0)
                    {
                        $("#retriving_status").removeClass("start");
                        $("#retriving_status").addClass("stop");
                    }
                }
                else{}
            }
        }
    },
    initialize : function()
    {
        $("body").append(ajaxapp.html);

        if(ajaxapp.loginEnable==true)
        {
            ajaxapp.login.status.get();//startup check
            setInterval(function(){ ajaxapp.login.status.get() }, ajaxapp.LogConCheckInterval);//continuous login checking system
        }
        else
        {
            $('.login-status-con').hide();
            //ajaxapp.connection.status.get();//startup login check, user is login or not
            setInterval(function(){ ajaxapp.connection.status.get();  }, ajaxapp.LogConCheckInterval);//continuous connection checking system
        }
    }
};

function progressHandler(event){
/*
    var percent =Math.round( (event.loaded / event.total) * 100 );

    if(ajaxapp.progress_style==1){//in image progress bar

        progress_bar  = '<div class="progress">';
        progress_bar += '  <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"> 60% </div>';
        progress_bar += '</div>';

        //var pgb=element.parent().children('.progress');
        var pgb=element.parent().append(progress_bar);
        element.parent().children('.progress').children('.progress-bar').css('width',percent+'%');
        element.parent().children('.progress').children('.progress-bar').text(percent+'%');
        if(percent==100){element.parent().children('.progress').remove();}
    }
 */
}

$(document).ready(function(){
    ajaxapp.initialize();
});

/*
 * Gritter for jQuery
 * http://www.boedesign.com/
 *
 * Copyright (c) 2012 Jordan Boesch
 * Dual licensed under the MIT and GPL licenses.
 *
 * Date: February 24, 2012
 * Version: 1.7.4
 */

(function($){

    /**
     * Set it up as an object under the jQuery namespace
     */
    $.gritter = {};

    /**
     * Set up global options that the user can over-ride
     */
    $.gritter.options = {
        position: '',
        class_name: '', // could be set to 'gritter-light' to use white notifications
        fade_in_speed: 'medium', // how fast notifications fade in
        fade_out_speed: ajaxapp.Notification.Text.fade_out_speed, // how fast the notices fade out
        time: ajaxapp.Notification.Text.time // hang on the screen for...
    }

    /**
     * Add a gritter notification to the screen
     * @see Gritter#add();
     */
    $.gritter.add = function(params){

        try {
            return Gritter.add(params || {});
        } catch(e) {

            var err = 'Gritter Error: ' + e;
            (typeof(console) != 'undefined' && console.error) ?
                console.error(err, params) :
                alert(err);

        }

    }

    /**
     * Remove a gritter notification from the screen
     * @see Gritter#removeSpecific();
     */
    $.gritter.remove = function(id, params){
        Gritter.removeSpecific(id, params || {});
    }

    /**
     * Remove all notifications
     * @see Gritter#stop();
     */
    $.gritter.removeAll = function(params){
        Gritter.stop(params || {});
    }

    /**
     * Big fat Gritter object
     * @constructor (not really since its object literal)
     */
    var Gritter = {

        // Public - options to over-ride with $.gritter.options in "add"
        position: '',
        fade_in_speed: '',
        fade_out_speed: '',
        time: '',

        // Private - no touchy the private parts
        _custom_timer: 0,
        _item_count: 0,
        _is_setup: 0,
        _tpl_close: '<a class="gritter-close" href="#" tabindex="1">X</a>',
        _tpl_title: '<span class="gritter-title">[[title]]</span>',
        _tpl_item: '<div id="gritter-item-[[number]]" class="gritter-item-wrapper [[item_class]]" style="display:none" role="alert"><div class="gritter-top"></div><div class="gritter-item">[[close]][[image]]<div class="[[class_name]]">[[title]]<p>[[text]]</p></div><div style="clear:both"></div></div><div class="gritter-bottom"></div></div>',
        _tpl_wrap: '<div id="gritter-notice-wrapper"></div>',

        /**
         * Add a gritter notification to the screen
         * @param {Object} params The object that contains all the options for drawing the notification
         * @return {Integer} The specific numeric id to that gritter notification
         */
        add: function(params){
            // Handle straight text
            if(typeof(params) == 'string'){
                params = {text:params};
            }

            // We might have some issues if we don't have a title or text!
            if(params.text === null){
                throw 'You must supply "text" parameter.';
            }

            // Check the options and set them once
            if(!this._is_setup){
                this._runSetup();
            }

            // Basics
            var title = params.title,
                text = params.text,
                image = params.image || '',
                sticky = params.sticky || false,
                item_class = params.class_name || $.gritter.options.class_name,
                position = $.gritter.options.position,
                time_alive = params.time || '';

            this._verifyWrapper();

            this._item_count++;
            var number = this._item_count,
                tmp = this._tpl_item;

            // Assign callbacks
            $(['before_open', 'after_open', 'before_close', 'after_close']).each(function(i, val){
                Gritter['_' + val + '_' + number] = ($.isFunction(params[val])) ? params[val] : function(){}
            });

            // Reset
            this._custom_timer = 0;

            // A custom fade time set
            if(time_alive){
                this._custom_timer = time_alive;
            }

            var image_str = (image != '') ? '<img src="' + image + '" class="gritter-image" />' : '',
                class_name = (image != '') ? 'gritter-with-image' : 'gritter-without-image';

            // String replacements on the template
            if(title){
                title = this._str_replace('[[title]]',title,this._tpl_title);
            }else{
                title = '';
            }

            tmp = this._str_replace(
                ['[[title]]', '[[text]]', '[[close]]', '[[image]]', '[[number]]', '[[class_name]]', '[[item_class]]'],
                [title, text, this._tpl_close, image_str, this._item_count, class_name, item_class], tmp
            );

            // If it's false, don't show another gritter message
            if(this['_before_open_' + number]() === false){
                return false;
            }

            $('#gritter-notice-wrapper').addClass(position).append(tmp);

            var item = $('#gritter-item-' + this._item_count);

            item.fadeIn(this.fade_in_speed, function(){
                Gritter['_after_open_' + number]($(this));
            });

            if(!sticky){
                this._setFadeTimer(item, number);
            }

            // Bind the hover/unhover states
            $(item).bind('mouseenter mouseleave', function(event){
                if(event.type == 'mouseenter'){
                    if(!sticky){
                        Gritter._restoreItemIfFading($(this), number);
                    }
                }
                else {
                    if(!sticky){
                        Gritter._setFadeTimer($(this), number);
                    }
                }
                Gritter._hoverState($(this), event.type);
            });

            // Clicking (X) makes the perdy thing close
            $(item).find('.gritter-close').click(function(){
                Gritter.removeSpecific(number, {}, null, true);
                return false;
            });

            return number;

        },

        /**
         * If we don't have any more gritter notifications, get rid of the wrapper using this check
         * @private
         * @param {Integer} unique_id The ID of the element that was just deleted, use it for a callback
         * @param {Object} e The jQuery element that we're going to perform the remove() action on
         * @param {Boolean} manual_close Did we close the gritter dialog with the (X) button
         */
        _countRemoveWrapper: function(unique_id, e, manual_close){

            // Remove it then run the callback function
            e.remove();
            this['_after_close_' + unique_id](e, manual_close);

            // Check if the wrapper is empty, if it is.. remove the wrapper
            if($('.gritter-item-wrapper').length == 0){
                $('#gritter-notice-wrapper').remove();
            }

        },

        /**
         * Fade out an element after it's been on the screen for x amount of time
         * @private
         * @param {Object} e The jQuery element to get rid of
         * @param {Integer} unique_id The id of the element to remove
         * @param {Object} params An optional list of params to set fade speeds etc.
         * @param {Boolean} unbind_events Unbind the mouseenter/mouseleave events if they click (X)
         */
        _fade: function(e, unique_id, params, unbind_events){

            var params = params || {},
                fade = (typeof(params.fade) != 'undefined') ? params.fade : true,
                fade_out_speed = params.speed || this.fade_out_speed,
                manual_close = unbind_events;

            this['_before_close_' + unique_id](e, manual_close);

            // If this is true, then we are coming from clicking the (X)
            if(unbind_events){
                e.unbind('mouseenter mouseleave');
            }

            // Fade it out or remove it
            if(fade){

                e.animate({
                    opacity: 0
                }, fade_out_speed, function(){
                    e.animate({ height: 0 }, 300, function(){
                        Gritter._countRemoveWrapper(unique_id, e, manual_close);
                    })
                })

            }
            else {

                this._countRemoveWrapper(unique_id, e);

            }

        },

        /**
         * Perform actions based on the type of bind (mouseenter, mouseleave)
         * @private
         * @param {Object} e The jQuery element
         * @param {String} type The type of action we're performing: mouseenter or mouseleave
         */
        _hoverState: function(e, type){

            // Change the border styles and add the (X) close button when you hover
            if(type == 'mouseenter'){

                e.addClass('hover');

                // Show close button
                e.find('.gritter-close').show();

            }
            // Remove the border styles and hide (X) close button when you mouse out
            else {

                e.removeClass('hover');

                // Hide close button
                e.find('.gritter-close').hide();

            }

        },

        /**
         * Remove a specific notification based on an ID
         * @param {Integer} unique_id The ID used to delete a specific notification
         * @param {Object} params A set of options passed in to determine how to get rid of it
         * @param {Object} e The jQuery element that we're "fading" then removing
         * @param {Boolean} unbind_events If we clicked on the (X) we set this to true to unbind mouseenter/mouseleave
         */
        removeSpecific: function(unique_id, params, e, unbind_events){

            if(!e){
                var e = $('#gritter-item-' + unique_id);
            }

            // We set the fourth param to let the _fade function know to
            // unbind the "mouseleave" event.  Once you click (X) there's no going back!
            this._fade(e, unique_id, params || {}, unbind_events);

        },

        /**
         * If the item is fading out and we hover over it, restore it!
         * @private
         * @param {Object} e The HTML element to remove
         * @param {Integer} unique_id The ID of the element
         */
        _restoreItemIfFading: function(e, unique_id){

            clearTimeout(this['_int_id_' + unique_id]);
            e.stop().css({ opacity: '', height: '' });

        },

        /**
         * Setup the global options - only once
         * @private
         */
        _runSetup: function(){

            for(opt in $.gritter.options){
                this[opt] = $.gritter.options[opt];
            }
            this._is_setup = 1;

        },

        /**
         * Set the notification to fade out after a certain amount of time
         * @private
         * @param {Object} item The HTML element we're dealing with
         * @param {Integer} unique_id The ID of the element
         */
        _setFadeTimer: function(e, unique_id){

            var timer_str = (this._custom_timer) ? this._custom_timer : this.time;
            this['_int_id_' + unique_id] = setTimeout(function(){
                Gritter._fade(e, unique_id);
            }, timer_str);

        },

        /**
         * Bring everything to a halt
         * @param {Object} params A list of callback functions to pass when all notifications are removed
         */
        stop: function(params){

            // callbacks (if passed)
            var before_close = ($.isFunction(params.before_close)) ? params.before_close : function(){};
            var after_close = ($.isFunction(params.after_close)) ? params.after_close : function(){};

            var wrap = $('#gritter-notice-wrapper');
            before_close(wrap);
            wrap.fadeOut(function(){
                $(this).remove();
                after_close();
            });

        },

        /**
         * An extremely handy PHP function ported to JS, works well for templating
         * @private
         * @param {String/Array} search A list of things to search for
         * @param {String/Array} replace A list of things to replace the searches with
         * @return {String} sa The output
         */
        _str_replace: function(search, replace, subject, count){

            var i = 0, j = 0, temp = '', repl = '', sl = 0, fl = 0,
                f = [].concat(search),
                r = [].concat(replace),
                s = subject,
                ra = r instanceof Array, sa = s instanceof Array;
            s = [].concat(s);

            if(count){
                this.window[count] = 0;
            }

            for(i = 0, sl = s.length; i < sl; i++){

                if(s[i] === ''){
                    continue;
                }

                for (j = 0, fl = f.length; j < fl; j++){

                    temp = s[i] + '';
                    repl = ra ? (r[j] !== undefined ? r[j] : '') : r[0];
                    s[i] = (temp).split(f[j]).join(repl);

                    if(count && s[i] !== temp){
                        this.window[count] += (temp.length-s[i].length) / f[j].length;
                    }

                }
            }

            return sa ? s : s[0];

        },

        /**
         * A check to make sure we have something to wrap our notices with
         * @private
         */
        _verifyWrapper: function(){

            if($('#gritter-notice-wrapper').length == 0){
                $('body').append(this._tpl_wrap);
            }

        }

    }

})(jQuery);
//end : gritter

//start : for get local date and time
function js_yyyy_mm_dd_hh_mm_ss () {
    now = new Date();
    year = "" + now.getFullYear();
    month = "" + (now.getMonth() + 1); if (month.length == 1) { month = "0" + month; }
    day = "" + now.getDate(); if (day.length == 1) { day = "0" + day; }
    hour = "" + now.getHours(); if (hour.length == 1) { hour = "0" + hour; }
    minute = "" + now.getMinutes(); if (minute.length == 1) { minute = "0" + minute; }
    second = "" + now.getSeconds(); if (second.length == 1) { second = "0" + second; }
    return year + "-" + month + "-" + day + " " + hour + ":" + minute + ":" + second;
}

//end : for get local date and time