<!-- BEGIN: main -->
<!-- BEGIN: marquee_css -->
	<style>
	.item-display{
		height:auto;
		text-align:center;
	}
	marquee ul li{
		display:inline-block;
		margin-right: 50px;
	}
	</style>
<!-- END: marquee_css -->
	<div class="pull-left"><i class="fa fa-angle-double-right" aria-hidden="true"></i></div>
	<marquee id="{BLOCKID}" class="center-block" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" width="98%">
		<ul class="item-display">
		<!-- BEGIN: newloop -->
		<li class="thumbnail-display">
			<a href="{blocknews.link}" title="{blocknews.title}" target="_blank">{blocknews.title}</a>
		</li>
		<!-- END: newloop -->
		</ul>
	</marquee>
<!-- END: main -->