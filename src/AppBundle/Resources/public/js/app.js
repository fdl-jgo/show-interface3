$('.students > a').click(function (e) {
	// body...
	e.preventDefault(); 
	let elt = this;

	let param =  $('.students > a').index(elt);

	var jqxhr = $.post( "http://localhost/php/symfony/sgbdsymf/web/app_dev.php/validpresence",
					{
						idpart: $('.students > a span.idpart:eq('+param+')').html(),
						idcours:$('.students > a span.idcours:eq('+param+')').html(),
					},
					function() {
  						console.log( "success" );
		})

		  	.done(function(response) {
		  		let x = response.var;
		  		$('.students > a span.valid:eq('+param+')').toggleClass( "getpresence" );
		    	console.log( x );
		  	})

		  	.fail(function() {
		    	console.log( "error" );
		  	})

		  	.always(function() {
		    	console.log( "finished" );
		  	});

	console.log(jqxhr);

})
