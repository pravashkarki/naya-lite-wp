
jQuery( document ).ready(function($) {

	$( '.customize-control-checkboxes input[type="checkbox"]' ).on( 'change', function() {
            var checkbox_values = $( this ).parents( '.customize-control' ).find( 'input[type="checkbox"]:checked' ).map(
                function() {
                    return this.value;
                }
            ).get().join( ',' );
            $( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );
        }
    );

    $( 'input[type=range]' ).on( 'change', function() {
        $( 'input[type=range]' ).each(function() {
            var val = $(this).val();
            //console.log(val);
            //val = (val / 10) + 'rem';
            $(this).prev().prev().html('<span class="font-range-value"><strong>Font Size:</strong> '+val+'px</span>');
        });
    });
     $( 'input[type=range]' ).each(function() {
            var val = $(this).val();
            //console.log(val);
            //val = (val / 10) + 'rem';
            $(this).prev().prev().html('<span class="font-range-value"><strong>Font Size:</strong> '+val+'px</span>');
        });

    $(document).on("mousedown","input[type=range]",function() {

		var $range = $(this),
			$range_input = $range.parent('label').children( '.font-range-value' );

		value = $( this ).attr( 'value' );
		$range_input.val( value );

		$( this ).mousemove(function() {
			value = $( this ).attr( 'value' );
            //value = (value / 10) + 'rem';
			$range_input.text( value + 'px' );
		});
	});
});
