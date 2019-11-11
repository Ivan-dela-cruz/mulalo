
<?php $this->load->view('front/template/includes/home_page_banners');?>
<style>
.list ul li {
    display: inline-block;
    letter-spacing: 0.2px;
    line-height: 1em;
    font-size: 0.95em;
    color: #222;
    padding: 5px;
	width:100% !important;
}
</style>



<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resort Inn Responsive , Smartphone Compatible web template , Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    




	<div class="content">
        
 
        <!-- boton que se desliza hacia abajo -->
        
         <div class="thim-click-to-bottom">
				<a href="#contact" class="scroll">
					<i class="fa fa-long-arrow-down" aria-hidden="true"></i>
				</a>
			</div>
        
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--iris">
						<ul class="nav navbar-nav menu__list">
							<li class="menu__item menu__item--current"><a href="index.php" class="menu__link"></a></li>
                            
                            <!--
							<li class="menu__item"><a href="#about" class="menu__link scroll">Acerca de</a></li>
							<li class="menu__item"><a href="#team" class="menu__link scroll">Equipo</a></li>
							<li class="menu__item"><a href="#gallery" class="menu__link scroll">Galería</a></li>
							<li class="menu__item"><a href="#rooms" class="menu__link scroll">Paquetes</a></li>
							<li class="menu__item"><a href="#contact" class="menu__link scroll">Contáctenos</a></li>

-->
						</ul>
					</nav>
				</div>
        
       
        
<!-- special-services -->
<div class="special-services">
	<div class="container">
		<h3><span><?php echo $this->setting->content_section_title?></span></h3>
		<p class="autem"><?php echo $this->setting->content_section_description?></p>
		<div class="special-services-grids">
            <?php 
            $i=0;
            foreach($room_types as $rt):
            $rt_image = get_room_type_featured_image($rt->id);
            ?>            	
			<div class="col-md-3 special-services-grid">
				<div class="special-services-grid1">
					<img src="<?php echo $rt_image; ?>" alt="<?php echo $rt->title?>" class="img-responsive" />
				</div>
				<h4 class="text-center"><a href="<?php echo site_url('rooms/'.$rt->slug)?>"><?php echo $rt->title?></a></h4>
			</div>
            <?php 
            $i++;
            if($i%4 == 0) :
			     echo ' <div class="clearfix"></div>
                        </div>
			            <div class="special-services-grids">';
		    endif;
	        endforeach; 
			?>
		</div>
	</div>
</div>
        
        


<!-- special-services -->
<?php if(!empty($coupons)){?>
<div class="special-services">
	<div class="container">
		<h3><span><?php echo lang('latest_deals')?></span></h3>
		<p class="autem"><?php echo $this->setting->content_section_description?></p>
		<div class="special-services-grids">
            <div id="owl-demo" class="owl-carousel">
    		     <?php foreach($coupons as $cp){	$services	=	get_coupon_paid_services($cp->id);?>	
    			    <div class="item">
    		           <div class="col-md-4 cap-img">
    						<img src="<?php echo base_url('assets/admin/uploads/coupons/'.$cp->image)?>" class="img-responsive offer-image gray" alt=""/>
    					</div>
    					<div class="col-md-8 offer-description">
    						<h4><?php echo $cp->title?></h4>	
    						<ul class="list-inline text-uppercase">
    							<li><i class="glyphicon glyphicon-credit-card"></i> <b><?php echo lang('use_coupon');?> :</b> <?php echo $cp->code; ?></li>
    							<li> <b><i> <?php echo $this->session->userdata('currency_sybmol')?></i></b>  <b><?php echo lang('min_amount');?> :</b> <?php echo $cp->min_amount; ?></li>
    							<li><b><i> <?php echo $this->session->userdata('currency_sybmol')?></i></b> <b><?php echo lang('max_amount');?> :</b> <?php echo $cp->max_amount; ?></li>
    						</ul>										
    						<p><?php echo substr($cp->description,0,400)?></p>
    						<div class="row">
    							<div class="col-md-9 deatils-left">
    								<?php if(!empty($services)){?>
    								<div class="coupon-list">
    									<h5 style="margin: 10px 0;"><strong>Free Paid Services</strong></h5>
    									<ul class="list-inline">
    										<?php foreach($services as $serv){?>
    										<li><i class="glyphicon glyphicon-hand-right"></i> <?php echo $serv->title?></li>
    										<?php } ?>
    									</ul>
    								</div>
    								<?php } ?>
    							</div>
    							<div class="col-md-3 deatils-right">
                                    <div class="discount alizarin">
                                        <?php echo ($cp->type=='Fixed')?$this->session->userdata('currency_sybmol'):''?> <?php echo $cp->value?> <?php echo ($cp->type=='Percentage')?'%':''?>
                                    
                                    </div>
    							</div>
    							<div class="clearfix"> </div>
    						</div>
    					</div>
    		            <div class="clearfix"> </div>
    		        </div>
    		        <?php } ?>
    	        </div>
		</div>
	</div>
</div>
<?php } ?>


 
<!-- testimonials -->
<div class="testimonials">
	<div class="container">
		<h3><span><?php echo lang('testimonials')?></span></h3>
		<p class="autem">los volvere a visitar excellente hotel</p>
		<div class="testimonials-grids">
			<div class="col-md-12 testimonials-grid-left">
				<div class="wmuSlider example1 animated wow slideInUp" data-wow-delay=".5s">
					<div class="wmuSliderWrapper">
                        <?php 
				        $i=0;
				        foreach($testimonials as $test):
				        ?> 
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<div class="testimonials-grid-left-grid">
									<div class="col-md-2 testimonials-grid-left1">
										<img src="<?php echo base_url('assets/admin/uploads/images/'.$test->auther_image)?>" alt=" " class="img-circle img-responsive" width="155" />
									</div>
									<div class="col-md-10 testimonials-grid-left2">
										<h4>
                                            <strong><?php echo $test->title?></strong>
                                            <br />
                                            <?php echo $test->testimonial?> - <i><?php echo $test->auther_name?></i></h4>
										<p>
                                            <?php 
                                            if (strpos($test->rating,'.') !== false) {
												for($j=1;$j<=intval($test->rating);$j++){
													echo '<i class="fa fa-star"></i>';
												}
												echo '<i class="fa fa-star-half-o"></i>';
											}else {
												for($j=1;$j<=intval($test->rating);$j++){
													echo '<i class="fa fa-star"></i>';
												}
											}
									        ?>	
                                        </p>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</article>
                        <?php 
                        $i++;
						if($i%2 == 0) :
						  echo ' <div class="clearfix"></div>
			                     </div>
				                 <div class="testimonial-grids test2">';
					    endif;
						endforeach; 
				        ?>	
					</div>
				</div>
			 </div>
		   <div class="clearfix"> </div>
		</div>
	</div>
