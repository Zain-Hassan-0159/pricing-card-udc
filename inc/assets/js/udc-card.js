jQuery(document).ready(function ($) {
    var slider = $('#vol_slider');
    var handle = $('.handle');
    var slide = $('.slide');
    var min = parseInt(slider.attr('min'));
    var max = parseInt(slider.attr('max'));
    var points = $(".points span");
    
    // Update handle position on slider input
    slider.on('input', function() {
        var value = $(this).val();
        console.log(value)
        if(value > max - 5){
            value = max;
        }else if(value < min + 5){
            value = min;
        }

        $('.value_display').text(value); // Update value display
        var percent = (value - min) / (max - min) * 100;
        var position = (slide.width() * percent) / 100;
        handle.css('left', position - 20 + 'px');
        $('.udc_container .fill').css('width', position + 'px');

        // update suvae value
        const min_sua = Math.floor((6.5/100) * value);
        const max_sua = Math.floor((8/100) * value);

        const min_sua_out = Math.floor((0.5/100) * value);
        const max_sua_out = Math.floor((2/100) * value);

        $('.udc_container .card_with_suvae .range').text(min_sua + '-' + max_sua)
        $('.udc_container .card_without_suvae .range').text(min_sua_out + '-' + max_sua_out)


    });
    
    // Update slider value on handle drag
    handle.on('mousedown touchstart', function(e) {
        var offsetX;
        if (e.type === 'mousedown') {
            offsetX = e.pageX - handle.offset().left;
        } else if (e.type === 'touchstart') {
            var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
            offsetX = touch.pageX - handle.offset().left;
        }

        $(document).on('mousemove.slider touchmove.slider', function(e) {
            var leftValue;
            if (e.type === 'mousemove') {
                leftValue = e.pageX - slide.offset().left - offsetX;
            } else if (e.type === 'touchmove') {
                var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
                leftValue = touch.pageX - slide.offset().left - offsetX;
            }

            var percent = (leftValue / slide.width()) * 100;
            if (percent >= 0 && percent <= 100) {
                var value = Math.round((percent / 100) * (max - min) + min);
                value = Math.min(max, Math.max(min, value)); // Ensure value stays within bounds
                var position = ((value - min) / (max - min)) * 100;
                handle.css('left', position + '%');
                slider.val(value).trigger('input');
            }
        });

        $(document).on('mouseup.slider touchend.slider', function() {
            $(document).off('.slider'); // Unbind all events related to slider
        });
    });

    
    
    // Move handle on click
    slide.on('click', function(e) {
        var offset = e.pageX - slide.offset().left;
        var percent = (offset / slide.width()) * 100;
        var value = Math.round((percent / 100) * (max - min) + min);
        value = Math.min(max, Math.max(min, value)); // Ensure value stays within bounds
        handle.css('left', percent + '%');
        slider.val(value).trigger('input');
    });

});