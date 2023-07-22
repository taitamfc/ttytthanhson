<!-- BEGIN: main -->
<div class="widget widget_sidebar-- widget_news">
	<div class="widget__title"><span>Tin t&#7913;c m&#7899;i</span><hr></div>
	<div class="widget__container">
	<ul class="d_flex">
	<!-- BEGIN: newloop -->
	<li class="d_flex">
		<article>
		<div class="thumb" style="float: left;">
			<a href="{blocknews.link}" title="{blocknews.title}">
			<img width="150" height="150" src="{blocknews.imgurl}" class="attachment-thumb-150x150 size-thumb-150x150 wp-post-image" alt="{blocknews.title}" decoding="async" loading="lazy" /></a>
		</div>
		<div class="text" style="float: right;">
		<h3 class="text__title"><a href="{blocknews.link}">{blocknews.title}</a></h3>
		</div>
		</article>
	</li>
	<!-- END: newloop -->
	</ul>
	</div>
</div> 
<!-- BEGIN: tooltip -->
<script type="text/javascript">
$(document).ready(function() {$("[data-rel='block_news_tooltip'][data-content!='']").tooltip({
    placement: "{TOOLTIP_POSITION}",
    html: true,
    title: function(){return ( $(this).data('img') == '' ? '' : '<img class="img-thumbnail pull-left margin_image" src="' + $(this).data('img') + '" width="90" />' ) + '<p class="text-justify">' + $(this).data('content') + '</p><div class="clearfix"></div>';}
});});
</script>
<!-- END: tooltip -->

<!-- END: main -->