</div>
        
        <!--PRUEBA PARA VER DONDE ES-->
        <!--
        <div>HOLA</div>
-->
        
        
        
        <!--
         	<div class="about-wthree" id="about">
		  <div class="container">
				   <div class="ab-w3l-spa">
                            <h3 class="title-w3-agileits title-black-wthree">Acerca de nuestro SUN RISE
</h3> 
						   <p class="about-para-w3ls"> Lorem Ipsum es simplemente un texto simulado de la industria de impresión y composición tipográfica. Laca tempient vestibulum blandit faucibus. Nunc imperdiet, diam nec rhoncus ullamcorper, nisl nulla suscipit ligula, en imperdiet urna
</p>
						   <img src="images/arr.png" class="img-responsive" alt="Hair Salon">
										<div class="w3l-slider-img">
											<img src="images/a1.jpg" class="img-responsive" alt="Hair Salon">
										</div>
                                       <div class="w3ls-info-about">
										    <h4>Te encantarán todas las comodidades que ofrecemos
!</h4>
											<p>que espero disfruta de tus vaciones con nosotros. </p>
										</div>
		          </div>
		   	<div class="clearfix"> </div>
    </div>
</div>
        
      -->  
        
        
        <section class="contact-w3ls" id="contact">
	<div class="container">
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
			<div class="contact-agileits">
				<h4>Contáctenos
</h4>
				<p class="contact-agile2">..
</p>
                
				
			
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile1" data-aos="flip-right">
			<h4>Conéctate con nosotros
</h4>
			<p class="contact-agile1"><strong>Teléfono :</strong>+593 (03)271-05-35</p>
			<p class="contact-agile1"><strong>Email :</strong> <a href="mailto:juntapmulalo@yahoo.com">juntapmulalo@yahoo.com</a></p>
			<p class="contact-agile1"><strong>Direccion :</strong> Mulaló, Ecuador</p>
																
			<div class="social-bnr-agileits footer-icons-agileinfo">
				<ul class="social-icons3">
								<li><a href="https://www.facebook.com/profile" class="fa fa-facebook icon-border facebook"> </a></li>
								<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li> 
								
							</ul>
			</div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9437.224632054913!2d-78.58000758292611!3d-0.7763725391859067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d45978e2019b8f%3A0xd46286a5d1558f1!2zTXVsYWzDsywgVGFuaWN1Y2jDrQ!5e1!3m2!1ses!2sec!4v1562799839276!5m2!1ses!2sec" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            
            
            
            
           
            
            
            
            
            
		</div>
		<div class="clearfix"></div>
	</div>
</section>
        
        
        
<!-- //testimonials -->
<script src="<?php echo base_url('assets/front')?>/js/jquery.wmuSlider.js"></script> 
<script type="text/javascript">
	$('.example1').wmuSlider();         
</script>
        
        
        
        
        
        
        <script src="js/main.js"></script>	
<!--//search-bar-->
<!--tabs-->
<script src="js/easy-responsive-tabs.js"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
</script>
<!--//tabs-->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	
	<div class="arr-w3ls">
	<a href="#" id="toTop"  style="display: block;"> <span  id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
<!-- //smooth scrolling -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>