<title><?php echo $data['title'];?></title>
<link href="<?php echo CSS_URL;?>/base.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/styles.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/component-list-menu.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/component-accordion.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/component-rte.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/component-list-social.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/component-price.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/component-card.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/component-cart-notification.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/component-product-grid.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/component-predictive-search.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/component-pagination.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/section-image-banner.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/section-collection-list.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/section-multicolumn.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/section-main-product.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/section-product-recommendations.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/component-slider.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/component-rating.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/component-loading-overlay.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/component-deferred-media.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/section-footer.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo CSS_URL;?>/custom.css" rel="stylesheet" type="text/css" media="all">

<!-- script -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.0.js"></script>
<!-- <script type="text/javascript" src="/jquery-3.4.1.min.js"></script>-->
<script type="text/javascript" src="<?php echo JS_URL;?>/global.js" defer="defer"></script>
<script id="sections-script" data-sections="main-product,product-recommendations,header,footer,leadify" defer="defer" src="<?php echo JS_URL;?>/scripts.js"></script>
<script type="text/javascript" src="<?php echo JS_URL;?>/analytics.js"></script>
<!--<script type="text/javascript" src="/fbevents.js"></script>-->
<!--<script type="text/javascript" src="<?php echo JS_URL;?>/shopify.js"></script>-->
<script type="text/javascript" src="<?php echo JS_URL;?>/ultimatesalesboost.js"></script>
<script type="text/javascript" src="<?php echo JS_URL;?>/fontify.js"></script>
<script type="text/javascript" src="<?php echo JS_URL;?>/next.js"></script>
<!--<script type="text/javascript" src="/platform.js"></script>-->
<!--<script type="text/javascript" src="/predictive-search.js"></script>-->
<script type="text/javascript" src="<?php echo JS_URL;?>/trekkie_storefront.min.js"></script>
<script type="text/javascript" src="<?php echo JS_URL;?>/gtm.js"></script>
<script data-source-attribution="shopify.loadfeatures" defer="defer" src="<?php echo JS_URL;?>/load_feature.js"></script>
<script data-source-attribution="shopify.dynamic-checkout" defer="defer" src="<?php echo JS_URL;?>/features.js"></script>
<script type="text/javascript" src="<?php echo JS_URL;?>/sys.js"></script>
<script type="text/javascript" src="<?php echo JS_URL;?>/shop_events_listener.js"></script>
<script type="text/javascript" src="<?php echo JS_URL;?>/consent-tracking-api.js"></script>
<script type="text/javascript" src="<?php echo JS_URL;?>/shopify-boomerang-1.0.0.min.js"></script>
<!--<script type="text/javascript" src="/details-disclosure.js"></script>-->
<!--<script type="text/javascript" src="/handle_search.js"></script>-->
<!--<script type="text/javascript" src="/cart-notification.js"></script>-->
<!--<script type="text/javascript" src="/product-form.js" defer="defer"></script>-->
<script type="text/javascript" src="<?php echo JS_URL;?>/pickup-availability.js"></script>

<script>
	jQuery(document).ready(function () {
		jQuery('.header__icon').click(function () {
			jQuery('body').addClass('overflow-hidden');
			jQuery('.header__search').children(function(){
				jQuery('details').attr("open",true);
			});
		});
		jQuery('.search-modal__close-button').click(function () {
			jQuery('body').removeClass('overflow-hidden');
			jQuery('.header__search').children('details').removeAttr("open");
		});
	});
</script>