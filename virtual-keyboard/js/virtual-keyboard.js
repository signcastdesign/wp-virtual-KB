/*  jQuery.browser.mobile (http://detectmobilebrowser.com/)
    jQuery.browser.mobile will be true if the browser is a mobile device */
(function(a){(jQuery.browser=jQuery.browser||{}).mobile=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))})(navigator.userAgent||navigator.vendor||window.opera);
    
window.onload = function(){

    if (!jQuery.browser.mobile) {

    function CVK_changeCVK_windowHeight() {
        if (jQuery('.CVK_keyboard_popup').is(':visible')) {
            var CVK_windowHeight = jQuery(document).height()+192;
            document.getElementsByTagName('body')[0].style.height = CVK_windowHeight + "px";
        } else {
            var CVK_windowHeight = jQuery(document).height()-288;
            document.getElementsByTagName('body')[0].style.height = CVK_windowHeight + "px";
        }
    }     
    function CVK_changeDataButtons(i) {
        jQuery('.CVK_main_buttons, .CVK_extra_button1, .CVK_extra_button2, .CVK_optional-button1, .CVK_optional-button2, .CVK_optional-button3').each(function(){
            var numberOfChar = parseInt(jQuery(this).data("main"));
            if (numberOfChar>=0) {
                var mainChar = CVK_langStringArray.keys[numberOfChar][i]||'';
                jQuery(this).html(mainChar);   
            }
        });
    }    
    
    function CVK_opt1DataButtons() {
        jQuery('.CVK_main_buttons, .CVK_extra_button1, .CVK_extra_button2').each(function(){
            var numberOfChar = parseInt(jQuery(this).data("main"));
            if (numberOfChar>=0) {
                if (CVK_shiftClicked || CVK_capslockClicked) {
                    var mainChar = CVK_langStringArray.keys[numberOfChar][4]||'';
                    jQuery(this).html(mainChar);                                          
                } else {
                    var mainChar = CVK_langStringArray.keys[numberOfChar][3]||'';
                    jQuery(this).html(mainChar);                      
                }
            }
        });        
    }

    function CVK_invertColor(hexTripletColor) {
        var color = hexTripletColor;
        color = color.substring(1);           // remove #
        color = parseInt(color, 16);          // convert to integer
        color = 0xFFFFFF ^ color;             // invert three bytes
        color = color.toString(16);           // convert to hex
        color = ("000000" + color).slice(-6); // pad with leading zeros
        color = "#" + color;                  // prepend #
        return color;
    }
    function CVK_rgb2hex(orig){
     var rgb = orig.replace(/\s/g,'').match(/^rgba?\((\d+),(\d+),(\d+),?(\d+?.?\d+?\d+?)?/i);
        //console.log(rgb);
     if (rgb) {
         var opacity = 1;         
         if (rgb[4]) {
            opacity = parseFloat(rgb[4]);
         }
         var firstColor = parseInt(rgb[1],10) * opacity + (1-opacity)*255;
         var secondColor = parseInt(rgb[2],10) * opacity + (1-opacity)*255;
         var thirdColor = parseInt(rgb[3],10) * opacity + (1-opacity)*255;
         //console.log(firstColor);
         //console.log(secondColor);         
         //console.log(thirdColor);         
         //console.log(opacity);           
     }
     return (rgb) ? "#" +
      ("0" + firstColor).toString(16).slice(-2) +
      ("0" + secondColor).toString(16).slice(-2) +
      ("0" + thirdColor).toString(16).slice(-2) : orig;
    }    
        var CVK_inputElement = jQuery('input:first');
        var CVK_shiftClicked = false;
        var CVK_capslockClicked = false;
        var CVK_additionalClicked = false;
        var CVK_optionalButton1Clicked = false;
        var CVK_optionalButton2Clicked = false;
        var CVK_optionalButton3Clicked = false; 
        var CVK_counter = 0;
        var CVK_iftextarea = false;

        CVK_changeDataButtons(0);
        
        // adding icon into inputs and textareas
        jQuery('input[type="text"], input[type="password"], input[type="email"], input[type="number"], input[type="search"], input[type="tel"], input[type="url"], input[type="datetime"], input[type="email"], textarea').each(function(){ //add all input types
            var $this = jQuery(this);
            var CVK_thisElement = $this.width() + parseInt ($this.css("padding-right").replace("px", "")) + parseInt ($this.css("padding-left").replace("px", ""));         
            if (CVK_thisElement > 20) {
                $this.wrapAll('<div class="CVK_formsdiv">');
                $this.after('<div class="CVK_virt_keyboard_icon" id="CVK_virtIcon'+CVK_counter+'" style="left:'+(CVK_thisElement-28)+'px"><span class="CVK_virt_keyboard_icon_image"><svg viewbox="0 0 600 500"><use xlink:href="#CVK_path_keyboard"/></svg></span></div>');  
                CVK_counter++;
            }
        });
    
        
        // memorize focused element
        jQuery('input[type="text"], input[type="password"], input[type="email"], input[type="number"], input[type="search"], input[type="tel"], input[type="url"], input[type="datetime"], input[type="email"]').focus(function(){ //add all input types
            CVK_inputElement = jQuery(this);
            CVK_iftextarea = false;
        });
        jQuery('textarea').focus(function(){ // memorize if it textarea
            CVK_inputElement = jQuery(this);
            CVK_iftextarea = true;
        });        
        
        
        // click on keyboard icon in input/textarea
        jQuery('.CVK_virt_keyboard_icon').click(function(){
            jQuery('.CVK_keyboard_popup').stop().fadeToggle('fast',CVK_changeCVK_windowHeight); // show/hide popup with keyboard
            jQuery(this).prev().focus(); // focus on input/textarea
        });
        
        // click on shift button
        jQuery('.CVK_shift_button').click(function(){
            if (!CVK_shiftClicked) {
                if (CVK_capslockClicked) {
                    CVK_capslockClicked = false;
                    jQuery('.CVK_capslock_button').css({ "background-color": "", "box-shadow": "", "transform": "" });                    
                    CVK_changeDataButtons(0);
                    if (CVK_optionalButton1Clicked || CVK_optionalButton2Clicked || CVK_optionalButton3Clicked) { // turn off highlighting of additionals button
                        CVK_optionalButton1Clicked = false;
                        CVK_optionalButton2Clicked = false;
                        CVK_optionalButton3Clicked = false;                
                        jQuery('.CVK_optional-button1, .CVK_optional-button2, .CVK_optional-button3').css({ "background-color": "", "box-shadow": "", "transform": "" });                
                    }                    
                } else {
                    CVK_shiftClicked = true;
                    jQuery('.CVK_shift_button').css({ "background-color": "#d1e3f4", "box-shadow": "1px 1px #666", "transform": "translateY(1px)" });
                    if (CVK_optionalButton1Clicked) {
                        CVK_changeDataButtons(4);                        
                    } else if (CVK_optionalButton2Clicked) {
                        CVK_changeDataButtons(6);                        
                    } else if (CVK_optionalButton3Clicked) {
                        CVK_changeDataButtons(8);                        
                    } else CVK_changeDataButtons(1);                       
                }
            } else {
                CVK_shiftClicked = false;
                jQuery('.CVK_shift_button').css({ "background-color": "", "box-shadow": "", "transform": "" });
                CVK_changeDataButtons(0);
                if (CVK_optionalButton1Clicked || CVK_optionalButton2Clicked || CVK_optionalButton3Clicked) { // turn off highlighting of additionals button
                    CVK_optionalButton1Clicked = false;
                    CVK_optionalButton2Clicked = false;
                    CVK_optionalButton3Clicked = false;                
                    jQuery('.CVK_optional-button1, .CVK_optional-button2, .CVK_optional-button3').css({ "background-color": "", "box-shadow": "", "transform": "" }); 
                    CVK_changeDataButtons(0);                
                }
            }
           if (CVK_additionalClicked) {
                CVK_additionalClicked = false;
                jQuery('.CVK_additions_button').css({ "background-color": "", "box-shadow": "", "transform": "" });                 
            }
        });
        
        // click on caps lock button        
        jQuery('.CVK_capslock_button').click(function(){
            if (!CVK_capslockClicked) {
                if (CVK_shiftClicked) {
                    CVK_shiftClicked = false;
                    jQuery('.CVK_shift_button').css({ "background-color": "", "box-shadow": "", "transform": "" }); 
                    CVK_changeDataButtons(0);
                    if (CVK_optionalButton1Clicked || CVK_optionalButton2Clicked || CVK_optionalButton3Clicked) { // turn off highlighting of additionals button
                        CVK_optionalButton1Clicked = false;
                        CVK_optionalButton2Clicked = false;
                        CVK_optionalButton3Clicked = false;                
                        jQuery('.CVK_optional-button1, .CVK_optional-button2, .CVK_optional-button3').css({ "background-color": "", "box-shadow": "", "transform": "" });            
                    }                    
                } else {
                    CVK_capslockClicked = true;
                    jQuery('.CVK_capslock_button').css({ "background-color": "#d1e3f4", "box-shadow": "1px 1px #666", "transform": "translateY(1px)" });
                    if (CVK_optionalButton1Clicked) {
                        CVK_changeDataButtons(4);                        
                    } else if (CVK_optionalButton2Clicked) {
                        CVK_changeDataButtons(6);                        
                    } else if (CVK_optionalButton3Clicked) {
                        CVK_changeDataButtons(8);                        
                    } else CVK_changeDataButtons(1);                        
                }
            } else {
                CVK_capslockClicked = false;
                jQuery('.CVK_capslock_button').css({ "background-color": "", "box-shadow": "", "transform": "" });
                CVK_changeDataButtons(0);
                if (CVK_optionalButton1Clicked || CVK_optionalButton2Clicked || CVK_optionalButton3Clicked) { // turn off highlighting of additionals button
                    CVK_optionalButton1Clicked = false;
                    CVK_optionalButton2Clicked = false;
                    CVK_optionalButton3Clicked = false;                
                    jQuery('.CVK_optional-button1, .CVK_optional-button2, .CVK_optional-button3').css({ "background-color": "", "box-shadow": "", "transform": "" }); 
                    CVK_changeDataButtons(0);                
                }
                
            } 
           if (CVK_additionalClicked) {
                CVK_additionalClicked = false;
                jQuery('.CVK_additions_button').css({ "background-color": "", "box-shadow": "", "transform": "" });                 
            }
        });
        
        // click on optional button 1
        jQuery('.CVK_optional-button1').click(function(){
            if (!CVK_optionalButton1Clicked) {
                CVK_optionalButton1Clicked = true;
                CVK_optionalButton3Clicked = false;
                CVK_optionalButton2Clicked = false;                                
                jQuery('.CVK_optional-button1').css({ "background-color": "#d1e3f4", "box-shadow": "1px 1px #666", "transform": "translateY(1px)" });
                jQuery('.CVK_optional-button2, .CVK_optional-button3').css({ "background-color": "", "box-shadow": "", "transform": "" }); 
                if (CVK_shiftClicked || CVK_capslockClicked) {
                    CVK_changeDataButtons(4);                    
                } else {
                    CVK_changeDataButtons(3);                    
                }
            } else {
                CVK_optionalButton1Clicked = false;
                jQuery('.CVK_optional-button1').css({ "background-color": "", "box-shadow": "", "transform": "" });
                CVK_changeDataButtons(0);
                if (!CVK_optionalButton1Clicked && !CVK_optionalButton2Clicked && !CVK_optionalButton3Clicked) {
                    CVK_capslockClicked = false;
                    jQuery('.CVK_capslock_button').css({ "background-color": "", "box-shadow": "", "transform": "" });                    
                    CVK_shiftClicked = false;
                    jQuery('.CVK_shift_button').css({ "background-color": "", "box-shadow": "", "transform": "" });
                }
            }
           if (CVK_additionalClicked) {
                CVK_additionalClicked = false;
                jQuery('.CVK_additions_button').css({ "background-color": "", "box-shadow": "", "transform": "" });                 
            }
        });
    
        // click on optional button 2
        jQuery('.CVK_optional-button2').click(function(){
            if (!CVK_optionalButton2Clicked) {
                CVK_optionalButton2Clicked = true;
                CVK_optionalButton1Clicked = false;
                CVK_optionalButton3Clicked = false;                                
                jQuery('.CVK_optional-button2').css({ "background-color": "#d1e3f4", "box-shadow": "1px 1px #666", "transform": "translateY(1px)" });
                jQuery('.CVK_optional-button1, .CVK_optional-button3').css({ "background-color": "", "box-shadow": "", "transform": "" });                 
                if (CVK_shiftClicked || CVK_capslockClicked) {
                    CVK_changeDataButtons(6);                    
                } else {
                    CVK_changeDataButtons(5);                    
                }
            } else {
                CVK_optionalButton2Clicked = false;
                jQuery('.CVK_optional-button2').css({ "background-color": "", "box-shadow": "", "transform": "" });
                CVK_changeDataButtons(0);
                if (!CVK_optionalButton1Clicked && !CVK_optionalButton2Clicked && !CVK_optionalButton3Clicked) {
                    CVK_capslockClicked = false;
                    jQuery('.CVK_capslock_button').css({ "background-color": "", "box-shadow": "", "transform": "" });                    
                    CVK_shiftClicked = false;
                    jQuery('.CVK_shift_button').css({ "background-color": "", "box-shadow": "", "transform": "" });
                }
                
            }
           if (CVK_additionalClicked) {
                CVK_additionalClicked = false;
                jQuery('.CVK_additions_button').css({ "background-color": "", "box-shadow": "", "transform": "" });                 
            }
        });
    
        // click on optional button 3
        jQuery('.CVK_optional-button3').click(function(){
            if (!CVK_optionalButton3Clicked) {
                CVK_optionalButton3Clicked = true;
                CVK_optionalButton1Clicked = false;
                CVK_optionalButton2Clicked = false;                
                jQuery('.CVK_optional-button3').css({ "background-color": "#d1e3f4", "box-shadow": "1px 1px #666", "transform": "translateY(1px)" });
                jQuery('.CVK_optional-button1, .CVK_optional-button2').css({ "background-color": "", "box-shadow": "", "transform": "" });                 
                if (CVK_shiftClicked || CVK_capslockClicked) {
                    CVK_changeDataButtons(8);                    
                } else {
                    CVK_changeDataButtons(7);                    
                }
            } else {
                CVK_optionalButton3Clicked = false;
                jQuery('.CVK_optional-button3').css({ "background-color": "", "box-shadow": "", "transform": "" });
                CVK_changeDataButtons(0);
                if (!CVK_optionalButton1Clicked && !CVK_optionalButton2Clicked && !CVK_optionalButton3Clicked) {
                    CVK_capslockClicked = false;
                    jQuery('.CVK_capslock_button').css({ "background-color": "", "box-shadow": "", "transform": "" });                    
                    CVK_shiftClicked = false;
                    jQuery('.CVK_shift_button').css({ "background-color": "", "box-shadow": "", "transform": "" });
                }
                
            }
           if (CVK_additionalClicked) {
                CVK_additionalClicked = false;
                jQuery('.CVK_additions_button').css({ "background-color": "", "box-shadow": "", "transform": "" });                 
            }
        });    
    
        // click on backspace button 
        jQuery('.CVK_backspace_button').click(function(){
            CVK_inputElement.focus(); // set focus on input/textarea
            var CVK_inputText = CVK_inputElement.val();
            var CVK_startCaretPosition = document.activeElement.selectionStart;
            var CVK_endCaretPosition = document.activeElement.selectionEnd;

            if (CVK_startCaretPosition == CVK_inputText.length ) {
                CVK_inputElement.val(CVK_inputElement.val().slice(0,-1));
                document.activeElement.selectionStart = CVK_startCaretPosition;
                document.activeElement.selectionEnd = CVK_startCaretPosition;
            } else {
                if (CVK_startCaretPosition == CVK_endCaretPosition) {
                    CVK_inputElement.val( CVK_inputText.substring(0,CVK_startCaretPosition-1) + CVK_inputText.substring(CVK_endCaretPosition,CVK_inputText.length) );
                    document.activeElement.selectionStart = CVK_startCaretPosition-1;
                    document.activeElement.selectionEnd = CVK_startCaretPosition-1;                  
                } else {
                    CVK_inputElement.val( CVK_inputText.substring(0,CVK_startCaretPosition+1) + CVK_inputText.substring(CVK_endCaretPosition,CVK_inputText.length) );                
                    document.activeElement.selectionStart = CVK_startCaretPosition;
                    document.activeElement.selectionEnd = CVK_startCaretPosition;                  
                }
            }
        });
        
        // click on keyboard button - letter, number or symbol
        jQuery('.CVK_main_buttons, .CVK_extra_button1, .CVK_extra_button2').click(function(){
            CVK_inputElement.focus(); // set focus on input/textarea
            var CVK_currSymbol = jQuery(this).html(); // get symbol from our virtual keyboard
            var CVK_inputText = CVK_inputElement.val();
            var CVK_startCaretPosition = document.activeElement.selectionStart;
            var CVK_endCaretPosition = document.activeElement.selectionEnd;

            if (CVK_startCaretPosition == CVK_inputText.length ) {
                CVK_inputElement.val(CVK_inputElement.val()+CVK_currSymbol);                                
            } else {
                CVK_inputElement.val( CVK_inputText.substring(0,CVK_startCaretPosition) + CVK_currSymbol + CVK_inputText.substring(CVK_endCaretPosition,CVK_inputText.length) );
            }
            
            document.activeElement.selectionStart = CVK_startCaretPosition+1;
            document.activeElement.selectionEnd = CVK_startCaretPosition+1;
            
            if (CVK_shiftClicked) { // turn off Shift button
                CVK_shiftClicked = false;
                jQuery('.CVK_shift_button').css({ "background-color": "", "box-shadow": "", "transform": "" });
                CVK_changeDataButtons(0);
            }
            if (CVK_optionalButton1Clicked || CVK_optionalButton2Clicked || CVK_optionalButton3Clicked) { // turn off highlighting of additionals button
                CVK_optionalButton1Clicked = false;
                CVK_optionalButton2Clicked = false;
                CVK_optionalButton3Clicked = false;                
                jQuery('.CVK_optional-button1, .CVK_optional-button2, .CVK_optional-button3').css({ "background-color": "", "box-shadow": "", "transform": "" }); 
                CVK_changeDataButtons(0);                
            }
        });
        
        // click space button
        jQuery('.CVK_space_button').click(function(){
            CVK_inputElement.focus(); // set focus on input/textarea
            var CVK_currSymbol = ' '; // define current sumbol as space
            var CVK_inputText = CVK_inputElement.val();
            var CVK_startCaretPosition = document.activeElement.selectionStart;
            var CVK_endCaretPosition = document.activeElement.selectionEnd;

            if (CVK_startCaretPosition == CVK_inputText.length ) {
                CVK_inputElement.val(CVK_inputElement.val()+CVK_currSymbol);                                
            } else {
                CVK_inputElement.val( CVK_inputText.substring(0,CVK_startCaretPosition) + CVK_currSymbol + CVK_inputText.substring(CVK_endCaretPosition,CVK_inputText.length) );
            }
            
            document.activeElement.selectionStart = CVK_startCaretPosition+1;
            document.activeElement.selectionEnd = CVK_startCaretPosition+1;            
        });
        
        //click enter button
        jQuery('.CVK_enter_button').click(function(){
            CVK_inputElement.focus(); // set focus on input/textarea
            
            if (!CVK_iftextarea) { // if it not a textarea - emulate enter key press and send form
                if (CVK_inputElement.parents('form:first').attr('class') == "comment-form" ) {
                    jQuery('#submit').click(); // WP comment form bag
                } else {
                    CVK_inputElement.parents('form:first').submit(); 
                }
            } else {
                var CVK_currSymbol = '\n'; // define current sumbol as space
                var CVK_inputText = CVK_inputElement.val();
                var CVK_startCaretPosition = document.activeElement.selectionStart;
                var CVK_endCaretPosition = document.activeElement.selectionEnd;

                if (CVK_startCaretPosition == CVK_inputText.length ) {
                    CVK_inputElement.val(CVK_inputElement.val()+CVK_currSymbol);                                
                } else {
                    CVK_inputElement.val( CVK_inputText.substring(0,CVK_startCaretPosition) + CVK_currSymbol + CVK_inputText.substring(CVK_endCaretPosition,CVK_inputText.length) );
                }

                document.activeElement.selectionStart = CVK_startCaretPosition+1;
                document.activeElement.selectionEnd = CVK_startCaretPosition+1;                  
            }          
        });
        
        // click on additional_symbols button
        jQuery('.CVK_additions_button').click(function(){
            if (CVK_shiftClicked) {
                CVK_shiftClicked = false;
                jQuery('.CVK_shift_button').css({ "background-color": "", "box-shadow": "", "transform": "" }); 
            }
            if (CVK_capslockClicked) {
                CVK_capslockClicked = false;
                jQuery('.CVK_capslock_button').css({ "background-color": "", "box-shadow": "", "transform": "" });                
            }
            
            if (!CVK_additionalClicked) {
                CVK_additionalClicked = true;
                jQuery('.CVK_additions_button').css({ "background-color": "#d1e3f4", "box-shadow": "1px 1px #666", "transform": "translateY(1px)" });                           jQuery('.CVK_optional-button1, .CVK_optional-button2, .CVK_optional-button3').css({ "background-color": "#ffffff", "box-shadow": "", "transform": "" }); 
                CVK_changeDataButtons(2);
            } else {
                CVK_additionalClicked = false;
                jQuery('.CVK_additions_button').css({ "background-color": "", "box-shadow": "", "transform": "" }); 
                jQuery('.CVK_optional-button1, .CVK_optional-button2, .CVK_optional-button3').css({ "background-color": "", "box-shadow": "", "transform": "" }); 
                CVK_changeDataButtons(0);
            }
        });
        
        // close keyboard popup
        jQuery('.CVK_keyboard_popup_close_button').click(function(){
            jQuery('.CVK_keyboard_popup').stop().fadeOut('fast',CVK_changeCVK_windowHeight);
        });

        // chage color of SVG keyboard icon, depends on background of input
        CVK_counter = 0;
        jQuery('input[type="text"], input[type="password"], input[type="email"], input[type="number"], input[type="search"], input[type="tel"], input[type="url"], input[type="datetime"], input[type="email"], textarea').each(function() {
            var CVK_inputBGcolor = jQuery(this).css("background-color");
            //console.log(CVK_inputBGcolor);
            //console.log(CVK_rgb2hex(CVK_inputBGcolor));
            var CVK_iconColor = CVK_invertColor(CVK_rgb2hex(CVK_inputBGcolor));
            //console.log(CVK_iconColor);              
            if (CVK_inputBGcolor == "transparent") { CVK_iconColor = "#000000"; }
            var CVK_iconSelector = "#CVK_virtIcon" + CVK_counter;
            CVK_counter++;
            jQuery(CVK_iconSelector).find('span').css("color", CVK_iconColor).next('span').css({"color": CVK_iconColor, "cursor": "default"});
        });
          
        // change position of keyboard icon on resize parent textarea
        var $CVK_textareas = jQuery('input[type="text"], input[type="password"], input[type="email"], input[type="number"], input[type="search"], input[type="tel"], input[type="url"], input[type="datetime"], input[type="email"], textarea');
        $CVK_textareas.data('x', $CVK_textareas.outerWidth());
        $CVK_textareas.data('y', $CVK_textareas.outerHeight());
        $CVK_textareas.mouseup(function () {
            var $this = jQuery(this);
            if ($this.outerWidth() != $this.data('x') || $this.outerHeight() != $this.data('y')) {
                var reSizeElement = $this.width() + parseInt ($this.css("padding-right").replace("px", "")) + parseInt ($this.css("padding-left").replace("px", "")); 
                $this.next().css({ "left": reSizeElement-28});
            }
            // set new height/width
            $this.data('x', $this.outerWidth());
            $this.data('y', $this.outerHeight());
        });
    }
                 
}