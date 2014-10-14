$(document).ready(function(){

    $(function () {
       $('.tlt').textillate({
      // the default selector to use when detecting multiple texts to animate
      selector: '.texts',

      // enable looping
      loop: true,

      // sets the minimum display time for each text before it is replaced
      minDisplayTime: 7,

      // sets the initial delay before starting the animation
      // (note that depending on the in effect you may need to manually apply 
      // visibility: hidden to the element before running this plugin)
      initialDelay: 2,

      // set whether or not to automatically start animating
      autoStart: true,

      // custom set of 'in' effects. This effects whether or not the 
      // character is shown/hidden before or after an animation  
      inEffects: [],

      // custom set of 'out' effects
      outEffects: [ 'flipOutY' ],

      // in animation settings
      in: {
        // set the effect name
        effect: 'flipInY',

        // set the delay factor applied to each consecutive character
        delayScale: 0,

        // set the delay between each character
        delay: 50,

        // set to true to animate all the characters at the same time
        sync: true,

        // randomize the character sequence 
        // (note that shuffle doesn't make sense with sync = true)
        shuffle: false,

        // reverse the character sequence 
        // (note that reverse doesn't make sense with sync = true)
        reverse: false,

        // callback that executes once the animation has finished
        callback: function () {}
      },

      // out animation settings.
      out: {
        effect: 'flipOutY',
        delayScale: 0,
        delay: 50,
        sync: true,
        shuffle: false,
        reverse: false,
        callback: function () {}
      },

      // callback that executes once textillate has finished 
        callback: function () {}
        })
    });


    $("#price_slider").ionRangeSlider({
        min: 0,
        max: 2000,
        from: 200,
        to: 1000,
        type: 'double',
        step: 1,
        prefix: "$",
        prettify: true,
        hasGrid: true,
        gridMargin: 10
    });

    $("#size_slider").ionRangeSlider({
        min: 0,
        max: 60,
        from: 14,
        to: 22,
        type: 'single',
        step: 0.1,
        postfix: '\"',
        prettify: true,
        hasGrid: true,
        gridMargin: 10
    });

    $("#memory_slider").ionRangeSlider({
        min: 0,
        max: 500,
        from: 8,
        to: 32,
        type: 'single',
        step: 1,
        postfix: "GB",
        prettify: true,
        hasGrid: true,
        gridMargin: 7
    });

    $("#battery_slider").ionRangeSlider({
        min: 0,
        max: 10,
        from: 4,
        to: 6,
        type: 'single',
        step: 0.1,
        postfix: "hours",
        prettify: true,
        hasGrid: true,
        gridMargin: 10
    });


    $("#demoForm").formwizard({ 
        validationEnabled: true,
        focusFirstInput : true,
     }
    );

    $("#phone").click(function() {
        var value = $(this).val();
        window.location = "questionaire.php?varname=" + value; 
    });

    $("#phone").hover(function() {
        $("#phone").css("background-color", "#EE9D23");
        }, function() {
        $("#phone").css("background-color", "");    
    });

    $("#laptop").click(function() {
        var value = $(this).val();
        window.location = "questionaire.php?varname=" + value; 
    });

    $("#laptop").hover(function() {
        $("#laptop").css("background-color", "#EE9D23");
        }, function() {
        $("#laptop").css("background-color", "");    
    });

    $("#tablet").click(function() {
        var value = $(this).val();
        window.location = "questionaire.php?varname=" + value; 
    });

    $("#tablet").hover(function() {
        $("#tablet").css("background-color", "#EE9D23");
        }, function() {
        $("#tablet").css("background-color", "");    
    });

    $("#ereader").click(function() {
        var value = $(this).val();
        window.location = "questionaire.php?varname=" + value;  
    });

    $("#ereader").hover(function() {
        $("#ereader").css("background-color", "#EE9D23");
        }, function() {
        $("#ereader").css("background-color", "");    
    });
    
});
