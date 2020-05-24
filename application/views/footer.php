	</div>
	</div>
<!-- </div>
</div> -->
	<footer class="navbar bg-primary navbar-dark fixed-bottom">
		<div class="navbar-brand"></div>
		<div class="navbar-text">Made By <span class="text-dark">Hrishikesh</span> <!-- With <span class="text-dark">CodeIgniter</span> --></div>
	</footer>
<script>
        ClassicEditor
            .create( document.querySelector( '#articleEditor' ),{
            	image: {
		            // You need to configure the image toolbar, too, so it uses the new style buttons.
		            toolbar: [ 'imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight' ],

		            styles: [
		                // This option is equal to a situation where no style is applied.
		                'full',

		                // This represents an image aligned to the left.
		                'alignLeft',

		                // This represents an image aligned to the right.
		                'alignRight'
		            ]
		        }

            })
            .catch( error => {
                console.error( error );
            } );
            window.onload = () => {
			   let bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
			   bannerNode.parentNode.removeChild(bannerNode);
			}
    </script>
  	
</body>
</html>